<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Configurations\Plain;

use CodeKandis\Persistence\PersistenceDrivers;

return [
	'driver'       => PersistenceDrivers::MYSQL,
	'host'         => 'localhost',
	'databaseName' => 'checklist.codekandis',
	'username'     => 'root',
	'passphrase'   => 'root',
];
