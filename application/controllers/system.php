<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class System extends CI_Controller 
{
	public function cadastro() 
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[usuario.email]');
		$this->form_validation->set_rules('senha', 'senha', 'trim|required|min_length[5]|matches[conf-senha]');
		$this->form_validation->set_rules('conf-senha', 'conf-senha', 'required|min_length[5]');

		$this->form_validation->set_message('required', '<span class="glyphicon glyphicon-exclamation-sign"></span> Este campo é obrigatorio.');
		$this->form_validation->set_message('valid_email', '<span class="glyphicon glyphicon-exclamation-sign"></span> Informe um valor de e-mail válido.');
		$this->form_validation->set_message('is_unique', '<span class="glyphicon glyphicon-exclamation-sign"></span> Já existe um registro com os dados informados.');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('erro-cadastro', 'erro');
			$this->load->view("cadastro.php");
		} 
		else
		{
			$email = $this->input->post("email");
			$senha = $this->input->post("senha");

			$dados = array (
				'email' => $email,
				'senha' => $senha
				);

			$this->load->model("usuario_model");
			$id_usuario = $this->usuario_model->cadastro($dados);

			$usuario = array (
				'id_usuario' => $id_usuario,
				'email' => $email,
				'senha' => $senha
				);

			$this->session->set_userdata("usuario_logado" , $usuario);
			redirect ("system/novoJogo");
		}
	}

	public function deslogar()
	{
		$this->session->unset_userdata('usuario_logado');
		$this->session->unset_userdata('personagem_logado');
		redirect("/");
	}

	public function autenticar()
	{
		$this->load->model("usuario_model");
		$email = $this->input->post("email-autenticar");
		$senha = $this->input->post("senha-autenticar");

		if (empty($email) || empty($senha)) {
			$this->session->set_flashdata("loginEsenhaVazios" , "erro");
			redirect("/");
		} else {
			$usuario = $this->usuario_model->autentica($email, $senha);

			if ($usuario) {
				$this->session->set_flashdata("sucesso-logou" , "sucesso");
				$this->session->set_userdata("usuario_logado" , $usuario);
				$this->load->model("personagem_model");
				$personagem = $this->personagem_model->carregar_personagem($this->session->userdata("usuario_logado")['id_usuario']);

				if ($personagem) 
				{
					$this->session->set_userdata("personagem_logado" , $personagem);
					redirect("jogo/mundo");
				} 
				else 
				{
					redirect ("system/novoJogo");
				}
			}
			else{
				$this->session->set_flashdata("erro-naoLogou" , "erro");
				redirect("/");
			}
		}
	}

	public function novoJogo() 
	{
		$this->load->view("personagem/criacao-de-personagem");
	}

	public function criar_personagem()
	{
		$nick = $this->input->post("nome-escolhida");
		$raca = $this->input->post("raca-escolhida");
		$vertente = $this->input->post("vertente-escolhida");

		if ($vertente == "floresta") 
		{
			$vertente = "Elfo Da Floresta";
		}

		if ($vertente == "montanha") 
		{
			$vertente = "Elfo Da Montanha";
		}

		if ($vertente == "cidade") 
		{
			$vertente = "Elfo Da Cidade";
		}

		$this->load->helper('raca_helper');

		$resultado = testar_racas($raca, $vertente);
		
		if ($resultado['resultado'] == 1) 
		{
			$this->load->model("personagem_model");
			$id_talentos = $this->personagem_model->criar_talentos();
			$id_status = $this->personagem_model->criar_status();

			$dados = array(
				"nome" => $nick,
				"raca" => $resultado['raca'],
				"vertente" => $resultado['vertente'],
				"id_dono" => $this->session->userdata("usuario_logado")["id_usuario"],
				"talentos" => $id_talentos,
				"status" => $id_status
				);

			$id_personagem = $this->personagem_model->criar_personagem($dados);


			$personagem = $this->personagem_model->carregar_personagem($this->session->userdata("usuario_logado")['id_usuario']);

			if ($personagem) 
			{
				$this->session->set_userdata("personagem_logado" , $personagem);
				$this->load->view("jogo/mundo");
			} 
			redirect("jogo/mundo");
		}

		else
		{
			$this->session->set_flashdata("erro-hask" , "erro");
			redirect("system/novoJogo");
		}
	}
}