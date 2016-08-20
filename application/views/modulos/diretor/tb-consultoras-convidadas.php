<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-30 margin-top-10">
	<div class="row">
		<div class="col-md-12">
			<i class="fa fa-user-plus pull-left margin-top-5"  aria-hidden="true"></i><p class="float-left margin-top-2 margin-left-3">Consultoras Convidadas</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table>
				<thead>
					<tr>
						<th width="20%">Nome</th>
						<th width="20%" class="text-center">Data do Convite</th>
						<th width="30%" class="text-center">E-mail</th>
						<th width="22%" class="text-center">Telefone</th>
						<th width="28%" class="text-center"><i class="fa fa-cogs" aria-hidden="true" title="Detalhar"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php  
						if(!$convidadas){
					?>
					<tr class="linha-0">
						<td colspan = "5" class="text-center"><span>Nenhuma Consultora Convidada</span></td>
					</tr>
					<?php } 
						else { 
							$i = 0;
						
						foreach ($convidadas as $consultora) {
							if($consultora->datacad){
								$acesso = date("d/m/Y H:i" , strtotime($consultora->datacad));
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
							<ul class="list-inline">
								<li>
									<a class="pink" href="javascript:void(0);" title="Reencaminhar Convite"><i class="fa fa-refresh" aria-hidden="true"></i></a>
								</li>
								<li>
									<a class="pink" href="javascript:void(0);" title="Remover Convite"><i class="fa fa-times" aria-hidden="true"></i></a>
								</li>
							</ul>
						</td>
					</tr>
					<?php $i++; } } ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
