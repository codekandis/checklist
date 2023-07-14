<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Configurations\Plain;

use CodeKandis\CheckList\Environment\Enumerations\ApplicationStageNames;

return [
	ApplicationStageNames::API      => [
		'baseRoute' => '/api',
		'routes'    => []
	],
	ApplicationStageNames::FRONTEND => [
		'baseRoute' => '',
		'routes'    => []
	]
];
