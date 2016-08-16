<?php echo form_open(base_url('adm_consultoras/consultoras'));?>
	<div id="bg"></div>
	<div class="box">
		<div class="container">

			<div class="row">
				<div class="col-md-6 col-md-offset-3 bg-white radius">
				
					<div class="row">
						<div class="col-md-12 padding-top-10 padding-botton-10">
							<i class="fa fa-user-plus pull-left margin-top-5"  aria-hidden="true"></i><p class="float-left margin-top-2 margin-left-3"><b>Adicionar Nova Consultora</b></p>
							<a href="#closemd" class="pull-right pink"><i class="fa fa-times" aria-hidden="true"></i></a>
						</div>
					</div>

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

					<div class="row margin-top-20 margin-bottom-20">
						<div class="col-md-4 col-md-offset-4">
							<button class="submit-sistem" name="action" value="nova_consultora">Adicionar Consultora</button>
						</div>
					</div>

					<div class="row margin-bottom-30">
						<div class="col-md-12 text-center"><small>Um e-mail será encaminhado para a consultora com um link de ativação. <br>Quando a mesma aceitar o convite, você será notificada.</small></div>
					</div>

				</div>
			</div>
		</div>
	</div>
</form>
