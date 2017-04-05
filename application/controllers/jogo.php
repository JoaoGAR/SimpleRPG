<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jogo extends CI_Controller 
{
	public function mundo()
	{
		$this->load->model("trabalho_model");

		$status = array (
			"vida" => $this->session->userdata("personagem_logado")["vida"],
			"energia" => $this->session->userdata("personagem_logado")["energia"],
			"experiencia" => $this->session->userdata("personagem_logado")["experiencia"],
			"vida_maxima" => $this->session->userdata("personagem_logado")["vida"],
			"energia_maxima" => $this->session->userdata("personagem_logado")["energia"],
			"experiencia_maxima" => $this->session->userdata("personagem_logado")["experiencia"],
			);

		$dados = array (
			"status" => $status
			);
		
	/*
		echo "<pre>";
		print_r($dados);
		echo "</pre>";
	*/
		$this->load->view("jogo/mundo", $dados);
	}
}