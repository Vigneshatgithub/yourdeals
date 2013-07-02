<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deals_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	public function all_deals($limit,$start)
	{
	//	$this->db->select('person_name, DOB, native, mother_tongue, short_bio, no_of_movies, industry, awards, occupation, optional');		
		$this->db->limit($limit,$start);
		$query = $this->db->get('dealsdata');
		return $query->result_array();
	}
	
	public function all_deals_count()
	{
		$query = $this->db->get('dealsdata')->num_rows();
		return $query;
	}
	
	public function category_list()
	{
		$query = $this->db->get('cat_sub_master');
		return $query->result_array();
	}
	
	public function category_deals($sub_cat_id,$limit,$start)
	{
		//$this->db->limit($limit,$start);
		$query = $this->db->get_where('dealsdata', array('sub_category' => $sub_cat_id),$limit,$start);
		//$query = $this->db->get('dealsdata');
		return $query->result_array();
	}
	public function category_deals_count($sub_cat_id)
	{
		$query = $this->db->get_where('dealsdata', array('sub_category' => $sub_cat_id))->num_rows();
		//$query = $this->db->get('dealsdata');
		return $query;
	}
	
	public function random_deals()
	{
		$this->db->order_by("dealcode", "random"); 
		$this->db->limit(10);
		$query=$this->db->get('dealsdata');
		return $query->result_array();
	}
	
	/*
	
	// additional optional data code commented for future reference
	
	public function get_profile_addn($profile_id)
	{
		$this->db->select('data_type,data_content');		
		$query = $this->db->get_where('additional_data', array('person_id' => $profile_id));
		
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $row)
			{
					$bdata[$row["data_type"]]=$row["data_content"];
			}
		}
		else
		{
			$bdata=array();
		}
		
		return $bdata;
	}
	
	
	public function get_profile_news($profile_id)
	{
	//	$this->db->select('news, news_link');
		$this->db->order_by("created_dt", "desc");
		$query = $this->db->get_where('latest_news', array('person_id' => $profile_id));
		return $query->result();
	}
	
	public function get_profile_pics($profile_id)
	{
	//	$this->db->select('pic_link');
		$this->db->order_by("created_dt", "desc");
		$query = $this->db->get_where('pics_link', array('person_id' => $profile_id));
		return $query->result();
	}
	*/
}

?>