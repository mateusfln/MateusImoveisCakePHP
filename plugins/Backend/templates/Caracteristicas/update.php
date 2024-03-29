 <?php
 use App\Model\Table\ImoveltiposTable;
 use Cake\ORM\TableRegistry;
 $imoveltiposTable = new ImoveltiposTable();
 $imoveltipos = $imoveltiposTable->find();

$caracteristicasImoveltiposTable = TableRegistry::getTableLocator()->get('CaracteristicasImoveltipos');
$caracteristicasImoveltipos = $caracteristicasImoveltiposTable->find()->where(['CaracteristicasImoveltipos.caracteristica_id =' => $_GET['id']]);

$arrCaracteristicas = [];

foreach ($caracteristicasImoveltipos as $caracteristicas) {
    $arrCaracteristicas[] = $caracteristicas->imoveltipo_id;
}

$caracteristicaTable = TableRegistry::getTableLocator()->get('Caracteristicas');
$caracteristica = $caracteristicaTable->get($_GET['id']);
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
                                    <p class="text-muted mb-0 mr-1 hover-cursor">Update</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                        <!-- Progress Table start -->
                        <div class="col-12 mt-4">
                            <?= $this->Form->create(null, ['type' => 'post'])?>
                            
                            <div class="card">

                                <div class="col-12 d-flex">
                                    <div class="col-6 card">
                                        <div class="card-body">
                                            <h4 class="card_title">Cadastro de Caracteristicas</h4>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Nome</label>
                                                <input class="form-control" required type="text" name="nome" value="<?= $caracteristica['nome'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Ativo</label>
                                                <input class="ml-2" type="checkbox" name="ativo" <?= $caracteristica['ativo'] ? ' checked="checked"' : '' ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 card">
                                        <div class="card-body">
                                            <h4 class="card_title">Aplicar em:</h4>
                                            <div class="form-group">
                                                <?php foreach ($imoveltipos as $imoveltipo) : ?>
                                                    <?php $nomePost = str_replace(' ', '_', $imoveltipo['nome']); ?>
                                                    <input type="checkbox" name="imoveltipos[]" id="<?= $nomePost ?>" value="<?= $imoveltipo['id'] ?>" <?= in_array($imoveltipo['id'], $arrCaracteristicas) ? ' checked="checked"' : '' ?>>
                                                    <label for="<?= $nomePost ?>" class="col-form-label"><?= $imoveltipo['nome'] ?></label>
                                                    <br>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-inverse-success" type="submit"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button>
                            </div>
                            <?= $this->Form->end()?>
                        </div>
                   
                </div>
                <!-- Progress Table end -->
            </div>

        </div>
        <!--==================================*
                   End Main Section
        *====================================-->