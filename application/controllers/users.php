<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		/*=== Load the cart library ===*/
		$this->load->library('cart');
		
	}

	public function index()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();


		$this->load->model('user_model');
		$view['logos'] = $this->user_model->logo_generate();

		$this->load->model('user_model');
		$view['dscs'] = $this->user_model->ft_generate();
		/*==============================*/		
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[80]|strip_tags[name]');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|min_length[10]|max_length[15]|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',
			array(
				'required' => 'Email field can not be left empty.',
				'is_unique' => 'This email is already registered.')
		);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_dash|min_length[4]');
		$this->form_validation->set_rules('repassword', 'Confirm Password',
			'trim|required|alpha_dash|min_length[4]|matches[password]');
		$this->form_validation->set_rules('conditionBox', 'Check box', 'trim|required',
			array('required' => 'You have to check the box.')
		);


		if($this->form_validation->run() == FALSE)
		{
			/*=== LOAD DYNAMIC CATAGORY ===*/
			$this->load->model('admin_model');
			$view['category'] = $this->admin_model->get_category();
			/*==============================*/


			$this->load->model('user_model');
			$view['logos'] = $this->user_model->logo_generate();

			$this->load->model('user_model');
			$view['dscs'] = $this->user_model->ft_generate();


			$this->load->model('user_model');
			$view['names'] = $this->user_model->name_generate();

			$this->load->model('user_model');
			$view['abtdscs'] = $this->user_model->about_generate(); 

			$this->load->model('user_model');
			$view['contactdscs'] = $this->user_model->contact_generate(); 

			$view['user_view'] = "users/reg";
			$this->load->view('layouts/user_layout', $view);
		}
		else
		{
			$this->load->model('user_model');

			if($this->user_model->register_user())
			{
				$this->session->set_flashdata('reg_success', 'Your Registration is successful.');
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
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|alpha_dash');

		if($this->form_validation->run() == FALSE)
		{
			/*=== LOAD DYNAMIC CATAGORY ===*/
			$this->load->model('admin_model');
			$view['category'] = $this->admin_model->get_category();
			/*==============================*/
			$this->load->model('user_model');
			$view['logos'] = $this->user_model->logo_generate();


			$this->load->model('user_model');
			$view['dscs'] = $this->user_model->ft_generate();
			
			$this->load->model('user_model');
			$view['names'] = $this->user_model->name_generate();
			$this->load->model('user_model');
			$view['abtdscs'] = $this->user_model->about_generate(); 

			$this->load->model('user_model');
			$view['contactdscs'] = $this->user_model->contact_generate();

			$view['user_view'] = "users/login";
			$this->load->view('layouts/user_layout', $view);
		}
		else
		{
			$this->load->model('user_model');

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user_data = $this->user_model->login_user($email, $password);

			if($user_data)
			{
			    
			    if ($user_data->membershipstatus=="pro") {
    				$this->load->model('user_model');
    				$memdetails = $this->user_model->get_mem_details($user_data->id);
    				$expiredate = $memdetails->expiredate;
    				$todaydate = date("Y-m-d");
    				$exp = strtotime($expiredate);
    				$td = strtotime($todaydate);
    				if ($td>$exp) {
    					$this->load->model('user_model');
    					$this->user_model->removepromembership($user_data->id);
    				}
			    }
				$login_data = array(

					'user_data' => $user_data,
					'id'		=> $user_data->id,
					'email'		=> $email,
					'type'		=> $user_data->type,
					'name'		=> $user_data->name,
					'logged_in'	=> true

				); // Data keeps in SESSION
				
				$this->session->set_userdata($login_data);

				if($user_data->type == 'A') // Admin
				{

					$this->session->set_flashdata('login_success', 'Logged in successfully. You have logged in as an admin.');
					redirect('admin/index');
				}
				elseif ($user_data->type == 'U') // User
				{
					$this->session->set_flashdata('login_success', 'Welcome, <a href = "user-home" class = "text-primary">'.$this->session->userdata('name').'</a>. You have logged in successfully');
					redirect('home');
				}

			}

			else
			{
				$this->session->set_flashdata('login_fail', '<i class="fas fa-exclamation-triangle"></i> Invalid login. The email or password that you have entered is incorrect. ');

				redirect($_SERVER['HTTP_REFERER']); // Redirect at same page.
			}

		}


	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');	
	}

	public function showpromempromo(){
		if($this->session->userdata('logged_in') == FALSE){
			redirect('users/login');
		} else {
			$this->load->model('user_model');
			$user_details = $this->user_model->get_user_details($this->session->userdata('id'));
			if ($user_details->membershipstatus=="pro") {
				redirect('users/all_books');
			}else{
				$this->load->model('admin_model');
				$view['category'] = $this->admin_model->get_category();

				$this->load->model('user_model');
				$view['logos'] = $this->user_model->logo_generate();

				$this->load->model('user_model');
				$view['dscs'] = $this->user_model->ft_generate();

				$this->load->model('user_model');
				$view['names'] = $this->user_model->name_generate();

				$this->load->model('user_model');
				$view['abtdscs'] = $this->user_model->about_generate(); 

				$this->load->model('user_model');
				$view['contactdscs'] = $this->user_model->contact_generate(); 

				$view['user_view'] = "users/membership_promo";
				$this->load->view('layouts/user_layout', $view);
			}

		}


	}



	public function all_books()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/

		#...Pagination code start
		$this->load->model('user_model');
		$this->load->library('pagination');
		$config = [

			'base_url' => base_url('users/all_books'),
			'per_page' => 18,
			'total_rows'=>  $this->user_model->num_rows_books(),
			'full_tag_open' => "<ul class='custom-pagination'>",
			'full_tag_close' => "</ul>", 
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'cur_tag_open' => "<li class = 'active'><a>",
			'cur_tag_close' => '</a></li>',
		];
		$this->pagination->initialize($config);

		$this->load->model('user_model');
		$view['books'] = $this->user_model->get_books($config['per_page'], $this->uri->segment(3));



		$this->load->model('user_model');
		$view['logos'] = $this->user_model->logo_generate();

		$this->load->model('user_model');
		$view['dscs'] = $this->user_model->ft_generate();

		$this->load->model('user_model');
		$view['names'] = $this->user_model->name_generate();

		$this->load->model('user_model');
		$view['abtdscs'] = $this->user_model->about_generate(); 

		$this->load->model('user_model');
		$view['contactdscs'] = $this->user_model->contact_generate(); 

		$view['user_view'] = "users/all_books";
		$this->load->view('layouts/user_layout', $view);
	}

	/*======== Book details info and all reviews =======*/
	public function book_view($id)
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->load->model('user_model');
			$ud = $this->user_model->get_user_details($this->session->userdata('id'));
			if ($ud->membershipstatus=="pro") {
				$this->load->model('user_model');
				$memdetails = $this->user_model->get_mem_details($ud->id);
				$expiredate = $memdetails->expiredate;
				$todaydate = date("Y-m-d");
				$exp = strtotime($expiredate);
				$td = strtotime($todaydate);
				if ($td>$exp) {
					redirect('users/logout');
				}
			}
		}


		$this->form_validation->set_rules('review', 'Review', 'trim|required|min_length[1]|strip_tags[review]');

		if($this->form_validation->run() == FALSE)
		{
			/*=== Book Details ===*/
			$this->load->model('admin_model');
			$view['book_detail'] = $this->admin_model->get_book_detail($id);
			/*=== Get reviews ===*/
			$this->load->model('user_model');
			$view['reviews'] = $this->user_model->get_reviews();

			$view['user_details'] = $this->user_model->get_user_details($this->session->userdata('id'));

			if($this->admin_model->get_book_detail($id))
			{

				$this->load->model('user_model');
				$view['logos'] = $this->user_model->logo_generate();

				$this->load->model('user_model');
				$view['dscs'] = $this->user_model->ft_generate();

				$this->load->model('user_model');
				$view['names'] = $this->user_model->name_generate();

				$view['user_view'] = "users/book_detail";
				$this->load->view('layouts/user_layout', $view);
			}
			else
			{
				$this->load->model('user_model');
				$view['logos'] = $this->user_model->logo_generate();

				$this->load->model('user_model');
				$view['names'] = $this->user_model->name_generate();

				$this->load->model('user_model');
				$view['dscs'] = $this->user_model->ft_generate();

				$view['user_view'] = "temp/404page";
				$this->load->view('layouts/user_layout', $view);
			}
		}
		else
		{
			$this->load->model('user_model');
			$view['logos'] = $this->user_model->logo_generate();

			$this->load->model('user_model');
			$view['dscs'] = $this->user_model->ft_generate();

			$this->load->model('user_model');
			$view['names'] = $this->user_model->name_generate();

			$this->load->model('user_model');
			$this->user_model->reviews($id);
			redirect('user-home/book_view/'.$id.'');
		}


	}



	public function terms()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/
		$this->load->model('user_model');
		$view['logos'] = $this->user_model->logo_generate();

		$this->load->model('user_model');
		$view['dscs'] = $this->user_model->ft_generate();

		$this->load->model('user_model');
		$view['names'] = $this->user_model->name_generate();

		$this->load->model('user_model');
		$view['abtdscs'] = $this->user_model->about_generate(); 

		$this->load->model('user_model');
		$view['contactdscs'] = $this->user_model->contact_generate(); 

		$this->load->model('user_model');
		$view['termsdscs'] = $this->user_model->terms_generate();

		$view['user_view'] = "temp/terms";
		$this->load->view('layouts/user_layout', $view);
	}

	public function infophp(){
		$this->load->view('users/info');
	}

	public function search()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/


		$this->form_validation->set_rules('search_book', "Search",'trim|required|strip_tags[search_book]');

		if($this->form_validation->run() == FALSE)
		{
			redirect('home');
		}
		else
		{
			$query1 = $this->input->post('search_book');
			$query = "";
			if (strpos($query1, '?') !== false) {
				$query = str_replace("?","",$query1);
			}else{
				$query = $query1;
			}
			$this->load->model('user_model');
			$view['books'] = $this->user_model->search($query);

			$this->load->model('user_model');
			$view['logos'] = $this->user_model->logo_generate();

			$this->load->model('user_model');
			$view['dscs'] = $this->user_model->ft_generate();

			$this->load->model('user_model');
			$view['names'] = $this->user_model->name_generate();

			$this->load->model('user_model');
			$view['abtdscs'] = $this->user_model->about_generate(); 

			$this->load->model('user_model');
			$view['contactdscs'] = $this->user_model->contact_generate(); 

			$view['user_view'] = "users/search_books";
			$this->load->view('layouts/user_layout', $view);
		}

	}

	public function viewmembershipcheckout($months){
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();

		$this->load->model('user_model');
		$view['logos'] = $this->user_model->logo_generate();

		$this->load->model('user_model');
		$view['dscs'] = $this->user_model->ft_generate();

		$this->load->model('user_model');
		$view['names'] = $this->user_model->name_generate();

		$this->load->model('user_model');
		$view['abtdscs'] = $this->user_model->about_generate(); 

		$this->load->model('user_model');
		$view['contactdscs'] = $this->user_model->contact_generate(); 


		$view['months'] = $months;
		$cost = 0;
		$view['cost'] = $cost;
		if ($months==1) {
			$cost = 30;
			$view['cost'] = $cost;
		}elseif ($months==3) {
			$cost = 80;
			$view['cost'] = $cost;
		} else {
			$cost = 150;
			$view['cost'] = $cost;
		}

		$view['user_view'] = "users/promem_checkout_page";
		$this->load->view('layouts/user_layout', $view);
	}

	public function subscribeaspro($months){
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();

		$this->load->model('user_model');
		$view['logos'] = $this->user_model->logo_generate();

		$this->load->model('user_model');
		$view['dscs'] = $this->user_model->ft_generate();

		$this->load->model('user_model');
		$view['names'] = $this->user_model->name_generate();

		$this->load->model('user_model');
		$view['abtdscs'] = $this->user_model->about_generate(); 

		$this->load->model('user_model');
		$view['contactdscs'] = $this->user_model->contact_generate(); 

		$this->form_validation->set_rules('paymentcheck', 'Payment methods', 'trim|required');

		$view['months'] = $months;
		$cost = 0;

		if ($months==1) {
			$cost = 30;
		}elseif ($months==3) {
			$cost = 80;
		} else {
			$cost = 150;
		}

		if($this->form_validation->run() == FALSE)
		{
			$this->load->model('user_model');
			$view['logos'] = $this->user_model->logo_generate();

			$this->load->model('user_model');
			$view['names'] = $this->user_model->name_generate();

			$this->load->model('user_model');
			$view['dscs'] = $this->user_model->ft_generate();

			$this->load->model('user_model');
			$view['abtdscs'] = $this->user_model->about_generate();

			$this->load->model('user_model');
			$view['contactdscs'] = $this->user_model->contact_generate();
			$view['months'] = $months;
			$view['cost'] = $cost;
			$view['user_view'] = "users/promem_checkout_page";
			$this->load->view('layouts/user_layout', $view);
		}else{
			$this->load->model('user_model');
			if($this->user_model->subscribeaspro($months,$cost))
			{
				redirect('users/proconfirmation');

			}
		}

	}

	public function proconfirmation(){

		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();

		$this->load->model('user_model');
		$view['logos'] = $this->user_model->logo_generate();

		$this->load->model('user_model');
		$view['names'] = $this->user_model->name_generate();

		$this->load->model('user_model');
		$view['dscs'] = $this->user_model->ft_generate();

		$this->load->model('user_model');
		$view['abtdscs'] = $this->user_model->about_generate();

		$this->load->model('user_model');
		$view['contactdscs'] = $this->user_model->contact_generate();

		$this->load->model('user_model');
		$view['dscs'] = $this->user_model->ft_generate();
		$view['user_view'] = "users/promem_confirmed_page";
		$this->load->view('layouts/user_layout', $view);
	}



}
