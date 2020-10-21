<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Contato_model extends CI_Model
{
	//Insert Contato
	public function newContato($data){
		$this->db->insert('contato_pessoa', $data);
	}

	//Listar Tipos de contato
	public function listarTiposContatos(){
		$this->db->select('id, tipo')->from('contato');
		$result = $this->db->get()->result();
		if($result)
			return $result;
		else
			return false;
	}

	//Trazer um tipo de contato da tabela relacionada contato_pessoa
	public function verificarContato($cont_id, $contato){
		$array = array('contato' => $contato, 'contato_id' => $cont_id);
		$this->db->where($array);
		return $this->db->get('contato_pessoa')->num_rows();;
	}

	//Update  contato de uma pessoa
	public function editarContatoPessoa($id, $data){
		$this->db->where('id_c_p',$id);
		$this->db->update('contato_pessoa', $data);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	//Trazer apenas um contato da pessoa
	public function getContato($id){
		$this->db->select('*')->from('contato_pessoa')->where('id_c_p', $id);
		$result = $this->db->get()->result();
		if($result){
			return $result[0];
		}else{
			return false;
		}
	}

	//Delete contato de uma pessoa
	public function deletarContato($id){
		$this->db->where('id_c_p',$id);
		$this->db->delete('contato_pessoa');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;

	}

}
