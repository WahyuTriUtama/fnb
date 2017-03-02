<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pemesananmodel extends CI_Model
{

    public $table = 'fnb_pemesanan';
    public $id = 'no_transaksi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_member a','a.id_member = fnb_pemesanan.id_member');
        $this->db->join('fnb_data_meja b','b.no_meja = fnb_pemesanan.no_meja');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_member','fnb_member.id_member = fnb_pemesanan.id_member');
        $this->db->join('fnb_data_meja','fnb_data_meja.no_meja = fnb_pemesanan.no_meja');
        $this->db->where($this->id, $id);
        return $this->db->get()->row();
    }

    //get date, status pemesanan
    function get_by_pemesanan($tanggal)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_member','fnb_member.id_member = fnb_pemesanan.id_member');
        $this->db->join('fnb_data_meja','fnb_data_meja.no_meja = fnb_pemesanan.no_meja');
        //$this->db->where('fnb_pemesanan.status_pemesanan', '1');
        $this->db->like('tgl_transaksi', $tanggal);
        $this->db->order_by('status_pemesanan', $this->order);
        return $this->db->get()->result();
    }

    //get date, status pemesanan
    function get_by_kasir($tanggal)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('fnb_member','fnb_member.id_member = fnb_pemesanan.id_member');
        $this->db->join('fnb_data_meja','fnb_data_meja.no_meja = fnb_pemesanan.no_meja');
        $this->db->where('status_pemesanan', '2');
        $this->db->or_where('status_pemesanan', '0');
        $this->db->like('tgl_transaksi', $tanggal);
        $this->db->order_by('status_pemesanan', $this->order);
        return $this->db->get()->result();
    }

    function get_last_id()
    {
        $this->db->select_max($this->id);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->row();
    }

    // get total rows today
    function total_rows_today($tanggal) {
        $this->db->from($this->table);
        $this->db->like('tgl_transaksi', $tanggal);
        return $this->db->count_all_results();
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

/* End of file pemesananmodel.php */
/* Location: ./application/models/pemesananmodel.php */