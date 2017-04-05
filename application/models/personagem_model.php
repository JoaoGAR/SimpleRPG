<?php
class personagem_model extends CI_Model
{
	public function criar_talentos()
	{
		$dados = array(
			'constituicao' => 1
			);

		$this->db->insert("talentos", $dados);
		return $this->db->insert_id();
	}

	public function criar_personagem($dados)
	{
		$this->db->insert("personagem", $dados);
		return $this->db->insert_id();
	}

	public function criar_status($dados)
	{
		$dados = array(
			'vida' => 5
			);

		$this->db->insert("status", $dados);
		return $this->db->insert_id();
	}

	public function carregar_personagem($id_dono)
	{
		$this->db->where("id_dono", $id_dono);
		$this->db->join('racas', 'personagem.raca = racas.id_raca');
		$this->db->join('vertentes', 'personagem.vertente = vertentes.id_vertente');
		$this->db->join('status', 'personagem.status = status.id_status');
		$personagem =  $this->db->get("personagem")->row_array();
		return $personagem;
	}
} 