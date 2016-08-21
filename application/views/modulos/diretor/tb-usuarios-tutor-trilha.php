<!-- Favoritos -->
<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-30 margin-top-10" id="usuarios_tutor">
<div class="row">
	<div class="col-md-12">
		<i class="fa fa-list-ul pull-left margin-top-5"  aria-hidden="true"></i><p class="float-left margin-top-2 margin-left-3">Associar Usuários à Trilha</p>
	</div>
</div>

<div class="row margin-top-10">
	<div class="col-md-12">
		<table>
			<thead>
				<tr>
					<th width="2%" class="text-center"><input type="checkbox" name='tudo' class="tudo" /></th>
					<th width="20%">Nome</th>
					<th width="20%">Última Atividade</th>
					<th width="30%" class="text-center">E-mail</th>
					<th width="45%" class="text-center">Telefone</th>
				</tr>
			</thead>
			
			<tbody>
					<?php
						if(isset($consultores_diretor[0])){
							$i=0;
							foreach ($consultores_diretor as $usuarios) {		
		 			?>
						<tr class="linha-<?= $i%2; ?> ckbs">
							<td class="text-center"><input type="checkbox" name="usuId[]" value="<?= $usuarios['id']; ?>"/> </td>
							<td><a href="<?= $usuarios['id']; ?>" class="pink" ><?= $usuarios['nome']; ?></a></td>
							<td><a href="" class="pink" ><?= date("d/m/Y H:i" , strtotime($usuarios['acesso'])); ?></a></td>
							<td class="text-center"><a href="" class="pink" ><?= $usuarios['email']; ?></a></td>
							<td class="text-center"><a href="" class="pink" ><?= $usuarios['telefone']; ?></a></td>
						</tr>
					<?php 
						$i++; } } else {
					 ?>
						<tr class="linha-0">
							<td colspan="5" class="text-center">Nenhuma consultora disponível para associar a esta Trilha</td>
						</tr>
					 <?php } ?>
			</tbody>
		</table>
	</div>
</div>
</div>

<!-- ### Favoritos ### -->