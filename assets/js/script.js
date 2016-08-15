$(function(){
	$("#datepicker").datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		nextText: 'Próximo',
		prevText: 'Anterior'
	});

	$('.alerta').click(function(){
		$('.alerta').fadeOut('fast');
	})

	$('.horas').mask('00:00', {placeholder: "00:00"});

	setTimeout(function(){ 
		$(".alerta").fadeOut('fast'); }, 10000);

	$('.favicon').click(function(){
		var video_id = $(this).attr('alt');
		var ichildren = $(this).children();
		var alink = $(this);

		// var path = 'http://akdemy.com.br/Trilhas/video_favorito';
		var path = 'http://localhost/ci/akdemy/Trilhas/video_favorito';
		

		ichildren.removeAttr('class').addClass('fa fa-cog fa-spin');

		$.post(path, {videoId: video_id}, function(result){
			if(result == 1){
				ichildren.removeAttr('class').addClass('fa fa-star-o');
				alink.prop("title", "Adicionar aos Favoritos");
				
			} else{
				ichildren.removeAttr('class').addClass('fa fa-star');
				alink.prop("title", "Remover dos Favoritos");
			}
		})
	});

	$('.transmissao').change(function(){
		var valor = $(this).val();
		if(valor == 0){
			if($('#transmissao').is(':visible')){
				$("#transmissao").toggle('slow');
			}
			$('.required').removeAttr('required');
		} else {
			$("#transmissao").toggle('slow');
			$('.required').attr('required','required');
		}
	})
})