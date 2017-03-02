<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menumodel extends CI_Model
{

    public $table = 'fnb_menu';
    public $id = 'id_menu';
    public $uri = 'uri_dashed';
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
        $this->db->join('fnb_menu_cat','fnb_menu_cat.id_menu_cat = fnb_menu.id_menu_cat');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_menu_cat','fnb_menu_cat.id_menu_cat = fnb_menu.id_menu_cat');
        $this->db->where($this->id, $id);
        return $this->db->get()->row();
    }

     // get data by uri
    function get_by_uri($uri)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_menu_cat','fnb_menu_cat.id_menu_cat = fnb_menu.id_menu_cat');
        $this->db->where($this->uri, $uri);
        return $this->db->get()->row();
    }

    // get data by favorite
    function get_by_favorite($key, $limit)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_menu_cat','fnb_menu_cat.id_menu_cat = fnb_menu.id_menu_cat');
        $this->db->where('is_favorite', $key);
        $this->db->order_by($this->id, 'RANDOM');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    //get by category
    function get_by_category($cat)
    {
        $this->db->where('id_menu_cat', $cat);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    //search frontend
    function search($keyword = NULL)
    {
        $this->db->like('nama_menu', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan_menu', $keyword);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    //limit
    function index_limit($limit = NULL, $index = NULL)
    {
        $this->db->limit($limit, $index);
        return $this->db->get($this->table)->result();
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

    function get_random($id_menu_cat)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id_menu_cat', $id_menu_cat);
        $this->db->order_by('id_menu_cat', 'RANDOM');
        $this->db->limit(10); 
        return $this->db->get();
    }

    function lookup($keyword){ 
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('nama_menu',$keyword);
        $query = $this->db->get();     
        return $query->result(); 
    } 

}

/* End of file menumodel.php */
/* Location: ./application/models/menumodel.php */