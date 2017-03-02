<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adm_login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('backi');
        back_button();
        
        $this->load->library('form_validation');
    }

    public function logged_in_check()
    {
        if ($this->session->userdata("logged_adm") === '1') {
            if ($this->session->userdata('level') == 'lev1') {
                redirect(site_url('backend'));
            } elseif ($this->session->userdata('level') == 'lev2') {
                redirect(site_url('pemesanan'));
            } elseif ($this->session->userdata('level') == 'lev3') {
                redirect(site_url('kasir'));
            } else {
                redirect(site_url('front'));
            }
        }
    }

    public function index()
    {   
        $this->logged_in_check();
        
        $data = array(
            'action' => site_url('adm_login/login'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            );
        $this->load->view('layout/login', $data);
    }

    public function login()
    { 
        $this->load->model('usermodel');
        $this->load->model('ugroupmodel', 'Ugroup');

        $this->login_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Invalid username or password.');
            $this->index();
        } else {
            $user = $this->input->post('username',TRUE);
            $pass = md5($this->input->post('password',TRUE));

            $row = $this->usermodel->login($user, $pass);
            if ($row){
                $site = $this->Ugroup->get_by_id($row->id_group)->keterangan;
                if ($site == 'Administrator') {
                    $site = "backend";
                }

                $sess_data = array(
                        'logged_adm' => TRUE,
                        'username'  => $row->username,
                        'level' => "lev".$row->id_group,
                        'site' => $site,
                        );
                $this->session->set_userdata($sess_data);

                if ($this->session->userdata('level')=='lev1') {
                    redirect(site_url('backend'));
                }elseif ($this->session->userdata('level')=='lev2') {
                    redirect(site_url('pemesanan'));
                } elseif ($this->session->userdata('level')=='lev3') {
                    redirect(site_url('kasir'));
                } else {
                    show_404();
                }
            }else{
                $this->session->set_flashdata('error', 'Invalid username or password.');
                redirect(site_url('adm_login'));
            }
        }  
    }

    function login_rules()
    {
        $this->form_validation->set_rules('username', ' ', 'trim|required');
        $this->form_validation->set_rules('password', ' ', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function logout()
    {   
        $this->session->unset_userdata('logged_adm');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('site');
        $this->session->sess_destroy();
        
        redirect(site_url('adm_login'),'refresh');
    }

};
