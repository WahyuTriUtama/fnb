<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Backend extends MY_Controller
{
    protected $access = array('lev1');

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
        $this->load->model(array('pemesananmodel','membermodel','mejamodel','menumodel'));
        $tanggal = date("Y-m-d");
    	$data = array(
            'menu' => $this->menumodel->total_rows(),
            'table' => $this->mejamodel->total_rows_unavailable(),
            'orders' => $this->pemesananmodel->total_rows_today($tanggal),
            'member' => $this->membermodel->total_rows(),
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Welcome to E-resto Administration',
        );
        $this->render('backend/home', $data);
	}

    public function ugroup()
    {
        $this->load->model('ugroupmodel');

        $ugroup = $this->ugroupmodel->get_all();

        $data = array(
            'ugroup_data' => $ugroup,
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'User Group',
        );
        $this->render('backend/pages/eresto_user_group_list', $data);
    }

    public function ugroup_read($id) 
    {
        $this->load->model('ugroupmodel');
        $row = $this->ugroupmodel->get_by_id($id);
        if ($row) {
            $data = array(
                'id_group' => $row->id_group,
                'keterangan' => $row->keterangan,
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'User Group',
            );
            $this->render('backend/pages/eresto_user_group_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/ugroup'));
        }
    }
    
    public function ugroup_create() 
    {
        $this->load->model('ugroupmodel');
        $data = array(
            'button' => 'Create',
            'action' => site_url('backend/ugroup_craction'),
            'id_group' => set_value('id_group'),
            'keterangan' => set_value('keterangan'),
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'User Group',
        );
        $this->render('backend/pages/eresto_user_group_form', $data);
    }
    
    public function ugroup_craction() 
    {
        $this->load->model('ugroupmodel');
        $this->ugroup_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->ugroup_create();
        } else {
            $data = array(
                'keterangan' => $this->input->post('keterangan',TRUE),
                );

            $this->ugroupmodel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('backend/ugroup'));
        }
    }
    
    public function ugroup_update($id) 
    {
        $this->load->model('ugroupmodel');
        $row = $this->ugroupmodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('backend/ugroup_upaction'),
                'id_group' => set_value('id_group', $row->id_group),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'User Group',
            );
            $this->render('backend/pages/eresto_user_group_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/ugroup'));
        }
    }
    
    public function ugroup_upaction() 
    {
        $this->load->model('ugroupmodel');
        $this->ugroup_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->ugroup_update($this->input->post('id_group', TRUE));
        } else {
            $data = array(
            'keterangan' => $this->input->post('keterangan',TRUE),
            );

            $this->ugroupmodel->update($this->input->post('id_group', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('backend/ugroup'));
        }
    }
    
    public function ugroup_delete($id) 
    {
        $this->load->model('ugroupmodel');
        $row = $this->ugroupmodel->get_by_id($id);

        if ($row) {
            $this->ugroupmodel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('backend/ugroup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/ugroup'));
        }
    }

    public function ugroup_rules() 
    {
        $this->form_validation->set_rules('keterangan', ' ', 'trim|required');

        $this->form_validation->set_rules('id_group', 'id_group', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function user()
    {
        $this->load->model('usermodel');
        $user = $this->usermodel->get_all();

        $data = array(
            'user_data' => $user,
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'User Manajemen',
        );
        $this->render('backend/pages/eresto_user_list', $data);
    }

    public function user_read($id) 
    {
        $this->load->model('usermodel');
        $row = $this->usermodel->get_by_id($id);
        if ($row) {
            $data = array(
                'id_user' => $row->id_user,
                'id_group' => $row->keterangan,
                'nama_user' => $row->nama_user,
                'image' => $row->image,
                'username' => $row->username,
                'password' => $row->password,
                'user_status' => $row->user_status,
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'User Manajemen',
                );
            $this->render('backend/pages/eresto_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/user'));
        }
    }
    
    public function user_create() 
    {
        $this->load->model(array('usermodel','ugroupmodel'));
        $data = array(
            'button' => 'Create',
            'action' => site_url('backend/user_craction'),
            'id_user' => set_value('id_user'),
            'id_group' => set_value('id_group'),
            'nama_user' => set_value('nama_user'),
            'image' => set_value('image'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'user_status' => set_value('user_status'),
            'tb_ugroup' => $this->ugroupmodel->get_all(),
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'User Manajemen',
        );
        $this->render('backend/pages/eresto_user_form', $data);
    }
    
    public function user_craction() 
    {
        $this->load->model('usermodel');
        $this->load->library('upload');
        $this->user_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->user_create();
        } else {
            $row = $this->usermodel->get_by_username($this->input->post('username',TRUE));
            if (!$row) {
                $image_up = $_FILES['image']['name'];
                $image_name = trim(basename(stripslashes($image_up)), ".\x00..\x20");
                $image_name = substr(uniqid(),-5).'-'.$image_name;
                //all the characters has to be lowercase
                $image_name = strtolower($image_name);
                $config = array(
                    'upload_path'     =>  './uploads/users/',
                    'allowed_types'   =>  'gif|jpg|jpeg|png',
                    'max_size'        =>  '512',
                    'file_name'       =>  $image_name,
                    );
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image')){
                    $image = 'default.jpg';
                } else {
                    $imageDetailArray = $this->upload->data();
                    $image =  $imageDetailArray['file_name'];
                }
                $data = array(
                    'id_user' => substr(uniqid(), -2),
                    'id_group' => $this->input->post('id_group',TRUE),
                    'nama_user' => $this->input->post('nama_user',TRUE),
                    'image'     => $image,
                    'username' => $this->input->post('username',TRUE),
                    'password' => md5($this->input->post('password',TRUE)),
                    'user_status' => $this->input->post('user_status',TRUE),
                    );

                $this->usermodel->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('backend/user'));
            }else{
                $this->session->set_flashdata('message', 'Username axist!');
                $this->user_create();
            }
        }
    }
    
    public function user_update($id) 
    {
        $this->load->model(array('usermodel','ugroupmodel'));
        $row = $this->usermodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('backend/user_upaction'),
                'id_user' => set_value('id_user', $row->id_user),
                'id_group' => set_value('id_group', $row->id_group),
                'nama_user' => set_value('nama_user', $row->nama_user),
                'image' => set_value('image', $row->image),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'user_status' => set_value('user_status', $row->user_status),
                'tb_ugroup' => $this->ugroupmodel->get_all(),
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'User Manajemen',
            );
            $this->render('backend/pages/eresto_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/user'));
        }
    }
    
    public function user_upaction() 
    {
        $this->load->model('usermodel');
        $this->load->library('upload');
        $this->user_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->user_update($this->input->post('id_user', TRUE));
        } else {
            $row = $this->usermodel->get_by_username($this->input->post('username',TRUE));
            if ($row) {
                $image_up = $_FILES['image']['name'];
                $image_name = trim(basename(stripslashes($image_up)), ".\x00..\x20");
                $image_name = substr(uniqid(),-5).'-'.$image_name;
                //all the characters has to be lowercase
                $image_name = strtolower($image_name);
                $config = array(
                    'upload_path'     =>  './uploads/users/',
                    'allowed_types'   =>  'gif|jpg|jpeg|png',
                    'max_size'        =>  '512',
                    'file_name'       =>  $image_name,
                    );
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image')){
                    $image = $row->image;
                } else {
                    $imageDetailArray = $this->upload->data();
                    $image =  $imageDetailArray['file_name'];
                }
                $data = array(
                    'id_group' => $this->input->post('id_group',TRUE),
                    'nama_user' => $this->input->post('nama_user',TRUE),
                    'image' => $image,
                    'username' => $this->input->post('username',TRUE),
                    'password' => md5($this->input->post('password',TRUE)),
                    'user_status' => $this->input->post('user_status',TRUE),
                    );

                if ($image != $row->image) {
                    $img_path = './uploads/users/'.$row->image;
                    if ($row->image !== 'default.jpg' && file_exists($img_path)) {
                        unlink($img_path);
                        unlink($row->image);
                    }
                }
                $this->usermodel->update($this->input->post('id_user', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('backend/user'));
            }else{
                $this->session->set_flashdata('message', 'Username belum terdaftar!');
                redirect(site_url('backend/user'));
            }
        }
    }
    
    public function user_delete($id) 
    {
        $this->load->model('usermodel');
        $this->load->library('upload');
        $row = $this->usermodel->get_by_id($id);

        if ($row) {
            $img_path = './uploads/users/'.$row->image;
            if ($row->image !== 'default.jpg' && file_exists($img_path)) {
                unlink($img_path);
                unlink($row->image);
            }
            $this->usermodel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('backend/user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/user'));
        }
    }

    public function user_rules() 
    {
        $this->form_validation->set_rules('id_group', ' ', 'trim|required');
        $this->form_validation->set_rules('nama_user', ' ', 'trim|required');
        $this->form_validation->set_rules('image', ' ', '');
        $this->form_validation->set_rules('username', ' ', 'trim|required');
        $this->form_validation->set_rules('password', ' ', 'trim|required');
        $this->form_validation->set_rules('user_status', ' ', 'trim|required');

        $this->form_validation->set_rules('id_user', 'id_user', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function menucat()
    {
        $this->load->model('menucatmodel');
        $menucat = $this->menucatmodel->get_all();

        $data = array(
            'menucat_data' => $menucat,
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Menu Categori',
            );
        $this->render('backend/pages/eresto_menu_cat_list', $data);
    }

    public function menucat_read($id) 
    {
        $this->load->model('menucatmodel');
        $row = $this->menucatmodel->get_by_id($id);
        if ($row) {
            $data = array(
                'id_menu_cat' => $row->id_menu_cat,
                'keterangan_menu_cat' => $row->keterangan_menu_cat,
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'Menu Categori',
                );
            $this->render('backend/pages/eresto_menu_cat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/menucat'));
        }
    }
    
    public function menucat_create() 
    {
        $this->load->model('menucatmodel');
        $data = array(
            'button' => 'Create',
            'action' => site_url('backend/menucat_craction'),
            'id_menu_cat' => set_value('id_menu_cat'),
            'keterangan_menu_cat' => set_value('keterangan_menu_cat'),
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Menu Categori',
            );
        $this->render('backend/pages/eresto_menu_cat_form', $data);
    }
    
    public function menucat_craction() 
    {
        $this->load->model('menucatmodel');
        $this->menucat_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->menucat_create();
        } else {
            $data = array(
                'keterangan_menu_cat' => $this->input->post('keterangan_menu_cat',TRUE),
                );

            $this->menucatmodel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('backend/menucat'));
        }
    }
    
    public function menucat_update($id) 
    {
        $this->load->model('menucatmodel');
        $row = $this->menucatmodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('backend/menucat_upaction'),
                'id_menu_cat' => set_value('id_menu_cat', $row->id_menu_cat),
                'keterangan_menu_cat' => set_value('keterangan_menu_cat', $row->keterangan_menu_cat),
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'Menu Categori',
                );
            $this->render('backend/pages/eresto_menu_cat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/menucat'));
        }
    }
    
    public function menucat_upaction() 
    {
        $this->load->model('menucatmodel');
        $this->menucat_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->menucat_update($this->input->post('id_menu_cat', TRUE));
        } else {
            $data = array(
                'keterangan_menu_cat' => $this->input->post('keterangan_menu_cat',TRUE),
                );

            $this->menucatmodel->update($this->input->post('id_menu_cat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('backend/menucat'));
        }
    }
    
    public function menucat_delete($id) 
    {
        $this->load->model('menucatmodel');
        $row = $this->menucatmodel->get_by_id($id);

        if ($row) {
            $this->menucatmodel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('backend/menucat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/menucat'));
        }
    }

    public function menucat_rules() 
    {
        $this->form_validation->set_rules('keterangan_menu_cat', ' ', 'trim|required');

        $this->form_validation->set_rules('id_menu_cat', 'id_menu_cat', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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
        $this->render('backend/pages/eresto_menu_list', $data);
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
            $this->render('backend/pages/eresto_menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/menu'));
        }
    }
    
    public function menu_create() 
    {
        $this->load->model(array('menumodel','menucatmodel'));
        $data = array(
            'button' => 'Create',
            'action' => site_url('backend/menu_craction'),
            'id_menu' => set_value('id_menu'),
            'id_menu_cat' => set_value('id_menu_cat'),
            'nama_menu' => set_value('nama_menu'),
            'harga' => set_value('harga'),
            'keterangan_menu' => set_value('keterangan_menu'),
            'image' => set_value('image'),
            'status_menu' => set_value('status_menu'),
            'is_favorite' => set_value('is_favorite'),
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'tb_menucat' => $this->menucatmodel->get_all(),
            'title' => 'Data Menu',
            );
        $this->render('backend/pages/eresto_menu_form', $data);
    }
    
    public function menu_craction() 
    {
        $this->load->model(array('menumodel','menucatmodel'));
        $this->load->library('upload');
        $this->menu_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->menu_create();
        } else {
            $image_up = $_FILES['image']['name'];
            $image_name = trim(basename(stripslashes($image_up)), ".\x00..\x20");
            $image_name = substr(uniqid(),-5).'-'.$image_name;
            //all the characters has to be lowercase
            $image_name = strtolower($image_name);
            $config = array(
                'upload_path'     =>  './uploads/menu/',
                'allowed_types'   =>  'gif|jpg|jpeg|png',
                'max_size'        =>  '512',
                'file_name'       =>  $image_name,
                );
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')){
                $image = 'default.jpg';
            } else {
                $imageDetailArray = $this->upload->data();
                $image =  $imageDetailArray['file_name'];
            }

            $a = $this->input->post('nama_menu',TRUE);
            $a = str_replace(array(' '), '_', $a);
            $a = str_replace(array('&','\/','@','$','#','^','(',')','-','+',';','[',']','{','}','|','%','!','`','~','*','?','<','>',':'), '', $a);
            $a = str_replace(array('__','___','____','_____'), '_', $a);

            $data = array(
                'id_menu_cat' => $this->input->post('id_menu_cat',TRUE),
                'nama_menu' => $this->input->post('nama_menu',TRUE),
                'uri_dashed' => $a,
                'harga' => $this->input->post('harga',TRUE),
                'keterangan_menu' => $this->input->post('keterangan_menu',TRUE),
                'image' => $image,
                'status_menu' => $this->input->post('status_menu',TRUE),
                'is_favorite' => $this->input->post('is_favorite',TRUE),
                );

            $this->menumodel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('backend/menu'));
        }
    }
    
    public function menu_update($id) 
    {
        $this->load->model(array('menumodel','menucatmodel'));
        $row = $this->menumodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('backend/menu_upaction'),
                'id_menu' => set_value('id_menu', $row->id_menu),
                'id_menu_cat' => set_value('id_menu_cat', $row->id_menu_cat),
                'nama_menu' => set_value('nama_menu', $row->nama_menu),
                'harga' => set_value('harga', $row->harga),
                'keterangan_menu' => set_value('keterangan_menu', $row->keterangan_menu),
                'image' => set_value('image', $row->image),
                'status_menu' => set_value('status_menu', $row->status_menu),
                'is_favorite' => set_value('is_favorite', $row->is_favorite),
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'tb_menucat' => $this->menucatmodel->get_all(),
                'title' => 'Data Menu',
                );
            $this->render('backend/pages/eresto_menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/menu'));
        }
    }
    
    public function menu_upaction() 
    {
        $this->load->model(array('menumodel','menucatmodel'));
        $this->load->library('upload');
        $this->menu_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->menu_update($this->input->post('id_menu', TRUE));
        } else {
            $row = $this->menumodel->get_by_id($this->input->post('id_menu', TRUE));
            $image_up = $_FILES['image']['name'];
            $image_name = trim(basename(stripslashes($image_up)), ".\x00..\x20");
            $image_name = substr(uniqid(),-5).'-'.$image_name;
            //all the characters has to be lowercase
            $image_name = strtolower($image_name);
            $config = array(
                'upload_path'     =>  './uploads/menu/',
                'allowed_types'   =>  'gif|jpg|jpeg|png',
                'max_size'        =>  '512',
                'file_name'       =>  $image_name,
                );
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')){
                $image = $row->image;
            } else {
                $imageDetailArray = $this->upload->data();
                $image =  $imageDetailArray['file_name'];
            }

            $a = $this->input->post('nama_menu',TRUE);
            $a = str_replace(array(' '), '_', $a);
            $a = str_replace(array('&','\/','@','$','#','^','(',')','-','+',';','[',']','{','}','|','%','!','`','~','*','?','<','>',':','"',''), '', $a);
            $a = str_replace(array('__','___','____','_____'), '_', $a);

            $data = array(
                'id_menu_cat' => $this->input->post('id_menu_cat',TRUE),
                'nama_menu' => $this->input->post('nama_menu',TRUE),
                'uri_dashed' => $a,
                'harga' => $this->input->post('harga',TRUE),
                'keterangan_menu' => $this->input->post('keterangan_menu',TRUE),
                'image' => $image,
                'status_menu' => $this->input->post('status_menu',TRUE),
                'is_favorite' => $this->input->post('is_favorite',TRUE),
                );

            if ($image != $row->image) {
                $img_path = './uploads/menu/'.$row->image;
                if ($row->image !== 'default.jpg' && file_exists($img_path)) {
                    unlink($img_path);
                    unlink($row->image);
                }
            }

            $this->menumodel->update($this->input->post('id_menu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('backend/menu'));
        }
    }
    
    public function menu_delete($id) 
    {
        $this->load->model(array('menumodel','menucatmodel'));
        $this->load->library('upload');
        $row = $this->menumodel->get_by_id($id);

        if ($row) {
            $img_path = './uploads/menu/'.$row->image;
            if ($row->image !== 'default.jpg' && file_exists($img_path)) {
                unlink($img_path);
                unlink($row->image);
            }
            $this->menumodel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('backend/menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/menu'));
        }
    }

    public function menu_rules() 
    {
        $this->form_validation->set_rules('id_menu_cat', ' ', 'trim|required');
        $this->form_validation->set_rules('nama_menu', ' ', 'trim|required');
        $this->form_validation->set_rules('harga', ' ', 'trim|required|numeric');
        $this->form_validation->set_rules('keterangan_menu', ' ', 'trim');
        $this->form_validation->set_rules('image', ' ', '');
        $this->form_validation->set_rules('status_menu', ' ', 'trim|required');
        $this->form_validation->set_rules('is_favorite', ' ', 'trim|required');

        $this->form_validation->set_rules('id_menu', 'id_menu', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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
        $this->render('backend/pages/fnb_meja_list', $data);
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
            $this->render('backend/pages/eresto_data_meja_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/meja'));
        }
    }
    
    public function meja_create() 
    {
        $this->load->model('mejamodel');
        $data = array(
            'button' => 'Create',
            'action' => site_url('backend/meja_craction'),
            'no_meja' => set_value('no_meja'),
            'keterangan' => set_value('keterangan'),
            'status' => set_value('status'),
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Data Meja',
        );
        $this->render('backend/pages/eresto_data_meja_form', $data);
    }
    
    public function meja_craction() 
    {
        $this->load->model('mejamodel');
        $this->meja_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->meja_create();
        } else {
            $data = array(
                'no_meja' => $this->input->post('no_meja',TRUE),
                'keterangan' => $this->input->post('keterangan',TRUE),
                'status' => $this->input->post('status',TRUE),
                );

            $this->mejamodel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('backend/meja'));
        }
    }
    
    public function meja_update() 
    {
        $this->load->model('mejamodel');
        $id = $this->input->get('id');
        $row = $this->mejamodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('backend/meja_upaction'),
                'no_meja' => set_value('no_meja', $row->no_meja),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'status' => set_value('status', $row->status),
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'Data Meja',
            );
            $this->render('backend/pages/eresto_data_meja_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/meja'));
        }
    }
    
    public function meja_upaction() 
    {
        $this->load->model('mejamodel');
        $this->meja_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->meja_update($this->input->post('no_meja', TRUE));
        } else {
            $data = array(
                'keterangan' => $this->input->post('keterangan',TRUE),
                'status' => $this->input->post('status',TRUE),
                );

            $this->mejamodel->update($this->input->post('no_meja', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('backend/meja'));
        }
    }
    
    public function meja_delete() 
    {
        $this->load->model('mejamodel');
        $id = $this->input->get('id');
        $row = $this->mejamodel->get_by_id($id);

        if ($row) {
            $this->mejamodel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('backend/meja'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/meja'));
        }
    }

    public function meja_rules() 
    {
        $this->form_validation->set_rules('keterangan', ' ', 'trim|required');
        $this->form_validation->set_rules('status', ' ', 'trim|required');

        $this->form_validation->set_rules('no_meja', 'no_meja', 'trim|required|numeric');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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
        $this->render('backend/pages/eresto_member_list', $data);
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
            $this->render('backend/pages/eresto_member_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/member'));
        }
    }
    
    public function member_create() 
    {
        $this->load->model('membermodel');
        $data = array(
            'button' => 'Create',
            'action' => site_url('backend/member_craction'),
            'id_member' => set_value('id_member'),
            'nama_member' => set_value('nama_member'),
            'tgl_lahir' => set_value('tgl_lahir'),
            'alamat' => set_value('alamat'),
            'no_telpon' => set_value('no_telpon'),
            'email' => set_value('email'),
            'image' => set_value('image'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Data Member',
            );
        $this->render('backend/pages/eresto_member_form', $data);
    }
    
    public function member_craction() 
    {
        $this->load->model('membermodel');
        $this->load->library('upload');
        $this->member_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->member_create();
        } else {
            $image_up = $_FILES['image']['name'];
            $image_name = trim(basename(stripslashes($image_up)), ".\x00..\x20");
            $image_name = substr(uniqid(),-5).'-'.$image_name;
            //all the characters has to be lowercase
            $image_name = strtolower($image_name);
            $config = array(
                'upload_path'     =>  './uploads/members/',
                'allowed_types'   =>  'gif|jpg|jpeg|png',
                'max_size'        =>  '512',
                'file_name'       =>  $image_name,
                );
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')){
                $image = 'default.jpg';
            } else {
                $imageDetailArray = $this->upload->data();
                $image =  $imageDetailArray['file_name'];
            }

            $data = array(
                'nama_member' => $this->input->post('nama_member',TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'no_telpon' => $this->input->post('no_telpon',TRUE),
                'email' => $this->input->post('email',TRUE),
                'image' => $image,
                'username' => $this->input->post('username',TRUE),
                'password' => md5($this->input->post('password',TRUE)),
                );

            $this->membermodel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('backend/member'));
        }
    }
    
    public function member_update($id) 
    {
        $this->load->model('membermodel');
        $row = $this->membermodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('backend/member_upaction'),
                'id_member' => set_value('id_member', $row->id_member),
                'nama_member' => set_value('nama_member', $row->nama_member),
                'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
                'alamat' => set_value('alamat', $row->alamat),
                'no_telpon' => set_value('no_telpon', $row->no_telpon),
                'email' => set_value('email', $row->email),
                'image' => set_value('image', $row->image),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'Data Member',
                );
            $this->render('backend/pages/eresto_member_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/member'));
        }
    }
    
    public function member_upaction() 
    {
        $this->load->model('membermodel');
        $this->load->library('upload');
        $this->member_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->member_update($this->input->post('id_member', TRUE));
        } else {
            $row = $this->membermodel->get_by_id($this->input->post('id_member', TRUE));
            $image_up = $_FILES['image']['name'];
            $image_name = trim(basename(stripslashes($image_up)), ".\x00..\x20");
            $image_name = substr(uniqid(),-5).'-'.$image_name;
            //all the characters has to be lowercase
            $image_name = strtolower($image_name);
            $config = array(
                'upload_path'     =>  './uploads/members/',
                'allowed_types'   =>  'gif|jpg|jpeg|png',
                'max_size'        =>  '512',
                'file_name'       =>  $image_name,
                );
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')){
                $image = $row->image;
            } else {
                $imageDetailArray = $this->upload->data();
                $image =  $imageDetailArray['file_name'];
            }

            $data = array(
                'nama_member' => $this->input->post('nama_member',TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'no_telpon' => $this->input->post('no_telpon',TRUE),
                'email' => $this->input->post('email',TRUE),
                'image' => $image,
                'username' => $this->input->post('username',TRUE),
                'password' => md5($this->input->post('password',TRUE)),
                );

            if ($image != $row->image) {
                $img_path = './uploads/members/'.$row->image;
                if ($row->image !== 'default.jpg' && file_exists($img_path)) {
                    unlink($img_path);
                    unlink($row->image);
                }
            }

            $this->membermodel->update($this->input->post('id_member', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('backend/member'));
        }
    }
    
    public function member_delete($id) 
    {
        $this->load->model('membermodel');
        $row = $this->membermodel->get_by_id($id);

        if ($row) {
            $img_path = './uploads/members/'.$row->image;
            if ($row->image !== 'default.jpg' && file_exists($img_path)) {
                unlink($img_path);
                unlink($row->image);
            }
            $this->membermodel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('backend/member'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/member'));
        }
    }

    public function member_rules() 
    {
        $this->form_validation->set_rules('nama_member', ' ', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', ' ', 'trim|required');
        $this->form_validation->set_rules('alamat', ' ', 'trim|required');
        $this->form_validation->set_rules('no_telpon', ' ', 'trim|required|numeric');
        $this->form_validation->set_rules('email', ' ', 'trim|required|valid_email');
        $this->form_validation->set_rules('image', ' ', '');
        $this->form_validation->set_rules('username', ' ', 'trim|required');
        $this->form_validation->set_rules('password', ' ', 'trim|required');

        $this->form_validation->set_rules('id_member', 'id_member', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function pemesanan()
    {
        $this->load->model(array('pemesananmodel','pdetailmodel'));
        $pemesanan = $this->pemesananmodel->get_all();

        $data = array(
            'pemesanan_data' => $pemesanan,
            'model' => $this->load->model(array('pemesananmodel','pdetailmodel')),
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Data Pemesanan',
            );
        $this->render('backend/pages/eresto_pemesanan_list', $data);
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
        if ($status == '2') {
            $log_data = array(
                'no_transaksi' => $no_transaksi,
                'id_user' => $id_log->id_user,
                'time_log' => $datetime,
                'status' => '1', 
                );

            $this->logmodel->insert($log_data);
        }

        if ($status == '0') {
            $row = $this->pemesananmodel->get_by_id($no_transaksi);
            $meja = array('status' => '1');
            $this->mejamodel->update($row->no_meja, $meja);

            $log_data = array(
                'no_transaksi' => $no_transaksi,
                'id_user' => $id_log->id_user,
                'time_log' => $datetime,
                'status' => '0', 
                );

            $this->logmodel->insert($log_data);
        }
        $this->session->set_flashdata('message', 'Pemesanan telah di handle.');
        redirect(site_url('backend/pemesanan'));
    }

    public function pemesanan_detail($id) 
    {
        $this->load->model(array('pdetailmodel','pemesananmodel','logmodel'));
        $result = $this->pdetailmodel->get_by_id($id);
        if ($result) {
            $data = array(
                'translog' => $this->logmodel->get_by_id($id),
                'dt_pesanan' => $this->pemesananmodel->get_by_id($id),
                'pdetail_data' => $result,
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'Detail Pemesanan',
                );
            $this->render('backend/pages/eresto_pemesanan_detail_list', $data);   
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/pemesanan'));
        }
    }
    
    public function pemesanan_create() 
    {
        $this->load->model('pemesananmodel');
        $data = array(
            'button' => 'Create',
            'action' => site_url('backend/pemesanan_craction'),
            'no_transaksi' => set_value('no_transaksi'),
            'id_member' => set_value('id_member'),
            'no_meja' => set_value('no_meja'),
            'id_user' => set_value('id_user'),
            'total_belanja' => set_value('total_belanja'),
            'tgl_transaksi' => set_value('tgl_transaksi'),
            'status_pemesanan' => set_value('status_pemesanan'),
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Data Pemesanan',
            );
        $this->render('backend/pages/eresto_pemesanan_form', $data);
    }
    
    public function pemesanan_craction() 
    {
        $this->load->model('pemesananmodel');
        $this->pemesanan_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->pemesanan_create();
        } else {
            $data = array(
                'id_member' => $this->input->post('id_member',TRUE),
                'no_meja' => $this->input->post('no_meja',TRUE),
                'id_user' => $this->input->post('id_user',TRUE),
                'total_belanja' => $this->input->post('total_belanja',TRUE),
                'tgl_transaksi' => $this->input->post('tgl_transaksi',TRUE),
                'status_pemesanan' => $this->input->post('status_pemesanan',TRUE),
                );

            $this->pemesananmodel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('backend/pemesanan'));
        }
    }
    
    public function pemesanan_update($id) 
    {
        $this->load->model('pemesananmodel');
        $row = $this->pemesananmodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('backend/pemesanan_upaction'),
                'no_transaksi' => set_value('no_transaksi', $row->no_transaksi),
                'id_member' => set_value('id_member', $row->id_member),
                'no_meja' => set_value('no_meja', $row->no_meja),
                'id_user' => set_value('id_user', $row->id_user),
                'total_belanja' => set_value('total_belanja', $row->total_belanja),
                'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
                'status_pemesanan' => set_value('status_pemesanan', $row->status_pemesanan),
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'Data Pemesanan',
                );
            $this->render('backend/pages/eresto_pemesanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/pemesanan'));
        }
    }
    
    public function pemesanan_upaction() 
    {
        $this->load->model('pemesananmodel');
        $this->pemesanan_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->pemesanan_update($this->input->post('no_transaksi', TRUE));
        } else {
            $data = array(
                'id_member' => $this->input->post('id_member',TRUE),
                'no_meja' => $this->input->post('no_meja',TRUE),
                'id_user' => $this->input->post('id_user',TRUE),
                'total_belanja' => $this->input->post('total_belanja',TRUE),
                'tgl_transaksi' => $this->input->post('tgl_transaksi',TRUE),
                'status_pemesanan' => $this->input->post('status_pemesanan',TRUE),
                );

            $this->pemesananmodel->update($this->input->post('no_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('backend/pemesanan'));
        }
    }
    
    public function pemesanan_delete($id) 
    {
        $this->load->model('pemesananmodel');
        $row = $this->pemesananmodel->get_by_id($id);

        if ($row) {
            $this->pemesananmodel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('backend/pemesanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/pemesanan'));
        }
    }

    public function pemesanan_rules() 
    {
        $this->form_validation->set_rules('id_member', ' ', 'trim|required|numeric');
        $this->form_validation->set_rules('no_meja', ' ', 'trim|required');
        $this->form_validation->set_rules('id_user', ' ', 'trim|required');
        $this->form_validation->set_rules('total_belanja', ' ', 'trim|required|numeric');
        $this->form_validation->set_rules('tgl_transaksi', ' ', 'trim|required');
        $this->form_validation->set_rules('status_pemesanan', ' ', 'trim|required');

        $this->form_validation->set_rules('no_transaksi', 'no_transaksi', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function translog()
    {
        $this->load->model('logmodel');
        $translog = $this->logmodel->get_all();

        $data = array(
            'translog_data' => $translog,
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'User Log Transaksi',
        );
        $this->render('backend/pages/eresto_log_list', $data);
    }

    public function translog_read($id) 
    {
        $this->load->model('logmodel');
        $row = $this->logmodel->get_by_id($id);
        if ($row) {
            $data = array(
                'no_transaksi' => $row->no_transaksi,
                'id_user' => $row->username,
                'nama_user' => $row->nama_user,
                'time_log' => $row->time_log,
                'status' => $row->status,
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'User Log Transaksi',
            );
            $this->render('backend/pages/eresto_log_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/translog'));
        }
    }

    public function translog_delete($id) 
    {
        $this->load->model('logmodel');
        $row = $this->logmodel->get_by_id($id);

        if ($row) {
            $this->logmodel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('backend/translog'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/translog'));
        }
    }

    public function guest_book()
    {
        $this->load->model(array('Gbookmodel'));
        $guest_book = $this->Gbookmodel->get_all();

        $data = array(
            'gbook_data' => $guest_book,
            'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
            'title' => 'Guest Book',
            );
        $this->render('backend/pages/eresto_gbook_list', $data);
    }

    public function gbook_read($id)
    {
        $this->load->model('Gbookmodel');
        $row = $this->Gbookmodel->get_by_id($id);
        if ($row) {
            $data = array(
                'id_gb' => $row->id_gb,
                'nama' => $row->nama,
                'telp' => $row->telp,
                'email' => $row->email,
                'komentar' => $row->komentar,
                'user'=> $this->usermodel->get_by_username($this->session->userdata('username')),
                'title' => 'Guest Book',
                );

            $upd = array(
                'read_date' => date("Y-m-d H:i:s"),
                'flag' => 1,
                );

            if ($row->flag == 0) {
                $this->Gbookmodel->update($id, $upd);
            }

            $this->render('backend/pages/eresto_gbook_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backend/guest_book'));
        }
    }

}