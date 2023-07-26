<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Frontend\Actions\Get;

use CodeKandis\CheckList\Configurations\ConfigurationRegistry;
use CodeKandis\Tiphy\Actions\AbstractAction;
use CodeKandis\Tiphy\Http\Responses\HtmlTemplateResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;

/**
 * Represents the action to show the frontend's index.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class IndexAction extends AbstractAction
{
	/**
	 * {@inheritDoc}
	 */
	public function execute(): void
	{
		( new HtmlTemplateResponder(
			ConfigurationRegistry
				::_()
				->getTemplateRendererConfiguration(),
			StatusCodes::OK,
			[],
			null,
			'index.phtml'
		) )
			->respond();
	}
}
