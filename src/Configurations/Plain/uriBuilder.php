<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Configurations\Plain;

use CodeKandis\CheckList\Environment\Enumerations\ApplicationStageNames;

return [
	ApplicationStageNames::API      => [
		'schema'       => 'https',
		'host'         => 'checklist.codekandis',
		'baseUri'      => '/api',
		'relativeUris' => []
	],
	ApplicationStageNames::FRONTEND => [
		'schema'       => 'https',
		'host'         => 'checklist.codekandis',
		'baseUri'      => '',
		'relativeUris' => []
	]
];
