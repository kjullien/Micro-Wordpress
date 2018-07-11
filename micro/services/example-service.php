<?php
return array(
  /**
   * List Agencies by Place Id
   */

  $route = '(?P<params>.+)', // regex matcher

  $method = 'GET',

  $callback = function ( $data ) {
    return $data['params'];
  }
);

