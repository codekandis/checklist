<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Entities\EntityPropertyMappings;

use CodeKandis\CheckList\Environment\Entities\ClientEntity;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapper;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapperInterface;
use ReflectionException;

/**
 * Represents an entity property mapper builder.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class EntityPropertyMapperBuilder implements EntityPropertyMapperBuilderInterface
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The client entity class to reflect does not exist.
	 */
	public function buildClientEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper(
			ClientEntity::class,
			new ClientEntityPropertyMappings()
		);
	}
}
