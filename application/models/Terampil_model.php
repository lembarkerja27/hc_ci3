<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Terampil_model extends CI_Model
{

    public $table = 'skt_terampil';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,kode_skt,nama_klasifikasi');
        $this->datatables->from('skt_terampil');
        //add this line for join
        //$this->datatables->join('table2', 'skt_terampil.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('terampil/read/$1'),'Detail',array('class' => 'btn btn-sm btn-info'))." | ".anchor(site_url('terampil/update/$1'),'Ubah',array('class' => 'btn btn-sm btn-warning'))." | ".anchor(site_url('terampil/delete/$1'),'Delete', array('class' => 'btn btn-sm btn-danger','onclick'=>"return confirm('Are You Sure ?')")) , 'id');
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
	$this->db->or_like('kode_skt', $q);
	$this->db->or_like('nama_klasifikasi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('kode_skt', $q);
	$this->db->or_like('nama_klasifikasi', $q);
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

/* End of file Terampil_model.php */
/* Location: ./application/models/Terampil_model.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:33:55 */