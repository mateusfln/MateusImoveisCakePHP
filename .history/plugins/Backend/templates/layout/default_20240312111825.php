

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from rtsolutz.com/vizzstudio/demo-falr/falr/dark-sidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 19:04:35 GMT -->
<?=$this->Element(head)?>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--=========================*
         Page Container
*===========================-->
<div id="page-container">

<!--==================================*
               Header Section
    *====================================-->
    <div class="header-area">

        <!--======================*
                   Logo
        *=========================-->
        <div class="header-area-left">
            <a href="https://mateusimoveis.local/admin" class="logo">
                <span>
                    <img src="/assets/images/logo.png" alt="" height="18">
                </span>
                <i>
                    <img src="/assets/images/logo.png" alt="" height="22">
                </i>
            </a>
        </div>
        <!--======================*
                  End Logo
        *=========================-->

        <div class="row align-items-center header_right">
            <!--==================================*
                     Navigation and Search
            *====================================-->
            <div class="col-md-6 d_none_sm d-flex align-items-center">
                <div class="nav-btn button-menu-mobile pull-left">
                    <button class="open-left waves-effect">
                    <i class="bi bi-list"></i>
                    </button>
                </div>
            </div>
            <!--==================================*
                     End Navigation and Search
            *====================================-->
            <!--==================================*
                     Notification Section
            *====================================-->
            <div class="col-md-6 col-sm-12">
                <ul class="notification-area pull-right">
                    <li class="mobile_menu_btn">
                        <span class="nav-btn pull-left d_none_lg">
                            <button class="open-left waves-effect">
                            <i class="bi bi-fullscreen"></i>
                            </button>
                        </span>
                    </li>
                     
                    <li id="full-view" class="d_none_sm"><i class="bi bi-fullscreen"></i></li>
                    <li id="full-view-exit" class="d_none_sm"><i class="bi bi-fullscreen"></i></li>
                    <li class="user-dropdown">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                            </button>
                            <div class="dropdown-menu dropdown_user" aria-labelledby="dropdownMenuButton" >
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="user_img mb-3">
                                        <img src="../assets/images/user.jpg" alt="User Image">
                                    </div>
                                    <div class="user_bio text-center">
                                        <p class="name font-weight-bold mb-0">Monica Jhonson</p>
                                        <p class="email text-muted mb-3"><a class="pl-3 pr-3" href="monica%40jhon.co.html">monica@jhon.co.uk</a></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="profile.html"><i class="bi bi-person-circle"></i>Profile</a>
                                <span role="separator" class="divider"></span>
                                <a class="dropdown-item" href="login.html"><i class="bi bi-box-arrow-in-left"></i>Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!--==================================*
                     End Notification Section
            *====================================-->
        </div>

    </div>
    <!--==================================*
               End Header Section
    *====================================--><!--=========================*
             Side Bar Menu
    *===========================-->
    <div class="sidebar_menu">
        <div class="menu-inner">
            <div id="sidebar-menu">
                <!--=========================*
                           Main Menu
                *===========================-->
                <ul class="metismenu" id="sidebar_menu">
                    <li class="menu-title">Main</li>
                    <li>
                        <a href="https://mateusimoveis.local/admin.php">
                        <i class="bi bi-house"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    

                    <li class="menu-title">Tabelas</li>
                    <!--=========================*
                              UI Features
                    *===========================-->
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                        <i class="bi bi-card-checklist"></i>
                            <span>Caracteristicas</span>
                            <span class="float-right arrow"><i class="bi bi-chevron-down"></i></i></i></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/src/View/adminCrud/Caracteristicas/add.php"><i class="bi bi-plus-lg"></i><span>Create</span></a></li>
                            <li><a href="/src/View/adminCrud/Caracteristicas/read.php"><i class="bi bi-eye"></i><span>Read</span></a></li>
                            
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                        <i class="bi bi-card-checklist"></i>
                            <span>Caracte. Imoveltipo</span>
                            <span class="float-right arrow"><i class="bi bi-chevron-down"></i></i></i></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/src/View/adminCrud/CaracteristicasImoveltipos/add.php"><i class="bi bi-plus-lg"></i><span>Create</span></a></li>
                            <li><a href="/src/View/adminCrud/CaracteristicasImoveltipos/read.php"><i class="bi bi-eye"></i><span>Read</span></a></li>
                            
                        </ul>
                    </li> -->
                    <!--=========================*
                              Advance Kit
                    *===========================-->
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                        <i class="bi bi-buildings"></i>
                            <span>Imóveis</span>
                            <span class="float-right arrow"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <ul class="submenu">
                        <li><a href="/src/View/adminCrud/Imovel/add.php"><i class="bi bi-plus-lg"></i><span>Create</span></a></li>
                            <li><a href="/src/View/adminCrud/Imovel/read.php"><i class="bi bi-eye"></i><span>Read</span></a></li>
                            
                        </ul>
                    </li>
                    <!--=========================*
                              Icons
                    *===========================-->
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                        <i class="bi bi-building-fill-gear"></i>
                            <span>Tipos de Imóvel</span>
                            <span class="float-right arrow"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <ul class="submenu">
                        <li><a href="/src/View/adminCrud/TiposDeImovel/add.php"><i class="bi bi-plus-lg"></i><span>Create</span></a></li>
                            <li><a href="/src/View/adminCrud/TiposDeImovel/read.php"><i class="bi bi-eye"></i><span>Read</span></a></li>
                            
                        </ul>
                    </li>
                    <!--=========================*
                                  Maps
                    *===========================-->
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                        <i class="bi bi-collection-play-fill"></i>
                            <span>Mídias</span>
                            <span class="float-right arrow"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <ul class="submenu">
                        <li><a href="/src/View/adminCrud/Midias/add.php"><i class="bi bi-plus-lg"></i><span>Create</span></a></li>
                            <li><a href="/src/View/adminCrud/Midias/read.php"><i class="bi bi-eye"></i><span>Read</span></a></li>
                            
                        </ul>
                    </li>
                    <!--=========================*
                              Tables
                    *===========================-->
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                        <i class="bi bi-briefcase"></i>
                            <span>Tipos de Negócio</span>
                            <span class="float-right arrow"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <ul class="submenu">
                        <li><a href="/src/View/adminCrud/TiposDeNegocio/add.php"><i class="bi bi-plus-lg"></i><span>Create</span></a></li>
                            <li><a href="/src/View/adminCrud/TiposDeNegocio/read.php"><i class="bi bi-eye"></i><span>Read</span></a></li>
                            
                        </ul>
                    </li>
                    <!--=========================*
                                 Forms
                    *===========================-->
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                        <i class="bi bi-person"></i>
                            <span>Pessoas</span>
                            <span class="float-right arrow"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <ul class="submenu">
                        <li><a href="/src/View/adminCrud/Pessoas/add.php"><i class="bi bi-plus-lg"></i><span>Create</span></a></li>
                            <li><a href="/src/View/adminCrud/Pessoas/read.php"><i class="bi bi-eye"></i><span>Read</span></a></li>
                            
                        </ul>
                    </li>
                </ul>
                <!--=========================*
                          End Main Menu
                *===========================-->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--=========================*
           End Side Bar Menu
    *===========================-->

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

    <!--=================================*
                  Footer Section
    *===================================-->
    <footer>
        <div class="footer-area">
            <p>&copy; Copyright 2024. All right reserved. Template by Mateusfln.</p>
        </div>
    </footer>
    <!--=================================*
                End Footer Section
    *===================================-->

