<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Entities;

/**
 * Represents the API's index.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class IndexEntity implements IndexEntityInterface
{
	/**Stores the URI of the index.
	 * @var string
	 */
	public string $indexUri = '';

	/**
	 * {@inheritDoc}
	 */
	public function getIndexUri(): string
	{
		return $this->indexUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setIndexUri( string $indexUri ): void
	{
		$this->indexUri = $indexUri;
	}
}
