<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('deals_model');
		$this->load->library('pagination');
	} 
	 
	public function category($sub_cat_id=FALSE,$page=FALSE)
	{	
		//$config=array();
		$config['base_url'] = 'http://localhost/deals/index.php/deal/category/'.$sub_cat_id.'/';
		$config['total_rows'] = $this->deals_model->category_deals_count($sub_cat_id);
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		//$config['num_links']=5;
		$config['use_page_numbers'] = TRUE;
		$config['display_pages'] = FALSE; 
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open']='<li>';
		$config['next_tag_close']='</li>';
		$config['prev_tag_open']='<li>';
		$config['prev_tag_close']='</li>';
		$config['prev_link'] = '&larr; Prev';
	
		$this->pagination->initialize($config); 
		//echo $config['total_rows'];
		//echo $this->uri->segment(4);
		//echo $sub_cat_id;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$off=($page-1)*$config['per_page'];
		//echo "Hello".$sub_cat_id;
		
		
		
			$data['category']=$this->deals_model->category_list();
		
			$data['dealslist'] = $this->deals_model->category_deals($sub_cat_id,$config['per_page'],$off); 			
			$data['title'] = $sub_cat_id;
			$data['links']=$this->pagination->create_links();
		
	
		//$data['check']=$myid;
		
		
		
		//print_r($data['dealslist']);
	
		//$data['title']=$data['dealslist']['sub_category'][0];
		$this->load->view('index',$data);
		
	}
	
	public function random()
	{
		$data['category']=$this->deals_model->category_list();
		$data['dealslist']=$this->deals_model->random_deals();		
		$data['links']="";
		
		$this->load->view('index',$data);
		
	}
	
	private function _no_data()
	{
		return array("data"=>"false");
	}
	
	
}

?>