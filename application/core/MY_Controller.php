<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* MY_Controller
*/
class MY_Controller extends CI_Controller
{
	protected $access = "*";
	protected $layout = 'layout/default';

	function __construct()
	{
		parent::__construct();
				
		$this->login_check();
		date_default_timezone_set('Asia/Jakarta');
	}

	private function login_check()
	{
		if ($this->access != "*") {
			if ($this->permission_check()) {
				$this->session->set_flashdata('error', 'Permission denied!');
				redirect(site_url('adm_login'));
			}

			if ($this->session->userdata('logged_adm') === '1') {
				$this->session->set_flashdata('error', 'Permission denied!');
				redirect(site_url('adm_login'));
			}
		}
	}

	private function permission_check()
	{
		if ($this->access == "@") {
			return FALSE;
		} else {
			$access = is_array($this->access) ? $this->access : explode(",", $this->access);
		
			if (in_array($this->session->userdata('level'), array_map('trim', $access))) {
				return FALSE;
			}

			return TRUE;
		}
	}

	protected function render($file = NULL, $viewData = array(), $layoutData = array())
	{
		if (! is_null($file)) {
			$data['content'] = $this->load->view($file, $viewData, TRUE);
			$data['layout'] = $layoutData;
			$this->load->view($this->layout, $data);
		} else {
			$this->load->view($this->layout, $viewData);
		}

		$viewData = array();
	}

}