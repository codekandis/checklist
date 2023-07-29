<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Configurations\Plain;

use CodeKandis\CheckList\Environment\Enumerations\ApplicationStageNames;
use CodeKandis\CheckList\Frontend\Http\FrontendUriNames;

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
		'relativeUris' => [
			FrontendUriNames::INDEX   => '/',
			FrontendUriNames::SIGNOUT => '/signout'
		]
	]
];
