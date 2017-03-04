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

declare( strict_types = 1 );

namespace WPCFG;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 */
final class I18n {
	/**
	 * Register this class via WordPress action hooks and filters.
	 *
	 * @param Loader $loader The WPCFG loader.
	 *
	 * @return void
	 */
	public static function register( Loader $loader ) {
		$self = new self();
		$loader->add_action( 'plugins_loaded', $self, 'load_plugin_textdomain' );
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @return void
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-cloudflare-guard',
			false,
			plugin_dir_path( __FILE__ ) . 'languages/'
		);
	}
}
