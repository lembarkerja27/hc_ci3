<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PengalamanProyek_model extends CI_Model
{

    public $table = 'step_5';
    public $id = 'kd_step5';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('kd_step5,nm_proyek,tanggalMulai,tanggalAkhir,jabatan,lokasi_proyek,nilai_proyek,Up_persyaratanPengalamanProyek,created_by,created_date,updated_by,updated_date,program_name');
        $this->datatables->from('step_5');
        //add this line for join
        //$this->datatables->join('table2', 'step_5.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('pengalamanproyek/read/$1'),'Detail',array('class' => 'btn btn-sm btn-info'))." | ".anchor(site_url('pengalamanproyek/update/$1'),'Ubah',array('class' => 'btn btn-sm btn-warning'))." | ".anchor(site_url('pengalamanproyek/delete/$1'),'Delete', array('class' => 'btn btn-sm btn-danger','onclick'=>"return confirm('Are You Sure ?')")) , 'kd_step5');
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
        $this->db->like('kd_step5', $q);
	$this->db->or_like('nm_proyek', $q);
	$this->db->or_like('tanggalMulai', $q);
	$this->db->or_like('tanggalAkhir', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('lokasi_proyek', $q);
	$this->db->or_like('nilai_proyek', $q);
	$this->db->or_like('Up_persyaratanPengalamanProyek', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('updated_by', $q);
	$this->db->or_like('updated_date', $q);
	$this->db->or_like('program_name', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kd_step5', $q);
	$this->db->or_like('nm_proyek', $q);
	$this->db->or_like('tanggalMulai', $q);
	$this->db->or_like('tanggalAkhir', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('lokasi_proyek', $q);
	$this->db->or_like('nilai_proyek', $q);
	$this->db->or_like('Up_persyaratanPengalamanProyek', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('updated_by', $q);
	$this->db->or_like('updated_date', $q);
	$this->db->or_like('program_name', $q);
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

/* End of file PengalamanProyek_model.php */
/* Location: ./application/models/PengalamanProyek_model.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:31:13 */