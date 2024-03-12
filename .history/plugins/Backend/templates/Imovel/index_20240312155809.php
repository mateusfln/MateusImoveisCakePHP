<?php
use App\Model\Table\ImoveisTable;
$campos = array(
    'Identificacao',
    'Matricula',
    'inscricaoImobiliaria',
    'logradouro',
    'NumeroLogradouro',
    'Rua',
    'Complemento',
    'Bairro',
    'Cidade',
    'Estado',
    'Cep',
    'Ibge',
    'metrosQuadrados',
    'Quartos',
    'Banheiros',
    'Garagem');

$imoveis = new ImoveisTable();
$imoveis = $imoveis->find();

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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Imóveis</p>
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
                                Tabela de Imóveis <a href="imovel/add"><button type="button" class="btn btn-inverse-success ml-3"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button></a>
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
                                                        <a class="ml-1" href="imovel/read?sort=<?=$campo?>&direction=ASC"><i class="bi bi-filter"></i></a>
                                                    <?php else:?>
                                                    <?php if(($_GET['direction']) == 'DESC'):?>
                                                        <a class="ml-1" href="imovel/read?sort=<?=$campo?>&direction=ASC"><i class="bi bi-filter"></i></a>
                                                    <?php else:?>
                                                        <a class="ml-1" href="imovel/read?sort=<?=$campo?>&direction=DESC"><i class="bi bi-filter"></i></a>
                                                    <?php endif;?>
                                                    <?php endif;?>
                                                </div>
                                            </th>
                                            <?php endforeach;?>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    <?php foreach($imoveis as $imovel):?>
                                        <tr>
                                            <th scope="row"><?=$imovel['id']?></th>
                                            <td><?=$imovel['identificacao']?></td>
                                            <td><?=$imovel['matricula']?></td>
                                            <td><?=$imovel['inscricao_imobiliaria']?></td>
                                            <td><?=$imovel['logradouro']?></td>
                                            <td><?=$imovel['numero_logradouro']?></td>
                                            <td><?=$imovel['rua']?></td>
                                            <td><?=$imovel['bairro']?></td>
                                            <td><?=$imovel['cidade']?></td>
                                            <td><?=$imovel['estado']?></td>
                                            <td><?=$imovel['cep']?></td>
                                            <td><?=$imovel['ibge']?></td>
                                            <td><?=$imovel['metrosQuadrados']?></td>
                                            <td><?=$imovel['quartos']?></td>
                                            <td><?=$imovel['banheiros']?></td>
                                            <td><?=$imovel['vagasGaragem']?></td>
                                            <td><?=$imovel['ativo']?></td>
                                            <td><?=$imovel['criado']?></td>
                                            <td><?=$imovel['modificado']?></td>
                                            <td><?=$imovel['criador_id']?></td>
                                            <td><?=$imovel['modificadorId']?></td>
                                            
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="imovel/update?id=<?=$imovel['id']?>&identificacao=<?=$imovel['identificacao']?>" class="btn btn-inverse-warning"><i class="bi bi-pencil-square mr-1"></i>Edit</a></li>
                                                    <form method="POST">
                                                        <input type="hidden" name="delete_id" value="<?=$imovel['id']?>">
                                                        <li class="mr-3"><button type="submit" class="btn btn-inverse-danger"><i class="bi bi-trash mr-1"></i>Delete</button></li>
                                                    </form>
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
