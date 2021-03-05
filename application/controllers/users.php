<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		
		$this->load->model('admin_model');
	
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|strip_tags[name]');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',
				array(
					'required' => 'Email field can not be left empty.',
					'is_unique' => 'This email is already registered.')
			);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_dash|min_length[3]');
		$this->form_validation->set_rules('repassword', 'Confirm Password',
		'trim|required|alpha_dash|min_length[3]|matches[password]');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|strip_tags[address]');
		$this->form_validation->set_rules('city', 'City', 'trim|required|strip_tags[city]');
		$this->form_validation->set_rules('conditionBox', 'Check box', 'trim|required',
				array('required' => 'This box has to be checked in order to continue.')
		);


		if($this->form_validation->run() == FALSE)
		{
			
			$this->load->model('admin_model');

			$view['user_view'] = "users/reg";
			$this->load->view('layouts/user_loginregister', $view);
		}
		else
		{
			$this->load->model('user_model');

			if($this->user_model->register_user())
			{
				$this->session->set_flashdata('reg_success', 'Your account has been created successfully.');
				redirect('users/login');
			}
			else
			{
				print $this->db->error();
			}

		}
	}


	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|alpha_dash');

		if($this->form_validation->run() == FALSE)
		{
			
			$this->load->model('admin_model');

			$view['user_view'] = "users/login";
			$this->load->view('layouts/user_loginregister', $view);
		}
		else
		{
			$this->load->model('user_model');

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user_data = $this->user_model->login_user($email, $password);

			if($user_data)
			{
				$login_data = array(

					'user_data' => $user_data,
					'id'		=> $user_data->id,
					'email'		=> $email,
					'type'		=> $user_data->type,
					'name'		=> $user_data->name,
					'logged_in'	=> true

				); // Data is kept in SESSION
				
				$this->session->set_userdata($login_data);

				if($user_data->type == 'A') // Admin category
				{

					$this->session->set_flashdata('login_success', 'Logged in successfully. You have logged in as an admin.');
					redirect('admin/index');
				}
				elseif ($user_data->type == 'U') // User category
				{
					$this->session->set_flashdata('login_success', 'Welcome, <a href = "user-home" class = "text-primary">'.$this->session->userdata('name').'</a>. You have been logged in successfully.');
					redirect('home');
				}
			
			}

			else
			{
				$this->session->set_flashdata('login_fail', '<i class="fas fa-exclamation-triangle"></i> Invalid login credentials. The email or password that has been entered is incorrect or does not exist in our server. ');

				redirect($_SERVER['HTTP_REFERER']); // Redirect to the same page.
			}

		}


	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');	
	}


	public function all_books()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/
		$this->load->view('layouts/user_layout', $view);
	}


}



