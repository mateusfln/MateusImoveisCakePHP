

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from rtsolutz.com/vizzstudio/demo-falr/falr/dark-sidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 19:04:35 GMT -->
<?=$this->Element('head')?>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--=========================*
         Page Container
*===========================-->
<div id="page-container">

<?=$this->Element('headerSection')?>
<?=$this->Element('sidebarMenu')?>

    

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
                                <p class="text-muted mb-0 mr-1 hover-cursor">App</p>
                                <i class="bi bi-chevron-right"></i>
                                <p class="text-muted mb-0 mr-1 hover-cursor">Dashboard</p>
                                <i class="bi bi-chevron-right"></i>
                                <p class="text-muted mb-0 hover-cursor">Analytics</p>
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
                                Tabela de Imóveis <a href="/src/View/adminCrud/imovel/add.php"><button type="button" class="btn btn-inverse-success ml-3"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button></a>
                            </h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-center">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Identificação</th>
                                            <th scope="col">Matricula</th>
                                            <th scope="col">Inscrição Imobiliária</th>
                                            <th scope="col">Logradouro</th>
                                            <th scope="col">Numero Logradouro</th>
                                            <th scope="col">Rua</th>
                                            <th scope="col">Bairro</th>
                                            <th scope="col">Cidade</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Cep</th>
                                            <th scope="col">Ibge</th>
                                            <th scope="col">Ativo</th>
                                            <th scope="col">Criado</th>
                                            <th scope="col">Modificado</th>
                                            <th scope="col">Criador ID</th>
                                            <th scope="col">Modificador ID</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                                            <tr>
                                        <th scope="row">28</th>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>AC</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>2024-03-12 14:14:03</td>
                                            <td>2024-03-12 14:14:03</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="/src/View/adminCrud/Imovel/update.php?id=28&identificacao=1" class="btn btn-inverse-warning"><i class="bi bi-pencil-square mr-1"></i>Edit</a></li>
                                                    <form method="POST">
                                                        <input type="hidden" name="delete_id" value="28">
                                                        <li class="mr-3"><button type="submit" class="btn btn-inverse-danger"><i class="bi bi-trash mr-1"></i>Delete</button></li>
                                                    </form>
                                                </ul>
                                            </td>
                                        </tr>
                                                                            <tr>
                                        <th scope="row">29</th>
                                            <td>2</td>
                                            <td>2</td>
                                            <td>2</td>
                                            <td>2</td>
                                            <td>2</td>
                                            <td>2</td>
                                            <td>2</td>
                                            <td>2</td>
                                            <td>AC</td>
                                            <td>2</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>2024-03-12 14:14:03</td>
                                            <td>2024-03-12 14:14:03</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="/src/View/adminCrud/Imovel/update.php?id=29&identificacao=2" class="btn btn-inverse-warning"><i class="bi bi-pencil-square mr-1"></i>Edit</a></li>
                                                    <form method="POST">
                                                        <input type="hidden" name="delete_id" value="29">
                                                        <li class="mr-3"><button type="submit" class="btn btn-inverse-danger"><i class="bi bi-trash mr-1"></i>Delete</button></li>
                                                    </form>
                                                </ul>
                                            </td>
                                        </tr>
                                                                            <tr>
                                        <th scope="row">30</th>
                                            <td>casa de teste</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>campolino alves</td>
                                            <td>300</td>
                                            <td>campolino alves</td>
                                            <td>capoeiras</td>
                                            <td>florianopolis</td>
                                            <td>SC</td>
                                            <td>88085110</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>2024-03-12 14:14:03</td>
                                            <td>2024-03-12 14:14:03</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="/src/View/adminCrud/Imovel/update.php?id=30&identificacao=casa de teste" class="btn btn-inverse-warning"><i class="bi bi-pencil-square mr-1"></i>Edit</a></li>
                                                    <form method="POST">
                                                        <input type="hidden" name="delete_id" value="30">
                                                        <li class="mr-3"><button type="submit" class="btn btn-inverse-danger"><i class="bi bi-trash mr-1"></i>Delete</button></li>
                                                    </form>
                                                </ul>
                                            </td>
                                        </tr>
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
    </div>
    <!--=================================*
           End Main Content Section
    *===================================-->

    <?=$this->Element('footer')?>
</div>
</body>
<?=$this->Element('scripts')?>
</html>

<?php
/**
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$micakeDescription = 'Mateus Imóveis, Viva o melhor!';
?>
<!DOCTYPE html>
<html>
<?=$this->Element('scripts')?>

<body>
    
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    
    <?= $this->Html->script(['bootstrap.min', 'main.js', 'plugins.js','popper.min', '/vendor/jquery-1.12.4.min', '/vendor/modernizr-2.8.3.min']) ?>
    <?= $this->fetch('script') ?>
</body>
</html>



