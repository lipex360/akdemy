<div class="container shadow-grey bg-white border-radius padding-top-30 padding-bottom-50">

<!-- Vídeos da Trilha  -->
<form action="<?= base_url('admin/trilha_cadastrar'); ?>" method="post">
	
	<div class="row">
		<div class="col-md-12">
			<i class="fa fa-pencil-square-o tableTitle" aria-hidden="true"></i></i> <span><b>Editor de Trilhas</b></span>
			<a href="javascript:history.back()" class="pull-right pink"><i class="fa fa-chevron-left margin-right-5" aria-hidden="true"></i></i>Voltar</a>
		</div>
	</div>

	<div class="row margin-top-30">
		<div class="col-md-12">
			<p><i class="fa fa-pencil margin-right-5" aria-hidden="true"></i>Editar Dados da Trilha</p>
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
			<button class="submit-sistem" name="action" value="cad_trilha">Alterar Trilha</button>
		</div>
	</div>
</form>
<!-- ### Vídeos da Trilha ### -->

</div>