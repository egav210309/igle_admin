<?=$this->extend('Admin/main')?>
<?=$this->section('title')?>
Escuelas de la Visión
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
            <h1 class="h3 mb-0 text-gray-800">Listado de escuelas de la Visión <i>(EDLV)</i> <?=$title;?></h1>
            <?php if($seccion == 3010){ ?>
                <a href="<?=base_url(route_to('escuela_crear'))?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Nueva EDLV</a>
            <?php }?>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Escuela</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="listadogeneraledlv" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Estudiante</th>
                                        <th>Escuela</th>
                                        <th align="center">Fecha Completada</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Estudiante</th>
                                        <th>Escuela</th>
                                        <th align="center">Fecha Completada</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($escuela as $esc): ?>
                                    <tr>
                                        <td> <?= $esc->id ?></td>
                                        <td> <?= $esc->getlideres(); ?></td>
                                        <td> <?= $esc->getescuela(); ?></td>
                                        <td align="center" > <?php 
                                        if(empty($esc->fecha_completada)){
                                            echo "-- -- ";
                                        } else {
                                            echo $esc->fecha_completada;
                                        }
                                        ?></td>
                                        <?php 
                                            $stat = $esc->getEstatus();
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
                                        <td> <a href="<?= $esc->getEditRegister() ?>"> editar</a> </td>
                                    </tr>        
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->
<!-- End of Main Content -->
<?= $this->renderSection('include/copyright');?>
<?=$this->endSection();?>
<?=$this->section('js')?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.9.2/tinymce.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#listadogeneraledlv').DataTable({
            "scrollCollapse": true,
            "order": [[ 0, "asc" ]],
            "oLanguage": {
                "sLengthMenu": "_MENU_ records",
                "oPaginate": {
                    "sPrevious": "Ant",
                    "sNext": "Sig"
                },
                "sEmptyTable": "No se encontraron registros."
            },
        });
    });
  </script>
<?=$this->endSection();?>