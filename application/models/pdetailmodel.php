<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pdetailmodel extends CI_Model
{

    public $table = 'fnb_pemesanan_detail';
    public $id = 'no_transaksi';
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
        $this->db->join('fnb_menu','fnb_menu.id_menu = fnb_pemesanan_detail.id_menu');
        $this->db->join('fnb_pemesanan','fnb_pemesanan.no_transaksi = fnb_pemesanan_detail.no_transaksi');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_menu','fnb_menu.id_menu = fnb_pemesanan_detail.id_menu');
        $this->db->join('fnb_pemesanan','fnb_pemesanan.no_transaksi = fnb_pemesanan_detail.no_transaksi');
        $this->db->where('fnb_pemesanan_detail.no_transaksi', $id);
        return $this->db->get()->result();
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

/* End of file pdetailmodel.php */
/* Location: ./application/models/pdetailmodel.php */