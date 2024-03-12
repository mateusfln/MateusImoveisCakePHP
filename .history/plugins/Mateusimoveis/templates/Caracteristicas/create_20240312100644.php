<?php
use App\Model\Entity\Caracteristica;
use App\Model\Entity\CaracteristicasImoveltipo;
use App\Model\Table\CaracteristicasImoveltiposTable;
use App\Model\Table\CaracteristicasTable;
use App\Model\Table\ImoveltiposTable;




$imoveltipos = new ImoveltiposTable();
$imoveltipos = $imoveltipos->find();

if (!empty($_POST)) {

    try {

        //print_r($_POST); die;
        $hoje = new \DateTimeImmutable();

        $caracteristica = new Caracteristica();
        $caracteristica['nome']($_POST['nome']);
        $caracteristica['ativo'](true);
        $caracteristica['criado']($hoje);
        $caracteristica['criadorId'](1);
        $caracteristica['modificadorId'](1);
        $caracteristica['modificado']($hoje);
        $dbCaracteristicas = new CaracteristicasTable();
        $dbCaracteristicas->create($caracteristica);
        $idCaracteristica = $dbCaracteristicas->getInsertId();

        foreach ($_POST['imoveltipos'] as $imovel) {

            $caracteristicasImoveltipos = new CaracteristicasImoveltipo();

            $caracteristicasImoveltipos['caracteristicaId']($idCaracteristica);
            $caracteristicasImoveltipos['imovelTipoId']($imovel);
            $caracteristicasImoveltipos['ativo'](true);
            $caracteristicasImoveltipos['criado']($hoje);
            $caracteristicasImoveltipos['criadorId'](1);
            $caracteristicasImoveltipos['modificadorId'](1);
            $caracteristicasImoveltipos['modificado']($hoje);

            $dbCaracteristicaImoveltipo = new CaracteristicasImoveltiposTable();
            $dbCaracteristicaImoveltipo->create($caracteristicasImoveltipos);
        }
        header('Location: https://mateusimoveis.local/src/View/adminCrud/Caracteristicas/read.php');
        $db->getConexao()->commit();
    } catch (Exception $e) {
        echo "Erro ao executar a transação: " . $e->getMessage();
        $db->getConexao()->rollback();
        header('Location: https://mateusimoveis.local/src/View/adminCrud/Caracteristicas/add.php');
    }

}

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">


<?= $this->Element('/admin/head')?>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--=========================*
         Page Container
*===========================-->
<div id="page-container">

<?= $this->Element('/admin/headerSection')?>
<?= $this->Element('/admin/sidebarMenu')?>


    <!--==================================*
               Main Content Section
    *====================================-->
    <div class="main-content page-content">

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
                <form method="POST">
                    <div class="card">
                    <div class="col-12 d-flex">
                            <div class="col-6 card">
                                <div class="card-body">
                                        <h4 class="card_title">Cadastro de Caracteristicas</h4>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nome</label>
                                            <input class="form-control" required type="text"name="nome">
                                        </div>
                                </div>
                            </div>
                            <div class="col-6 card">
                                <div class="card-body">
                                        <h4 class="card_title">Aplicar em:</h4>
                                        <div class="form-group">
                                            <?php foreach($imoveltipos as $imoveltipo):?>
                                            <?php $nomePost = str_replace(' ', '_', $imoveltipo['nome']); ?>
                                            <input type="checkbox" name="imoveltipos[]" id="<?=$nomePost?>" value="<?=$imoveltipo['id']()?>">
                                            <label for="<?=$nomePost?>" class="col-form-label"><?=$imoveltipo['nome']()?></label>
                                            <br>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-inverse-success" type="submit"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button>
                        </div>
                    </div>
                </form>
                <!-- Progress Table end -->
            </div>
            
        </div>
        <!--==================================*
                   End Main Section
        *====================================-->
    </div>
    <!--=================================*
           End Main Content Section
    *===================================-->

    <?= $this->Element('/admin/footer')?>

</div>

<?= $this->Element('/admin/scripts')?>

</body>

<!-- Mirrored from rtsolutz.com/vizzstudio/demo-falr/falr/dark-sidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 19:04:59 GMT -->
</html>

