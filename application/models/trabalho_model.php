<?php
class trabalho_model extends CI_Model
{

	public function verifica_fila($id_personagem)
	{
		$this->db->where("id_personagem", $id_personagem);
		$trabalho = $this->db->get("trabalho_execucao")->result_array();
		return $trabalho;
	}

	public function adiciona_trabalho($dados)
	{
		$this->db->insert("trabalho_execucao", $dados);
		return $this->db->insert_id();
	}

	public function remover_trabalho($id_execucao)
	{
		$this->db->where('id_execucao', $id_execucao); 
		$this->db->where('id_personagem', $this->session->userdata('personagem_logado')['id_personagem']);
		$this->db->delete('trabalho_execucao');
	}

	public function trabalho_concluido($id_execucao)
	{
		$data = array (
			'concluido' => 1
			);

		$this->db->where('id_execucao', $id_execucao); 
		$this->db->where('id_personagem', $this->session->userdata('personagem_logado')['id_personagem']);
		$this->db->update('trabalho_execucao', $data); 
		$trabalho = $this->db->get("trabalho_execucao")->result_array();
		return $trabalho;
	}

	public function pega_execucao($id_execucao)
	{
		$this->db->where('id_execucao', $id_execucao); 
		$this->db->where('id_personagem', $this->session->userdata('personagem_logado')['id_personagem']);
		$trabalho = $this->db->get("trabalho_execucao")->row_array();
		return $trabalho;
	}
}