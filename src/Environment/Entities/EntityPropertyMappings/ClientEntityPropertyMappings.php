<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Entities\EntityPropertyMappings;

use CodeKandis\Converters\BiDirectionalConverters\BoolToIntStringBiDirectionalConverter;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapping;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMappingExistsException;

/**
 * Represents the entity property mappings of the client entity.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class ClientEntityPropertyMappings extends AbstractPersistableEntityPropertyMappings implements ClientEntityPropertyMappingsInterface
{
	/**
	 * Constructor method.
	 * @throws EntityPropertyMappingExistsException An entity property mapping with a specific property name already exists.
	 */
	public function __construct()
	{
		parent::__construct(
			new EntityPropertyMapping(
				'isActive',
				new BoolToIntStringBiDirectionalConverter()
			),
			new EntityPropertyMapping( 'name', null ),
			new EntityPropertyMapping( 'eMail', null ),
			new EntityPropertyMapping( 'key', null )
		);
	}
}
