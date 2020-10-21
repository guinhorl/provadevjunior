<?php


class Pessoa_model extends CI_Model
{

	//Insert Pessoa
	public function newPessoa($data){
		$this->db->insert('pessoa', $data);
	}

	/*Editar Pessoa*/
	public function editarPessoa($id, $data){
		$this->db->where('id',$id);
		$this->db->update('pessoa', $data);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	/*Verifica se existe uma com mesmo nome e sobrenome*/
	public function verificarPessoa($nome, $sobreNome){
		$array = array('nome' => $nome, 'sobrenome' => $sobreNome);
		$this->db->where($array);
		return $this->db->get('pessoa')->num_rows();;
	}

	//Listar todas as pessoas
	public function listarPessoas(){
		$this->db->select('id, nome, sobrenome')->from('pessoa');
		$result = $this->db->get()->result();
		if($result)
			return $result;
		else
			return false;
	}

	/*Aqui eu trago tudo de contato_pessoa e contato
	Atraves do ID da pessoa*/
	public function getContatoPessoa($id){

		$result = $this->db
			->from('contato_pessoa')
			->join('contato', 'contato_pessoa.contato_id=contato.id')
			->where('contato_pessoa.pessoa_id', $id)
			->select('contato_pessoa.*, contato.*')
			->get()
			->result_array();

		if($result){
			return $result;
		}else{
			return false;
		}
	}

	//Pega nome e sobrenome de uma pessoa
	public function verPessoa($id){
		$this->db->select('*')->from('pessoa')->where('id', $id);
		$result = $this->db->get()->result();
		if($result){
			return $result[0];
		}else{
			return false;
		}
	}

	//Delete Pessoa
	public function deletarPessoa($id){
		$this->db->where('id',$id);
		$this->db->delete('pessoa');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;

	}

	//Pegar todos as pessoas com pagination
	public function pag_pessoa($limit, $pag){
		$this->db->select('id, nome, sobrenome');
		$this->db->order_by('nome', 'ASC');
		$this->db->limit($limit, $pag);

		$result = $this->db->get('pessoa')->result();
		if($result)
			return $result;
		else
			return false;

	}
}
