<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Configurations\Plain;

use CodeKandis\CheckList\Environment\Enumerations\ApplicationStageNames;
use CodeKandis\CheckList\Frontend\Actions as Frontend;
use CodeKandis\Tiphy\Http\Requests\Methods;

return [
	ApplicationStageNames::API      => [
		'baseRoute' => '/api',
		'routes'    => []
	],
	ApplicationStageNames::FRONTEND => [
		'baseRoute' => '',
		'routes'    => [
			'/' => [
				Methods::GET => Frontend\Get\IndexAction::class
			]
		]
	]
];
