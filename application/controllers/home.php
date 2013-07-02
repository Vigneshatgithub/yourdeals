<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('deals_model');
		$this->load->library('pagination');
		
	}

	
	public function lists()
	{
		$config=array();
		$config['base_url'] = 'http://localhost/deals/index.php/home/lists';
		$config['total_rows'] = $this->deals_model->all_deals_count();
		$config['per_page'] = 20; 
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
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$off=($page-1)*$config['per_page'];
		
		$data['dealslist']=$this->deals_model->all_deals($config['per_page'],$off);
		$data['category']=$this->deals_model->category_list();
		$data['links']=$this->pagination->create_links();
		$this->load->view('index',$data);
	}
	
	
}

