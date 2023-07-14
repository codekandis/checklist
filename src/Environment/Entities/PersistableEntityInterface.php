<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Entities;

/**
 * Represents the interface of any persistable entity.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PersistableEntityInterface extends EntityInterface
{
	/**
	 * Gets the record ID of the entity.
	 * @return ?int The record ID of the entity.
	 */
	public function get_Id(): ?int;

	/**
	 * Sets the record ID of the entity.
	 * @param ?int $_id The record ID of the entity.
	 */
	public function set_Id( ?int $_id ): void;
}
