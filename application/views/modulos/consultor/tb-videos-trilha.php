<div class="row margin-top-10">
	<div class="col-md-12">
		
		<table>
			<thead>
				<tr>
					<th>Título do Vídeo</th>
					<th>Resumo do Vídeo</th>
					<th class="fa-i text-center"><i class="fa fa-eye" aria-hidden="true" title="Visualizações"></i></th>
					<th class="fa-i text-center"><i class="fa fa-star" aria-hidden="true"></i></th>
					<th class="fa-i text-center"><i class="fa fa-dot-circle-o" aria-hidden="true" title="Status do Vídeo"></i></th>
				</tr>
			</thead>

			<tbody>
			<?php 
				$i = 0;
				foreach ($videos as $video) {

					switch ($video['favorito']) {
						case 0:
							$classe = "fa-star-o";
							$title = "Adicionar aos Favoritos";
						break;
						
						case 1:
							$classe = "fa-star";
							$title = "Remover dos Favoritos";
						break;
					}

					$bgref = $i%2;
			?>
				<tr class="linha-<?= $bgref ?>">
					<td><a href="<?= base_url('videos/view/'.$video['id']); ?>" class="pink"><?= $video['titulo'] ?></a></td>
					<td><a href="<?= base_url('videos/view/'.$video['id']); ?>" class="pink"><?= limitaTexto($video['descricao'],120) ?></a></td>
					<td class="text-center"><a href="<?= base_url('videos/view/'.$video['id']); ?>" class="pink"><?= $video['views'] ?></a></td>
					<td class="text-center"><a href="javascript:void(0)" class="pink favicon" title="<?= $title; ?>" alt="<?= $video['id']; ?>"><i id="favicon" class="fa <?= $classe; ?>" aria-hidden="true"></i></a></td>
					<td class="text-center fa-i" ><i class="fa fa-check-circle" aria-hidden="true" title="Vídeo Concluído"></i></td>
				</tr>
			<?php $i++; } ?>
			</tbody>

		</table>
	</div>
</div>