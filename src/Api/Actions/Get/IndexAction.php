<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Api\Actions\Get;

use CodeKandis\CheckList\Api\Actions\AbstractAction;
use CodeKandis\CheckList\Api\Http\UriExtenders\IndexEntityUriExtender;
use CodeKandis\CheckList\Environment\Entities\IndexEntity;
use CodeKandis\CheckList\Environment\Entities\IndexEntityInterface;
use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use JsonException;

/**
 * Represents the action to retrieve the API index.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class IndexAction extends AbstractAction
{
	/**
	 * {@inheritDoc}
	 * @throws JsonException An error occurred during the creation of the JSON response.
	 */
	public function execute(): void
	{
		$index = new IndexEntity();
		$this->extendUris( $index );

		( new JsonResponder(
			StatusCodes::OK,
			[
				'index' => $index,
			]
		) )
			->respond();
	}

	/**
	 * Extends the URIs of an index.
	 * @param IndexEntityInterface $index The index to extend its URIs.
	 */
	private function extendUris( IndexEntityInterface $index ): void
	{
		( new IndexEntityUriExtender(
			$this->getApiUriBuilder(),
			$index
		) )
			->extend();
	}
}
