<!DOCTYPE html>
<html>
<?= $this->Element('head')?>
<body>
<div id="page-container">
<?=$this->Element('headerSection')$this->Element('sidebarMenu')?>
    <div class="main-content page-content">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</div>
<?php 
echo $this->Element('footer');
echo $this->Element('scripts');
?>
</body>
</html>



