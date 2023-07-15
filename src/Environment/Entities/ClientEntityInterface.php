<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Entities;

/**
 * Represents the interface of any client entity.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ClientEntityInterface extends PersistableEntityInterface
{
	/**
	 * Gets whether the client is active or not.
	 * @return bool True if the client is active, otherwise false.
	 */
	public function getIsActive(): bool;

	/**
	 * Sets whether the client is active or not.
	 * @param bool $isActive True if the client is active, otherwise false.
	 */
	public function setIsActive( bool $isActive ): void;

	/**
	 * Gets the name.
	 * @return string The name.
	 */
	public function getName(): string;

	/**
	 * Sets the name.
	 * @param string $name The name.
	 */
	public function setName( string $name ): void;

	/**
	 * Gets the e-mail.
	 * @return string The e-mail.
	 */
	public function getEMail(): string;

	/**
	 * Sets the e-mail.
	 * @param string $eMail The e-mail.
	 */
	public function setEMail( string $eMail ): void;

	/**
	 * Gets the key.
	 * @return string The key.
	 */
	public function getKey(): string;

	/**
	 * Sets the key.
	 * @param string $key The key.
	 */
	public function setKey( string $key ): void;

	/**
	 * Gets the description.
	 * @return string The description.
	 */
	public function getDescription(): string;

	/**
	 * Sets the description.
	 * @param string $description The description.
	 */
	public function setDescription( string $description ): void;
}
