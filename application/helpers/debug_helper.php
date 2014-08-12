<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// application/helpers/path_helper.php

if (!function_exists('display_var'))
{
    function display_var($array)
    {
		echo '<pre>';
		print_r($array);
		echo '</pre>';
    }
}
