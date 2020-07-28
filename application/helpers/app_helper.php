<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Description : This function is used to print arrays or objects in human readable formate.
 * @author Vineet Kumar
 * @since 28 July 2020
 */
if(!function_exists('pre')) {
	function pre($data)
	{
		echo '<pre>'; print_r($data); echo '<pre>';
		exit(1);
	}
}

if ( ! function_exists('remove_unknown_fields')){
    function remove_unknown_fields($row_data, $expected_fields) {
        $new_data = array();
        foreach ($row_data as $field_name => $field_value) {
            if($field_value !='' && in_array($field_name, array_values($expected_fields))){
                $new_data[$field_name] = $field_value;
            }
        }
        return $new_data; 
    }
}


if ( ! function_exists('_notification')) {
    function _notification() {
        $CI =& get_instance();
        $notification = '';
        $message = '';
        if ($CI->session->flashdata('danger') !== NULL) $message = 'danger';
        else if($CI->session->flashdata('success') !== NULL) $message = 'success';

        if( $message != '' ) {
            $text = $CI->session->flashdata($message);
            $notification = <<<HTML
            <div class="alert alert-$message"> 
                $text
            </div>
HTML;
        }

        return $notification;
    }
}