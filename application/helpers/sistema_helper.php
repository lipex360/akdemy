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