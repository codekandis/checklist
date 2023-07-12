<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Configurations\Plain;

use const E_ALL;

return [
	'dsn'           => '',
	'displayErrors' => true,
	'errorTypes'    => E_ALL,
	'environment'   => 'development',
	'release'       => 'dev-development',
	'serverName'    => 'checklist.codekandis'
];
