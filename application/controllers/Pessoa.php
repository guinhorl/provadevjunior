<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('Pessoa_model', 'pessoaModel');
	}

	//Cadastrar uma pessoa
	public function cadastrarPessoa(){

		//Carregar os dados em um Array
		$data = array(
			'nome' => $this->input->post('nome'),
			'sobrenome' => $this->input->post('sobreNome')
		);
		try {
//			Verifica se já existe a pessoa com mesmo nome e sobrenome
			if ($this->pessoaModel->verificarPessoa($data['nome'], $data['sobrenome'])){
				$this->session->set_flashdata('mensagemCadastro', "<div class='alert alert-danger'>Essa Pessoa <strong> já está cadastrada! </strong>
            	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

				redirect(base_url());
//				Se tudo estiver ok ele cadastra a pessoa
			}else{
				$this->pessoaModel->newPessoa($data);
				$this->session->set_flashdata('mensagemCadastro', "<div class='alert alert-success'> Pessoa <strong>cadastrado com sucesso!</strong>
            	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

				redirect(base_url());
			}

		}catch (Exception $erro){
			echo 'Exception Erro no cadastro =>' . $erro;

		}

	}

	//Ediatar os dados de uma pessoa
	public function editarPessoa($id){

		try {
			if($this->pessoaModel->verPessoa($id)){
//				Coloco os dados do form em um array
				$updateData = array(
					'nome' => $this->input->post('aditarNome'),
					'sobrenome' => $this->input->post('editarSobreNome')
				);
//				Atualiza
				$result = $this->pessoaModel->editarPessoa($id, $updateData);
//				Verifica
				if($result) {
					$this->session->set_flashdata('mensagemEditar', "<div class='alert alert-success'>Pessoa<strong> atualizada </strong>com sucesso!
            		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
					redirect(base_url());
				} else {
					$this->session->set_flashdata('mensagemEditar', "<div class='alert alert-danger'><strong>Erro </strong>ao atualizar a pessoa!
            		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
					redirect(base_url());
				}
			}
		}catch (Exception $erro){
			echo 'Exception erro de exceção =>'. $erro;
		}

	}


	/*
	 * Deletar uma pessoa
	 *
	 * */
	public function deletarPessoa($id){
		$result = $this->pessoaModel->deletarPessoa($id);
		if ($result){
			$this->session->set_flashdata('mensagemDelete', "<div class='alert alert-success'>Pessoa<strong> deletada </strong>com sucesso!
            	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
			redirect(base_url());

		}else{
			$this->session->set_flashdata('mensagemDelete', "<div class='alert alert-danger'><strong>Erro </strong>ao deletar a pessoa!
            	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
			redirect(base_url());
		}

	}

}
