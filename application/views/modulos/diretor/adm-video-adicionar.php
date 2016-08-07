<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-30 margin-top-10">

	<form action="<?= base_url('adm_videos/cadastrar'); ?>" method="post">

		<div class="row">
			<div class="col-md-12">
				<i class="fa fa-plus pull-left margin-top-5"  aria-hidden="true"></i><p class="float-left margin-top-2 margin-left-3">Adicionar Novo Vídeos</p>
			</div>
		</div>

		<div class="row margin-top-10">
			<div class="col-md-5">
				<label for="">Título do Vídeo</label>
				<input type="text" name="titulo" class="input-sistem" placeholder="Detalhe o Título da Trilha" required="required">
			</div>
		</div>

		<div class="row margin-top-10">
			<div class="col-md-5">
				<label for="">Link do Vídeo</label>
				<input type="text" name="link" class="input-sistem" placeholder="Copie e cole aqui o Link do Youtube" required="required">
			</div>
		</div>

		<div class="row margin-top-10">
			<div class="col-md-2">
				<label for="set_video">Transmissão ao vivo?</label>
				<select name="trasmissao" id="set_video" class="input-sistem trasmissao">
					<option value="">Selecione</option>
					<option value="1">Sim</option>
					<option value="0">Não</option>
				</select>
			</div>
		</div>
		
		<div id="transmissao" class="display-none">
			<div class="row margin-top-10">
				<div class="col-md-2">
					<label for="">Data</label>
					<input type="date" id="datepicker" name="data" class="input-sistem required">
				</div>
				<div class="col-md-2">
					<label for="">Hora (24h)</label>
					<input type="text" name="hora" class="input-sistem horas required">
				</div>
			</div>
		</div>
		

		<div class="row margin-top-10">
			<div class="col-md-12">
				<label for="">Descrição do Vídeo</label>
				<textarea name="descricao" class="input-sistem" style="min-height:150px" placeholder="Descreva as informações da Trilha" required="required"></textarea>
			</div>
		</div>

		<div class="row margin-top-10">
			<div class="col-md-2">
				<button class="submit-sistem" name="action" value="cad_trilha">Adicionar Vídeo</button>
			</div>
		</div>


	</form>

</div>