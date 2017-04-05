<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Talentos extends CI_Controller 
{
	public function carregar_talentos()
	{
		$this->load->model("talentos_model");
		$id_talentos = $this->session->userdata("personagem_logado")["talentos"];
		$talentos = $this->talentos_model->carregar_talentos($id_talentos);

		echo json_encode($talentos);
	}
}