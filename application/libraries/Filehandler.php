<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filehandler {

    protected $CI;

    public function __construct()
    {	
		$this->CI =& get_instance();
    }

    function verfiy_filepath($path)
    {
        if (!is_dir($path)) mkdir($path, 0777, TRUE);
        return $path;
    }

    function _upload($image) {

        $config = array(
            'allowed_types'     => 'jpg|jpeg|gif|png',
            'max_size'          => 2024,
            'max_width'         => 2000,
            'max_height'        => 2000,
            'upload_path'       => $this->verfiy_filepath('upload/'.$image)
        );

        $this->CI->load->library('upload', $config); 


        if (!$this->CI->upload->do_upload($image)) {

            $return['error'] = $this->CI->upload->display_errors();

        } else {

            $image_data = $this->CI->upload->data();

            $return['image'] = $image_data['file_name'];

            $config = array (
                'source_image'      => $image_data['full_path'],
                'new_image'         => $this->verfiy_filepath('upload/'.$image.'/thumbs'),
                'maintain_ratio'    => true,
                'width'             => 150,
                'height'            => 50
            );
            
            $this->CI->load->library('image_lib');

            $this->CI->image_lib->initialize($config);
            $this->CI->image_lib->resize();
        }

        return $return;
    }
}