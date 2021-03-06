<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-20 margin-top-10">
	<div class="row">
		<div class="col-md-12">
			<img src="<?= base_url('assets/images/play.gif')?>" alt="Vídeos da Trilha"> <span>Vídeos da Trilha</span>
		</div>
	</div>
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

							default:
								$classe = "fa-star-o";
								$title = "Adicionar aos Favoritos";
							break;
						}

						switch ($video['status']) {
							case 1:
								$sTitle = 'Atividade Não Concluída';
								$iClass = "fa fa-circle-thin";
							break;

							case 2:
								$sTitle = 'Atividade Concluída';
								$iClass = "fa fa-check-circle";
							break;

							default:
								$sTitle = 'Atividade Não Concluída';
								$iClass = "fa fa-circle-thin";
							break;
						}

						$bgref = $i%2;
				?>
					<tr class="linha-<?= $bgref ?>">
						<td><a href="<?= base_url('videos/view/'.$video['id']); ?>" class="pink"><?= $video['titulo'] ?></a></td>
						<td><a href="<?= base_url('videos/view/'.$video['id']); ?>" class="pink"><?= limitaTexto($video['descricao'],120) ?></a></td>
						<td class="text-center"><a href="<?= base_url('videos/view/'.$video['id']); ?>" title="<?= $video['views'] ?> Visualizações" class="pink"><?= $video['views'] ?></a></td>
						<td class="text-center"><a href="javascript:void(0)" class="pink favicon" title="<?= $title; ?>" alt="<?= $video['id']; ?>"><i id="favicon" class="fa <?= $classe; ?>" aria-hidden="true"></i></a></td>
						<td class="text-center fa-i" style="font-size:14px"><i class="<?= $iClass; ?>" aria-hidden="true" title="<?= $sTitle; ?>"></i></td>
					</tr>
				<?php $i++; } ?>
				</tbody>

			</table>
		</div>
	</div>
</div>