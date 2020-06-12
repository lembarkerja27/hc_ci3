<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendidikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendidikan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('pendidikan/step_3_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pendidikan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pendidikan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_step3' => $row->kd_step3,
		'nm_sekolah' => $row->nm_sekolah,
		'progStudi' => $row->progStudi,
		'thnLulus' => $row->thnLulus,
		'noIjazah' => $row->noIjazah,
		'alamat' => $row->alamat,
		'jenjang' => $row->jenjang,
		'provinsi' => $row->provinsi,
		'kota' => $row->kota,
		'Up_fcIjazahLegalisir' => $row->Up_fcIjazahLegalisir,
		'Up_dtPendidikan' => $row->Up_dtPendidikan,
		'Up_suratKeterangan' => $row->Up_suratKeterangan,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'program_name' => $row->program_name,
	    );
            $this->load->view('pendidikan/step_3_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendidikan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pendidikan/create_action'),
	    'kd_step3' => set_value('kd_step3'),
	    'nm_sekolah' => set_value('nm_sekolah'),
	    'progStudi' => set_value('progStudi'),
	    'thnLulus' => set_value('thnLulus'),
	    'noIjazah' => set_value('noIjazah'),
	    'alamat' => set_value('alamat'),
	    'jenjang' => set_value('jenjang'),
	    'provinsi' => set_value('provinsi'),
	    'kota' => set_value('kota'),
	    'Up_fcIjazahLegalisir' => set_value('Up_fcIjazahLegalisir'),
	    'Up_dtPendidikan' => set_value('Up_dtPendidikan'),
	    'Up_suratKeterangan' => set_value('Up_suratKeterangan'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'program_name' => set_value('program_name'),
	);
        $this->load->view('pendidikan/step_3_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_sekolah' => $this->input->post('nm_sekolah',TRUE),
		'progStudi' => $this->input->post('progStudi',TRUE),
		'thnLulus' => $this->input->post('thnLulus',TRUE),
		'noIjazah' => $this->input->post('noIjazah',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'jenjang' => $this->input->post('jenjang',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'Up_fcIjazahLegalisir' => $this->input->post('Up_fcIjazahLegalisir',TRUE),
		'Up_dtPendidikan' => $this->input->post('Up_dtPendidikan',TRUE),
		'Up_suratKeterangan' => $this->input->post('Up_suratKeterangan',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->Pendidikan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pendidikan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pendidikan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pendidikan/update_action'),
		'kd_step3' => set_value('kd_step3', $row->kd_step3),
		'nm_sekolah' => set_value('nm_sekolah', $row->nm_sekolah),
		'progStudi' => set_value('progStudi', $row->progStudi),
		'thnLulus' => set_value('thnLulus', $row->thnLulus),
		'noIjazah' => set_value('noIjazah', $row->noIjazah),
		'alamat' => set_value('alamat', $row->alamat),
		'jenjang' => set_value('jenjang', $row->jenjang),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kota' => set_value('kota', $row->kota),
		'Up_fcIjazahLegalisir' => set_value('Up_fcIjazahLegalisir', $row->Up_fcIjazahLegalisir),
		'Up_dtPendidikan' => set_value('Up_dtPendidikan', $row->Up_dtPendidikan),
		'Up_suratKeterangan' => set_value('Up_suratKeterangan', $row->Up_suratKeterangan),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'program_name' => set_value('program_name', $row->program_name),
	    );
            $this->load->view('pendidikan/step_3_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendidikan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_step3', TRUE));
        } else {
            $data = array(
		'nm_sekolah' => $this->input->post('nm_sekolah',TRUE),
		'progStudi' => $this->input->post('progStudi',TRUE),
		'thnLulus' => $this->input->post('thnLulus',TRUE),
		'noIjazah' => $this->input->post('noIjazah',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'jenjang' => $this->input->post('jenjang',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'Up_fcIjazahLegalisir' => $this->input->post('Up_fcIjazahLegalisir',TRUE),
		'Up_dtPendidikan' => $this->input->post('Up_dtPendidikan',TRUE),
		'Up_suratKeterangan' => $this->input->post('Up_suratKeterangan',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->Pendidikan_model->update($this->input->post('kd_step3', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pendidikan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pendidikan_model->get_by_id($id);

        if ($row) {
            $this->Pendidikan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pendidikan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendidikan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_sekolah', 'nm sekolah', 'trim|required');
	$this->form_validation->set_rules('progStudi', 'progstudi', 'trim|required');
	$this->form_validation->set_rules('thnLulus', 'thnlulus', 'trim|required');
	$this->form_validation->set_rules('noIjazah', 'noijazah', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('jenjang', 'jenjang', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('Up_fcIjazahLegalisir', 'up fcijazahlegalisir', 'trim|required');
	$this->form_validation->set_rules('Up_dtPendidikan', 'up dtpendidikan', 'trim|required');
	$this->form_validation->set_rules('Up_suratKeterangan', 'up suratketerangan', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('program_name', 'program name', 'trim|required');

	$this->form_validation->set_rules('kd_step3', 'kd_step3', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "step_3.xls";
        $judul = "step_3";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Sekolah");
	xlsWriteLabel($tablehead, $kolomhead++, "ProgStudi");
	xlsWriteLabel($tablehead, $kolomhead++, "ThnLulus");
	xlsWriteLabel($tablehead, $kolomhead++, "NoIjazah");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenjang");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Up FcIjazahLegalisir");
	xlsWriteLabel($tablehead, $kolomhead++, "Up DtPendidikan");
	xlsWriteLabel($tablehead, $kolomhead++, "Up SuratKeterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Name");

	foreach ($this->Pendidikan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->progStudi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->thnLulus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->noIjazah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenjang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Up_fcIjazahLegalisir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Up_dtPendidikan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Up_suratKeterangan);
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

/* End of file Pendidikan.php */
/* Location: ./application/controllers/Pendidikan.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:30:00 */