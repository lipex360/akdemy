<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-30 margin-top-10">
	<div class="row">
		<div class="col-md-12">
			<i class="fa fa-user pull-left margin-top-5"  aria-hidden="true"></i><p class="float-left margin-top-2 margin-left-3">Consultoras Ativas</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table>
				<thead>
					<tr>
						<th width="20%">Nome</th>
						<th width="20%" class="text-center">Ultima Atividade</th>
						<th width="30%" class="text-center">E-mail</th>
						<th width="22%" class="text-center">Telefone</th>
						<th width="28%" class="text-center"><i class="fa fa-cogs" aria-hidden="true" title="Detalhar"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php  
						if(!$ativas){
					?>
					<tr class="linha-0">
						<td colspan = "5" class="text-center"><span>Nenhuma Consultora Ativa</span></td>
					</tr>
					<?php } 
						else { 
							$i = 0;
							foreach ($ativas as $consultora) {
								if($consultora->acesso){
									$acesso = date("d/m/Y H:i" , strtotime($consultora->acesso));
								} else {
									$acesso = "N/A";
								}								
					?>
					<tr class="linha-<?= $i%2; ?>">
						<td><a target="_blank" href="" class="pink"><?= $consultora->nome; ?></a></td>
						<td class="text-center"><a target="_blank" href="" class="pink"><?= $acesso; ?></a></td>
						<td class="text-center"><a target="_blank" href="" class="pink"><?= $consultora->email; ?></a></td>
						<td class="text-center"><a target="_blank" href="" class="pink"><?= $consultora->telefone; ?></a></td>
						<td class="text-center">
							<a class="pink removeFile" title="Detalhar" href="javascript:void(0);" ><i class="fa fa-search-plus" aria-hidden="true"></i></a>
						</td>
					</tr>
					<?php $i++; } } ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
