<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Api\Http\UriBuilders;

/**
 * Represents the interface of any API URI builder.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ApiUriBuilderInterface
{
	/**
	 * Builds the URI of the index.
	 * @return string The URI of the index.
	 */
	public function buildIndexUri(): string;
}
