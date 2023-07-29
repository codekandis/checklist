<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Frontend\Actions\PreDispatchments;

use CodeKandis\CheckList\Configurations\ConfigurationRegistry;
use CodeKandis\Tiphy\Http\Responses\HtmlTemplateResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use CodeKandis\Tiphy\Http\Responses\StatusMessages;
use CodeKandis\Tiphy\Throwables\ErrorInformation;

/**
 * Represents the default action if a client is unauthorized.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class UnauthorizedAction extends AbstractAuthorizationAction
{
	/**
	 * {@inheritDoc}
	 */
	public function execute(): void
	{
		$errorInformation = new ErrorInformation( StatusCodes::UNAUTHORIZED, StatusMessages::UNAUTHORIZED );

		( new HtmlTemplateResponder(
			ConfigurationRegistry
				::_()
				->getTemplateRendererConfiguration(),
			StatusCodes::UNAUTHORIZED,
			[
				'requestUri' => $this->redirectUri
			],
			$errorInformation,
			'signinForm.phtml'
		) )
			->respond();
	}
}
