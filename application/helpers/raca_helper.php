<?php
function testar_racas($raca, $vertente)
{
	if ($raca == "Humano") 
	{
		if ($vertente == "Creysionista" || $vertente == "Antecreysionista" || $vertente == "Uteista") 
		{
			switch ($vertente) 
			{
				case "Creysionista":
				$dados = array(
					'raca' => 1,
					'vertente' => 1,
					'resultado' => 1
					);
				return $dados;
				break;

				case "Antecreysionista":
				$dados = array(
					'raca' => 1,
					'vertente' =>2,
					'resultado' => 1
					);
				return $dados;
				break;

				case "Uteista":
				$dados = array(
					'raca' => 1,
					'vertente' =>3,
					'resultado' => 1
					);
				return $dados;
				break;
			}
		} 
		else 
		{
			return 0;
		}
	}

	elseif ($raca == "Elfo") 
	{
		if ($vertente == "Elfo Da Montanha" || $vertente == "Elfo Da Floresta" || $vertente == "Elfo Da Cidade") 
		{
			switch ($vertente) 
			{
				case "Elfo Da Montanha":
				$dados = array(
					'raca' => 2,
					'vertente' => 4,
					'resultado' => 1
					);
				return $dados;
				break;

				case "Elfo Da Floresta":
				$dados = array(
					'raca' => 2,
					'vertente' =>5,
					'resultado' => 1
					);
				return $dados;
				break;

				case "Elfo Da Cidade":
				$dados = array(
					'raca' => 2,
					'vertente' =>6,
					'resultado' => 1
					);
				return $dados;
				break;
			}
		} 

		else 
		{
			return 0;
		}
	}

	elseif ($raca == "Anão") 
	{
		if ($vertente == "Elite" || $vertente == "Exilado" || $vertente == "Mineirador") 
		{
			switch ($vertente) 
			{
				case "Elite":
				$dados = array(
					'raca' => 3,
					'vertente' => 7,
					'resultado' => 1
					);
				return $dados;
				break;

				case "Mineirador":
				$dados = array(
					'raca' => 3,
					'vertente' =>8,
					'resultado' => 1
					);
				return $dados;
				break;

				case "Exilado":
				$dados = array(
					'raca' => 3,
					'vertente' =>9,
					'resultado' => 1
					);
				return $dados;
				break;
			}
		} 

		else 
		{
			return 0;
		}
	}
	else 
	{
		return 0;
	}
}