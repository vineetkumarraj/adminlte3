<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    protected $CI;

    public function __construct()
    {	
		$this->CI =& get_instance();
    }

    public function render($content, $data = NULL)
    {
        if ( ! $content) {

            return NULL;
            
        } else {

            $this->template['head']     = $this->CI->load->view('main/_includes/head', $data, TRUE);
            $this->template['navbar']   = $this->CI->load->view('main/_includes/navbar', $data, TRUE);
            $this->template['sidebar']  = $this->CI->load->view('main/_includes/sidebar', $data, TRUE);
            $this->template['content']  = $this->CI->load->view('main/pages/'.$content, $data, TRUE);
            $this->template['footer']   = $this->CI->load->view('main/_includes/footer', $data, TRUE);
            $this->template['foot']     = $this->CI->load->view('main/_includes/foot', $data, TRUE);

            return $this->CI->load->view('main/_layouts/template', $this->template);
        }
	}
}