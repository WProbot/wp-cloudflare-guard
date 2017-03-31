<?php
/**
 * WP CloudFlare Guard
 *
 * Connecting WordPress with Cloudflare firewall,
 * protect your WordPress site at DNS level.
 * Automatically create firewall rules to block dangerous IPs.
 *
 * @package   WPCFG
 * @author    Typist Tech <wp-cloudflare-guard@typist.tech>
 * @copyright 2017 Typist Tech
 * @license   GPL-2.0+
 * @see       https://www.typist.tech/projects/wp-cloudflare-guard
 * @see       https://wordpress.org/plugins/wp-cloudflare-guard/
 */

declare(strict_types=1);

namespace WPCFG;

use WPCFG\Ads\I18nPromoter;
use WPCFG\BadLogin\Admin as BadLoginAdmin;
use WPCFG\BadLogin\BadLogin;
use WPCFG\Blacklist\Handler;
use WPCFG\Cloudflare\Admin as CloudflareAdmin;

/**
 * Final class WPCFG
 *
 * The core plugin class.
 */
final class WPCFG
{
    /**
     * The dependency injection container.
     *
     * @var Container
     */
    private $container;

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @var Loader $loader Maintains and registers all hooks for the plugin.
     */
    private $loader;

    /**
     * WPCFG constructor.
     */
    public function __construct()
    {
        $this->container = new Container;
        $this->loader    = new Loader($this->container);

        $this->container->initialize();
        $this->loader->load(
            Admin::class,
            BadLogin::class,
            BadLoginAdmin::class,
            Handler::class,
            CloudflareAdmin::class,
            I18n::class,
            I18nPromoter::class
        );
    }

    /**
     * Container getter.
     *
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @return  void
     */
    public function run()
    {
        $this->loader->run();
    }
}