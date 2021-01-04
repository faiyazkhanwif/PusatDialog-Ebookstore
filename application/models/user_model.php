<?php 

class user_model extends CI_Model
{
	public function register_user()
	{

		$options = ['cost'=> 12];
		$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

		$data = array(

		'name'	=> $this->input->post('name'),
		'contact'	=> $this->input->post('contact'),
		'email'	=> $this->input->post('email'),
		'address'	=> $this->input->post('address'),
		'city'	=> $this->input->post('city'),
		'password' => $encripted_pass

		);

		$insert_data = $this->db->insert('users', $data);
		return $insert_data;

	}

	public function login_user($email, $password)
	{
		$this->db->where('email', $email);
		$result = $this->db->get('users');

		$db_password = $result->row('password');

		if(password_verify($password, $db_password))
		{
			// return $result->row(0)->id;
			return $result->row();
		}
		else
		{
			return false;
		}
	}



	public function get_user_details($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->row();
	}

	public function edit_profile($id, $data)
	{
		$options = ['cost'=> 12];
		$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

		$data = array(
		'name'	=> $this->input->post('name'),
		'contact'	=> $this->input->post('contact'),
		'address'	=> $this->input->post('address'),
		'city'	=> $this->input->post('city'),
		'password' => $encripted_pass,

		);

		return $query = $this->db->where('id', $id)->update('users', $data);
	}


} 

?>