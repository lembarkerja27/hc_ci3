<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PengalamanOrganisasi_model extends CI_Model
{

    public $table = 'step_6';
    public $id = 'kd_step6';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('kd_step6,nm_instansi,alamat,tanggalMulai,tanggalAkhir,jabatan,desk_pekerjaan,jenis_instansi,Up_persratanPengalamanOrganisasi,created_by,created_date,updated_by,updated_date,program_name');
        $this->datatables->from('step_6');
        //add this line for join
        //$this->datatables->join('table2', 'step_6.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('pengalamanorganisasi/read/$1'),'Detail',array('class' => 'btn btn-sm btn-info'))." | ".anchor(site_url('pengalamanorganisasi/update/$1'),'Ubah',array('class' => 'btn btn-sm btn-warning'))." | ".anchor(site_url('pengalamanorganisasi/delete/$1'),'Delete', array('class' => 'btn btn-sm btn-danger','onclick'=>"return confirm('Are You Sure ?')")) , 'kd_step6');
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
        $this->db->like('kd_step6', $q);
	$this->db->or_like('nm_instansi', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('tanggalMulai', $q);
	$this->db->or_like('tanggalAkhir', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('desk_pekerjaan', $q);
	$this->db->or_like('jenis_instansi', $q);
	$this->db->or_like('Up_persratanPengalamanOrganisasi', $q);
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
        $this->db->like('kd_step6', $q);
	$this->db->or_like('nm_instansi', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('tanggalMulai', $q);
	$this->db->or_like('tanggalAkhir', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('desk_pekerjaan', $q);
	$this->db->or_like('jenis_instansi', $q);
	$this->db->or_like('Up_persratanPengalamanOrganisasi', $q);
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

/* End of file PengalamanOrganisasi_model.php */
/* Location: ./application/models/PengalamanOrganisasi_model.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:32:03 */