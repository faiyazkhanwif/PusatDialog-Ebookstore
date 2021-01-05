<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$type = $this->session->userdata('type');
		if($type != 'U')
		{
			$this->session->set_flashdata('no_access', '<i class="fas fa-exclamation-triangle"></i> You are not allowed or not logged in! Please Log in with an user account.');
			redirect('users/login');
		}
	}

	public function index()
	{
		#Loading dynamic category between U and A.
		$this->load->model('admin_model');


		#Getting User Info.
		$id = $this->session->userdata('id');
		$this->load->model('user_model');
		$view['user_details'] = $this->user_model->get_user_details($id);


		$view['user_view'] = "users/user_index";
		$this->load->view('layouts/user_account', $view);
	}

	

	public function edit_profile($id)
	{
		#Loading dynamic category between U and A.
		$this->load->model('admin_model');

		#getting and loading existing informations
		$this->load->model('user_model');
		$view['user_details'] = $this->user_model->get_user_details($id);

		$this->form_validation->set_rules('name', 'Name', 'trim|required|strip_tags[name]');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required|numeric|strip_tags[contact]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_dash|min_length[3]');
		$this->form_validation->set_rules('repassword', 'Confirm Password',
		'trim|required|alpha_dash|min_length[3]|matches[password]');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[80]|strip_tags[address]');

		$this->form_validation->set_rules('city', 'City', 'trim|required|strip_tags[city]');

		if($this->form_validation->run() == FALSE)
		{
			if($this->user_model->get_user_details($id))
			{
				$view['user_view'] = "users/edit_profile";
				$this->load->view('layouts/user_account', $view);
			}
			else
			{
				$view['user_view'] = "include/404page";
				$this->load->view('layouts/user_account', $view);
			}
		}
		else
		{
			$this->load->model('user_model');

			if($this->user_model->edit_profile($id, $data))
			{
				$this->session->set_flashdata('success', 'Your profile information is updated successfully.');
				redirect('user_home');
			}
			else
			{
				print $this->db->error();
			}
		}
	}

}