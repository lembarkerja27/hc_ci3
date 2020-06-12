<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_order_model extends CI_Model
{

    public $table = 'tbl_detail_order';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,order_id,produk,qty,harga');
        $this->datatables->from('tbl_detail_order');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_detail_order.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('detail_order/read/$1'),'Detail',array('class' => 'btn btn-sm btn-info'))." | ".anchor(site_url('detail_order/update/$1'),'Ubah',array('class' => 'btn btn-sm btn-warning'))." | ".anchor(site_url('detail_order/delete/$1'),'Delete', array('class' => 'btn btn-sm btn-danger','onclick'=>"return confirm('Are You Sure ?')")) , 'id');
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
	$this->db->or_like('order_id', $q);
	$this->db->or_like('produk', $q);
	$this->db->or_like('qty', $q);
	$this->db->or_like('harga', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('order_id', $q);
	$this->db->or_like('produk', $q);
	$this->db->or_like('qty', $q);
	$this->db->or_like('harga', $q);
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

/* End of file Detail_order_model.php */
/* Location: ./application/models/Detail_order_model.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:10:02 */