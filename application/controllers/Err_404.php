<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Err_404 extends MY_Controller {

	//protected $access = array('lev1','lev2','lev3');

	function __construct()
    {
        parent::__construct();      
    }

	public function index()
	{
		if ($this->session->userdata('level') == 'lev1' || $this->session->userdata('level') == 'lev2' || $this->session->userdata('level') == 'lev3') {
			$this->load->model('usermodel');
			$dataout = array(
				'title' => 'Error 404',
				'user'=> $this->usermodel->get_by_username($this->session->userdata('username'))
				);
			$this->render('layout/error_404', $dataout);
		} else {
			$this->load->model(array('menumodel','menucatmodel'));
			$this->load->library(array('form_validation','session','cart'));
			$data = array(
	    		'katmenu' => $this->menucatmodel->get_by_category(5, 0), 
	        	'cart_count' => $this->cart->total_items(), 
	        	'title' => 'Error 404',
	        	'contents' => 'frontend/err_404',
	    		);

			$this->load->view('frontend/templates', $data);
		}
		
	}
	
}