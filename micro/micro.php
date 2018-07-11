<?php

/**
 * Plugin Name: Micro
 * Text Domain: micro
 * Description: Small REST micro-service framework for Wordpress
 *
 * routes will be /wp-json/$namespace/$version/$service
 */
class Micro {
  public $version;
  public $namespace;
  public $folder;

  public function __construct( $version = 1, $namespace = "micro", $folder = "services" ) {
    $this->version   = $version;
    $this->namespace = $namespace;
    $this->folder    = $folder;
    add_action( 'rest_api_init', function () {
      $this->load();
    } );
  }

  public function load() {
    $services = glob( $this->path( __DIR__, $this->folder, '*.php' ) );
    foreach ( $services as $service ) {
      $service_content = include $service;
      $service_name    = basename( $service, ".php" );
      $this->add(
        $this->namespace . "/v" . $this->version,
        '/' . $service_name . '/' . $service_content[0],
        $service_content[1],
        $service_content[2]
      );
    }
  }

  public function add( $namespace, $route, $method, $callback ) {
    register_rest_route( $namespace, $route, array(
      'methods'  => $method,
      'callback' => $callback,
    ) );
  }

  public function path( ...$folders ) {
    return join( DIRECTORY_SEPARATOR, $folders );
  }
}

