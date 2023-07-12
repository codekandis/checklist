<?php declare( strict_types = 1 );
namespace CodeKandis\CheckList\Configurations;

use CodeKandis\Configurations\PlainConfigurationLoader;
use CodeKandis\Tiphy\Configurations\AbstractConfigurationRegistry;
use CodeKandis\Tiphy\Configurations\RoutesConfiguration;
use CodeKandis\Tiphy\Configurations\TemplateRendererConfiguration;
use CodeKandis\Tiphy\Configurations\UriBuilderConfiguration;
use CodeKandis\Tiphy\Configurations\UriBuilderConfigurationInterface;
use CodeKandis\TiphyAuthenticationIntegration\Configurations\SessionAuthenticatorConfiguration;
use CodeKandis\TiphyAuthenticationIntegration\Configurations\SessionAuthenticatorConfigurationRegistryTrait;
use CodeKandis\TiphyPersistenceIntegration\Configurations\ConfigurationRegistryTrait as PersistenceConfigurationRegistryTrait;
use CodeKandis\TiphyPersistenceIntegration\Configurations\PersistenceConfiguration;
use CodeKandis\TiphySentryClientIntegration\Configurations\ConfigurationRegistryTrait as SentryClientConfigurationRegistryTrait;
use CodeKandis\TiphySentryClientIntegration\Configurations\SentryClientConfiguration;
use CodeKandis\TiphySessionIntegration\Configurations\ConfigurationRegistryTrait as SessionsConfigurationRegistryTrait;
use CodeKandis\TiphySessionIntegration\Configurations\SessionsConfiguration;
use function dirname;

/**
 * Represents a frontend configuration registry.
 * @package codekandis/checklist
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConfigurationRegistry extends AbstractConfigurationRegistry implements ConfigurationRegistryInterface
{
	use PersistenceConfigurationRegistryTrait;
	use SentryClientConfigurationRegistryTrait;
	use SessionAuthenticatorConfigurationRegistryTrait;
	use SessionsConfigurationRegistryTrait;

	/**
	 * Stores the API URI builder configuration.
	 * @var ?UriBuilderConfigurationInterface
	 */
	private UriBuilderConfigurationInterface $apiUriBuilderConfiguration;

	/**
	 * Creates the singleton instance of the frontend configuration registry.
	 * @return ConfigurationRegistryInterface The singleton instance of the frontend configuration registry.
	 */
	public static function _(): ConfigurationRegistryInterface
	{
		return parent::_();
	}

	/**
	 * {@inheritDoc}
	 */
	protected function initialize(): void
	{
		$this->persistenceConfiguration          = new PersistenceConfiguration(
			( new PlainConfigurationLoader() )
				->load( __DIR__ . '/Plain', 'persistence' )
				->load( dirname( __DIR__, 2 ) . '/config', 'persistence' )
				->getPlainConfiguration()
		);
		$this->routesConfiguration               = new RoutesConfiguration(
			( new PlainConfigurationLoader() )
				->load( __DIR__ . '/Plain', 'routes' )
				->load( dirname( __DIR__, 2 ) . '/config', 'routes' )
				->getPlainConfiguration()
		);
		$this->sentryClientConfiguration         = new SentryClientConfiguration(
			( new PlainConfigurationLoader() )
				->load( __DIR__ . '/Plain', 'sentryClient' )
				->load( dirname( __DIR__, 2 ) . '/config', 'sentryClient' )
				->getPlainConfiguration()
		);
		$this->sessionAuthenticatorConfiguration = new SessionAuthenticatorConfiguration(
			( new PlainConfigurationLoader() )
				->load( __DIR__ . '/Plain', 'sessionAuthenticator' )
				->load( dirname( __DIR__, 2 ) . '/config', 'sessionAuthenticator' )
				->getPlainConfiguration()
		);
		$this->sessionsConfiguration             = new SessionsConfiguration(
			( new PlainConfigurationLoader() )
				->load( __DIR__ . '/Plain', 'sessions' )
				->load( dirname( __DIR__, 2 ) . '/config', 'sessions' )
				->getPlainConfiguration()
		);
		$this->templateRendererConfiguration     = new TemplateRendererConfiguration(
			( new PlainConfigurationLoader() )
				->load( __DIR__ . '/Plain', 'templateRenderer' )
				->load( dirname( __DIR__, 2 ) . '/config', 'templateRenderer' )
				->getPlainConfiguration()
		);
		$this->uriBuilderConfiguration           = new UriBuilderConfiguration(
			( new PlainConfigurationLoader() )
				->load( __DIR__ . '/Plain', 'uriBuilder' )
				->load( dirname( __DIR__, 2 ) . '/config', 'uriBuilder' )
				->getPlainConfiguration()
		);
	}
}
