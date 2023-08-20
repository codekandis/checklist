<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Api\Http\UriBuilders;

use CodeKandis\CheckList\Api\Http\ApiUriNames;
use CodeKandis\Tiphy\Http\UriBuilders\AbstractUriBuilder;

/**
 * Represents an API URI builder.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class ApiUriBuilder extends AbstractUriBuilder implements ApiUriBuilderInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function buildIndexUri(): string
	{
		return $this->build( ApiUriNames::INDEX );
	}
}
