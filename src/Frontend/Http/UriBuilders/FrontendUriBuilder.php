<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Frontend\Http\UriBuilders;

use CodeKandis\CheckList\Frontend\Http\FrontendUriNames;
use CodeKandis\Tiphy\Http\UriBuilders\AbstractUriBuilder;

/**
 * Represents a frontend URI builder.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class FrontendUriBuilder extends AbstractUriBuilder implements FrontendUriBuilderInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function buildIndexUri(): string
	{
		return $this->build( FrontendUriNames::INDEX );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildSignoutUri(): string
	{
		return $this->build( FrontendUriNames::SIGNOUT );
	}
}
