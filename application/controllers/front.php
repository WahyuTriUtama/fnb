<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		//this sintax
        $this->load->helper('backi');
        back_button();
        
		$this->load->helper(array('form','text_helper','date','file','url'));
		$this->load->library(array('form_validation','session','cart'));
		$this->load->model(array('membermodel','menumodel','menucatmodel'));
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
        $data = array(
    		'katmenu' => $this->menucatmodel->get_by_category(5, 0), 
        	'cart_count' => $this->cart->total_items(), 
        	'title' => 'Home',
            'judul' => 'Home',
        	'new_menu' => $this->menumodel->index_limit(8, 0),
        	'favorite_menu' => $this->menumodel->get_by_favorite(1, 12),
        	'contents' => 'frontend/home',
    		);

		$this->load->view('frontend/templates', $data);
	}

	public function menu()
	{
        $data = array(
    		'katmenu' => $this->menucatmodel->get_by_category(5, 0), 
        	'cart_count' => $this->cart->total_items(), 
        	'title' => 'Daftar Menu',
            'judul' => 'Daftar Menu',
        	'list_katmenu' => $this->menucatmodel->get_by_category(5, 0),
        	'contents' => 'frontend/menu_list',
    		);
 
		$this->load->view('frontend/templates', $data);
	}

	public function category($id)
	{
        $data = array(
    		'katmenu' => $this->menucatmodel->get_by_category(5, 0), 
        	'judul' => 'Daftar Menu',
        	'cart_count' => $this->cart->total_items(), 
        	'title' => 'Daftar Menu',
        	'list_katmenu' => $this->menucatmodel->get_by_id_category($id),
        	'contents' => 'frontend/menu_list',
    		);

		$this->load->view('frontend/templates', $data);
	}

	public function menu_detail($uri)
	{
		$cat = $this->menumodel->get_by_uri($uri);
        if ($cat) {
            $data = array(
                'katmenu' => $this->menucatmodel->get_by_category(5, 0), 
                'judul' => 'Detail Menu',
                'cart_count' => $this->cart->total_items(), 
                'title' => 'Detail Menu',
                'datamenu' => $cat,
                'menuother' => $this->menumodel->get_random($cat->id_menu_cat),
                'contents' => 'frontend/menu_detail',
                );

            $this->load->view('frontend/templates', $data);
        } else {
            redirect(site_url('Err_404'));
        }
	}

	public function search()
	{
		$keyword = $this->input->post('keywords');

        $data = array(
    		'katmenu' => $this->menucatmodel->get_by_category(5, 0), 
        	'judul' => 'Search Menu',
        	'cart_count' => $this->cart->total_items(), 
        	'title' => 'Search Menu',
        	'key' => $keyword,
        	'hasil' => $this->menumodel->search($keyword),
        	'contents' => 'frontend/search',
    		);

		$this->load->view('frontend/templates', $data);
	}

	public function login()
	{
    	$data = array(
    		'katmenu' => $this->menucatmodel->get_by_category(5, 0), 
        	'judul' => 'Login Member',
        	'cart_count' => $this->cart->total_items(), 
        	'title' => 'Login Member',
        	'contents' => 'frontend/login',
    		);

        $this->load->view('frontend/templates', $data);
	}

	public function ceklogin()
	{
		$this->load->model('membermodel');

        $this->login_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<p class="external-event bg-yellow ui-draggable ui-draggable-handle"><b>ERROR: </b>Invalid username or password.</p>');
            redirect(site_url('login'));
        } else {
            $user = $this->input->post('unamemember',TRUE);
            $pass = md5($this->input->post('password',TRUE));

            $row = $this->membermodel->login($user, $pass);
            if ($row){
                $sess_data = array(
                    'log_in' => TRUE,
                    'user'  => $row->username,
                    'memberid' => $row->id_member,
                    'membername' => $row->nama_member,
                    );
                $this->session->set_userdata($sess_data);
                redirect(site_url('index'));
            }else{
                $this->session->set_flashdata('message', '<p class="external-event bg-yellow ui-draggable ui-draggable-handle"><b>ERROR: </b>Invalid username or password.</p>');
                redirect(site_url('login'));
            }
        } 
	}

	function login_rules()
    {
        $this->form_validation->set_rules('unamemember', ' ', 'trim|required');
        $this->form_validation->set_rules('password', ' ', 'trim|required');
    }

	public function logout()
    {   
    	$this->session->sess_destroy('log_in');
        $this->session->sess_destroy('user');
        $this->session->sess_destroy('memberid');
        $this->session->sess_destroy('membername');
        redirect(site_url('index'),'refresh');
    }

    public function register()
    {
        $data = array(
            'nohp' => $this->input->post('inputhpreg'),
            'katmenu' => $this->menucatmodel->get_by_category(5, 0),
            'cart_count' => $this->cart->total_items(),
            'get_ID' => $this->membermodel->get_last_id() + 1,
            'title' => 'Registrasi Member',
            'judul' => 'Registrasi Member',
            'contents' => 'frontend/register',
            );
        $this->load->view('frontend/templates', $data);
    }

    public function addRegisterdb() {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/members/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '512';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['file_name']  = 'imgmember_'.$this->membermodel->get_last_id()+1;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload()){
            $image = '';
        } else {
            $imageDetail = $this->upload->data();
            $image =  $imageDetail['file_name'];
        }

        $data = array (
            'id_member' => $this->membermodel->get_last_id() + 1,
            'nama_member' => $this->input->post('nama_member'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'no_telpon' => $this->input->post('no_hp'),
            'email' => $this->input->post('email_m'),
            'image' => $image,
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'member_status' => 0
            );

        $this->membermodel->insert($data);

        redirect('registered', 'refresh');
    }

    public function register_success()
    {
        $data = array(
            'katmenu' => $this->menucatmodel->get_by_category(5, 0),
            'cart_count' => $this->cart->total_items(),
            'title' => 'Registrasi Member',
            'judul' => 'Registrasi Member',
            'contents' => 'frontend/success',
            );
        $this->load->view('frontend/templates', $data);
    }

    public function cart()
    {
        $data = array(
            'katmenu' => $this->menucatmodel->get_by_category(5, 0),
            'cart_count' => $this->cart->total_items(),
            'cart_amount' => $this->cart->total(),
            'cart_view' => $this->cart->contents(), 
            'title' => 'Order',
            'judul' => 'Order',
            'contents' => 'frontend/cart',
            );
        $this->load->view('frontend/templates', $data);
    }

    public function add($uri)
    {
        $datamenu = $this->menumodel->get_by_uri($uri);
        if ($datamenu) {
            $data = array(
                //'rowid'   => $datamenu->id_menu,
                'id'      => $datamenu->id_menu,
                'qty'     => 1,
                'price'   => $datamenu->harga,
                'name'    => $datamenu->id_menu
                );
            $this->cart->insert($data);
            redirect(site_url('cart'));
        } else {
            redirect(site_url('Err_404'));
        }
    }

    public function remove($row_id) {
        $data = array(
            'rowid' => $row_id,
            'qty' => 0
            );
        $this->cart->update($data);

        redirect(site_url('cart'));
    }

    public function update() {
        $data = array(
            'rowid' => $this->input->post('rowid'),
            'qty' => $this->input->post('input_qty')
            );

        $this->cart->update($data);

        redirect(site_url('cart'));
    }

    public function removeAll() {
        $this->cart->destroy();

        echo "Remove All shopping cart";
    }

    public function verifikasi() {
        $this->load->model('mejamodel');
        if($this->cart->total_items()>0) {
            $data = array(
                'katmenu' => $this->menucatmodel->get_by_category(5, 0),
                'cart_count' => $this->cart->total_items(),
                'cart_amount' => $this->cart->total(),
                'cart_view' => $this->cart->contents(),
                'viewMeja' =>  $this->mejamodel->get_all_no_order(),
                'title' => 'Order',
                'judul' => 'Order',
                'contents' => 'frontend/verifikasi',
                );

            $this->load->view('frontend/templates', $data);
        } else {
            redirect(site_url('cart'));
        }
    }

    public function cart_login()
    { 
        $this->form_validation->set_rules('inputuserlogin', '', 'trim|required');
        $this->form_validation->set_rules('inputpasslogin', '', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<p class="external-event bg-yellow ui-draggable ui-draggable-handle"><b>ERROR: </b>Invalid username or password.</p>');
            redirect(site_url('verifikasi'));
        } else {
            $user_ = $this->input->post('inputuserlogin',TRUE);
            $pass_ = md5($this->input->post('inputpasslogin',TRUE));

            $row = $this->membermodel->login($user_, $pass_);

            if($row){
                $sess_array=array(
                    'user'=>$row->username,
                    'memberid'=>$row->id_member,
                    'membername'=>$row->nama_member
                    );
                $this->session->set_userdata('log_in', $sess_array);
                $this->session->set_userdata('user', $row->username);
                $this->session->set_userdata('memberid', $row->id_member);
                $this->session->set_userdata('membername', $row->nama_member);
                redirect(site_url('verifikasi'));
            } else {
                $this->session->set_flashdata('message', '<p class="external-event bg-yellow ui-draggable ui-draggable-handle"><b>ERROR: </b>Invalid username or password.</p>');
                redirect(site_url('verifikasi'));
            }
        }  
    }

    public function checkout() {       
        if ($this->input->post('inputnomeja', TRUE) == NULL) {
            redirect(site_url('verifikasi'));
        }

        if($this->cart->total_items()>0) {

            $this->load->model(array('mejamodel','pemesananmodel'));

            $today = date("Ymd"); 
            $row = $this->pemesananmodel->get_last_id();

            if($row->no_transaksi==0 || $row->no_transaksi=='') {
                $newTRID = $today.str_pad('1', 4, '0', STR_PAD_LEFT);
            } else {
                $parseTRID = $row->no_transaksi;
                $newTRID = $today.str_pad(substr($parseTRID, 8)+1, 4, '0', STR_PAD_LEFT);
            }

            $data = array(
                'katmenu' => $this->menucatmodel->get_by_category(5, 0),
                'cart_count' => $this->cart->total_items(),
                'cart_amount' => $this->cart->total(),
                'cart_view' => $this->cart->contents(),
                'viewMeja' =>  $this->mejamodel->get_all_no_order(),
                'title' => 'Order',
                'judul' => 'Order',
                'order_name' => $this->input->post('inputguestname',TRUE),
                'order_table' => $this->input->post('nomeja',TRUE),
                'order_id' => $newTRID, 
                'contents' => 'frontend/checkout',
                );
            $this->load->view('frontend/templates', $data);
        } else {
            redirect(site_url('cart'));
        }
    }

    function save() {

        if($this->cart->total_items()>0) {
            $this->load->model(array('mejamodel','pemesananmodel','pdetailmodel'));

            $data = array (
                'no_transaksi' => $this->input->post('in_notrans', TRUE),
                'id_member' => $this->input->post('in_idmember', TRUE),
                'nama_pelanggan' => $this->input->post('in_nama', TRUE),
                'no_meja' => $this->input->post('in_nomeja', TRUE),
                'total_belanja' => $this->cart->total(),
                'tgl_transaksi' => date("Y-m-d H:i:s"),
                'status_pemesanan' => 1,
                );

            $this->pemesananmodel->insert($data);

            foreach ($this->cart->contents() as $sendItems) {
                $dataitems = array (
                    'no_transaksi' => $this->input->post('in_notrans', TRUE),
                    'id_menu' => $sendItems['id'],
                    'jml_pesan' => $sendItems['qty'],
                    'jml_harga' => $sendItems['subtotal']
                    );

                $this->pdetailmodel->insert($dataitems);
            }

            $id_meja = $this->input->post('in_nomeja', TRUE);            
            $item_meja = array ('status' => 0 );
            $this->mejamodel->update($id_meja, $item_meja);

            //clear data cart
            $this->cart->destroy();

            //clear data session member
            $this->session->unset_userdata('log_in');
            $this->session->unset_userdata('user');
            $this->session->unset_userdata('memberid');
            $this->session->unset_userdata('membername');

            $this->session->set_flashdata('message', '<p class="external-event bg-green ui-draggable ui-draggable-handle"><strong>Pemesanan Berhasil Diproses</strong><br>Daftar Pesanan sudah tersimpan dan akan segera kami proses. Selamat menikmati hidangan istimewa anda hari ini.');
            redirect(site_url('cart'), "refresh");

        } else {
            redirect(site_url('cart'));
        }
    }

    function meja() {
        $this->load->model('mejamodel');
        $data = array(
            'katmenu' => $this->menucatmodel->get_by_category(5, 0),
            'cart_count' => $this->cart->total_items(),
            'cart_amount' => $this->cart->total(),
            'cart_view' => $this->cart->contents(), 
            'viewMeja' => $this->mejamodel->get_all_no_order(),
            'title' => 'Cek Meja',
            'judul' => 'Cek Meja',
            'contents' => 'frontend/view_meja',
            );
        $this->load->view('frontend/templates', $data);
    }

    function guest_book() {
        $data = array(
            'action' => site_url('front/gb_save'),
            'nama' => set_value('nama'),
            'telp' => set_value('telp'),
            'email' => set_value('email'),
            'komentar' => set_value('komentar'),
            'katmenu' => $this->menucatmodel->get_by_category(5, 0),
            'cart_count' => $this->cart->total_items(),
            'title' => 'Guest Book',
            'judul' => 'Guest Book',
            'contents' => 'frontend/guest_book',
            );
        $this->load->view('frontend/templates', $data);
    }

    function gb_save() {
        $this->_valid_gb();

        if ($this->form_validation->run() === FALSE) {
            $this->guest_book();
        } else {
            $this->load->model('Gbookmodel', 'Guest');

            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'telp' => $this->input->post('telp', TRUE),
                'email' => $this->input->post('email', TRUE),
                'komentar' => $this->input->post('komentar', TRUE),
                'sent_date' => date("Y-m-d H:i:s"),
                );
            $this->Guest->insert($data);
            $this->session->set_flashdata('message', 'Request Submited');
            redirect(site_url('guestbook'));
        }
    }

    function _valid_gb() {
        $this->form_validation->set_rules('nama', ' ', 'trim|required');
        $this->form_validation->set_rules('telp', ' ', 'trim|required');
        $this->form_validation->set_rules('email', ' ', 'trim|required|valid_email');
        $this->form_validation->set_rules('komentar', ' ', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function lookup() {
        $keyword = $this->input->post('keyword'); 
        if(!empty($keyword)) {
            $result = $this->menumodel->lookup($keyword);
            if($result) {
                echo '<ul id="menu-list">';
                    foreach($result as $menu) {
                        echo '<a href="'.base_url('detail/'.$menu->uri_dashed.'.html').'"><li>'.$menu->nama_menu.'</li></a>';
                    }
                echo '</ul>';
            }
        }
    }

}