<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('format_number'))
{
	function format_number($number, $separator = ",")
	{
		$len_left_digit = strlen($number) % 3;
		$left_digit = substr($number, 0, $len_left_digit);
		$right_digit = substr($number, $len_left_digit);
		$arr = str_split($right_digit, 3);
		if($left_digit == ''){
			return implode($arr, $separator);
		}else{
			return $left_digit . $separator . implode($arr, $separator);
		}
	}
}