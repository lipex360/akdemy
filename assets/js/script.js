$(function(){

	$('.alerta').click(function(){
		$('.alerta').fadeOut('fast');
	})

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
	})
})