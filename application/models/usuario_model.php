<?php
class usuario_model extends CI_Model
{

	public function autentica($login, $senha)
	{
		$this->db->where("email", $login);
		$this->db->where("senha", $senha);
		$usuario =  $this->db->get("usuario")->row_array();
		return $usuario;
	}

	public function cadastro($dados)
	{
		$this->db->insert("usuario", $dados);
		return $this->db->insert_id();
	}
}