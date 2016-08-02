<!-- Comentários -->
<div class="container shadow-grey bg-white border-radius padding-top-30 padding-bottom-50 margin-top-10">
<div class="row">
  <div class="col-md-12">
    <img src="<?= base_url('assets/images/comentarios.gif')?>" alt="Comentários"> <span>Comentários da Trilha</span>
  </div>
</div>

<?php for ($i=0; $i < 3; $i++) { ?>

<div class="row margin-top-20 comentarios">
  <div class="col-md-12">
    <p><img src="<?= base_url('assets/images/pencil.gif'); ?>" alt="Lapis" class="margin-right-5 pull-left">Aluno XXX comentou no Vídeo Título 1 em 22/06/2016</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt luctus metut</p>
  </div>
</div>

<?php } ?>
</div>
<!-- ### Comentários ### -->