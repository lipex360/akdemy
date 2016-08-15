<!-- Favoritos -->
<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-30 margin-top-10">
<div class="row">
	<div class="col-md-12">
		<i class="fa fa-files-o pull-left margin-top-5"  aria-hidden="true"></i><p class="float-left margin-top-2 margin-left-3">Arquivos da Trilha</p>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Data de Adição</th>
					<th class="text-center">Tipo</th>
					<th class="text-center">Tamanho</th>
					<th class="text-center"><i class="fa fa-cogs" aria-hidden="true" title="Remover Arquivo"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php  
					if(!$arquivos){
				?>
				<tr class="linha-0">
					<td colspan = "5" class="text-center"><span>Nenhum Arquivo Postado no Vídeo</span></td>
				</tr>
				<?php } 
					else { 
					$i = 0;
					foreach ($arquivos as $arquivo) {
						$data = date('d/m/Y H:i', strtotime($arquivo->datacad));
						$size = $arquivo->size;
						switch ($size) {
							case ($size>1024):
								$size = round(($size/1024),2)."mb";
							break;
							
							default:
								$size = $size."kb";
							break;
						}					
				?>
				<tr class="linha-<?= $i%2; ?>">
					<td><a target="_blank" href="<?= base_url($arquivo->path); ?>" class="pink"><?= $arquivo->name ?></a></td>
					<td><a target="_blank" href="<?= base_url($arquivo->path); ?>" class="pink"><?= $data ?></a></td>
					<td class="text-center"><a target="_blank" href="<?= base_url($arquivo->path); ?>" class="pink"><?= $arquivo->ext ?></a></a></td>
					<td class="text-center"><a target="_blank" href="<?= base_url($arquivo->path); ?>" class="pink"><?= $size ?></a></a></td>
					<td class="text-center">
						<a class="pink removeFile" title="Remover Arquivo" href="javascript:void(0);" ><i class="fa fa-times" aria-hidden="true"></i></a>
					</td>
				</tr>
				<?php $i++;}} ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<!-- ### Favoritos ### -->