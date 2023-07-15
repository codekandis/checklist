<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Entities;

/**
 * Represents a client entity.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class ClientEntity extends AbstractPersistableEntity implements ClientEntityInterface
{
	/**
	 * Stores true if the client is active, otherwise false.
	 * @var bool
	 */
	public bool $isActive = false;

	/**
	 * Stores the name.
	 * @var string
	 */
	public string $name = '';

	/**
	 * Stores the e-mail.
	 * @var string
	 */
	public string $eMail = '';

	/**
	 * Stores the key.
	 * @var string
	 */
	public string $key = '';

	/**
	 * Stores the description.
	 * @var string
	 */
	public string $description = '';

	/**
	 * {@inheritDoc}
	 */
	public function getIsActive(): bool
	{
		return $this->isActive;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setIsActive( bool $isActive ): void
	{
		$this->isActive = $isActive;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setName( string $name ): void
	{
		$this->name = $name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getEMail(): string
	{
		return $this->eMail;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setEMail( string $eMail ): void
	{
		$this->eMail = $eMail;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getKey(): string
	{
		return $this->key;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setKey( string $key ): void
	{
		$this->key = $key;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setDescription( string $description ): void
	{
		$this->description = $description;
	}
}
