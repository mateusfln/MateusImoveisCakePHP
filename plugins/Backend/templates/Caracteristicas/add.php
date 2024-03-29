<?php
use App\Model\Table\ImoveltiposTable;
$imoveltipos = new ImoveltiposTable();
$imoveltipos = $imoveltipos->find();
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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Caracteristicas</p>
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
                <?= $this->Form->create(null, ['type' => 'post']) ?>

                    <div class="card">
                    <div class="col-12 d-flex">
                        <div class="col-6 card">
                        <div class="card-body">
                            <h4 class="card_title">Cadastro de Caracteristicas</h4>
                            <?= $this->Form->control('nome', ['label' => 'Nome', 'type' => 'text', 'required' => true, 'class' => 'form-control']) ?>
                        </div>
                        </div>
                        <div class="col-6 card">
                        <div class="card-body">
                            <h4 class="card_title">Aplicar em:</h4>
                            <?php foreach ($imoveltipos as $imoveltipo): ?>
                            <?php $nomePost = str_replace(' ', '_', $imoveltipo['nome']); ?>
                            <?= $this->Form->control('imoveltipos[]', [
                                'type' => 'checkbox',
                                'id' => $nomePost,
                                'value' => $imoveltipo['id'],
                                'label' => $imoveltipo['nome'],
                                'class' => 'col-form-label'
                            ]) ?>
                            <?php endforeach; ?>
                        </div>
                        </div>
                    </div>
                    <button class="btn btn-inverse-success" type="submit"><i class="bi bi-plus-lg mr-1"></i> Adicionar</button>
                    </div>

                    <?= $this->Form->end() ?>

                <!-- Progress Table end -->
            </div>
            
        </div>
        <!--==================================*
                   End Main Section
        *====================================-->

