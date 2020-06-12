<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biodata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Biodata_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('biodata/step_1_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Biodata_model->json();
    }

    public function read($id) 
    {
        $row = $this->Biodata_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_step1' => $row->kd_step1,
		'ktp' => $row->ktp,
		'namaTnpGlr' => $row->namaTnpGlr,
		'namaSertifikat' => $row->namaSertifikat,
		'npwp' => $row->npwp,
		'tmpLahir' => $row->tmpLahir,
		'tglLahir' => $row->tglLahir,
		'NoTelp' => $row->NoTelp,
		'email' => $row->email,
		'jekel' => $row->jekel,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'program_name' => $row->program_name,
	    );
            $this->load->view('biodata/step_1_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodata'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('biodata/create_action'),
	    'kd_step1' => set_value('kd_step1'),
	    'ktp' => set_value('ktp'),
	    'namaTnpGlr' => set_value('namaTnpGlr'),
	    'namaSertifikat' => set_value('namaSertifikat'),
	    'npwp' => set_value('npwp'),
	    'tmpLahir' => set_value('tmpLahir'),
	    'tglLahir' => set_value('tglLahir'),
	    'NoTelp' => set_value('NoTelp'),
	    'email' => set_value('email'),
	    'jekel' => set_value('jekel'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'program_name' => set_value('program_name'),
	);
        $this->load->view('biodata/step_1_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ktp' => $this->input->post('ktp',TRUE),
		'namaTnpGlr' => $this->input->post('namaTnpGlr',TRUE),
		'namaSertifikat' => $this->input->post('namaSertifikat',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'tmpLahir' => $this->input->post('tmpLahir',TRUE),
		'tglLahir' => $this->input->post('tglLahir',TRUE),
		'NoTelp' => $this->input->post('NoTelp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'jekel' => $this->input->post('jekel',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->Biodata_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('biodata'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Biodata_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('biodata/update_action'),
		'kd_step1' => set_value('kd_step1', $row->kd_step1),
		'ktp' => set_value('ktp', $row->ktp),
		'namaTnpGlr' => set_value('namaTnpGlr', $row->namaTnpGlr),
		'namaSertifikat' => set_value('namaSertifikat', $row->namaSertifikat),
		'npwp' => set_value('npwp', $row->npwp),
		'tmpLahir' => set_value('tmpLahir', $row->tmpLahir),
		'tglLahir' => set_value('tglLahir', $row->tglLahir),
		'NoTelp' => set_value('NoTelp', $row->NoTelp),
		'email' => set_value('email', $row->email),
		'jekel' => set_value('jekel', $row->jekel),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'program_name' => set_value('program_name', $row->program_name),
	    );
            $this->load->view('biodata/step_1_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodata'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_step1', TRUE));
        } else {
            $data = array(
		'ktp' => $this->input->post('ktp',TRUE),
		'namaTnpGlr' => $this->input->post('namaTnpGlr',TRUE),
		'namaSertifikat' => $this->input->post('namaSertifikat',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'tmpLahir' => $this->input->post('tmpLahir',TRUE),
		'tglLahir' => $this->input->post('tglLahir',TRUE),
		'NoTelp' => $this->input->post('NoTelp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'jekel' => $this->input->post('jekel',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->Biodata_model->update($this->input->post('kd_step1', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('biodata'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Biodata_model->get_by_id($id);

        if ($row) {
            $this->Biodata_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('biodata'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodata'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ktp', 'ktp', 'trim|required');
	$this->form_validation->set_rules('namaTnpGlr', 'namatnpglr', 'trim|required');
	$this->form_validation->set_rules('namaSertifikat', 'namasertifikat', 'trim|required');
	$this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
	$this->form_validation->set_rules('tmpLahir', 'tmplahir', 'trim|required');
	$this->form_validation->set_rules('tglLahir', 'tgllahir', 'trim|required');
	$this->form_validation->set_rules('NoTelp', 'notelp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('jekel', 'jekel', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('program_name', 'program name', 'trim|required');

	$this->form_validation->set_rules('kd_step1', 'kd_step1', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "step_1.xls";
        $judul = "step_1";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Ktp");
	xlsWriteLabel($tablehead, $kolomhead++, "NamaTnpGlr");
	xlsWriteLabel($tablehead, $kolomhead++, "NamaSertifikat");
	xlsWriteLabel($tablehead, $kolomhead++, "Npwp");
	xlsWriteLabel($tablehead, $kolomhead++, "TmpLahir");
	xlsWriteLabel($tablehead, $kolomhead++, "TglLahir");
	xlsWriteLabel($tablehead, $kolomhead++, "NoTelp");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Jekel");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Name");

	foreach ($this->Biodata_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ktp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namaTnpGlr);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namaSertifikat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmpLahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tglLahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NoTelp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jekel);
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

/* End of file Biodata.php */
/* Location: ./application/controllers/Biodata.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:25:43 */