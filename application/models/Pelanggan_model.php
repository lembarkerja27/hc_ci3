<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{

    public $table = 'tbl_pelanggan';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,nama,email,alamat,telp');
        $this->datatables->from('tbl_pelanggan');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_pelanggan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('pelanggan/read/$1'),'Detail',array('class' => 'btn btn-sm btn-info'))." | ".anchor(site_url('pelanggan/update/$1'),'Ubah',array('class' => 'btn btn-sm btn-warning'))." | ".anchor(site_url('pelanggan/delete/$1'),'Delete', array('class' => 'btn btn-sm btn-danger','onclick'=>"return confirm('Are You Sure ?')")) , 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('telp', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('telp', $q);
	$this->db->limit($limit, $start);
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

}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:05:54 */