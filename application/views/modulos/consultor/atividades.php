<!-- Resumo de Atividades -->
<div class="container shadow-grey bg-white border-radius padding-top-30 padding-bottom-50">

<div class="row margin-top-10">
  <div class="col-md-3">
    <div class="foto border-radius">
      <img src="<?= base_url('assets/images/blank_imagem.gif')?>" alt="Imagem de Apresentação">
    </div>
  </div>
  
  <div class="col-md-9">
    <div class="row mensagem-aluno">
      <div class="col-md-12">
        <h4 class="margin-0">Ola <?= $_SESSION['usuario']['nome']?></h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum distinctio ad excepturi doloremque nesciunt, fugit eveniet voluptatum, nihil blanditiis. Amet reiciendis velit maxime officia cum harum culpa delectus  Ut, assumenda! voluptatem hic excepturi ipsum, quasi totam voluptates quo ea tempora! Ut, assumenda... <a href="#" class="pink"><b>continue a leitura!</b></a></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 resumo">
        <h4 class="">Resumo de Atividades</h4>
        <p><b>Último Acesso: </b><?= ultimo_acesso($_SESSION['usuario']['acesso']); ?></p>
        <p><b>Trilhas Indicadas: </b><?= $trilhas_indicadas; ?></p>
      </div>
    </div>
  </div>

</div>
</div>
<!-- ### Resumo de Atividades ### -->