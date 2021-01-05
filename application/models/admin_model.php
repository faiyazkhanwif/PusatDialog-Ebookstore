<?php 

class admin_model extends CI_Model
{
	
	#...Add user
	public function add_user()
	{

		$options = ['cost'=> 12];
		$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

		$data = array(

		'name'	=> $this->input->post('name'),
		'contact'	=> $this->input->post('contact'),
		'email'	=> $this->input->post('email'),
		'address'	=> $this->input->post('address'),
		'city'	=> $this->input->post('city'),
		'password' => $encripted_pass,
		'type' => $this->input->post('type')

		);

		$insert_user = $this->db->insert('users', $data);
		return $insert_user;

	}

	#...Delete User
	public function delete_user($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
		
	}

		#...Display all user
	public function get_users()
	{
		$query = $this->db->get('users');
		return $query->result();
	}
}