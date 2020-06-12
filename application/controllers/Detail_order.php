<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_order_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('detail_order/tbl_detail_order_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Detail_order_model->json();
    }

    public function read($id) 
    {
        $row = $this->Detail_order_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'order_id' => $row->order_id,
		'produk' => $row->produk,
		'qty' => $row->qty,
		'harga' => $row->harga,
	    );
            $this->load->view('detail_order/tbl_detail_order_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_order'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_order/create_action'),
	    'id' => set_value('id'),
	    'order_id' => set_value('order_id'),
	    'produk' => set_value('produk'),
	    'qty' => set_value('qty'),
	    'harga' => set_value('harga'),
	);
        $this->load->view('detail_order/tbl_detail_order_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'order_id' => $this->input->post('order_id',TRUE),
		'produk' => $this->input->post('produk',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Detail_order_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_order'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_order_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_order/update_action'),
		'id' => set_value('id', $row->id),
		'order_id' => set_value('order_id', $row->order_id),
		'produk' => set_value('produk', $row->produk),
		'qty' => set_value('qty', $row->qty),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->load->view('detail_order/tbl_detail_order_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_order'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'order_id' => $this->input->post('order_id',TRUE),
		'produk' => $this->input->post('produk',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Detail_order_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_order'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_order_model->get_by_id($id);

        if ($row) {
            $this->Detail_order_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_order'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_order'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('order_id', 'order id', 'trim|required');
	$this->form_validation->set_rules('produk', 'produk', 'trim|required');
	$this->form_validation->set_rules('qty', 'qty', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_detail_order.xls";
        $judul = "tbl_detail_order";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Order Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Produk");
	xlsWriteLabel($tablehead, $kolomhead++, "Qty");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");

	foreach ($this->Detail_order_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->order_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->produk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->qty);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Detail_order.php */
/* Location: ./application/controllers/Detail_order.php */
/* Please DO NOT modify this information : */
/* by Vicky Arisandy 2020-06-12 06:10:02 */