<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function userProfile() {
    	$this->load->model('User_model');

    	if ($this->session->userdata('logged_in')) {
			$data['username'] = $this->session->userdata('username');
			$data['user_info'] = $this->User_model->getUserInfo($this->session->userdata('userId'));
			$data['rooms'] = $this->User_model->getRoomInfo($this->session->userdata('userId'));
			$data['flats'] = $this->User_model->getFlatInfo($this->session->userdata('userId'));

			$this->load->view('templates/headerUser', $data);
			$this->load->view('userProfileView', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('home');
		}
    }

    public function addFlatRoom() {
		if ($this->session->userdata('logged_in')) {
			$data['username'] = $this->session->userdata('username');
			$this->load->view('templates/headerUser', $data);
			$this->load->view('userPanel');
			$this->load->view('templates/footer');
		}
		else {
			redirect('home');
		}
	}

	public function addFlat() {
		$rules = array(
				array(
					'field' => 'ADDRESS',
					'label' => 'Apartment Address',
					'rules' => 'required'
					),
				array(
					'field' => 'POSTAL_CODE',
					'label' => 'Postal Code',
					'rules' => 'required'
					),
				array(
					'field' => 'SQ_FEET',
					'label' => 'Total Square Feet',
					'rules' => 'required'
					),
				array(
					'field' => 'NUMBER_OF_BEDROOM',
					'label' => '# of Bedrooms',
					'rules' => 'required'
					),
				array(
					'field' => 'NUMBER_OF_WASHROOM',
					'label' => '',
					'rules' => ''
					),
				array(
					'field' => 'NUMBER_OF_BALCONY',
					'label' => '',
					'rules' => ''
					),
				array(
					'field' => 'BASE_RENT',
					'label' => 'Rent',
					'rules' => 'required'
					),
				array(
					'field' => 'SERVICE_CHARGE',
					'label' => '',
					'rules' => ''
					),
				array(
					'field' => 'ADVANCE',
					'label' => 'Advance',
					'rules' => 'required'
					),
				array(
					'field' => 'TERMS',
					'label' => '',
					'rules' => ''
					),
				array(
					'field' => 'checkboxValues',
					'label' => '',
					'rules' => ''
					),
			);
		$this->form_validation->set_rules($rules);
		

		if ($this->session->userdata('logged_in')) {
			$data['username'] = $this->session->userdata('username');
			$this->load->view('templates/headerUser', $data);

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('addapartment');
			}
			else {
				$data = $this->input->post_values($rules);
				$data['userId'] = $this->session->userdata('userId');
				$this->User_model->addFlatDb($data);
				$this->load->view('addSuccess');
			}
			$this->load->view('templates/footer');
		}
		else {
			redirect('home');
		}
	}

	public function addRoom() {
		$rules = array(
				array(
					'field' => 'ADDRESS',
					'label' => 'Apartment Address',
					'rules' => 'required'
					),
				array(
					'field' => 'POSTAL_CODE',
					'label' => 'Postal Code',
					'rules' => 'required'
					),
				array(
					'field' => 'NUMBER_OF_MEMBERS',
					'label' => 'Number of Members',
					'rules' => 'required'
					),
				array(
					'field' => 'BASE_RENT',
					'label' => 'Rent',
					'rules' => 'required'
					),
				array(
					'field' => 'SERVICE_CHARGE',
					'label' => '',
					'rules' => ''
					),
				array(
					'field' => 'WIFI_CHARGE',
					'label' => '',
					'rules' => ''
					),
				array(
					'field' => 'ADVANCE',
					'label' => 'Advance',
					'rules' => 'required'
					),
				array(
					'field' => 'TERMS',
					'label' => '',
					'rules' => ''
					),
				array(
					'field' => 'checkboxValues',
					'label' => '',
					'rules' => ''
					),
			);
		$this->form_validation->set_rules($rules);
		

		if ($this->session->userdata('logged_in')) {
			$data['username'] = $this->session->userdata('username');
			$this->load->view('templates/headerUser', $data);

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('addroom');
			}
			else {
				$data = $this->input->post_values($rules);
				$data['userId'] = $this->session->userdata('userId');
				$this->User_model->addRoomDb($data);
				$this->load->view('addSuccess');
			}
			$this->load->view('templates/footer');
		}
		else {
			redirect('home');
		}
	}
}