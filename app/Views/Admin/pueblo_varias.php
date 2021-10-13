<?=$this->extend('Admin/main')?>
<?=$this->section('title')?>
Pueblo
<?=$this->endSection();?>
<?=$this->section('contentadmin') ?>
<!-- Main Content -->
    <?php if(session('msg')):?>
        <article class="message is-<?=session('msg.type') ?>">
            <div class="message-body">
                <?=session('msg.body');?>
            </div>
        </article>
    <?php endif;?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Listado de personas <?=$title;?></h1>
            <?php if($seccion == 1010){ ?>
                <a href="<?=base_url(route_to('user_create'))?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo usuario</a>
            <?php }?>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pueblo</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="listadopersonatable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Username</th>
                                        <th>Nombre Completo</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Gobierno</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Username</th>
                                        <th>Nombre Completo</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Gobierno</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($personas as $pers): ?>
                                    <tr>
                                        <td> <?= $pers->user_id ?></td>
                                        <td> <?= $pers->username ?></td>
                                        <td> <?= $pers->first_name." ".$pers->secund_name." ".$pers->last_name." ".$pers->secundlast_name ?></td>
                                        <td> <?= $pers->usuario ?></td>
                                        <td> <?= $pers->telefono ?></td>
                                        <td> <?= $pers->getGobierno(); ?></td>
                                        <?php 
                                            $stat = $pers->getEstatus();
                                            switch ($stat) {
                                                case 'inactivo':
                                                   $descripstatus = '<i style="color:#dfdf07;" class="fa fa-check-circle"></i> '. $stat;
                                                    break;
                                                case 'pendiente':
                                                    $descripstatus = '<i style="color:orange;" class="fa fa-check-circle"></i> '.$stat;
                                                    break;
                                                case 'baja':
                                                    $descripstatus = '<i style="color:red;" class="fa fa-check-circle"></i> '.$stat;
                                                    break;
                                                default:
                                                    $descripstatus = '<i style="color:green;" class="fa fa-check-circle"></i> '.$stat;
                                                    break;
                                            }
                                        ?>
                                        <td>  <?=$descripstatus  ?></td>
                                        <!--td> <a href="<?= $pers->getEditRegister() ?>"> editar</a> | <a href="<?= $pers->type ?>"> editar</a> </td-->
                                        <td> <a href="<?= $pers->getEditRegister() ?>"> editar</a> </td>
                                    </tr>        
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                    
                        </div>
                    </div>
                    <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->
<!-- End of Main Content -->
<?= $this->renderSection('include/copyright');?>
<?=$this->endSection();?>