<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Terampil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Terampil_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('terampil/skt_terampil_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Terampil_model->json();
    }

    public function read($id) 
    {
        $row = $this->Terampil_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_skt' => $row->kode_skt,
		'nama_klasifikasi' => $row->nama_klasifikasi,
	    );
            $this->load->view('terampil/skt_terampil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('terampil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('terampil/create_action'),
	    'id' => set_value('id'),
	    'kode_skt' => set_value('kode_skt'),
	    'nama_klasifikasi' => set_value('nama_klasifikasi'),
	);
        $this->load->view('terampil/skt_terampil_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_skt' => $this->input->post('kode_skt',TRUE),
		'nama_klasifikasi' => $this->input->post('nama_klasifikasi',TRUE),
	    );

            $this->Terampil_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('terampil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Terampil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('terampil/update_action'),
		'id' => set_value('id', $row->id),
		'kode_skt' => set_value('kode_skt', $row->kode_skt),
		'nama_klasifikasi' => set_value('nama_klasifikasi', $row->nama_klasifikasi),
	    );
            $this->load->view('terampil/skt_terampil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('terampil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_skt' => $this->input->post('kode_skt',TRUE),
		'nama_klasifikasi' => $this->input->post('nama_klasifikasi',TRUE),
	    );

            $this->Terampil_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('terampil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Terampil_model->get_by_id($id);

        if ($row) {
            $this->Terampil_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('terampil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('terampil'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_skt', 'kode skt', 'trim|required');
	$this->form_validation->set_rules('nama_klasifikasi', 'nama klasifikasi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "skt_terampil.xls";
        $judul = "skt_terampil";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Skt");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Klasifikasi");

	foreach ($this->Terampil_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_skt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_klasifikasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Terampil.php */
/* Location: ./application/controllers/Terampil.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:33:55 */