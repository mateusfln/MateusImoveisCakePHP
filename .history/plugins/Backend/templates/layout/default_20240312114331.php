

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
<?=$this->Element('head')?>
<body>
<div id="page-container">
    
    <div class="main-content page-content">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
   
    <?=$this->Element('footer')?>
    <?=$this->Element('script')?>

</body>
</html>



