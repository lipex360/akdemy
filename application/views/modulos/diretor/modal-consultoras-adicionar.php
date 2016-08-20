<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url('adm_consultoras/consultoras'));?>
			<div class="modal-header">
				<button type="button" class="close pink" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Adicionar Nova Consultora</h4>
			</div>
			
			<div class="modal-body">
				
				<div class="row margin-top-10">
					<div class="col-md-12">
						<label for="">Nome</label>
						<input type="text" name="nome" class="input-sistem" placeholder="Informe o Nome da Consultora" required="required">
					</div>
				</div>

				<div class="row margin-top-10">
					<div class="col-md-12">
						<label for="">E-mail</label>
						<input type="email" name="email" class="input-sistem" placeholder="Informe o Email da Consultora" required="required">
					</div>
				</div>

				<div class="row margin-top-10">
					<div class="col-md-4">
						<label for="">Telefone</label>
						<input type="telefone" name="telefone" class="input-sistem celphone" placeholder="(XX) X.XXXX-XXXX" required="required">
					</div>
				</div>

			</div>
			
			<div class="modal-footer">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<button class="submit-sistem" name="action" value="nova_consultora">Adicionar Consultora</button>
					</div>
				</div>	

				<div class="row margin-top-10">
					<div class="col-md-12 text-center"><small>Um e-mail será encaminhado para a consultora com um link de ativação. <br>Quando a mesma aceitar o convite, você será notificada.</small></div>
				</div>		

			</div>

			</form>
		</div>
	</div>
</div>