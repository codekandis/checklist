<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Entities;

/**
 * Represents the base class of any entity.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractPersistableEntity extends AbstractEntity implements PersistableEntityInterface
{
	/**
	 * Stores the record ID of the entity.
	 * @var ?int
	 */
	public ?int $_id = null;

	/**
	 * {@inheritDoc}
	 */
	public function get_Id(): ?int
	{
		return $this->_id;
	}

	/**
	 * {@inheritDoc}
	 */
	public function set_Id( ?int $_id ): void
	{
		$this->_id = $_id;
	}

	/**
	 * {@inheritDoc}
	 */
	public function jsonSerialize(): array
	{
		$serializedJson = parent::jsonSerialize();
		unset( $serializedJson[ '_id' ] );

		return $serializedJson;
	}
}
