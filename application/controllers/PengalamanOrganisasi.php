<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PengalamanOrganisasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('PengalamanOrganisasi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('pengalamanorganisasi/step_6_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->PengalamanOrganisasi_model->json();
    }

    public function read($id) 
    {
        $row = $this->PengalamanOrganisasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_step6' => $row->kd_step6,
		'nm_instansi' => $row->nm_instansi,
		'alamat' => $row->alamat,
		'tanggalMulai' => $row->tanggalMulai,
		'tanggalAkhir' => $row->tanggalAkhir,
		'jabatan' => $row->jabatan,
		'desk_pekerjaan' => $row->desk_pekerjaan,
		'jenis_instansi' => $row->jenis_instansi,
		'Up_persratanPengalamanOrganisasi' => $row->Up_persratanPengalamanOrganisasi,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'program_name' => $row->program_name,
	    );
            $this->load->view('pengalamanorganisasi/step_6_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengalamanorganisasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengalamanorganisasi/create_action'),
	    'kd_step6' => set_value('kd_step6'),
	    'nm_instansi' => set_value('nm_instansi'),
	    'alamat' => set_value('alamat'),
	    'tanggalMulai' => set_value('tanggalMulai'),
	    'tanggalAkhir' => set_value('tanggalAkhir'),
	    'jabatan' => set_value('jabatan'),
	    'desk_pekerjaan' => set_value('desk_pekerjaan'),
	    'jenis_instansi' => set_value('jenis_instansi'),
	    'Up_persratanPengalamanOrganisasi' => set_value('Up_persratanPengalamanOrganisasi'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'program_name' => set_value('program_name'),
	);
        $this->load->view('pengalamanorganisasi/step_6_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_instansi' => $this->input->post('nm_instansi',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tanggalMulai' => $this->input->post('tanggalMulai',TRUE),
		'tanggalAkhir' => $this->input->post('tanggalAkhir',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'desk_pekerjaan' => $this->input->post('desk_pekerjaan',TRUE),
		'jenis_instansi' => $this->input->post('jenis_instansi',TRUE),
		'Up_persratanPengalamanOrganisasi' => $this->input->post('Up_persratanPengalamanOrganisasi',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->PengalamanOrganisasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengalamanorganisasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->PengalamanOrganisasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengalamanorganisasi/update_action'),
		'kd_step6' => set_value('kd_step6', $row->kd_step6),
		'nm_instansi' => set_value('nm_instansi', $row->nm_instansi),
		'alamat' => set_value('alamat', $row->alamat),
		'tanggalMulai' => set_value('tanggalMulai', $row->tanggalMulai),
		'tanggalAkhir' => set_value('tanggalAkhir', $row->tanggalAkhir),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'desk_pekerjaan' => set_value('desk_pekerjaan', $row->desk_pekerjaan),
		'jenis_instansi' => set_value('jenis_instansi', $row->jenis_instansi),
		'Up_persratanPengalamanOrganisasi' => set_value('Up_persratanPengalamanOrganisasi', $row->Up_persratanPengalamanOrganisasi),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'program_name' => set_value('program_name', $row->program_name),
	    );
            $this->load->view('pengalamanorganisasi/step_6_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengalamanorganisasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_step6', TRUE));
        } else {
            $data = array(
		'nm_instansi' => $this->input->post('nm_instansi',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tanggalMulai' => $this->input->post('tanggalMulai',TRUE),
		'tanggalAkhir' => $this->input->post('tanggalAkhir',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'desk_pekerjaan' => $this->input->post('desk_pekerjaan',TRUE),
		'jenis_instansi' => $this->input->post('jenis_instansi',TRUE),
		'Up_persratanPengalamanOrganisasi' => $this->input->post('Up_persratanPengalamanOrganisasi',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->PengalamanOrganisasi_model->update($this->input->post('kd_step6', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengalamanorganisasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->PengalamanOrganisasi_model->get_by_id($id);

        if ($row) {
            $this->PengalamanOrganisasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengalamanorganisasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengalamanorganisasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_instansi', 'nm instansi', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('tanggalMulai', 'tanggalmulai', 'trim|required');
	$this->form_validation->set_rules('tanggalAkhir', 'tanggalakhir', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('desk_pekerjaan', 'desk pekerjaan', 'trim|required');
	$this->form_validation->set_rules('jenis_instansi', 'jenis instansi', 'trim|required');
	$this->form_validation->set_rules('Up_persratanPengalamanOrganisasi', 'up persratanpengalamanorganisasi', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('program_name', 'program name', 'trim|required');

	$this->form_validation->set_rules('kd_step6', 'kd_step6', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "step_6.xls";
        $judul = "step_6";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Instansi");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "TanggalMulai");
	xlsWriteLabel($tablehead, $kolomhead++, "TanggalAkhir");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Desk Pekerjaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Instansi");
	xlsWriteLabel($tablehead, $kolomhead++, "Up PersratanPengalamanOrganisasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Name");

	foreach ($this->PengalamanOrganisasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_instansi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggalMulai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggalAkhir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->desk_pekerjaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_instansi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Up_persratanPengalamanOrganisasi);
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

/* End of file PengalamanOrganisasi.php */
/* Location: ./application/controllers/PengalamanOrganisasi.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:32:03 */