<?php 
use App\Model\Table\ImoveisTable;
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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Mídias</p>
                                <i class="bi bi-chevron-right"></i>
                                <p class="text-muted mb-0 mr-1 hover-cursor">Create</p>
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
                                    <form enctype="multipart/form-data" method="POST">
                                        <h4 class="card_title">Cadastro de Mídias</h4>
                                        <div class="form-group">
                                            <label class="col-form-label">ID do Imovel</label>
                                            <select class="form-control" name='imovel_id'>
                                                <?php foreach ($imoveis as $imovel):?>
                                                    <option value="<?=$imovel['id']?>"/><?=$imovel['identificacao']?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <?php if (isset($_GET['erro'])):?>
                                            <p style="color: red"><?=$_GET['erro']?></p>
                                        <?php endif;?>
                                        </div>
                                       
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input multiple type="file" name="arquivo[]">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <button class="btn btn-inverse-success" type="submit"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button>
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

