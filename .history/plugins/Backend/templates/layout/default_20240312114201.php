



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
    
    <div class="main-content page-content">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
   
    <?=$this->Element('footer')?>
    <?=$this->Element('scripts')?>

</body>
</html>



