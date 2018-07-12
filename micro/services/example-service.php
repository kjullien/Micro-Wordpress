<?php
return array(
  /**
   * Example Service
   */

  $route = '(?P<params>.+)', // regex matcher

  $method = 'GET',

  $callback = function ( $data ) {
    return $data['params'];
  }
);