</div>
<!--=========================*
        End Page Container
*===========================-->
</body>


<script src="adminAssets/js/jquery.min.js"></script>
<!-- bootstrap 4 js -->
<script src="adminAssets/js/popper.min.js"></script>
<script src="adminAssets/js/bootstrap.min.js"></script>
<!-- Owl Carousel Js -->
<script src="adminAssets/js/owl.carousel.min.js"></script>
<!-- Metis Menu Js -->
<script src="adminAssets/js/metisMenu.min.js"></script>
<!-- SlimScroll Js -->
<script src="adminAssets/js/jquery.slimscroll.min.js"></script>
<!-- Slick Nav -->
<script src="adminAssets/js/jquery.slicknav.min.js"></script>
<!-- ========== This Page js ========== -->

<!--Chart Js-->
<script src="adminAssets/vendors/charts/charts-bundle/Chart.bundle.js"></script>

<!-- Flot Chart -->
<script src="adminAssets/vendors/charts/flot/jquery.flot.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.resize.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.categories.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.fillbetween.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.stack.js"></script>
<script src="adminAssets/vendors/charts/float-bundle/jquery.flot.pie.js"></script>

<!--Home Script-->
<script src="adminAssets/js/home.js"></script>

<!-- ========== This Page js ========== -->

<!-- Main Js -->
<script src="adminAssets/js/main.js"></script>


<!--=========================*
            Scripts
*===========================-->

<!-- Jquery Js -->
<script src="adminAssets/js/jquery.min.js"></script>
<!-- bootstrap 4 js -->
<script src="adminAssets/js/popper.min.js"></script>
<script src="adminAssets/js/bootstrap.min.js"></script>
<!-- Owl Carousel Js -->
<script src="adminAssets/js/owl.carousel.min.js"></script>
<!-- Metis Menu Js -->
<script src="adminAssets/js/metisMenu.min.js"></script>
<!-- SlimScroll Js -->
<script src="adminAssets/js/jquery.slimscroll.min.js"></script>
<!-- Slick Nav -->
<script src="adminAssets/js/jquery.slicknav.min.js"></script>
<!-- ========== This Page js ========== -->

<!--Chart Js-->
<script src="adminAssets/vendors/charts/charts-bundle/Chart.bundle.js"></script>

<!-- Flot Chart -->
<script src="adminAssets/vendors/charts/flot/jquery.flot.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.resize.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.categories.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.fillbetween.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.stack.js"></script>
<script src="adminAssets/vendors/charts/float-bundle/jquery.flot.pie.js"></script>

<!--Home Script-->
<script src="adminAssets/js/home.js"></script>

<!-- ========== This Page js ========== -->

<!-- Main Js -->
<script src="adminAssets/js/main.js"></script>



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
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $micakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min', 'style.css', 'font']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
   
</head>
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



