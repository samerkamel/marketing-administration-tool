<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('cmp_menu_weight'))
{
	function cmp_menu_weight($a, $b)
	{
		reset($a);
		reset($b);
		$first_key_a = key($a);
		$first_key_b = key($b);
		if($a[$first_key_a]['menu_weight'] == $b[$first_key_b]['menu_weight']){
			return 0;
		}elseif($a[$first_key_a]['menu_weight'] < $b[$first_key_b]['menu_weight']){
			return -1;
		}else{
			return 1;
		}
	}
}