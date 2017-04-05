<?php
function get_trabalho($id_trabalho)
{
	$json_file = file_get_contents('data/trabalhos/trabalhos.json');
	$t = json_decode($json_file);
	$trabalho = $t->trabalhos->trabalho;

	foreach($trabalho as $t)
	{
		if($t->id == $id_trabalho)
		{
			return $t;
			break;
		}
	}
}