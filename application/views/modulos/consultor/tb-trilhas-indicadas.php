<!-- Trilhas Sugeridas -->
<div class="row margin-top-30">
  <div class="col-md-12">
    <i class="fa fa-television tableTitle" aria-hidden="true"></i><p class="float-left margin-top-3">Trilhas Indicadas</p>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table>
      <thead>
        <tr>
          <th>Título da Trilha</th>
          <th>Resumo da Trilha</th>
          <th class="text-center">Vídeos</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $i = 0;

            if($tb_trilhas){
            foreach ($tb_trilhas as $video) {           
            $bgref = $i%2;
        ?>
        <tr class="linha-<?= $bgref; ?>">
          <td><a href="<?= base_url('trilhas/percurso/'.$video['id']); ?>" class="pink"><?= $video['titulo']; ?></a></td>
          <td><a href="<?= base_url('trilhas/percurso/'.$video['id']); ?>" class="pink"><?= limitaTexto($video['descricao'], 120); ?></a></td>
          <td class="text-center"><a href="<?= base_url('trilhas/percurso/'.$video['id']); ?>" class="pink"><?= $video['videos']; ?></a></td>
        </tr>
        <?php $i++;} } else { ?>
        <tr class="linha-0">
          <td colspan=3 class="text-center"><span>Você não tem nenhuma trilha indicada para concluir :)</span></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<!-- ### Trilhas Sugeridas ### -->

<!--  -->