<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usermodel extends CI_Model
{

    public $table = 'fnb_user';
    public $id = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_user_group','fnb_user_group.id_group = fnb_user.id_group');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_user_group','fnb_user_group.id_group = fnb_user.id_group');
        $this->db->where($this->id, $id);
        return $this->db->get()->row();
    }

    // get data by id
    function get_by_username($username)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_user_group','fnb_user_group.id_group = fnb_user.id_group');
        $this->db->where('username', $username);
        return $this->db->get()->row();
    }
    
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    //login user
    function login($user, $pass)
    {
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        return $this->db->get($this->table)->row();
    }

}

/* End of file usermodel.php */
/* Location: ./application/models/usermodel.php */