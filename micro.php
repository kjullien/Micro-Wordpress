<?php
/**
 * Plugin Name: Micro
 * Text Domain: micro
 * Description: Small REST micro-service framework for Wordpress
 *
 * routes will be /wp-json/$namespace/$version/$service
 */
include_once( __DIR__ . DIRECTORY_SEPARATOR . 'micro' . DIRECTORY_SEPARATOR . 'micro.php' );
new Micro;

// defaults are "micro", 1, "services"
// meaning the url will be /wp-json/micro/v1/{service-file-name}/$route
// with the services defined inside /wp-content/mu-plugins/micro/services

// you can also add more Micro instances, for example :
// new Micro('api', 2, 'scripts')
// meaning the url will be /wp-json/api/v2/{service-file-name}/$route
// with the services defined inside /wp-content/mu-plugins/micro/scripts
// etc.
