<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Api\Http\UriExtenders;

use CodeKandis\CheckList\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\Tiphy\Entities\UriExtenders\UriExtenderInterface;

/**
 * Represents the base class of any API URI extender.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractApiUriExtender implements UriExtenderInterface
{
	/**
	 * Stores the API URI builder the URI extensions depend on.
	 * @var ApiUriBuilderInterface
	 */
	protected ApiUriBuilderInterface $apiUriBuilder;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API URI builder the URI extensions depend on.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder )
	{
		$this->apiUriBuilder = $apiUriBuilder;
	}
}
