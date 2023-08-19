<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Entities;

/**
 * Represents the interface of any API's index.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
interface IndexEntityInterface
{
	/**
	 * Gets the URI of the index.
	 * @return string The URI of the index.
	 */
	public function getIndexUri(): string;

	/**
	 * Gets the URI of the index.
	 * @param string $indexUri The URI of the index.
	 */
	public function setIndexUri( string $indexUri ): void;
}
