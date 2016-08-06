<!-- Favoritos -->
<div class="container shadow-grey margin-top-10 bg-white border-radius padding-top-30 padding-bottom-50">
<div class="row">
	<div class="col-md-12">
		<i class="fa fa-th-list tableTitle"  aria-hidden="true"></i><p class="float-left margin-top-3 margin-left-5">Trilhas Configuradas</p>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table>
			<thead>
				<tr>
					<th>Título da Trilha</th>
					<th>Resumo da Trilha</th>
					<th class="text-center">Vídeos</th>
					<th class="text-center"><i class="fa fa-cogs" aria-hidden="true" title="Cofigurar Trilhas"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($trilhas){
						$i = 0;
						foreach ($trilhas as $trilha) {
						$link = base_url('admin/configurar_trilha/'.$trilha['id']);				
				 ?>
				<tr class="linha-<?= $i; ?>">
					<td><a href="<?= $link; ?>" class="pink"><?= $trilha['titulo']?></a></td>
					<td><a href="<?= $link; ?>" class="pink"><?= limitaTexto($trilha['descricao'], 120); ?></a></td>
					<td class="text-center"><a href="<?= $link; ?>" class="pink"><?= $trilha['nVideos']?></a></td>
					<td class="text-center"><a href="<?= $link; ?>" class="pink" title="Editar Trilha"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				</tr>
				<?php $i++; }} else { ?>
				<tr class="linha-0">
					<td colspan = '4' class="text-center">Nenhuma Trilha Cadastrada</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>
</div>
<!-- ### Favoritos ### -->