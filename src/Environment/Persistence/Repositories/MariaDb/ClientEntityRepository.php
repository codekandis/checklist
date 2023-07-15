<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Persistence\Repositories\MariaDb;

use CodeKandis\CheckList\Environment\Entities\ClientEntityInterface;
use CodeKandis\CheckList\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\CheckList\Environment\Persistence\Repositories\ClientEntityRepositoryInterface;
use CodeKandis\Entities\EntityPropertyMappings\EntityDoesNotMatchClassNameException;
use CodeKandis\Entities\EntityPropertyMappings\PublicPropertyNotFoundException;
use CodeKandis\Persistence\FetchingResultFailedException;
use CodeKandis\Persistence\Repositories\AbstractRepository;
use CodeKandis\Persistence\SettingFetchModeFailedException;
use CodeKandis\Persistence\StatementExecutionFailedException;
use CodeKandis\Persistence\StatementPreparationFailedException;
use CodeKandis\Persistence\TransactionCommitFailedException;
use CodeKandis\Persistence\TransactionRollbackFailedException;
use CodeKandis\Persistence\TransactionStartFailedException;
use ReflectionException;

/**
 * Represents a MariaDB repository of the client entity.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class ClientEntityRepository extends AbstractRepository implements ClientEntityRepositoryInterface
{
	/**
	 * {@inheritDoc}
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
	 * @throws FetchingResultFailedException The fetching of the statement result failed.
	 */
	public function readClientByName( ClientEntityInterface $clientWithName ): ?ClientEntityInterface
	{
		$query = <<< END
			SELECT
			    `clients`.`_id`,
				`clients`.`id`,
				`clients`.`isActive`,
				`clients`.`name`,
				`clients`.`eMail`,
				`clients`.`key`,
				`clients`.`description`
			FROM
				`clients`
			WHERE
				`clients`.`name` = :name
			LIMIT
				0, 1;
		END;

		$clientEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildClientEntityPropertyMapper();

		$mappedClientWithName = $clientEntityPropertyMapper->mapToArray( $clientWithName );

		$arguments = [
			'name' => $mappedClientWithName[ 'name' ]
		];

		/**
		 * @var ClientEntityInterface $clientEntity
		 */
		$clientEntity = $this->persistenceConnector->queryFirst( $query, $arguments, $clientEntityPropertyMapper );

		return $clientEntity;
	}
}
