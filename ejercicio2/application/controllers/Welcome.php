<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('plantillas/front_end/header');
		$this->load->view('plantillas/front_end/menu');
		$this->load->view('front_end/index');
		$this->load->view('plantillas/front_end/footer');
	}

	public function fisica()
	{
		$this->load->view('plantillas/front_end/header');
		$this->load->view('plantillas/front_end/menu');
		$this->load->view('front_end/fis');
		$this->load->view('plantillas/front_end/footer');
	}

	public function quimica()
	{
		$this->load->view('plantillas/front_end/header');
		$this->load->view('plantillas/front_end/menu');
		$this->load->view('front_end/qmc');
		$this->load->view('plantillas/front_end/footer');
	}

	public function informatica()
	{
		$this->load->view('plantillas/front_end/header');
		$this->load->view('plantillas/front_end/menu');
		$this->load->view('front_end/inf');
		$this->load->view('plantillas/front_end/footer');
	}
}


