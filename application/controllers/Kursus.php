<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kursus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kursus_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('kursus/step_4_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kursus_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kursus_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_step4' => $row->kd_step4,
		'nm_penyelenggara' => $row->nm_penyelenggara,
		'alamat' => $row->alamat,
		'tahun' => $row->tahun,
		'noSertifikat' => $row->noSertifikat,
		'nm_kursus' => $row->nm_kursus,
		'provinsi' => $row->provinsi,
		'kota' => $row->kota,
		'Up_persyartanKursus' => $row->Up_persyartanKursus,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'program_name' => $row->program_name,
	    );
            $this->load->view('kursus/step_4_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kursus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kursus/create_action'),
	    'kd_step4' => set_value('kd_step4'),
	    'nm_penyelenggara' => set_value('nm_penyelenggara'),
	    'alamat' => set_value('alamat'),
	    'tahun' => set_value('tahun'),
	    'noSertifikat' => set_value('noSertifikat'),
	    'nm_kursus' => set_value('nm_kursus'),
	    'provinsi' => set_value('provinsi'),
	    'kota' => set_value('kota'),
	    'Up_persyartanKursus' => set_value('Up_persyartanKursus'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'program_name' => set_value('program_name'),
	);
        $this->load->view('kursus/step_4_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_penyelenggara' => $this->input->post('nm_penyelenggara',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'noSertifikat' => $this->input->post('noSertifikat',TRUE),
		'nm_kursus' => $this->input->post('nm_kursus',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'Up_persyartanKursus' => $this->input->post('Up_persyartanKursus',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->Kursus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kursus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kursus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kursus/update_action'),
		'kd_step4' => set_value('kd_step4', $row->kd_step4),
		'nm_penyelenggara' => set_value('nm_penyelenggara', $row->nm_penyelenggara),
		'alamat' => set_value('alamat', $row->alamat),
		'tahun' => set_value('tahun', $row->tahun),
		'noSertifikat' => set_value('noSertifikat', $row->noSertifikat),
		'nm_kursus' => set_value('nm_kursus', $row->nm_kursus),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kota' => set_value('kota', $row->kota),
		'Up_persyartanKursus' => set_value('Up_persyartanKursus', $row->Up_persyartanKursus),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'program_name' => set_value('program_name', $row->program_name),
	    );
            $this->load->view('kursus/step_4_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kursus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_step4', TRUE));
        } else {
            $data = array(
		'nm_penyelenggara' => $this->input->post('nm_penyelenggara',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'noSertifikat' => $this->input->post('noSertifikat',TRUE),
		'nm_kursus' => $this->input->post('nm_kursus',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'Up_persyartanKursus' => $this->input->post('Up_persyartanKursus',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->Kursus_model->update($this->input->post('kd_step4', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kursus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kursus_model->get_by_id($id);

        if ($row) {
            $this->Kursus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kursus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kursus'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_penyelenggara', 'nm penyelenggara', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('noSertifikat', 'nosertifikat', 'trim|required');
	$this->form_validation->set_rules('nm_kursus', 'nm kursus', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('Up_persyartanKursus', 'up persyartankursus', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('program_name', 'program name', 'trim|required');

	$this->form_validation->set_rules('kd_step4', 'kd_step4', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "step_4.xls";
        $judul = "step_4";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Penyelenggara");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "NoSertifikat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Kursus");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Up PersyartanKursus");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Name");

	foreach ($this->Kursus_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_penyelenggara);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->noSertifikat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_kursus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Up_persyartanKursus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->program_name);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kursus.php */
/* Location: ./application/controllers/Kursus.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:30:24 */