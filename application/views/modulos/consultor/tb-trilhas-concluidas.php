<!-- Trilhas Concluídas -->
<div class="row margin-top-50">
  <div class="col-md-12">
    <i class="fa fa-check-square-o tableTitle" aria-hidden="true"></i><p class="float-left margin-top-3">Trilhas Concluídas</p>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table>
      <thead>
        <tr>
          <th>Título da Trilha</th>
          <th>Resumo da Trilha</th>
          <th>Vídeos</th>
          <th>Tempo</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i=0; $i < 5; $i++) {
          $bgref = $i%2;
        ?>
        <tr class="linha-<?= $bgref ?>">
          <td><a href="" class="pink">Trilha 01</a></td>
          <td><a href="" class="pink">Nulla tincidunt luctus metus, at finibus massa euismod vel. Phasellus suscipit hendrerit. Cras magna...</a></td>
          <td class="text-center"><a href="" class="pink">05</a></td>
          <td class="text-center"><a href="" class="pink">30 dias</a></td>
        </tr>
        <?php }  ?>


      </tbody>
    </table>
  </div>
</div>
<!-- ### Trilhas Concluídas ### -->