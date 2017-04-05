<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Trabalho extends CI_Controller 
{
	public function carregar_trabalho()
	{
		$id_trabalho = $this->input->get('id_trabalho');
		$this->load->helper("gettrabalho");
		
		echo json_encode(get_trabalho($id_trabalho));
	}

	public function trabalhar()
	{
		date_default_timezone_set("Brazil/East");
		$this->load->model("trabalho_model");
		$id_trabalho = $this->input->get('id_trabalho');
		$horas_escolhidas = $this->input->post('horas_trabalho');
		$trabalho_execucao = $this->trabalho_model->verifica_fila($this->session->userdata('personagem_logado')['id_personagem']);

		if ($horas_escolhidas == 0) 
		{
			$horas_escolhidas = 30;
		}


		$ultima = count($trabalho_execucao)-1;

		if (count($trabalho_execucao) == 0) 
		{
			$dados = array (
				'id_trabalho' => $id_trabalho,
				'id_personagem' => $this->session->userdata('personagem_logado')['id_personagem'],
				'tempo_escolhido' => $horas_escolhidas
				);

			$ultimo_trabalho = $this->trabalho_model->adiciona_trabalho($dados);

			echo json_encode($ultimo_trabalho);
		}

		elseif (count($trabalho_execucao) < 4) 
		{
			$hora_final = date('Y-m-d H:i:s', strtotime($trabalho_execucao[$ultima]['tempo_escolhido'].' minute', strtotime($trabalho_execucao[$ultima]['hora_inicial'])));
			$dados = array (
				'id_trabalho' => $id_trabalho,
				'id_personagem' => $this->session->userdata('personagem_logado')['id_personagem'],
				'tempo_escolhido' => $horas_escolhidas,
				'hora_inicial' => $hora_final
				);

			$ultimo_trabalho = $this->trabalho_model->adiciona_trabalho($dados);
			echo json_encode($ultimo_trabalho);
		}

		else 
		{
			$err_msg = "Sua fila de trabalho está cheia.";
			echo json_encode($err_msg);
		}
	}

	public function verifica_fila()
	{
		date_default_timezone_set("Brazil/East");
		$this->load->helper(array("date", "gettrabalho"));
		$this->load->model("trabalho_model");
		$trabalho_execucao = $this->trabalho_model->verifica_fila($this->session->userdata('personagem_logado')['id_personagem']);

		$i = 0;
		if ($trabalho_execucao) 
		{
			while ($i < count($trabalho_execucao)-1) 
			{
				if ($trabalho_execucao[$i]['concluido'] == 1) 
				{
					$i++;
				}
				else
				{
					break;
				}
			}
			
			$format = 'DATE_RFC850';
			$time = time();
			$datestring = "%D, %d-%M-%y %H:%i:%s";
			$hora_atual = mdate($datestring, $time);

			$hora_final = date('D, d-M-y H:i:s', strtotime($trabalho_execucao[$i]['tempo_escolhido'].' minute', strtotime($trabalho_execucao[$i]['hora_inicial'])));

			if (strtotime($hora_atual) > strtotime($hora_final)) 
			{
				$trabalho = $this->trabalho_model->trabalho_concluido($trabalho_execucao[$i]['id_execucao']);

				/*
				echo "<pre>";
				print_r($trabalho);
				echo "</pre>";
				*/
			}
		}
	}

	public function fila_trabalho()
	{
		$this->load->helper(array("gettrabalho"));
		$this->load->model("trabalho_model");
		$trabalho_execucao = $this->trabalho_model->verifica_fila($this->session->userdata('personagem_logado')['id_personagem']);

		$i = 0;
		foreach ($trabalho_execucao as $trabalho) {
			$teste = json_decode(json_encode(get_trabalho($trabalho['id_trabalho'])), True);
			$teste['id_execucao'] = $trabalho['id_execucao'];
			$teste['tempo_escolhido'] = $trabalho['tempo_escolhido'];
			$teste['concluido'] = $trabalho['concluido'];

			$dados[$i] = $teste;
			$i++;
		}
		
		
		/*echo "<pre>";
		print_r($dados);
		echo "</pre>";*/
		
		echo json_encode($dados);
	}

	public function cancelar_contrato()
	{
		$this->load->model("trabalho_model");
		$id_execucao = $this->input->get('id_execucao');
		$this->trabalho_model->remover_trabalho($id_execucao);

		redirect("jogo/mundo");
	}

	public function coletar_recompensa()
	{
		$this->load->helper(array("gettrabalho"));
		$this->load->model("trabalho_model");
		$id_execucao = $this->input->get('id_execucao');
		$fila = $this->trabalho_model->pega_execucao($id_execucao);

		switch ($fila['tempo_escolhido']) 
		{
			case 30:
			$tempo = 1;
			break;

			case 60:
			$tempo = 2;
			break;

			case 120:
			$tempo = 4;
			break;
		}

		$trabalho = json_decode(json_encode(get_trabalho($fila['id_trabalho'])), True);

		$experiencia = $trabalho['experiencia']*$tempo;
		$dinheiro = $trabalho['dinheiro']*$tempo;

		$recompensa = array (
			'experiencia' => $experiencia,
			'dinheiro' => $dinheiro
			);

		echo "<pre>";
		print_r($fila);
		print_r($trabalho);
		print_r($recompensa);
		echo "</pre>";

		//redirect("jogo/mundo");
	}
}