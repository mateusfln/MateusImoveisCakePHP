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
                                Tabela de Imóveis <a href="/src/View/adminCrud/Imovel/add.php"><button type="button" class="btn btn-inverse-success ml-3"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button></a>
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
                                                        <a class="ml-1" href="/src/View/adminCrud/Imovel/read.php?sort=<?=$campo?>&direction=ASC"><i class="bi bi-filter"></i></a>
                                                    <?php else:?>
                                                    <?php if(($_GET['direction']) == 'DESC'):?>
                                                        <a class="ml-1" href="/src/View/adminCrud/Imovel/read.php?sort=<?=$campo?>&direction=ASC"><i class="bi bi-filter"></i></a>
                                                    <?php else:?>
                                                        <a class="ml-1" href="/src/View/adminCrud/Imovel/read.php?sort=<?=$campo?>&direction=DESC"><i class="bi bi-filter"></i></a>
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
                                            <td><?=$imovel['inscricaoImobiliaria']?></td>
                                            <td><?=$imovel['logradouro']?></td>
                                            <td><?=$imovel['numeroLogradouro']?></td>
                                            <td><?=$imovel['rua']?></td>
                                            <td><?=$imovel['bairro']?></td>
                                            <td><?=$imovel['Cidade']?></td>
                                            <td><?=$imovel['Estado']?></td>
                                            <td><?=$imovel['Cep']?></td>
                                            <td><?=$imovel['Ibge']?></td>
                                            <td><?=$imovel['MetrosQuadrados']?></td>
                                            <td><?=$imovel['Quartos']?></td>
                                            <td><?=$imovel['Banheiros']?></td>
                                            <td><?=$imovel['VagasGaragem']?></td>
                                            <td><?=$imovel['Ativo']?></td>
                                            <td><?=$imovel['Criado']->format('Y-m-d H:i:s')?></td>
                                            <td><?=$imovel['Modificado']->format('Y-m-d H:i:s')?></td>
                                            <td><?=$imovel['CriadorId']?></td>
                                            <td><?=$imovel['ModificadorId']?></td>
                                            
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="/src/View/adminCrud/Imovel/update.php?id=<?=$imovel['id']?>&identificacao=<?=$imovel['identificacao']?>" class="btn btn-inverse-warning"><i class="bi bi-pencil-square mr-1"></i>Edit</a></li>
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
