<?php 

class admin_model extends CI_Model
{
	#...Create category
	public function create_category()
	{
		$data = array(

		'category' => $this->input->post('category'),
		'description' => $this->input->post('description'),
		'tag' => $this->input->post('tag')

		);

		$insert_ctg = $this->db->insert('category', $data);
		return $insert_ctg;
	}

	#...Display all category
	public function get_category()
	{
		$query = $this->db->get('category');
		return $query->result();
	}

	#...Display category details
	public function get_ctg_detail($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('category');
		return $query->row();
	}

	

}