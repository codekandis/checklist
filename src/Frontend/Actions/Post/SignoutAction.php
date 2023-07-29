<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Frontend\Actions\Post;

use CodeKandis\Authentication\CommonSessionAuthenticator;
use CodeKandis\CheckList\Configurations\ConfigurationRegistry;
use CodeKandis\CheckList\Environment\Http\UriBuilders\UriBuilderBuilder;
use CodeKandis\Session\SessionHandler;
use CodeKandis\Tiphy\Actions\AbstractAction;
use CodeKandis\Tiphy\Http\Responses\RedirectResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;

/**
 * Represents the action to sign out a client.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class SignoutAction extends AbstractAction
{
	/**
	 * {@inheritDoc}
	 */
	public function execute(): void
	{
		$configurationRegistry = ConfigurationRegistry::_();

		$sessionsConfiguration = $configurationRegistry->getSessionsConfiguration();
		$sessionHandler        = new SessionHandler( $sessionsConfiguration );

		$sessionAuthenticatorConfiguration = $configurationRegistry->getSessionAuthenticatorConfiguration();
		( new CommonSessionAuthenticator( $sessionAuthenticatorConfiguration, $sessionHandler ) )
			->revokePermission();

		$uriBuilderConfiguration = $configurationRegistry->getUriBuilderConfiguration();
		$uriBuilder              = ( new UriBuilderBuilder( $uriBuilderConfiguration ) )
			->buildFrontendUriBuilder();
		$indexUri                = $uriBuilder->buildIndexUri();

		( new RedirectResponder( $indexUri, StatusCodes::FOUND ) )
			->respond();
	}
}
