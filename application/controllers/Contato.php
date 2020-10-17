<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Contato extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Pessoa_model', 'pessoaModel');
		$this->load->model('Contato_model', 'contatoModel');

	}


	public function verContato($id)
	{
		$data['tipoCont'] = $this->contatoModel->listarTiposContatos();
		$data['pessoa'] = $this->pessoaModel->verPessoa($id);
		$data['cont_pess'] = $this->pessoaModel->getContatoPessoa($id);

		$this->load->view('comm/header');
		$this->load->view('contato/adicionar_contato', $data);
		$this->load->view('comm/footer');

	}

	public function newContato(){
		$expr = 'bob';
//		Aqui verifico qual input esta abilitado
		switch ($expr) {
			case $this->input->post('Email') !== null:
				$expr = $this->input->post('Email');
				break;
			case $this->input->post('Celular') !== null:
				$expr = $this->input->post('Celular');
				break;
			case $this->input->post('Telefone') !== null:
				$expr = $this->input->post('Telefone');
				break;
			default:
		}

		$data = array(
			'contato' => $expr,
			'pessoa_id' => $this->input->post('pessoaId'),
			'contato_id' => $this->input->post('addSelectTipo'),
		);

		try {
			if($this->contatoModel->verificarContato($data['contato_id'], $data['contato'])){
				$this->session->set_flashdata('mensCadastroContato', "<div class='alert alert-danger'>Esse Contato<strong> já está cadastrada! </strong>
            	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
				redirect(base_url('contato/verContato/' . $data['pessoa_id']));
			}else{
				$this->contatoModel->newContato($data);
				$this->session->set_flashdata('mensCadastroContato', "<div class='alert alert-success'> Contato <strong>cadastrado com sucesso!</strong>
            	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
				redirect(base_url('contato/verContato/' . $data['pessoa_id']));
			}

		}catch (Exception $error){
			echo 'Exception Erro no cadastro =>' . $error;
		}
	}

	public function editarContato($id){
		try{
			if($this->contatoModel->getContato($id)){
				$contato = $this->contatoModel->getContato($id);
				$data = array(
					'contato' => $this->input->post('editContato')
				);
				var_dump($data);
				//die();
				//Atualiza
				$result = $this->contatoModel->editarContatoPessoa($id, $data);
				if ($result){
					$this->session->set_flashdata('mensEditaCont', "<div class='alert alert-success'>Contato<strong> atualizado </strong>com sucesso!
            		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
					redirect(base_url('contato/verContato/' . $contato->pessoa_id));
				}else{
					$this->session->set_flashdata('mensEditaCont', "<div class='alert alert-danger'><strong>Erro </strong>ao atualizar o contato!
            		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
					redirect(base_url('contato/verContato/' . $contato->pessoa_id));

				}

			}
		}catch (Exception $error){
			echo 'Exception Erro no cadastro =>' . $error;
		}

	}

	public function editar($id){
		$dataContato['dataContato'] = $this->contatoModel->getContato($id);
		$ipPessoa = $dataContato['dataContato']->pessoa_id;
		$dataContato['pessoa'] = $this->pessoaModel->verPessoa($ipPessoa);
		var_dump($dataContato['pessoa']);
		$this->load->view('comm/header');
		$this->load->view('contato/editar_contato', $dataContato);
		$this->load->view('comm/footer');

	}


}
