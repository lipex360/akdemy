<!-- Favoritos -->
<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-30 margin-top-10">
<div class="row">
	<div class="col-md-12">
		<i class="fa fa-video-camera pull-left margin-top-5"  aria-hidden="true"></i><p class="float-left margin-top-2 margin-left-3">Vídeos Configurados</p>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table>
			<thead>
				<tr>
					<th>Título do Vídeo</th>
					<th>Resumo do Vídeo</th>
					<th>Trilha</th>
					<th class="text-center">Tempo</th>
					<th class="text-center"><i class="fa fa-cogs" aria-hidden="true" title="Cofigurar Trilhas"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if($videosConfigurados){
						$i = 0;
						foreach ($videosConfigurados as $videos) {
						$link = base_url('adm_videos/editar/'.$videos['id']);
						
						if($i>5){
							break;
						}
				 ?>
				<tr class="linha-<?= $i%2; ?>">
					<td><a href="<?= $link ?>" class="pink"><?= $videos['titulo']; ?></a></td>
					<td><a href="<?= $link ?>" class="pink"><?= limitaTexto($videos['resumo'], 50); ?></a></td>
					<td><a href="<?= $link ?>" class="pink"><?= $videos['trilha']; ?></a></td>
					<td class="text-center"><a href="<?= $link ?>" class="pink"><?= str_pad($videos['duracao'], 2, "0", STR_PAD_LEFT)." $videos[mh]"; ?></a></td>
					<td class="text-center"><a href="<?= $link ?>" class="pink" title="Editar Trilha"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				</tr>
				<?php $i++; } } else { ?>
					<tr class="linha-0">
						<td colspan='5' class="text-center">
							<span>Nenhum Vídeo Configurado</span>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<!-- ### Favoritos ### -->