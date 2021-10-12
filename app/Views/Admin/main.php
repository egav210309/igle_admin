<!DOCTYPE html>
<html lang="en">
<body class="bg-gradient-primary">
    <?= $this->include('include/header');?>
    <?= $this->renderSection('contentadmin');?>
    <?= $this->include('include/footer');?>
    <?= $this->include('include/copyri');?>
    <?=$this->renderSection('js')?>
</body> 
</html>