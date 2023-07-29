<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Frontend\Actions\PreDispatchments;

use CodeKandis\Tiphy\Actions\ActionInterface;

/**
 * Represents the base class of any authorization action.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractAuthorizationAction implements ActionInterface
{
	/**
	 * Stores the URI to redirect to.
	 * @var string
	 */
	protected string $redirectUri;

	/**
	 * Constructor method.
	 * @param string $redirectUri The URI to redirect to.
	 */
	public function __construct( string $redirectUri )
	{
		$this->redirectUri = $redirectUri;
	}
}
