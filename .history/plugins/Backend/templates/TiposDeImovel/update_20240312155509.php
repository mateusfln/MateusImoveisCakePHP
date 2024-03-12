<?php
$caracteristicasDAO = new Caracteristicas();
$caracteristicas = $caracteristicasDAO->buscarListaDeCaracteristicas();
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
                                    <p class="text-muted mb-0 mr-1 hover-cursor">Tipos de Imóvel</p>
                                    <i class="bi bi-chevron-right"></i>
                                    <p class="text-muted mb-0 mr-1 hover-cursor">Update</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Progress Table start -->
                    <div class="col-12 mt-4">
                        <form action="" method="post">
                            <div class="card">
                                <div class="col-12 d-flex">
                                    <div class="col-6 card">
                                        <div class="card-body">
                                            <h4 class="card_title">Editar <?= $imoveltipo['nome'] ?></h4>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Nome</label>
                                                <input class="form-control" required type="text" name="nome"
                                                    value="<?= $imoveltipo['nome'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Ativo</label>
                                                <input class="ml-2" type="checkbox" name="ativo"
                                                    <?= $imoveltipo['ativo'] ? ' checked="checked"' : '' ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 card">
                                        <div class="card-body">
                                            <h4 class="card_title">Caracteristicas:</h4>
                                            <div class="form-group">
                                                <?php foreach ($caracteristicas as $caracteristica): ?>
                                                    <?php $nomePost = str_replace(' ', '_', $caracteristica['nome']); ?>
                                                    <input type="checkbox" name="caracteristicas[]" id="<?= $nomePost ?>"
                                                        value="<?= $caracteristica['id'] ?>"
                                                        <?= in_array($caracteristica['id'], $arrImoveltipos) ? ' checked="checked"' : '' ?>>
                                                    <label for="<?= $nomePost ?>"
                                                        class="col-form-label"><?= $caracteristica['nome'] ?></label>
                                                    <br>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-inverse-success" type="submit"><i
                                        class="bi bi-plus-lg mr-1"></i>Adicionar</button>
                                <form action="" method="post">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Progress Table end -->
            </div>

        </div>
        <!--==================================*
                   End Main Section
        *====================================-->