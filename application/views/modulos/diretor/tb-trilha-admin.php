<!-- Favoritos -->
<div class="row margin-top-50">
  <div class="col-md-12">
    <i class="fa fa-th-list tableTitle"  aria-hidden="true"></i><p class="float-left margin-top-3 margin-left-5">Trilhas Configuradas</p>
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
          <th class="text-center"><i class="fa fa-cogs" aria-hidden="true" title="Cofigurar Trilhas"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php
          if($num_rows == 0){
        ?>
        
        <tr class="linha-0">
         <td colspan=4 class="text-center">Nenhuma Trilha Cadastrada</td>
        </tr>

        <?php

          } else {
            $i = 0;
            

            foreach ($result as $trilha) {
              $bgref = $i%2;            
        ?>
        <tr class="linha-<?= $bgref ?>">
          <td><a href="" class="pink"><?= $trilha->titulo; ?></a></td>
          <td><a href="" class="pink"><?= limitaTexto($trilha->descricao, 130); ?></a></td>
          <td class="text-center"><a href="" class="pink">05</a></td>
          <td class="text-center"><a href="" class="pink" title="Editar Trilha"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
        </tr>
        <?php $i++;}} ?>

      </tbody>
    </table>
  </div>
</div>
<!-- ### Favoritos ### -->