<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_project extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_project_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_project/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_project/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_project/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_project_model->total_rows($q);
        $tbl_project = $this->Tbl_project_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_project_data' => $tbl_project,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_project/tbl_project_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_project_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_project' => $row->id_project,
            'nama_project' => $row->nama_project,
            'pic' => $row->pic,
            'status_approval' => $row->status_approval,
            'status_bonus' => $row->status_bonus,
            'tanggal_mulai' => $row->tanggal_mulai,
            'tanggal_selesai' => $row->tanggal_selesai,
	    );
            $this->template->load('template','tbl_project/tbl_project_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_project'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_project/create_action'),
	    'id_project' => set_value('id_project'),
	    'nama_project' => set_value('nama_project'),
	    'pic' => set_value('pic'),
	    'status_approval' => set_value('status_approval'),
	    'status_bonus' => set_value('status_bonus'),
	    'tanggal_mulai' => set_value('tanggal_mulai'),
	    'tanggal_selesai' => set_value('tanggal_selesai'),
	);
        $this->template->load('template','tbl_project/tbl_project_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'nama_project' => $this->input->post('nama_project',TRUE),
            'pic' => $this->input->post('pic',TRUE),
            'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
	    );

            $this->Tbl_project_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success !');
            redirect(site_url('tbl_project'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_project_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_project/update_action'),
                'id_project' => set_value('id_project', $row->id_project),
                'nama_project' => set_value('nama_project', $row->nama_project),
                'pic' => set_value('pic', $row->pic),
                'status_approval' => set_value('status_approval', $row->status_approval),
                'status_bonus' => set_value('status_bonus', $row->status_bonus),
                'tanggal_mulai' => set_value('tanggal_mulai', $row->tanggal_mulai),
                'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
	    );
            $this->template->load('template','tbl_project/tbl_project_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_project'));
        }
    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_project', TRUE));
        } else {
            $data = array(
		'nama_project' => $this->input->post('nama_project',TRUE),
		'pic' => $this->input->post('pic',TRUE),
		'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
	    );

            $this->Tbl_project_model->update($this->input->post('id_project', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_project'));
        }
    }

    public function update_manager($id) 
    {
        $row = $this->Tbl_project_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Approval',
                'action' => site_url('tbl_project/update_manager_action'),
                'id_project' => set_value('id_project', $row->id_project),
                'nama_project' => set_value('nama_project', $row->nama_project),
                'pic' => set_value('pic', $row->pic),
                'status_approval' => set_value('status_approval', $row->status_approval),
                'status_bonus' => set_value('status_bonus', $row->status_bonus),
                'tanggal_mulai' => set_value('tanggal_mulai', $row->tanggal_mulai),
                'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
	    );
            $this->template->load('template','tbl_project/tbl_project_form_manager', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_project'));
        }
    }
    
    public function update_manager_action() 
    {
        
        $data = array(
		    'status_approval' => $this->input->post('status_approval',TRUE),
            'tanggal_approval' => date('Y-m-d'),
            'tanggal_selesai' => date('Y-m-d'),
	    );

            $this->Tbl_project_model->update($this->input->post('id_project', TRUE), $data);
            $this->session->set_flashdata('message', 'Approval Success');
            redirect(site_url('tbl_project'));
    }

    public function update_hrd($id) 
    {
        $row = $this->Tbl_project_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Approval',
                'action' => site_url('tbl_project/update_hrd_action'),
                'id_project' => set_value('id_project', $row->id_project),
                'nama_project' => set_value('nama_project', $row->nama_project),
                'pic' => set_value('pic', $row->pic),
                'status_approval' => set_value('status_approval', $row->status_approval),
                'status_bonus' => set_value('status_bonus', $row->status_bonus),
                'tanggal_mulai' => set_value('tanggal_mulai', $row->tanggal_mulai),
                'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
	    );
            $this->template->load('template','tbl_project/tbl_project_form_hrd', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_project'));
        }
    }
    
    public function update_hrd_action() 
    {
        
        $data = array(
		    'status_bonus' => $this->input->post('status_bonus',TRUE),
            'tanggal_bonus' => date('Y-m-d'),
	    );

            $this->Tbl_project_model->update($this->input->post('id_project', TRUE), $data);
            $this->session->set_flashdata('message', 'Approval Success');
            redirect(site_url('tbl_project'));
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_project_model->get_by_id($id);

        if ($row) {
            $this->Tbl_project_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_project'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_project'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_project', 'nama project', 'trim|required');
	$this->form_validation->set_rules('pic', 'pic', 'trim|required');
	//$this->form_validation->set_rules('status_approval', 'status approval', 'trim|required');
	//$this->form_validation->set_rules('status_bonus', 'status bonus', 'trim|required');
	$this->form_validation->set_rules('tanggal_mulai', 'tanggal mulai', 'trim|required');
	//$this->form_validation->set_rules('tanggal_selesai', 'tanggal selesai', 'trim|required');

	$this->form_validation->set_rules('id_project', 'id_project', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_project.php */
/* Location: ./application/controllers/Tbl_project.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-09-25 03:19:35 */
/* http://harviacode.com */