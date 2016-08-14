<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function dataBR($datacad){

		$dtdia = date('N', strtotime($datacad));
		$dtmes = date('n', strtotime($datacad));

		$mesNum = array(1,2,3,4,5,6,7,8,9,10,11,12);
		$mesTexto = array(
			'Janeiro',
			'Fevereiro',
			'Março',
			'Abril',
			'Maio',
			'Junho',
			'Julho',
			'Agosto',
			'Setembro',
			'Outubro',
			'Novembro',
			'Dezembro');

		$diaNum = array(1,2,3,4,5,6,7);
		$diaTexto = array(
			'Segunda-Feira',
			'Terça-Feira',
			'Quarta-Feira',
			'Quinta-Feira',
			'Sexta-Feira',
			'Sábado',
			'Domingo');
		

		$diaSemana = str_replace($diaNum, $diaTexto, $dtdia);
		$mes = str_replace($mesNum, $mesTexto, $dtmes);

		$dataBR['dia'] = $diaSemana;
		$dataBR['mes'] = $mes;

		return $dataBR;
	}

	function ultimo_acesso($data){
			
		$diaNum = date('d', strtotime($data));
		$anoNum = date('Y', strtotime($data));
		$horas = date('H:i', strtotime($data));
		
		$data = dataBR($data);
		extract($data);
		$ultimo_acesso = "{$dia}, {$diaNum} de {$mes} de {$anoNum}, às {$horas}";
		return $ultimo_acesso;
	}

	function limitaTexto($texto, $limite){
		$contador = strlen($texto);
		if ( $contador >= $limite ) {      
			$texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
			return $texto;
		}
		else{
			return $texto;
		}
	}


	function atividade(array $atividade){
		$this->load->model('Login_model', 'usuario');
		
		$atividade['usuario_id']=$_SESSION['usuario']['id'];
		$this->usuario->atividade($atividade);
	}

	function upload(array $data, array $type, $path){

		$count = count($data['name']);
		$keys = array_keys($data);

		for ($i=0; $i<$count; $i++) {
			foreach ($keys as $key) {
				$array[$i][$key] = $data[$key][$i];
			}
		}

		// CRIA DIRETÓRIO SE NÃO EXISTIR
		if (!is_dir($path)) {
			mkdir($path, 0777, true);
		}

		$i = 0;
		foreach ($array as $value) {

			$tmp = $value['tmp_name'];
			$ext = substr($value['name'], strrpos($value['name'], '.'));
			$name = substr($value['name'], 0, strrpos($value['name'], '.'));
			$unique_name = limpaTexto($name)."[".substr(md5(date('Ymdhisu').$i),0,3)."]".$ext;
			$filepath = $path.$unique_name;

			$ext = str_replace(".", "", $ext);

			// CHECA SE EXTENÇÃO É ACEITA
			if(!in_array($ext, $type)){
				$error = 1;
			}

			// SEM ERROS
			else{
				$error = 0;
			}
			
			$files[$i] = array(
				"count" => $i,
				"name" => $name,
				"unique_name" => $unique_name,
				"ext" => $ext,
				"size" => ceil($value['size']/1024),
				"error" => $error
			);

			if($error == 0){
				move_uploaded_file($tmp, $filepath);
			}
			
			$i++;
		}

		return $files;
			
	}


	function limpaTexto($Name) {
		$Format = array();
		$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
		$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

		$Data = strtr(utf8_decode($Name), utf8_decode($Format['a']), $Format['b']);
		$Data = strip_tags(trim($Data));

		$Data = str_replace(' ', '-', $Data);
		$Data = str_replace(array('------', '-----', '----', '---', '--',), '-', $Data);

		return strtolower(utf8_encode($Data));
	}
	