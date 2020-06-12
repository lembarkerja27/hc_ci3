<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SubTerampil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('SubTerampil_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('subterampil/sub_skt_terampil_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->SubTerampil_model->json();
    }

    public function read($id) 
    {
        $row = $this->SubTerampil_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'KDTK' => $row->KDTK,
		'nama_klasifikasi' => $row->nama_klasifikasi,
		'kodeSkt' => $row->kodeSkt,
	    );
            $this->load->view('subterampil/sub_skt_terampil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subterampil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('subterampil/create_action'),
	    'ID' => set_value('ID'),
	    'KDTK' => set_value('KDTK'),
	    'nama_klasifikasi' => set_value('nama_klasifikasi'),
	    'kodeSkt' => set_value('kodeSkt'),
	);
        $this->load->view('subterampil/sub_skt_terampil_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'KDTK' => $this->input->post('KDTK',TRUE),
		'nama_klasifikasi' => $this->input->post('nama_klasifikasi',TRUE),
		'kodeSkt' => $this->input->post('kodeSkt',TRUE),
	    );

            $this->SubTerampil_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('subterampil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->SubTerampil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('subterampil/update_action'),
		'ID' => set_value('ID', $row->ID),
		'KDTK' => set_value('KDTK', $row->KDTK),
		'nama_klasifikasi' => set_value('nama_klasifikasi', $row->nama_klasifikasi),
		'kodeSkt' => set_value('kodeSkt', $row->kodeSkt),
	    );
            $this->load->view('subterampil/sub_skt_terampil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subterampil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'KDTK' => $this->input->post('KDTK',TRUE),
		'nama_klasifikasi' => $this->input->post('nama_klasifikasi',TRUE),
		'kodeSkt' => $this->input->post('kodeSkt',TRUE),
	    );

            $this->SubTerampil_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('subterampil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->SubTerampil_model->get_by_id($id);

        if ($row) {
            $this->SubTerampil_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('subterampil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subterampil'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('KDTK', 'kdtk', 'trim|required');
	$this->form_validation->set_rules('nama_klasifikasi', 'nama klasifikasi', 'trim|required');
	$this->form_validation->set_rules('kodeSkt', 'kodeskt', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sub_skt_terampil.xls";
        $judul = "sub_skt_terampil";
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
	xlsWriteLabel($tablehead, $kolomhead++, "KDTK");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Klasifikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "KodeSkt");

	foreach ($this->SubTerampil_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->KDTK);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_klasifikasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kodeSkt);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file SubTerampil.php */
/* Location: ./application/controllers/SubTerampil.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:35:01 */