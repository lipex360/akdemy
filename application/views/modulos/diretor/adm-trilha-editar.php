<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-30 margin-top-10">
<!-- Vídeos da Trilha  -->

<form action="<?= base_url('adm_trilhas/editar/'.$this->uri->segment(3)); ?>" method="post">
	<input type="hidden" name="trilha_id" value="<?= $trilha['id']; ?>" id="">
	<div class="row">
		<div class="col-md-12">
			<i class="fa fa-pencil pull-left margin-top-5"  aria-hidden="true"></i><p class="float-left margin-top-2 margin-left-3">Editar Dados da Trilha</p>
		</div>
	</div>

	<div class="row margin-top-10">
		<div class="col-md-5">
			<label for="">Título da Trilha</label>
			<input type="text" name="titulo" class="input-sistem" value="<?= $trilha['titulo']; ?>" placeholder="Título da Trilha" required="required">
		</div>
	</div>

	<div class="row margin-top-10">
		<div class="col-md-12">
			<label for="">Descrição da Trilha</label>
			<textarea name="descricao" class="input-sistem" style="min-height:150px" placeholder="Descrição da Trilha" required="required"><?= $trilha['descricao']; ?></textarea>
		</div>
	</div>

	<div class="row margin-top-10">
		<div class="col-md-2">
			<button class="submit-sistem" name="action" value="set_trilha">Alterar Trilha</button>
		</div>
	</div>
</form>
<!-- ### Vídeos da Trilha ### -->

</div>