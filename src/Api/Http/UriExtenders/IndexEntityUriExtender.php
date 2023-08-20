<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Api\Http\UriExtenders;

use CodeKandis\CheckList\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\CheckList\Environment\Entities\IndexEntity;

/**
 * Represents an index API URI extender.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class IndexEntityUriExtender extends AbstractApiUriExtender
{
	/**
	 * Stores the index to extend its URIs.
	 * @var IndexEntity
	 */
	private IndexEntity $index;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API uri builder the URI extensions depend on.
	 * @param IndexEntity $index The index entities to extend its URIs.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder, IndexEntity $index )
	{
		parent::__construct( $apiUriBuilder );

		$this->index = $index;
	}

	/**
	 * {@inheritDoc}
	 */
	public function extend(): void
	{
		$this->addIndexUri();
	}

	/**
	 * Adds the URI of the index.
	 */
	private function addIndexUri(): void
	{
		$this->index->indexUri = $this->apiUriBuilder->buildIndexUri();
	}
}
