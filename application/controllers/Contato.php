<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Contato extends CI_Controller
{
	public function __construct(){
		parent:: __construct();

	}

	public function adicionar(){
		$this->load->view('comm/header');
		$this->load->view('contato/adicionar_contato');
		$this->load->view('comm/footer');

	}

}
