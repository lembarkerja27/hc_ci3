<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('produk/tbl_produk_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Produk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Produk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_produk' => $row->id_produk,
		'nama_produk' => $row->nama_produk,
		'deskripsi' => $row->deskripsi,
		'harga' => $row->harga,
		'gambar' => $row->gambar,
		'kategori' => $row->kategori,
	    );
            $this->load->view('produk/tbl_produk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produk/create_action'),
	    'id_produk' => set_value('id_produk'),
	    'nama_produk' => set_value('nama_produk'),
	    'deskripsi' => set_value('deskripsi'),
	    'harga' => set_value('harga'),
	    'gambar' => set_value('gambar'),
	    'kategori' => set_value('kategori'),
	);
        $this->load->view('produk/tbl_produk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_produk' => $this->input->post('nama_produk',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Produk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produk/update_action'),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'nama_produk' => set_value('nama_produk', $row->nama_produk),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'harga' => set_value('harga', $row->harga),
		'gambar' => set_value('gambar', $row->gambar),
		'kategori' => set_value('kategori', $row->kategori),
	    );
            $this->load->view('produk/tbl_produk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_produk', TRUE));
        } else {
            $data = array(
		'nama_produk' => $this->input->post('nama_produk',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Produk_model->update($this->input->post('id_produk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $this->Produk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');

	$this->form_validation->set_rules('id_produk', 'id_produk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_produk.xls";
        $judul = "tbl_produk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Produk");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Kategori");

	foreach ($this->Produk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_produk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kategori);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:03:36 */