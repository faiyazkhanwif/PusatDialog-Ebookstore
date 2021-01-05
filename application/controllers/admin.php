<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$type = $this->session->userdata('type');
		if($type != 'A')
		{
			$this->session->set_flashdata('no_access', '<i class="fas fa-exclamation-triangle"></i> You are not allowed or not logged in! Please Log in with an admin account');
			redirect('users/login');
		}
		
	}

/*=============== Admin Index Page =================*/
	public function index()
	{
		$this->load->model('admin_model');
		
		$view['admin_view'] = "admin/admin_index";
		$this->load->view('layouts/admin_layout', $view);
	}
/*======================================================


/*==================================================
					USERS
====================================================*/

/*============= Display all Users ================*/
	public function allUsers()
	{
		$this->load->model('admin_model');
		$view['users_data'] = $this->admin_model->get_users();

		$view['admin_view'] = "admin/view_users";
		$this->load->view('layouts/admin_layout', $view);
	}
/*=============== ADD Users By admin ===============*/
	public function add_users()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_dash|min_length[3]');
		$this->form_validation->set_rules('repassword', 'Confirm Password',
		'trim|required|alpha_dash|min_length[3]|matches[password]');
		$this->form_validation->set_rules('type', 'Type','trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[80]|strip_tags[address]');
		$this->form_validation->set_rules('city', 'City', 'trim|required|alpha_numeric_spaces');


		if($this->form_validation->run() == FALSE)
		{
			$view['admin_view'] = "admin/add_users";
			$this->load->view('layouts/admin_layout', $view);
		}
		else
		{
			$this->load->model('admin_model');

			if($this->admin_model->add_user())
			{
				$this->session->set_flashdata('success', 'User Registration is successful.');
				redirect('admin/allUsers');
			}
			else
			{
				print $this->db->error();
			}

		}
	}
/*=============== Delete User =================*/
	public function user_delete($id)
	{
		$this->load->model('admin_model');
		$this->admin_model->delete_user($id);

		$this->session->set_flashdata('success', '<i class= "fas fa-trash text-danger"></i> User deleted successfully.');
		redirect('admin/allUsers');
	}





}
