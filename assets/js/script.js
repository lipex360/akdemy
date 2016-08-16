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


	$('.form_ativar').submit(function(){
		var pass1 = $('.pass1').val();
		var pass2 = $('.pass2').val();
		if(pass1 != pass2){
			alert("Senhas Informadas são diferentes");
			$('.pass1').val("").focus();
			$('.pass2').val("");
			return false;
		}
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
	});
	
	$(".removeFile").click(function(){
		alert("remover");
	});

	// MASK
	var SPMaskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 0.0000-0000' : '(00) 0000-00009';
	},
	
	spOptions = {
		onKeyPress: function(val, e, field, options) {
		field.mask(SPMaskBehavior.apply({}, arguments), options);
	    }
	};

	$('.celphone').mask(SPMaskBehavior, spOptions);
})