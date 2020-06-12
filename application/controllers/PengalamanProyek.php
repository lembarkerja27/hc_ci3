<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PengalamanProyek extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('PengalamanProyek_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('pengalamanproyek/step_5_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->PengalamanProyek_model->json();
    }

    public function read($id) 
    {
        $row = $this->PengalamanProyek_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_step5' => $row->kd_step5,
		'nm_proyek' => $row->nm_proyek,
		'tanggalMulai' => $row->tanggalMulai,
		'tanggalAkhir' => $row->tanggalAkhir,
		'jabatan' => $row->jabatan,
		'lokasi_proyek' => $row->lokasi_proyek,
		'nilai_proyek' => $row->nilai_proyek,
		'Up_persyaratanPengalamanProyek' => $row->Up_persyaratanPengalamanProyek,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'program_name' => $row->program_name,
	    );
            $this->load->view('pengalamanproyek/step_5_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengalamanproyek'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengalamanproyek/create_action'),
	    'kd_step5' => set_value('kd_step5'),
	    'nm_proyek' => set_value('nm_proyek'),
	    'tanggalMulai' => set_value('tanggalMulai'),
	    'tanggalAkhir' => set_value('tanggalAkhir'),
	    'jabatan' => set_value('jabatan'),
	    'lokasi_proyek' => set_value('lokasi_proyek'),
	    'nilai_proyek' => set_value('nilai_proyek'),
	    'Up_persyaratanPengalamanProyek' => set_value('Up_persyaratanPengalamanProyek'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'program_name' => set_value('program_name'),
	);
        $this->load->view('pengalamanproyek/step_5_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_proyek' => $this->input->post('nm_proyek',TRUE),
		'tanggalMulai' => $this->input->post('tanggalMulai',TRUE),
		'tanggalAkhir' => $this->input->post('tanggalAkhir',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'lokasi_proyek' => $this->input->post('lokasi_proyek',TRUE),
		'nilai_proyek' => $this->input->post('nilai_proyek',TRUE),
		'Up_persyaratanPengalamanProyek' => $this->input->post('Up_persyaratanPengalamanProyek',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->PengalamanProyek_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengalamanproyek'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->PengalamanProyek_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengalamanproyek/update_action'),
		'kd_step5' => set_value('kd_step5', $row->kd_step5),
		'nm_proyek' => set_value('nm_proyek', $row->nm_proyek),
		'tanggalMulai' => set_value('tanggalMulai', $row->tanggalMulai),
		'tanggalAkhir' => set_value('tanggalAkhir', $row->tanggalAkhir),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'lokasi_proyek' => set_value('lokasi_proyek', $row->lokasi_proyek),
		'nilai_proyek' => set_value('nilai_proyek', $row->nilai_proyek),
		'Up_persyaratanPengalamanProyek' => set_value('Up_persyaratanPengalamanProyek', $row->Up_persyaratanPengalamanProyek),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'program_name' => set_value('program_name', $row->program_name),
	    );
            $this->load->view('pengalamanproyek/step_5_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengalamanproyek'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_step5', TRUE));
        } else {
            $data = array(
		'nm_proyek' => $this->input->post('nm_proyek',TRUE),
		'tanggalMulai' => $this->input->post('tanggalMulai',TRUE),
		'tanggalAkhir' => $this->input->post('tanggalAkhir',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'lokasi_proyek' => $this->input->post('lokasi_proyek',TRUE),
		'nilai_proyek' => $this->input->post('nilai_proyek',TRUE),
		'Up_persyaratanPengalamanProyek' => $this->input->post('Up_persyaratanPengalamanProyek',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->PengalamanProyek_model->update($this->input->post('kd_step5', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengalamanproyek'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->PengalamanProyek_model->get_by_id($id);

        if ($row) {
            $this->PengalamanProyek_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengalamanproyek'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengalamanproyek'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_proyek', 'nm proyek', 'trim|required');
	$this->form_validation->set_rules('tanggalMulai', 'tanggalmulai', 'trim|required');
	$this->form_validation->set_rules('tanggalAkhir', 'tanggalakhir', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('lokasi_proyek', 'lokasi proyek', 'trim|required');
	$this->form_validation->set_rules('nilai_proyek', 'nilai proyek', 'trim|required');
	$this->form_validation->set_rules('Up_persyaratanPengalamanProyek', 'up persyaratanpengalamanproyek', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('program_name', 'program name', 'trim|required');

	$this->form_validation->set_rules('kd_step5', 'kd_step5', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "step_5.xls";
        $judul = "step_5";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Proyek");
	xlsWriteLabel($tablehead, $kolomhead++, "TanggalMulai");
	xlsWriteLabel($tablehead, $kolomhead++, "TanggalAkhir");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Lokasi Proyek");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Proyek");
	xlsWriteLabel($tablehead, $kolomhead++, "Up PersyaratanPengalamanProyek");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Name");

	foreach ($this->PengalamanProyek_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_proyek);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggalMulai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggalAkhir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi_proyek);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_proyek);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Up_persyaratanPengalamanProyek);
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

/* End of file PengalamanProyek.php */
/* Location: ./application/controllers/PengalamanProyek.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:31:13 */