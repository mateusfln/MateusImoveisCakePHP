

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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Mídias</p>
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
                    <div class="card">
                    <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST">
                                        <h4 class="card_title">Editar <?=$_GET['identificacao']?></h4>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">identificacao</label>
                                            <input class="form-control" required type="text"name="identificacao" value="<?= $midiaIdentificacao()?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nome Disco</label>
                                            <input class="form-control" required type="text"name="nome_disco" value="<?= $midiaNomeDisco()?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Capa</label>
                                            <input class="ml-2" type="checkbox" name="capa" <?= $midiaCapa() ? ' checked="checked"' : ''?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Ativo</label>
                                            <input class="ml-2" type="checkbox" name="ativo" <?= $midiaAtivo() ? ' checked="checked"' : ''?>>
                                        </div>
                                        <div class="form-group">
                                        <button class="btn btn-inverse-success" type="submit"><i class="bi bi-plus-lg mr-1"></i>Editar</button>
                                        </div>
                                    </form>
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
