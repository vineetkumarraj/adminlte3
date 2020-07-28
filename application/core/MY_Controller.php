<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @desc 	: Base Controller
 * @author 	: Vineet Kumar
 * @version : 1.0.0
 * @since 	: 28 July 2020
 */
class MY_Controller extends CI_Controller
{
	public $data = [];
	
	function __construct()
	{
		parent:: __construct();
	}
}