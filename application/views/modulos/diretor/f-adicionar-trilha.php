<div class="container shadow-grey bg-white border-radius padding-top-30 padding-bottom-50">

<!-- Vídeos da Trilha  -->
<form action="<?= base_url('admin/trilha_cadastrar'); ?>" method="post">

	<div class="row margin-top-30">
		<div class="col-md-12">
			<p><i class="fa fa-plus margin-right-5" aria-hidden="true"></i>Adicionar Nova Trilha</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-5">
			<input type="text" name="titulo" class="input-sistem" placeholder="Título da Trilha" required="required">
		</div>
	</div>

	<div class="row margin-top-10">
		<div class="col-md-12">
			<textarea name="descricao" class="input-sistem" style="min-height:150px" placeholder="Descrição da Trilha" required="required"></textarea>
		</div>
	</div>

	<div class="row margin-top-10">
		<div class="col-md-2">
			<button class="submit-sistem" name="action" value="cad_trilha">Adicionar Trilha</button>
		</div>
	</div>
</form>
<!-- ### Vídeos da Trilha ### -->

</div>