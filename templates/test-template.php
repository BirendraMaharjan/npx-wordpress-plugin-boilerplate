<?php
/**
 * {{The Plugin Name}}
 *
 * @package   {{the-plugin-name}}
 * @author    {{author_name}} <{{author_email}}>
 * @copyright {{author_copyright}}
 * @license   {{author_license}}
 * @link      {{author_url}}
 */

?>
<p>
	<?php
	/**
	 * Description of the file or purpose.
	 *
	 * @see \ThePluginName\App\Frontend\Templates
	 * @var $args
	 */
	echo esc_html__( 'This is being loaded inside "wp_footer" from the templates class', 'the-plugin-name-text-domain' ) . ' ' . esc_html( $args['data']['text'] );
	?>
</p>
