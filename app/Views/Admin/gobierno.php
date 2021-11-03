<?=$this->extend('Admin/main')?>
<?=$this->section('title')?>
Gobierno
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
            <h1 class="h3 mb-0 text-gray-800">Gobierno </h1>
            <?php if($seccion == 7010){ ?>
                <a href="<?=base_url(route_to('user'))?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo</a>
            <?php }?>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Gobierno</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="listagobierno" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nombre</th>
                                        <th>created</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Nombre</th>
                                        <th>created</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($gobierno as $gob): ?>
                                    <tr>
                                        <td> <?= $gob->id_gobierno ?></td>
                                        <td> <?= $gob->nombre ?></td>
                                        <td> <?= $gob->created_at ?></td>
                                        <td> <a href="<?= base_url('admin/st/editar/'.$gob->id_gobierno.'/1') ?>"> editar</a> </td>
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
        $('#listagobierno').DataTable({
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