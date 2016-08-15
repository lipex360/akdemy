<?php echo form_open_multipart("adm_videos/editar/$video_editar->id");?>
	<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-30 margin-top-10">
		<div class="row">
			<div class="col-md-12">
				<i class="fa fa-pencil pull-left margin-top-5"  aria-hidden="true"></i><p class="float-left margin-top-2 margin-left-3">Editar Vídeos</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-5">
				<div class="row margin-top-10">
					<div class="col-md-12">
						<label for="">Título do Vídeo</label>
						<input type="text" name="titulo" class="input-sistem" value="<?= $video_editar->titulo; ?>" placeholder="Detalhe o Título da Trilha" required="required">
					</div>
				</div>
				
				<div class="row margin-top-10">
					<div class="col-md-12">
						<label for="trilha_id">Trilha do Vídeo</label>
						<select name="trilha_id" id="trilha_id" class="input-sistem" required="required">
							
							<?php
								if($trilha_configurada){
								foreach ($trilha_configurada as $trilha) {
							?>
							<option value="<?= $trilha->id?>"><?= $trilha->titulo?></option>
							<?php }} if(!$trilhas) {?>
								<option value="" disabled>Nenhuma outra trilha Configurada</option>
							<?php
								} else {
								foreach ($trilhas as $trilha) {
							?>
							<option value="<?= $trilha->id?>"><?= $trilha->titulo?></option>
							<?php }}?>
							
							
						</select>
					</div>
				</div>

				<div class="row margin-top-10">
					<div class="col-md-12">
						<label for="">Link do Vídeo</label>
						<input type="text" name="link" class="input-sistem" value="<?= $video_editar->link; ?>" placeholder="Copie e cole aqui o Link do Youtube" required="required">
					</div>
				</div>

				<?php 
					switch ($video_editar->transmissao) {
						case 0:
							$display = "display-none";
							$trDbValue = 0;
							$trDbText = "Não";
							$trans_value = 1;
							$trans_text = "Sim";

							$video_editar->data = "";

							$required = "";
						break;

						case 1:
							$trDbValue = 1;
							$trDbText = "Sim";
							$trans_value = 0;
							$trans_text = "Não";

							$display = "";
							$data = explode("-", $video_editar->data);
							$video_editar->data = "{$data[2]}/{$data[1]}/{$data[0]}";

							$required = "required='required'";
						break;
					}
				 ?>

				<div class="row margin-top-10">
					<div class="col-md-5">
						<label for="set_video">Transmissão ao vivo?</label>
						<select name="transmissao" id="set_video" class="input-sistem transmissao" required="required">
							<option value="<?= $trDbValue ?>"><?= $trDbText ?></option>
							<option value="<?= $trans_value ?>"><?= $trans_text ?></option>
							
						</select>
					</div>
				</div>
				
				
				<div id="transmissao" class="<?= $display ?>">
					<div class="row margin-top-10">
						<div class="col-md-5">
							<label for="">Data do Evento</label>
							<input type="date" id="datepicker" name="data" value="<?= $video_editar->data; ?>" class="input-sistem required" <?= $required?> >
						</div>
						<div class="col-md-5">
							<label for="">Hora do Evento (24h)</label>
							<input type="text" name="hora" class="input-sistem horas required" value="<?= $video_editar->hora; ?>" <?= $required?> >
						</div>
					</div>
				</div>

				<div class="row margin-top-10">
					<div class="col-md-3">
						<label for="">Duração</label>
						<input type="text" name="duracao" class="input-sistem" placeholder="Tempo" value="<?= $video_editar->duracao; ?>" required="required">
					</div>
					
					<?php 
						switch ($video_editar->mh) {
							case 'minuto(s)':
								$value = "hora(s)";
							break;

							case 'horas(s)':
								$value = "minuto(s)";
							break;
						}
					 ?>

					<div class="col-md-5">
						<label for="">&nbsp;</label>
						<select name="mh" id="" class="input-sistem" required="">
							<option value="<?= $video_editar->mh; ?>"><?= $video_editar->mh; ?></option>
							<option value="<?= $value ?>"><?= $value ?></option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-md-offset-1 ">
				<iframe width="100%" height="300" src="https://www.youtube.com/embed/<?= $video_editar->stream;?>?autoplay=<?= $video_editar->transmissao;?>" class="bg-pink" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		

		<div class="row margin-top-10">
			<div class="col-md-12">
				<label for="">Descrição do Vídeo</label>
				<textarea name="descricao" class="input-sistem" style="min-height:150px" placeholder="Descreva as informações da Trilha" required="required"><?= $video_editar->descricao; ?></textarea>
			</div>
		</div>
	</div>
	<?php $this->load->view('modulos/diretor/tb-videos-arquivos'); ?>
	<?php $this->load->view('modulos/diretor/adm-video-upload'); ?>
	<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-30 margin-top-10">
		<div class="row margin-top-10">
			<div class="col-md-2">
				<button class="submit-sistem" name="action" value="editar">Alterar Vídeo</button>
			</div>
		</div>
	</div>
</form>