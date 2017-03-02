<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menucatmodel extends CI_Model
{

    public $table = 'fnb_menu_cat';
    public $id = 'id_menu_cat';
    public $order = 'DESC';
    public $order_a = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order_a);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id category
    function get_by_id_category($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->result();
    }

    // get data by kategori
    function get_by_category($limit, $start = 0)
    {
        $this->db->order_by($this->id, $this->order_a);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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

}

/* End of file menucatmodel.php */
/* Location: ./application/models/menucatmodel.php */