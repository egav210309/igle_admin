<?=$this->extend('Admin/main')?>
<?=$this->section('title')?>
Dashboard
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generar Reporte </a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total de Personas </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=count($personas)?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total de Redes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=count($subredes)?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reporte de Casas
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Personas por Autorizar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=count($pendientes)?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Escuelas de la Visión</h6>
                    </div>
                    <div class="card-body">
                    <!-- Card Header - Dropdown -->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="listadoescuela" width="100%" cellspacing="0">
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
                                </tbody>
                            </table>
                    
                        </div>
                    </div>    
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Gobierno</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <!--div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div-->
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Ministros
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Ancianos
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Mentores
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Page level plugins -->
    <script src="<?php echo base_url('');?>/public/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('');?>/public/assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url('');?>/public/assets/js/demo/chart-pie-demo.js"></script>
    <!-- End of Page Wrapper -->
<!-- End of Main Content -->
<?= $this->renderSection('include/copyright');?>
<?=$this->endSection();?>
<?=$this->section('js')?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.9.2/tinymce.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#listadoescuela').DataTable({
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