<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Frontend\Actions\PreDispatchments;

use CodeKandis\Tiphy\Http\Responses\RedirectResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;

/**
 * Represents the default action if a client is authorized.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class AuthorizedAction extends AbstractAuthorizationAction
{
	/**
	 * {@inheritDoc}
	 */
	public function execute(): void
	{
		( new RedirectResponder( $this->redirectUri, StatusCodes::SEE_OTHER ) )
			->respond();
	}
}
