<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Http\UriBuilders;

use CodeKandis\CheckList\Api\Http\UriBuilders\ApiUriBuilder;
use CodeKandis\CheckList\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\CheckList\Environment\Enumerations\ApplicationStageNames;
use CodeKandis\Tiphy\Http\UriBuilders\AbstractUriBuilderBuilder;

/**
 * Represents a URI builder builder.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class UriBuilderBuilder extends AbstractUriBuilderBuilder implements UriBuilderBuilderInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function buildApiUriBuilder(): ApiUriBuilderInterface
	{
		return new ApiUriBuilder(
			$this->uriBuilderConfiguration->getPreset( ApplicationStageNames::API )
		);
	}
}
