<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document"> <!-- .modal-sm{Pequeno} .modal-lg{Grande} -->
		<div class="modal-content">
			
			<?php echo form_open_multipart(base_url('controller/metodo'));?>
			
				<div class="modal-header">
					<button type="button" class="close pink" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal title</h4>
				</div>

				<div class="modal-body">
				
				</div>
				
				<div class="modal-footer">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<button class="submit-sistem" name="action" value="nova_consultora">Texto do Botão</button>
						</div>
					</div>				
				</div>
			
			</form>

		</div>
	</div>
</div>