<?php
class talentos_model extends CI_Model
{
	public function carregar_talentos($id_talentos)
	{
		$this->db->where("id_talentos", $id_talentos);
		$talentos = $this->db->get("talentos")->row_array();
		return $talentos;
	}
}