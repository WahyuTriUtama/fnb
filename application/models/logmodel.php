<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class logmodel extends CI_Model
{

    public $table = 'fnb_transaksi_log';
    public $id = 'fnb_transaksi_log.no_transaksi';
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
        $this->db->join('fnb_user','fnb_user.id_user = fnb_transaksi_log.id_user');
        $this->db->join('fnb_pemesanan','fnb_pemesanan.no_transaksi = fnb_transaksi_log.no_transaksi');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_user','fnb_user.id_user = fnb_transaksi_log.id_user');
        //$this->db->join('fnb_pemesanan','fnb_pemesanan.no_transaksi = fnb_transaksi_log.no_transaksi');
        $this->db->where($this->id, $id);
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

/* End of file mejamodel.php */
/* Location: ./application/models/mejamodel.php */