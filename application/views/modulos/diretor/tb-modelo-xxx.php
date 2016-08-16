<!-- Favoritos -->
<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-30 margin-top-10">
<div class="row">
	<div class="col-md-12">
		<i class="fa fa-files-o pull-left margin-top-5"  aria-hidden="true"></i><p class="float-left margin-top-2 margin-left-3">Dados</p>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table>
			<thead>
				<tr>
					<th>Dado</th>
					<th>Dado</th>
					<th class="text-center">Dado</th>
					<th class="text-center">Dado</th>
					<th class="text-center"><i class="fa fa-cogs" aria-hidden="true" title="Remover Arquivo"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php  
					if($arquivos){
				?>
				<tr class="linha-0">
					<td colspan = "5" class="text-center"><span>Nenhum Dado Postado</span></td>
				</tr>
				<?php } 
					else { 	
				?>
				<tr class="linha-<?= $i%2; ?>">
					<td><a target="_blank" href="" class="pink"></a></td>
					<td><a target="_blank" href="" class="pink"></a></td>
					<td><a target="_blank" href="" class="pink"></a></td>
					<td><a target="_blank" href="" class="pink"></a></td>
					<td class="text-center">
						<a class="pink removeFile" title="Remover Arquivo" href="javascript:void(0);" ><i class="fa fa-times" aria-hidden="true"></i></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<!-- ### Favoritos ### -->