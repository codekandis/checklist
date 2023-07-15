<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Entities\EntityPropertyMappings;

use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapperInterface;

/**
 * Represents the interface of any entity property mapper builder.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EntityPropertyMapperBuilderInterface
{
	/**
	 * Builds the entity property mapper of the client entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the client entity.
	 */
	public function buildClientEntityPropertyMapper(): EntityPropertyMapperInterface;
}
