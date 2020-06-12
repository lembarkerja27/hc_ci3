<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class KlasifikasiKualifikasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('KlasifikasiKualifikasi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('klasifikasikualifikasi/step_2_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->KlasifikasiKualifikasi_model->json();
    }

    public function read($id) 
    {
        $row = $this->KlasifikasiKualifikasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_step2' => $row->kd_step2,
		'tglPemohon' => $row->tglPemohon,
		'Bidang' => $row->Bidang,
		'noRegisterAssoc' => $row->noRegisterAssoc,
		'tempat_upstk' => $row->tempat_upstk,
		'kualifikasi' => $row->kualifikasi,
		'subBidang' => $row->subBidang,
		'provinsi' => $row->provinsi,
		'jenis_permohonan' => $row->jenis_permohonan,
		'Up_beritaAcara' => $row->Up_beritaAcara,
		'Up_suratPengantar' => $row->Up_suratPengantar,
		'Up_penilaianMandiri' => $row->Up_penilaianMandiri,
		'Up_suratPermohonan' => $row->Up_suratPermohonan,
		'Up_fcSertifikatKeahlian' => $row->Up_fcSertifikatKeahlian,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'program_name' => $row->program_name,
	    );
            $this->load->view('klasifikasikualifikasi/step_2_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasikualifikasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('klasifikasikualifikasi/create_action'),
	    'kd_step2' => set_value('kd_step2'),
	    'tglPemohon' => set_value('tglPemohon'),
	    'Bidang' => set_value('Bidang'),
	    'noRegisterAssoc' => set_value('noRegisterAssoc'),
	    'tempat_upstk' => set_value('tempat_upstk'),
	    'kualifikasi' => set_value('kualifikasi'),
	    'subBidang' => set_value('subBidang'),
	    'provinsi' => set_value('provinsi'),
	    'jenis_permohonan' => set_value('jenis_permohonan'),
	    'Up_beritaAcara' => set_value('Up_beritaAcara'),
	    'Up_suratPengantar' => set_value('Up_suratPengantar'),
	    'Up_penilaianMandiri' => set_value('Up_penilaianMandiri'),
	    'Up_suratPermohonan' => set_value('Up_suratPermohonan'),
	    'Up_fcSertifikatKeahlian' => set_value('Up_fcSertifikatKeahlian'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'program_name' => set_value('program_name'),
	);
        $this->load->view('klasifikasikualifikasi/step_2_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tglPemohon' => $this->input->post('tglPemohon',TRUE),
		'Bidang' => $this->input->post('Bidang',TRUE),
		'noRegisterAssoc' => $this->input->post('noRegisterAssoc',TRUE),
		'tempat_upstk' => $this->input->post('tempat_upstk',TRUE),
		'kualifikasi' => $this->input->post('kualifikasi',TRUE),
		'subBidang' => $this->input->post('subBidang',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'jenis_permohonan' => $this->input->post('jenis_permohonan',TRUE),
		'Up_beritaAcara' => $this->input->post('Up_beritaAcara',TRUE),
		'Up_suratPengantar' => $this->input->post('Up_suratPengantar',TRUE),
		'Up_penilaianMandiri' => $this->input->post('Up_penilaianMandiri',TRUE),
		'Up_suratPermohonan' => $this->input->post('Up_suratPermohonan',TRUE),
		'Up_fcSertifikatKeahlian' => $this->input->post('Up_fcSertifikatKeahlian',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->KlasifikasiKualifikasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('klasifikasikualifikasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->KlasifikasiKualifikasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('klasifikasikualifikasi/update_action'),
		'kd_step2' => set_value('kd_step2', $row->kd_step2),
		'tglPemohon' => set_value('tglPemohon', $row->tglPemohon),
		'Bidang' => set_value('Bidang', $row->Bidang),
		'noRegisterAssoc' => set_value('noRegisterAssoc', $row->noRegisterAssoc),
		'tempat_upstk' => set_value('tempat_upstk', $row->tempat_upstk),
		'kualifikasi' => set_value('kualifikasi', $row->kualifikasi),
		'subBidang' => set_value('subBidang', $row->subBidang),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'jenis_permohonan' => set_value('jenis_permohonan', $row->jenis_permohonan),
		'Up_beritaAcara' => set_value('Up_beritaAcara', $row->Up_beritaAcara),
		'Up_suratPengantar' => set_value('Up_suratPengantar', $row->Up_suratPengantar),
		'Up_penilaianMandiri' => set_value('Up_penilaianMandiri', $row->Up_penilaianMandiri),
		'Up_suratPermohonan' => set_value('Up_suratPermohonan', $row->Up_suratPermohonan),
		'Up_fcSertifikatKeahlian' => set_value('Up_fcSertifikatKeahlian', $row->Up_fcSertifikatKeahlian),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'program_name' => set_value('program_name', $row->program_name),
	    );
            $this->load->view('klasifikasikualifikasi/step_2_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasikualifikasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_step2', TRUE));
        } else {
            $data = array(
		'tglPemohon' => $this->input->post('tglPemohon',TRUE),
		'Bidang' => $this->input->post('Bidang',TRUE),
		'noRegisterAssoc' => $this->input->post('noRegisterAssoc',TRUE),
		'tempat_upstk' => $this->input->post('tempat_upstk',TRUE),
		'kualifikasi' => $this->input->post('kualifikasi',TRUE),
		'subBidang' => $this->input->post('subBidang',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'jenis_permohonan' => $this->input->post('jenis_permohonan',TRUE),
		'Up_beritaAcara' => $this->input->post('Up_beritaAcara',TRUE),
		'Up_suratPengantar' => $this->input->post('Up_suratPengantar',TRUE),
		'Up_penilaianMandiri' => $this->input->post('Up_penilaianMandiri',TRUE),
		'Up_suratPermohonan' => $this->input->post('Up_suratPermohonan',TRUE),
		'Up_fcSertifikatKeahlian' => $this->input->post('Up_fcSertifikatKeahlian',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'program_name' => $this->input->post('program_name',TRUE),
	    );

            $this->KlasifikasiKualifikasi_model->update($this->input->post('kd_step2', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('klasifikasikualifikasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->KlasifikasiKualifikasi_model->get_by_id($id);

        if ($row) {
            $this->KlasifikasiKualifikasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('klasifikasikualifikasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasikualifikasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tglPemohon', 'tglpemohon', 'trim|required');
	$this->form_validation->set_rules('Bidang', 'bidang', 'trim|required');
	$this->form_validation->set_rules('noRegisterAssoc', 'noregisterassoc', 'trim|required');
	$this->form_validation->set_rules('tempat_upstk', 'tempat upstk', 'trim|required');
	$this->form_validation->set_rules('kualifikasi', 'kualifikasi', 'trim|required');
	$this->form_validation->set_rules('subBidang', 'subbidang', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('jenis_permohonan', 'jenis permohonan', 'trim|required');
	$this->form_validation->set_rules('Up_beritaAcara', 'up beritaacara', 'trim|required');
	$this->form_validation->set_rules('Up_suratPengantar', 'up suratpengantar', 'trim|required');
	$this->form_validation->set_rules('Up_penilaianMandiri', 'up penilaianmandiri', 'trim|required');
	$this->form_validation->set_rules('Up_suratPermohonan', 'up suratpermohonan', 'trim|required');
	$this->form_validation->set_rules('Up_fcSertifikatKeahlian', 'up fcsertifikatkeahlian', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('program_name', 'program name', 'trim|required');

	$this->form_validation->set_rules('kd_step2', 'kd_step2', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "step_2.xls";
        $judul = "step_2";
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
	xlsWriteLabel($tablehead, $kolomhead++, "TglPemohon");
	xlsWriteLabel($tablehead, $kolomhead++, "Bidang");
	xlsWriteLabel($tablehead, $kolomhead++, "NoRegisterAssoc");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Upstk");
	xlsWriteLabel($tablehead, $kolomhead++, "Kualifikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "SubBidang");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Permohonan");
	xlsWriteLabel($tablehead, $kolomhead++, "Up BeritaAcara");
	xlsWriteLabel($tablehead, $kolomhead++, "Up SuratPengantar");
	xlsWriteLabel($tablehead, $kolomhead++, "Up PenilaianMandiri");
	xlsWriteLabel($tablehead, $kolomhead++, "Up SuratPermohonan");
	xlsWriteLabel($tablehead, $kolomhead++, "Up FcSertifikatKeahlian");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Name");

	foreach ($this->KlasifikasiKualifikasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tglPemohon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Bidang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->noRegisterAssoc);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_upstk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kualifikasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->subBidang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_permohonan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Up_beritaAcara);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Up_suratPengantar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Up_penilaianMandiri);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Up_suratPermohonan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Up_fcSertifikatKeahlian);
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

/* End of file KlasifikasiKualifikasi.php */
/* Location: ./application/controllers/KlasifikasiKualifikasi.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:28:25 */