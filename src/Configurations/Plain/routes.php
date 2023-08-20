<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Configurations\Plain;

use CodeKandis\CheckList\Api\Actions as Api;
use CodeKandis\CheckList\Environment\Enumerations\ApplicationStageNames;
use CodeKandis\CheckList\Frontend\Actions as Frontend;
use CodeKandis\Tiphy\Http\Requests\Methods;

return [
	ApplicationStageNames::API      => [
		'baseRoute' => '/api',
		'routes'    => [
			'' => [
				Methods::GET => Api\Get\IndexAction::class
			]
		]
	],
	ApplicationStageNames::FRONTEND => [
		'baseRoute' => '',
		'routes'    => [
			'/'        => [
				Methods::GET => Frontend\Get\IndexAction::class
			],
			'/signout' => [
				Methods::POST => Frontend\Post\SignoutAction::class
			]
		]
	]
];
