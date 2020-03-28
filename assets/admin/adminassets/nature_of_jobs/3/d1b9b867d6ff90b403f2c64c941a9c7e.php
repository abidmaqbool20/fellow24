<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('website/index');
	}
	public function shop()
	{
		$this->load->view('website/shop');
	}
	public function articles_by_alexandra()
	{
		$this->load->view('website/articles-by-alexandra');
	}
	public function testimonials()
	{
		$this->load->view('website/testimonials');
	}
	public function are_you_guardian()
	{
		$this->load->view('website/are-you-guardian');
	}
	public function alexandra_personal_message()
	{
		$this->load->view('website/alexandra-personal-message');
	}

}
