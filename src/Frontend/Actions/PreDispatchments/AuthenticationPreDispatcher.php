<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Frontend\Actions\PreDispatchments;

use CodeKandis\Authentication\CommonClientCredentials;
use CodeKandis\Authentication\CommonSessionAuthenticator;
use CodeKandis\Authentication\Configurations\SessionAuthenticatorConfigurationInterface;
use CodeKandis\Authentication\RegisteredCommonClient;
use CodeKandis\Authentication\RegisteredCommonClientInterface;
use CodeKandis\CheckList\Environment\Entities\ClientEntity;
use CodeKandis\CheckList\Environment\Persistence\Repositories\MariaDb\ClientEntityRepository;
use CodeKandis\Persistence\Configurations\PersistenceConfigurationInterface;
use CodeKandis\Persistence\Connector;
use CodeKandis\Persistence\FetchingResultFailedException;
use CodeKandis\Persistence\SettingFetchModeFailedException;
use CodeKandis\Persistence\StatementExecutionFailedException;
use CodeKandis\Persistence\StatementPreparationFailedException;
use CodeKandis\Persistence\TransactionCommitFailedException;
use CodeKandis\Persistence\TransactionRollbackFailedException;
use CodeKandis\Persistence\TransactionStartFailedException;
use CodeKandis\Session\Configurations\SessionsConfigurationInterface;
use CodeKandis\Session\SessionHandler;
use CodeKandis\Session\SessionHandlerInterface;
use CodeKandis\Tiphy\Actions\PreDispatchment\PreDispatcherInterface;
use CodeKandis\Tiphy\Actions\PreDispatchment\PreDispatchmentStateInterface;
use ReflectionException;
use function array_key_exists;

/**
 * Represents an authentication pre-distpatcher.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class AuthenticationPreDispatcher implements PreDispatcherInterface
{
	/**
	 * Stores the persistence configuration.
	 * @var PersistenceConfigurationInterface
	 */
	private PersistenceConfigurationInterface $persistenceConfiguration;

	/**
	 * Stores the sessions configuration.
	 * @var SessionsConfigurationInterface
	 */
	private SessionsConfigurationInterface $sessionsConfiguration;

	/**
	 * Stores the session authenticator configuration.
	 * @var SessionAuthenticatorConfigurationInterface
	 */
	private SessionAuthenticatorConfigurationInterface $sessionAuthenticatorConfiguration;

	/**
	 * Constructor method.
	 * @param PersistenceConfigurationInterface $persistenceConfiguration The persistence configuration.
	 * @param SessionsConfigurationInterface $sessionsConfiguration The sessions configuration.
	 * @param SessionAuthenticatorConfigurationInterface $sessionAuthenticatorConfiguration The session authenticator configuration.
	 */
	public function __construct( PersistenceConfigurationInterface $persistenceConfiguration, SessionsConfigurationInterface $sessionsConfiguration, SessionAuthenticatorConfigurationInterface $sessionAuthenticatorConfiguration )
	{
		$this->persistenceConfiguration          = $persistenceConfiguration;
		$this->sessionsConfiguration             = $sessionsConfiguration;
		$this->sessionAuthenticatorConfiguration = $sessionAuthenticatorConfiguration;
	}

	/**
	 * Represents the name of the client's ID.
	 * @var string
	 */
	protected const CLIENT_ID_NAME = 'name';

	/**
	 * Represents the name of the client's key.
	 * @var string
	 */
	protected const CLIENT_KEY_NAME = 'key';

	/**
	 * Gets the registered clients matching a specific e-mail.
	 * @param string $id The id of the registered client.
	 * @return RegisteredCommonClientInterface[] The registered common clients.
	 * @throws ReflectionException The client entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	private function getRegisteredClients( string $id ): array
	{
		$persistenceConnector = new Connector( $this->persistenceConfiguration );

		/**
		 * @var ClientEntity $registeredClient
		 */
		$registeredClient = $persistenceConnector->asTransaction(
			function () use ( $persistenceConnector, $id )
			{
				/**
				 * @var ClientEntity $client
				 */
				$client = ClientEntity::fromArray(
					[
						static::CLIENT_ID_NAME => $id
					]
				);

				return ( new ClientEntityRepository( $persistenceConnector ) )
					->readClientByName( $client );
			}
		);

		$registeredClients = [];
		if ( null !== $registeredClient )
		{
			$registeredClients[] = new RegisteredCommonClient( '', $registeredClient->getName(), $registeredClient->getKey(), (int) $registeredClient->getIsActive() );
		}

		return $registeredClients;
	}

	/**
	 * Persists the authorized client in the session.
	 * @param SessionHandlerInterface $sessionHandler The session handler to store the registered client.
	 * @param string $registeredClientSessionKey The session key to use to store the registered client.
	 * @param RegisteredCommonClientInterface $authorizedClient The authorized client.
	 */
	private function persistAuthorizedClientInSession( SessionHandlerInterface $sessionHandler, string $registeredClientSessionKey, RegisteredCommonClientInterface $authorizedClient ): void
	{
		$sessionHandler->start();
		$sessionHandler->set(
			$registeredClientSessionKey,
			new RegisteredCommonClient(
				'',
				$authorizedClient->getId(),
				'',
				$authorizedClient->getPermission()
			)
		);
	}

	/**
	 * Responds with a `401 Unauthorized`.
	 * @param PreDispatchmentStateInterface $dispatchmentState The state of the pre-dispatchment.
	 * @param string $requestedUri The clients requested URI.
	 */
	private function respondUnauthorized( PreDispatchmentStateInterface $dispatchmentState, string $requestedUri ): void
	{
		$dispatchmentState->setPreventDispatchment( true );
		( new UnauthorizedAction( $requestedUri ) )
			->execute();
	}

	/**
	 * Redirects to the requested URI.
	 * @param PreDispatchmentStateInterface $dispatchmentState The state of the pre-dispatchment.
	 * @param string $redirectUri The clients requested URI.
	 */
	private function respondAuthorized( PreDispatchmentStateInterface $dispatchmentState, string $redirectUri ): void
	{
		$dispatchmentState->setPreventDispatchment( true );
		( new AuthorizedAction( $redirectUri ) )
			->execute();
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The client entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statement result failed.
	 */
	public function preDispatch( string $requestedUri, PreDispatchmentStateInterface $dispatchmentState ): void
	{
		$sessionHandler = new SessionHandler( $this->sessionsConfiguration );
		$authenticator  = new CommonSessionAuthenticator( $this->sessionAuthenticatorConfiguration, $sessionHandler );

		if ( true === $authenticator->isClientGranted() )
		{
			return;
		}

		if ( false === array_key_exists( static::CLIENT_ID_NAME, $_POST ) || false === array_key_exists( static::CLIENT_KEY_NAME, $_POST ) )
		{
			$this->respondUnauthorized( $dispatchmentState, $requestedUri );

			return;
		}

		$clientCredentials = new CommonClientCredentials( $_POST[ static::CLIENT_ID_NAME ], $_POST[ static::CLIENT_KEY_NAME ] );
		$registeredClients = $this->getRegisteredClients(
			$clientCredentials->getId()
		);

		if ( false === $authenticator->requestPermission( $registeredClients, $clientCredentials ) )
		{
			$this->respondUnauthorized( $dispatchmentState, $requestedUri );

			return;
		}

		$this->persistAuthorizedClientInSession(
			$sessionHandler,
			$this->sessionAuthenticatorConfiguration
				->getRegisteredClientSessionKey(),
			$registeredClients[ 0 ]
		);
		$this->respondAuthorized( $dispatchmentState, $requestedUri );
	}
}
