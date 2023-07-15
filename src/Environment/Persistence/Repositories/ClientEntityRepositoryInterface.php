<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Environment\Persistence\Repositories;

use CodeKandis\CheckList\Environment\Entities\ClientEntityInterface;
use CodeKandis\Persistence\Repositories\RepositoryInterface;

/**
 * Represents the interface of any repository of the client entity.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ClientEntityRepositoryInterface extends RepositoryInterface
{
	/**
	 * Reads a client by a specific name.
	 * @param ClientEntityInterface $clientWithName The client with the client's name.
	 * @return ClientEntityInterface The read client.
	 */
	public function readClientByName( ClientEntityInterface $clientWithName ): ?ClientEntityInterface;
}
