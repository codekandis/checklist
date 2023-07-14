<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Entities;

use CodeKandis\Entities\EntityInterface as OriginEntityInterface;
use DateTimeInterface;

/**
 * Represents the interface of any entity.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EntityInterface extends OriginEntityInterface
{
	/**
	 * Gets the canonical URI of the entity.
	 * @return string The canonical URI of the entity.
	 */
	public function getCanonicalUri(): string;

	/**
	 * Sets the canonical URI of the entity.
	 * @param string $canonicalUri The canonical URI of the entity.
	 */
	public function setCanonicalUri( string $canonicalUri ): void;

	/**
	 * Gets the ID of the entity.
	 * @return ?string The ID of the entity.
	 */
	public function getId(): ?string;

	/**
	 * Sets the ID of the entity.
	 * @param ?string $id The ID of the entity.
	 */
	public function setId( ?string $id ): void;

	/**
	 * Gets the timestamp of the entity creation.
	 * @return DateTimeInterface The timestamp of the entity creation.
	 */
	public function getCreatedAt(): DateTimeInterface;

	/**
	 * Sets the timestamp of the entity creation.
	 * @param DateTimeInterface $createdAt The timestamp of the entity creation.
	 */
	public function setCreatedAt( DateTimeInterface $createdAt ): void;

	/**
	 * Gets the timestamp of the latest entity update.
	 * @return ?DateTimeInterface The timestamp of the latest entity update.
	 */
	public function getUpdatedAt(): ?DateTimeInterface;

	/**
	 * Sets the timestamp of the latest entity update.
	 * @param ?DateTimeInterface $updatedAt The timestamp of the latest entity update.
	 */
	public function setUpdatedAt( ?DateTimeInterface $updatedAt ): void;
}
