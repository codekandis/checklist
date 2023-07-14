<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Http\UriBuilders;

use CodeKandis\CheckList\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\CheckList\Frontend\Http\UriBuilders\FrontendUriBuilderInterface;

/**
 * Represents the interface of any URI builder builder.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
interface UriBuilderBuilderInterface
{
	/**
	 * Builds an API URI builder.
	 * @return ApiUriBuilderInterface The API URI builder.
	 */
	public function buildApiUriBuilder(): ApiUriBuilderInterface;

	/**
	 * Builds a frontend URI builder.
	 * @return FrontendUriBuilderInterface The frontend URI builder.
	 */
	public function buildFrontendUriBuilder(): FrontendUriBuilderInterface;
}
