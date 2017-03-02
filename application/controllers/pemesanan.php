<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan extends MY_Controller
{
    protected $access = array('lev2');

    function __construct()
    {
        parent::__construct();

        $this->load->helper('backi');
        back_button();
        
        $this->load->model('usermodel');
        $this->load->library(array('image_lib','form_validation'));
        $this->load->helper(array('form','text_helper','date','file','url'));
    }

    public function index()
    {
        $this->load->model(array('pemesananmodel','pdetailmodel'));
        $day = date("d-m-Y");
        $tanggal = date("Y-m-d");
        $pemesanan = $this->pemesananmodel->get_by_pemesanan($tanggal);

        $data = array(
            'pemesanan_data' => $pemesanan,
            'model' => $this->load->model(array('pemesananmodel','pdetailmodel')),
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Data Pesanan Hari Ini : '.$day,
            );
        $this->render('pemesanan/pages/eresto_pemesanan_list', $data);
    }

    public function pemesanan_updatest($st)
    {
        $this->load->model(array('pemesananmodel','pdetailmodel','mejamodel','logmodel'));
        $datetime = date("Y-m-d H:i:s");
        $status = substr($st, 0, 1);
        $no_transaksi = substr($st, 1);

        $data = array(
            'status_pemesanan' => $status
            );
        $this->pemesananmodel->update($no_transaksi, $data);

        $id_log = $this->usermodel->get_by_username($this->session->userdata('username'));
        $log_data = array(
                'no_transaksi' => $no_transaksi,
                'id_user' => $id_log->id_user,
                'time_log' => $datetime,
                'status' => '1', 
                );
        $this->logmodel->insert($log_data);

        $this->session->set_flashdata('message', 'Pemesanan telah di handle.');
        redirect(site_url('pemesanan'));
    }

    public function pemesanan_detail($id) 
    {
        $this->load->model(array('pdetailmodel','pemesananmodel'));
        $result = $this->pdetailmodel->get_by_id($id);
        if ($result) {
            $data = array(
                'dt_pesanan' => $this->pemesananmodel->get_by_id($id),
                'pdetail_data' => $result,
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'Detail Pemesanan No : '.$id,
                );
            $this->render('pemesanan/pages/eresto_pemesanan_detail_list', $data);   
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesanan'));
        }
    }

    public function meja()
    {
        $this->load->model('mejamodel');
        $meja = $this->mejamodel->get_all();

        $data = array(
            'meja_data' => $meja,
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Data Meja',
        );
        $this->render('pemesanan/pages/eresto_data_meja_list', $data);
    }

    public function meja_read($id) 
    {
        $this->load->model('mejamodel');
        $row = $this->mejamodel->get_by_id($id);
        if ($row) {
            $data = array(
                'no_meja' => $row->no_meja,
                'keterangan' => $row->keterangan,
                'status' => $row->status,
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'Data Meja',
            );
            $this->render('pemesanan/pages/eresto_data_meja_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesanan/meja'));
        }
    }

    public function menu()
    {
        $this->load->model(array('menumodel','menucatmodel'));
        $menu = $this->menumodel->get_all();

        $data = array(
            'menu_data' => $menu,
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Data Menu',
            );
        $this->render('pemesanan/pages/eresto_menu_list', $data);
    }

    public function menu_read($id) 
    {
        $this->load->model(array('menumodel','menucatmodel'));
        $row = $this->menumodel->get_by_id($id);
        if ($row) {
            $data = array(
                'id_menu' => $row->id_menu,
                'id_menu_cat' => $row->keterangan_menu_cat,
                'nama_menu' => $row->nama_menu,
                'harga' => $row->harga,
                'keterangan_menu' => $row->keterangan_menu,
                'image' => $row->image,
                'status_menu' => $row->status_menu,
                'is_favorite' => $row->is_favorite,
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'Data Menu',
                );
            $this->render('pemesanan/pages/eresto_menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesanan/menu'));
        }
    }

    public function member()
    {
        $this->load->model('membermodel');
        $member = $this->membermodel->get_all();

        $data = array(
            'member_data' => $member,
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Data Member',
            );
        $this->render('pemesanan/pages/eresto_member_list', $data);
    }

    public function member_read($id) 
    {
        $this->load->model('membermodel');
        $row = $this->membermodel->get_by_id($id);
        if ($row) {
            $data = array(
                'id_member' => $row->id_member,
                'nama_member' => $row->nama_member,
                'tgl_lahir' => $row->tgl_lahir,
                'alamat' => $row->alamat,
                'no_telpon' => $row->no_telpon,
                'email' => $row->email,
                'image' => $row->image,
                'username' => $row->username,
                'password' => $row->password,
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'Data Member',
                );
            $this->render('pemesanan/pages/eresto_member_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesanan/member'));
        }
    }


}