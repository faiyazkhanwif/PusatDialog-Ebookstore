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
		$this->load->model('Admin_model');
		$view['category'] = $this->Admin_model->get_category();


		$this->load->model('User_model');
		$view['logos'] = $this->User_model->logo_generate();

		$this->load->model('User_model');
		$view['dscs'] = $this->User_model->ft_generate();
		/*==============================*/		
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function alpha_dash_space($fullname){
		if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
			$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[80]|strip_tags[name]|callback_alpha_dash_space');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|min_length[10]|max_length[15]|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',
			array(
				'required' => 'Email field can not be left empty.',
				'is_unique' => 'This email is already registered.')
		);
		//$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_dash|min_length[4]|callback_validate_strongpass');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_validate_strongpass');
		//$this->form_validation->set_rules('repassword', 'Confirm Password','trim|required|alpha_dash|min_length[4]|matches[password]');
		$this->form_validation->set_rules('repassword', 'Confirm Password',
			'trim|required|matches[password]|callback_validate_strongpass');
		$this->form_validation->set_rules('conditionBox', 'Check box', 'trim|required',
			array('required' => 'You have to check the box.')
		);
		//$this->form_validation->set_message('validate_strongpass','Password needs');

		if($this->form_validation->run() == FALSE)
		{
			/*=== LOAD DYNAMIC CATAGORY ===*/
			$this->load->model('Admin_model');
			$view['category'] = $this->Admin_model->get_category();
			/*==============================*/


			$this->load->model('User_model');
			$view['logos'] = $this->User_model->logo_generate();

			$this->load->model('User_model');
			$view['dscs'] = $this->User_model->ft_generate();


			$this->load->model('User_model');
			$view['names'] = $this->User_model->name_generate();

			$this->load->model('User_model');
			$view['abtdscs'] = $this->User_model->about_generate(); 

			$this->load->model('User_model');
			$view['contactdscs'] = $this->User_model->contact_generate(); 

			$view['user_view'] = "users/reg";
			$this->load->view('layouts/user_layout', $view);
		}
		else
		{
			$this->load->model('User_model');

			if($this->User_model->register_user())
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

	public function validate_strongpass($str)
	{
		$password = trim($str);

		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';

		if (empty($password))
		{
			$this->form_validation->set_message('validate_strongpass', 'The {field} field is required.');

			return FALSE;
		}

		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('validate_strongpass', 'The {field} field must be have least one lowercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('validate_strongpass', 'The {field} field must have at least one uppercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('validate_strongpass', 'The {field} field must have at least one number.');

			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1)
		{
			$this->form_validation->set_message('validate_strongpass', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));

			return FALSE;
		}

		if (strlen($password) < 5)
		{
			$this->form_validation->set_message('validate_strongpass', 'The {field} field must be at least 5 characters in length.');

			return FALSE;
		}

		if (strlen($password) > 32)
		{
			$this->form_validation->set_message('validate_strongpass', 'The {field} field cannot exceed 32 characters in length.');

			return FALSE;
		}

		return TRUE;
	}
	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			/*=== LOAD DYNAMIC CATAGORY ===*/
			$this->load->model('Admin_model');
			$view['category'] = $this->Admin_model->get_category();
			/*==============================*/
			$this->load->model('User_model');
			$view['logos'] = $this->User_model->logo_generate();


			$this->load->model('User_model');
			$view['dscs'] = $this->User_model->ft_generate();
			
			$this->load->model('User_model');
			$view['names'] = $this->User_model->name_generate();
			$this->load->model('User_model');
			$view['abtdscs'] = $this->User_model->about_generate(); 

			$this->load->model('User_model');
			$view['contactdscs'] = $this->User_model->contact_generate();

			$view['user_view'] = "users/login";
			$this->load->view('layouts/user_layout', $view);
		}
		else
		{
			$this->load->model('User_model');

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user_data = $this->User_model->login_user($email, $password);

			if($user_data)
			{

				if ($user_data->membershipstatus=="pro") {
					$this->load->model('User_model');
					$memdetails = $this->User_model->get_mem_details($user_data->id);
					$expiredate = $memdetails->expiredate;
					$todaydate = date("Y-m-d");
					$exp = strtotime($expiredate);
					$td = strtotime($todaydate);
					if ($td>$exp) {
						$this->load->model('User_model');
						$this->User_model->removepromembership($user_data->id);
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
					redirect('Home');
				}

			}

			else
			{
				$this->session->set_flashdata('login_fail', '<i class="fas fa-exclamation-triangle"></i> Invalid login. The email or password that you have entered is incorrect. ');

				redirect($_SERVER['HTTP_REFERER']); // Redirect at same page.
			}

		}


	}
	public function forgotpassword(){
		$this->load->model('Admin_model');
		$view['category'] = $this->Admin_model->get_category();
		/*==============================*/
		$this->load->model('User_model');
		$view['logos'] = $this->User_model->logo_generate();


		$this->load->model('User_model');
		$view['dscs'] = $this->User_model->ft_generate();

		$this->load->model('User_model');
		$view['names'] = $this->User_model->name_generate();
		$this->load->model('User_model');
		$view['abtdscs'] = $this->User_model->about_generate(); 

		$this->load->model('User_model');
		$view['contactdscs'] = $this->User_model->contact_generate();

		$view['user_view'] = "users/forgot_password";
		$this->load->view('layouts/user_layout', $view);
	}

	public function resetlink(){
		$this->load->model('Admin_model');
		$view['category'] = $this->Admin_model->get_category();
		/*==============================*/
		$this->load->model('User_model');
		$view['logos'] = $this->User_model->logo_generate();


		$this->load->model('User_model');
		$view['dscs'] = $this->User_model->ft_generate();

		$this->load->model('User_model');
		$view['names'] = $this->User_model->name_generate();
		$this->load->model('User_model');
		$view['abtdscs'] = $this->User_model->about_generate(); 

		$this->load->model('User_model');
		$view['contactdscs'] = $this->User_model->contact_generate();

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');



		if($this->form_validation->run() == FALSE)
		{
			$view['user_view'] = "users/forgot_password";
			$this->load->view('layouts/user_layout', $view);
		}else{
			$this->load->model('User_model');
			$email = $this->input->post('email');
			$mymail = $this->User_model->getmail($email);
			if (count($mymail)>0) {
				$name = "";
				$toemail = "";
				foreach ($mymail as $key) {
					$name = $key['name'];
					$toemail = $key['email'];
				}
				$this->sendresetemail($toemail,$name);
				//$this->session->set_flashdata('reg_success', 'An email with a reset link has been sent to your email successfully.');
				//redirect($_SERVER['HTTP_REFERER']);
				
				
			}else{
				$this->session->set_flashdata('login_fail', '<i class="fas fa-exclamation-triangle"></i> Email does not exist in our server. ');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function sendresetemail($email,$firstname){
		//echo $email;
		//echo $firstname;
		$this->load->model('Admin_model');
		$view['category'] = $this->Admin_model->get_category();
		/*==============================*/
		$this->load->model('User_model');
		$view['logos'] = $this->User_model->logo_generate();


		$this->load->model('User_model');
		$view['dscs'] = $this->User_model->ft_generate();

		$this->load->model('User_model');
		$view['names'] = $this->User_model->name_generate();
		$this->load->model('User_model');
		$view['abtdscs'] = $this->User_model->about_generate(); 

		$this->load->model('User_model');
		$view['contactdscs'] = $this->User_model->contact_generate();
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '60';

    	$config['smtp_user']    = 'pusatdialogsmtp@gmail.com';    //Important
    	$config['smtp_pass']    = 'kajlzvupqmtcwhfq';  //Important

    	$config['charset']    = 'utf-8';
    	$config['newline']    = "\r\n";
    	$config['mailtype'] = 'html'; // or html
    	$config['validation'] = TRUE;
    	$this->load->library('email');
    	$email_code = md5($this->config->item('salt').$firstname);

    	$this->email->initialize($config);
    	$this->email->set_mailtype('html');
    	$this->email->from($this->config->item('bot_email'),'Pusat Dialog Ebookstore');
    	$this->email->to($email);
    	$this->email->subject('Reset your password at Pusat Dialog');
    	$message = '<!DOCTYPE html>
    	<body><p>Hello reader!</p><br><p>Please <strong> <a href ="'.base_url().'Users/resetpasswordform/'.$email.'/'.$email_code.'">click here</a></strong> to reset your password.</p></body>
    	';
    	$this->email->message($message);
    	$this->email->send();
    	$this->session->set_flashdata('reg_success', 'An email has been sent with a link for resetting your password successfully.');
    	$view['user_view'] = "users/forgot_password";
    	$this->load->view('layouts/user_layout', $view);
    }

    public function resetpasswordform($email,$email_code){
    	$this->load->model('User_model');
    	if (isset($email,$email_code)) {
    		$email = trim($email);
    		$email_hash = sha1($email.$email_code);
    		$verified = $this->User_model->verifyresetpasswordcode($email,$email_code);
    		if ($verified) {
    			//echo "Hoise";
    			$this->load->model('Admin_model');
    			$view['category'] = $this->Admin_model->get_category();
    			/*==============================*/
    			$this->load->model('User_model');
    			$view['logos'] = $this->User_model->logo_generate();


    			$this->load->model('User_model');
    			$view['dscs'] = $this->User_model->ft_generate();

    			$this->load->model('User_model');
    			$view['names'] = $this->User_model->name_generate();
    			$this->load->model('User_model');
    			$view['abtdscs'] = $this->User_model->about_generate(); 

    			$this->load->model('User_model');
    			$view['contactdscs'] = $this->User_model->contact_generate();
    			
    			$view['data'] = array('email_hash'=>$email_hash, 'email_code'=>$email_code,'email'=>$email);
    			$view['user_view'] = "users/reset_password";
    			$this->load->view('layouts/user_layout', $view);
    		} else{
			 	//echo "hoinai";

    			$this->load->model('Admin_model');
    			$view['category'] = $this->Admin_model->get_category();
    			/*==============================*/
    			$this->load->model('User_model');
    			$view['logos'] = $this->User_model->logo_generate();


    			$this->load->model('User_model');
    			$view['dscs'] = $this->User_model->ft_generate();

    			$this->load->model('User_model');
    			$view['names'] = $this->User_model->name_generate();
    			$this->load->model('User_model');
    			$view['abtdscs'] = $this->User_model->about_generate(); 

    			$this->load->model('User_model');
    			$view['contactdscs'] = $this->User_model->contact_generate();
    			$this->session->set_flashdata('login_fail', '<i class="fas fa-exclamation-triangle"></i> There was something wrong with your link. Please try to reset your password again or contact with the admin. ');
    			$view['user_view'] = "users/forgot_password";
    			$this->load->view('layouts/user_layout', $view);
    		}
    	}
    }
    public function resetpassword(){
    	if (!isset($_POST['email'],$_POST['email_hash']) || $_POST['email_hash']!==sha1($_POST['email'] . $_POST['email_code'])) {
    		die('Error updating your password, contact with an admin for more info.');
    	}
    	$this->load->model('Admin_model');
    	$view['category'] = $this->Admin_model->get_category();
    	/*==============================*/
    	$this->load->model('User_model');
    	$view['logos'] = $this->User_model->logo_generate();

    	$this->load->model('User_model');
    	$view['names'] = $this->User_model->name_generate();

    	$this->load->model('User_model');
    	$view['dscs'] = $this->User_model->ft_generate(); 

    	$this->load->model('User_model');
    	$view['abtdscs'] = $this->User_model->about_generate(); 

    	$this->load->model('User_model');
    	$view['contactdscs'] = $this->User_model->contact_generate();



    	//$this->form_validation->set_rules('oldpassword', 'Current Password', 'trim|required|callback_validate_strongpass');

    	$this->form_validation->set_rules('newpassword', 'New Password', 'trim|required|callback_validate_strongpass');
    	$this->form_validation->set_rules('repassword', 'Confirm Password',
    		'trim|required|callback_validate_strongpass|matches[newpassword]');

    	if($this->form_validation->run() == FALSE)
    	{
    		//echo current_url();	
    		$this->session->set_flashdata('danger', 'Please add your new and confirm passwords correctly to reset your password. Make sure new password contains 5-32 characters consisting of numbers, capital letters and special characters');
    		redirect($_SERVER['HTTP_REFERER']);
    	}
    	else
    	{
    		$temp =  $this->input->post('email');
    		$memdetails = $this->User_model->get_user_details_alt($temp);
    		$memid = "";
    		foreach ($memdetails as $id) {
    			$memid = $id->id;
    		}
			if($this->User_model->changepass($memid))
			{
				$this->session->set_flashdata('reg_success', 'Your have changed your password successfully.');
				redirect('Users/login');
			}
			else
			{
				print $this->db->error();
			}
    			//if($this->User_model->changepass($id))
    			//{
    			//	$this->session->set_flashdata('success', 'Your have changed your password successfully.');
    			//	redirect('user_home');
    			//}
    		//	else
    			//{
    			//	print $this->db->error();
    			//}
    		//
    		

    	}
    }
    public function logout()
    {
    	$this->session->sess_destroy();
    	redirect('Home');	
    }

    public function showpromempromo(){
    	if($this->session->userdata('logged_in') == FALSE){
    		redirect('users/login');
    	} else {
    		$this->load->model('User_model');
    		$user_details = $this->User_model->get_user_details($this->session->userdata('id'));
    		if ($user_details->membershipstatus=="pro") {
    			redirect('users/all_books');
    		}else{
    			$this->load->model('Admin_model');
    			$view['category'] = $this->Admin_model->get_category();

    			$this->load->model('User_model');
    			$view['logos'] = $this->User_model->logo_generate();

    			$this->load->model('User_model');
    			$view['dscs'] = $this->User_model->ft_generate();

    			$this->load->model('User_model');
    			$view['names'] = $this->User_model->name_generate();

    			$this->load->model('User_model');
    			$view['abtdscs'] = $this->User_model->about_generate(); 

    			$this->load->model('User_model');
    			$view['contactdscs'] = $this->User_model->contact_generate(); 

    			$view['user_view'] = "users/membership_promo";
    			$this->load->view('layouts/user_layout', $view);
    		}

    	}


    }



    public function all_books()
    {
    	/*=== LOAD DYNAMIC CATAGORY ===*/
    	$this->load->model('Admin_model');
    	$view['category'] = $this->Admin_model->get_category();
    	/*==============================*/

		#...Pagination code start
    	$this->load->model('User_model');
    	$this->load->library('pagination');
    	$config = [

    		'base_url' => base_url('users/all_books'),
    		'per_page' => 18,
    		'total_rows'=>  $this->User_model->num_rows_books(),
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

    	$this->load->model('User_model');
    	$view['books'] = $this->User_model->get_books($config['per_page'], $this->uri->segment(3));



    	$this->load->model('User_model');
    	$view['logos'] = $this->User_model->logo_generate();

    	$this->load->model('User_model');
    	$view['dscs'] = $this->User_model->ft_generate();

    	$this->load->model('User_model');
    	$view['names'] = $this->User_model->name_generate();

    	$this->load->model('User_model');
    	$view['abtdscs'] = $this->User_model->about_generate(); 

    	$this->load->model('User_model');
    	$view['contactdscs'] = $this->User_model->contact_generate(); 

    	$view['user_view'] = "users/all_books";
    	$this->load->view('layouts/user_layout', $view);
    }

    /*======== Book details info and all reviews =======*/
    public function book_view($id)
    {
    	/*=== LOAD DYNAMIC CATAGORY ===*/
    	$this->load->model('Admin_model');
    	$view['category'] = $this->Admin_model->get_category();
    	/*==============================*/
    	if ($this->session->userdata('logged_in') == TRUE) {
    		$this->load->model('User_model');
    		$ud = $this->User_model->get_user_details($this->session->userdata('id'));
    		if ($ud->membershipstatus=="pro") {
    			$this->load->model('User_model');
    			$memdetails = $this->User_model->get_mem_details($ud->id);
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
    		$this->load->model('Admin_model');
    		$view['book_detail'] = $this->Admin_model->get_book_detail($id);
    		/*=== Get reviews ===*/
    		$this->load->model('User_model');
    		$view['reviews'] = $this->User_model->get_reviews();

    		$view['user_details'] = $this->User_model->get_user_details($this->session->userdata('id'));

    		if($this->Admin_model->get_book_detail($id))
    		{

    			$this->load->model('User_model');
    			$view['logos'] = $this->User_model->logo_generate();

    			$this->load->model('User_model');
    			$view['dscs'] = $this->User_model->ft_generate();

    			$this->load->model('User_model');
    			$view['names'] = $this->User_model->name_generate();

    			$view['user_view'] = "users/book_detail";
    			$this->load->view('layouts/user_layout', $view);
    		}
    		else
    		{
    			$this->load->model('User_model');
    			$view['logos'] = $this->User_model->logo_generate();

    			$this->load->model('User_model');
    			$view['names'] = $this->User_model->name_generate();

    			$this->load->model('User_model');
    			$view['dscs'] = $this->User_model->ft_generate();

    			$view['user_view'] = "temp/404page";
    			$this->load->view('layouts/user_layout', $view);
    		}
    	}
    	else
    	{
    		$this->load->model('User_model');
    		$view['logos'] = $this->User_model->logo_generate();

    		$this->load->model('User_model');
    		$view['dscs'] = $this->User_model->ft_generate();

    		$this->load->model('User_model');
    		$view['names'] = $this->User_model->name_generate();

    		$this->load->model('User_model');
    		$this->User_model->reviews($id);
    		redirect('user-home/book_view/'.$id.'');
    	}


    }



    public function terms()
    {
    	/*=== LOAD DYNAMIC CATAGORY ===*/
    	$this->load->model('Admin_model');
    	$view['category'] = $this->Admin_model->get_category();
    	/*==============================*/
    	$this->load->model('User_model');
    	$view['logos'] = $this->User_model->logo_generate();

    	$this->load->model('User_model');
    	$view['dscs'] = $this->User_model->ft_generate();

    	$this->load->model('User_model');
    	$view['names'] = $this->User_model->name_generate();

    	$this->load->model('User_model');
    	$view['abtdscs'] = $this->User_model->about_generate(); 

    	$this->load->model('User_model');
    	$view['contactdscs'] = $this->User_model->contact_generate(); 

    	$this->load->model('User_model');
    	$view['termsdscs'] = $this->User_model->terms_generate();

    	$view['user_view'] = "temp/terms";
    	$this->load->view('layouts/user_layout', $view);
    }

    public function infophp(){
    	$this->load->view('users/info');
    }

    public function search()
    {
    	/*=== LOAD DYNAMIC CATAGORY ===*/
    	$this->load->model('Admin_model');
    	$view['category'] = $this->Admin_model->get_category();
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
    		$this->load->model('User_model');
    		$view['books'] = $this->User_model->search($query);

    		$this->load->model('User_model');
    		$view['logos'] = $this->User_model->logo_generate();

    		$this->load->model('User_model');
    		$view['dscs'] = $this->User_model->ft_generate();

    		$this->load->model('User_model');
    		$view['names'] = $this->User_model->name_generate();

    		$this->load->model('User_model');
    		$view['abtdscs'] = $this->User_model->about_generate(); 

    		$this->load->model('User_model');
    		$view['contactdscs'] = $this->User_model->contact_generate(); 

    		$view['user_view'] = "users/search_books";
    		$this->load->view('layouts/user_layout', $view);
    	}

    }

    public function viewmembershipcheckout($months){
    	$this->load->model('Admin_model');
    	$view['category'] = $this->Admin_model->get_category();

    	$this->load->model('User_model');
    	$view['logos'] = $this->User_model->logo_generate();

    	$this->load->model('User_model');
    	$view['dscs'] = $this->User_model->ft_generate();

    	$this->load->model('User_model');
    	$view['names'] = $this->User_model->name_generate();

    	$this->load->model('User_model');
    	$view['abtdscs'] = $this->User_model->about_generate(); 

    	$this->load->model('User_model');
    	$view['contactdscs'] = $this->User_model->contact_generate(); 


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
    	$this->load->model('Admin_model');
    	$view['category'] = $this->Admin_model->get_category();

    	$this->load->model('User_model');
    	$view['logos'] = $this->User_model->logo_generate();

    	$this->load->model('User_model');
    	$view['dscs'] = $this->User_model->ft_generate();

    	$this->load->model('User_model');
    	$view['names'] = $this->User_model->name_generate();

    	$this->load->model('User_model');
    	$view['abtdscs'] = $this->User_model->about_generate(); 

    	$this->load->model('User_model');
    	$view['contactdscs'] = $this->User_model->contact_generate(); 

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
    		$this->load->model('User_model');
    		$view['logos'] = $this->User_model->logo_generate();

    		$this->load->model('User_model');
    		$view['names'] = $this->User_model->name_generate();

    		$this->load->model('User_model');
    		$view['dscs'] = $this->User_model->ft_generate();

    		$this->load->model('User_model');
    		$view['abtdscs'] = $this->User_model->about_generate();

    		$this->load->model('User_model');
    		$view['contactdscs'] = $this->User_model->contact_generate();
    		$view['months'] = $months;
    		$view['cost'] = $cost;
    		$view['user_view'] = "users/promem_checkout_page";
    		$this->load->view('layouts/user_layout', $view);
    	}else{
    		$this->load->model('User_model');
    		if($this->User_model->subscribeaspro($months,$cost))
    		{
    			redirect('users/proconfirmation');

    		}
    	}

    }

    public function proconfirmation(){

    	$this->load->model('Admin_model');
    	$view['category'] = $this->Admin_model->get_category();

    	$this->load->model('User_model');
    	$view['logos'] = $this->User_model->logo_generate();

    	$this->load->model('User_model');
    	$view['names'] = $this->User_model->name_generate();

    	$this->load->model('User_model');
    	$view['dscs'] = $this->User_model->ft_generate();

    	$this->load->model('User_model');
    	$view['abtdscs'] = $this->User_model->about_generate();

    	$this->load->model('User_model');
    	$view['contactdscs'] = $this->User_model->contact_generate();

    	$this->load->model('User_model');
    	$view['dscs'] = $this->User_model->ft_generate();
    	$view['user_view'] = "users/promem_confirmed_page";
    	$this->load->view('layouts/user_layout', $view);
    }



}
