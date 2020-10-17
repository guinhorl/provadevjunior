<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Contato_model extends CI_Model
{
	public function newContato($data){
		$this->db->insert('contato_pessoa', $data);
	}

	public function listarTiposContatos(){
		$this->db->select('id, tipo')->from('contato');
		$result = $this->db->get()->result();
		if($result)
			return $result;
		else
			return false;
	}

	public function verificarContato($cont_id, $contato){
		$array = array('contato' => $contato, 'contato_id' => $cont_id);
		$this->db->where($array);
		return $this->db->get('contato_pessoa')->num_rows();;
	}

	public function editarContatoPessoa($id, $data){
		/*$array = array('pessoa_id' => $idPess, 'id' => $idCont);
		$this->db->where($array);
		return $this->db->get('contato_pessoa')->num_rows();;*/
		$this->db->where('id_c_p',$id);
		$this->db->update('contato_pessoa', $data);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function getContato($id){
		$this->db->select('*')->from('contato_pessoa')->where('id_c_p', $id);
		$result = $this->db->get()->result();
		if($result){
			return $result[0];
		}else{
			return false;
		}
	}

}
