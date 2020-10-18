<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('Pessoa_model', 'pessoaModel');
	}

	public function index($pag = 0)
	{
		//$data['data'] = $this->pessoaModel->listarPessoas();
		//Paginação
		$limit = 3;//limite de registros exibidos

		//todas as pessoas do registro
		$data['total'] = count($this->pessoaModel->listarPessoas());
		$data['pessoas'] = $this->pessoaModel->pag_pessoa($limit, $pag);
		$this->load->library('pagination');

		//Carregar as configurações para aginação
		$config['base_url'] = base_url('welcome/index');
		$config['total_rows'] = $data['total'];
		$config['per_page'] = $limit;
		//$config['uri_segment'] = 2;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['next_link'] = " &gt;&gt;";
		$config['prev_link'] = "&lt;&lt; ";
		$this->pagination->initialize($config);

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
