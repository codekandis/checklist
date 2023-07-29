<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Frontend\Http\UriBuilders;

/**
 * Represents the interface of any frontend URI builder.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
interface FrontendUriBuilderInterface
{
	/**
	 * Builds the URI `index`.
	 * @return string The URI `index`.
	 */
	public function buildIndexUri(): string;

	/**
	 * Builds the URI `signout`.
	 * @return string The URI `signout`.
	 */
	public function buildSignoutUri(): string;
}
