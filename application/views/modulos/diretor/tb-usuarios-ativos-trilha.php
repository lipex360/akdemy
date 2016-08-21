<!-- Favoritos -->
<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-30 margin-top-10" id="usuarios_ativos">
<div class="row">
	<div class="col-md-12">
		<i class="fa fa-list-ul pull-left margin-top-5"  aria-hidden="true"></i><p class="float-left margin-top-2 margin-left-3">Usuários Associados à Trilha</p>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<small>A trilha só será exibida às consultoras quando pelo menos 1 vídeo estiver associado a ela.</small>
	</div>
</div>

<div class="row margin-top-10">
	<div class="col-md-12">
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Última Atividade</th>
					<th class="text-center">E-mail</th>
					<th class="text-center">Telefone</th>
					<th><i class="fa fa-cogs" aria-hidden="true" title="Remover Consultora"></i></th>
				</tr>
			</thead>
			
			<tbody>
				<?php echo form_open_multipart(base_url('controller/metodo'));?>
					<?php
						if(isset($usuarios_trilhas[0])){
							$i=0;
							foreach ($usuarios_trilhas as $usuarios) {		
		 			?>
						<tr class="linha-<?= $i%2; ?>">
							<td><a href="<?= $usuarios['id']; ?>" class="pink" ><?= $usuarios['nome']; ?></a></td>
							<td><a href="" class="pink" ><?= date("d/m/Y H:i" , strtotime($usuarios['acesso'])); ?></a></td>
							<td class="text-center"><a href="" class="pink" ><?= $usuarios['email']; ?></a></td>
							<td class="text-center"><a href="" class="pink" ><?= $usuarios['telefone']; ?></a></td>
							<td><a href="javascript:void(0)" class="pink"><i class="fa fa-times"></i></a></td>
						</tr>
					<?php 
						$i++; } } else {
					 ?>
						<tr class="linha-0">
							<td colspan="5" class="text-center">Nenhuma Consultora Ativa Vinculada à Trilha</td>
						</tr>
					 <?php } ?>
				</form>
			</tbody>
		</table>
	</div>
</div>
</div>
<!-- ### Favoritos ### -->