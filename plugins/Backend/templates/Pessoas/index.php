
<?php
$campos = array('ID','NOME','CPF','LOGIN','SENHA','ATIVO','CRIADO', 'MODIFICADO', 'CRIADOR ID', 'MODIFICADOR ID');
?>
        <!--==================================*
                   Main Section
        *====================================-->
        <div class="main-content-inner">
            <div class="row mb-4">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                            <h5 class="mr-4 mb-0 font-weight-bold">Dashboard</h5>
                            <div class="d-flex align-items-baseline dashboard-breadcrumb">
                                <p class="text-muted mb-0 mr-1 hover-cursor">Pessoas</p>
                                <i class="bi bi-chevron-right"></i>
                                <p class="text-muted mb-0 mr-1 hover-cursor">Read</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Progress Table start -->
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card_title">
                                Tabela de Pessoas <a href="pessoas/add"><button type="button" class="btn btn-inverse-success ml-3"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button></a>
                            </h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-center">
                                        <thead class="text-uppercase">
                                        <tr>
                                        <?php foreach($campos as $campo):?>
                                            <th scope="col">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <strong>
                                                        <?=$campo?> 
                                                    </strong>
                                                    <?php
                                                    $campo = strtolower($campo);
                                                    $campo = str_replace(" ", "_", $campo);
                                                    ?>
                                                    <?php if((empty($_GET['direction']))):?>
                                                        <a class="ml-1" href="pessoas/read?sort=<?=$campo?>&direction=ASC"><i class="bi bi-filter"></i></a>
                                                    <?php else:?>
                                                    <?php if(($_GET['direction']) == 'DESC'):?>
                                                        <a class="ml-1" href="pessoas/read?sort=<?=$campo?>&direction=ASC"><i class="bi bi-filter"></i></a>
                                                    <?php else:?>
                                                        <a class="ml-1" href="pessoas/read?sort=<?=$campo?>&direction=DESC"><i class="bi bi-filter"></i></a>
                                                    <?php endif;?>
                                                    <?php endif;?>
                                                </div>
                                            </th>
                                            <?php endforeach;?>
                                            <th scope="col"> Actions </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    <?php foreach($pessoas as $pessoa):?>
                                        <tr>
                                            <td><?=$pessoa['id']?></td>
                                            <td><?=$pessoa['nome']?></td>
                                            <td><?=$pessoa['cpf']?></td>
                                            <td><?=$pessoa['login']?></td>
                                            <td><?=$pessoa['senha']?></td>
                                            <td><?=$pessoa['ativo']?></td>
                                            <td><?=$pessoa['criado']?></td>
                                            <td><?=$pessoa['modificado']?></td>
                                            <td><?=$pessoa['criador_id']?></td>
                                            <td><?=$pessoa['modificador_id']?></td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="pessoas/update?id=<?=$pessoa['id']?>&nome=<?=$pessoa['nome']?>" class="btn btn-inverse-warning"><i class="bi bi-pencil-square mr-1"></i>Edit</a></li>
                                                    <?= $this->Form->create(null, [
                                                                    'url' => [
                                                                        'controller' => 'Pessoas',
                                                                        'action' => 'delete',
                                                                    ],
                                                                ]) ?>
                                                        <input type="hidden" name="delete_id" value="<?=$pessoa['id']?>">
                                                        <li class="mr-3"><button type="submit" class="btn btn-inverse-danger"><i class="bi bi-trash mr-1"></i>Delete</button></li>
                                                    <?= $this->Form->end() ?>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Table end -->
            </div>
            
        </div>
        <!--==================================*
                   End Main Section
        *====================================-->