<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Entities;

use CodeKandis\Entities\AbstractEntity as OriginAbstractEntity;
use DateTime;
use DateTimeInterface;

/**
 * Represents the base class of any entity.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractEntity extends OriginAbstractEntity implements EntityInterface
{
	/**
	 * Stores the canonical URI of the entity.
	 * @var string
	 */
	public string $canonicalUri = '';

	/**
	 * Stores the ID of the entity.
	 * @var ?string
	 */
	public ?string $id = null;

	/**
	 * Stores the timestamp of the entity creation.
	 * @var DateTimeInterface
	 */
	public DateTimeInterface $createdAt;

	/**
	 * Stores the timestamp of the latest entity update.
	 * @var ?DateTimeInterface
	 */
	public ?DateTimeInterface $updatedAt = null;

	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		$this->createdAt = new DateTime( 'now', 'utc' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function getCanonicalUri(): string
	{
		return $this->canonicalUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setCanonicalUri( string $canonicalUri ): void
	{
		$this->canonicalUri = $canonicalUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getId(): ?string
	{
		return $this->id;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setId( ?string $id ): void
	{
		$this->id = $id;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getCreatedAt(): DateTimeInterface
	{
		return $this->createdAt;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setCreatedAt( DateTimeInterface $createdAt ): void
	{
		$this->createdAt = $createdAt;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getUpdatedAt(): ?DateTimeInterface
	{
		return $this->updatedAt;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setUpdatedAt( ?DateTimeInterface $updatedAt ): void
	{
		$this->updatedAt = $updatedAt;
	}
}
