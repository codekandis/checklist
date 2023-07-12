<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Configurations\Plain;

use CodeKandis\Session\SessionOptions;

return [
	'options'  => [
		SessionOptions::COOKIE_SECURE   => 'On',
		SessionOptions::GC_MAXLIFETIME  => (string) 43200,
		SessionOptions::COOKIE_LIFETIME => (string) 43200
	],
	'savePath' => null
];
