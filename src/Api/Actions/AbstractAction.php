<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Api\Actions;

use CodeKandis\CheckList\Api\Http\UriBuilders\ApiUriBuilder;
use CodeKandis\CheckList\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\CheckList\Configurations\ConfigurationRegistry;
use CodeKandis\CheckList\Environment\Entities\ClientEntity;
use CodeKandis\CheckList\Environment\Entities\ClientEntityInterface;
use CodeKandis\CheckList\Environment\Enumerations\ApplicationStageNames;
use CodeKandis\CheckList\Environment\Persistence\Repositories\MariaDb\ClientEntityRepository;
use CodeKandis\Entities\EntityPropertyMappings\EntityDoesNotMatchClassNameException;
use CodeKandis\Entities\EntityPropertyMappings\PublicPropertyNotFoundException;
use CodeKandis\Persistence\Connector;
use CodeKandis\Persistence\ConnectorInterface;
use CodeKandis\Persistence\FetchingResultFailedException;
use CodeKandis\Persistence\SettingFetchModeFailedException;
use CodeKandis\Persistence\StatementExecutionFailedException;
use CodeKandis\Persistence\StatementPreparationFailedException;
use CodeKandis\Persistence\TransactionCommitFailedException;
use CodeKandis\Persistence\TransactionRollbackFailedException;
use CodeKandis\Persistence\TransactionStartFailedException;
use CodeKandis\Session\SessionHandler;
use CodeKandis\Tiphy\Actions\AbstractAction as OriginAbstractAction;
use ReflectionException;

/**
 * Represents the base class of any API action.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractAction extends OriginAbstractAction
{
	/**
	 * Stores the API URI builder.
	 * @var ApiUriBuilderInterface
	 */
	private ApiUriBuilderInterface $apiUriBuilder;

	/**
	 * Stores the persistence connector of the action.
	 * @var ConnectorInterface
	 */
	private ConnectorInterface $persistenceConnector;

	/**
	 * Gets the API URI builder.
	 * @return ApiUriBuilder The API URI builder.
	 */
	protected function getApiUriBuilder(): ApiUriBuilder
	{
		return $this->apiUriBuilder ??
			   $this->apiUriBuilder = new ApiUriBuilder(
				   ConfigurationRegistry
					   ::_()
					   ->getUriBuilderConfiguration()
					   ->getPreset( ApplicationStageNames::API )
			   );
	}

	/**
	 * Gets the persistence connector of the action.
	 * @return ConnectorInterface The persistence connector of the action.
	 */
	protected function getPersistenceConnector(): ConnectorInterface
	{
		return $this->persistenceConnector ??
			   $this->persistenceConnector = new Connector(
				   ConfigurationRegistry
					   ::_()
					   ->getPersistenceConfiguration()
			   );
	}

	/**
	 * Gets the current authenticated client.
	 * @return ?ClientEntityInterface The current authenticated client, if found, otherwise null.
	 * @throws ReflectionException The client entity class to reflect does not exist.
	 * @throws EntityDoesNotMatchClassNameException The client entity does not match the entity class name of the entity property mapper.
	 * @throws PublicPropertyNotFoundException A public property does not exist in the client entity class.
	 * @throws ReflectionException An error occurred during the creation of the client entity.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	protected function getAuthenticatedClient(): ?ClientEntityInterface
	{
		$registeredClientSessionKey = ConfigurationRegistry
			::_()
			->getSessionAuthenticatorConfiguration()
			->getRegisteredClientSessionKey();

		$sessionHandler = new SessionHandler(
			ConfigurationRegistry
				::_()
				->getSessionsConfiguration()
		);
		$sessionHandler->start();
		$registeredClient = $sessionHandler->get( $registeredClientSessionKey );
		$sessionHandler->writeClose();

		/**
		 * @var ClientEntity $client
		 */
		$client = ClientEntity::fromArray(
			[
				'name' => $registeredClient->getId()
			]
		);

		return ( new ClientEntityRepository(
			$this->getPersistenceConnector()
		) )
			->readClientByName( $client );
	}
}
