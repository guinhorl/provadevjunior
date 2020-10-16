<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('Pessoa_model', 'pessoaModel');
	}

	public function index()
	{
		$data['data'] = $this->pessoaModel->listarPessoas();
		$this->load->view('commos/header');
		$this->load->view('home', $data);
		$this->load->view('commos/footer');
	}

	public function Cadastro()
	{
		$this->load->view('comm/header');
		$this->load->view('cadastro');
		$this->load->view('comm/footer');
	}

	public function Contato(){
		$this->load->view('comm/header');
		$this->load->view('contato');
		$this->load->view('comm/footer');
	}

	public function pessoaView($id){
		$pessoas['pessoa'] = $this->pessoaModel->verPessoa($id);
		$pessoas['cont_pess'] = $this->pessoaModel->getContatoPessoa($id);

		$this->load->view('comm/header');
		$this->load->view('contato', $pessoas);
		$this->load->view('comm/footer');
	}

	public function editarPessoa($id){
		$pessoa['pessoa'] = $this->pessoaModel->verPessoa($id);
		$this->load->view('comm/header');
		$this->load->view('editar_pessoa', $pessoa);
		$this->load->view('comm/footer');
	}
}
