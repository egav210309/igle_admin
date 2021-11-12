<?=$this->extend('Admin/main')?>
<?=$this->section('title')?>
  Crear Casa de Paz
<?=$this->endSection();?>
<?=$this->section('contentadmin') ?>
    <style type="text/css">
        .form-control-user-select {
          font-size: .8rem !important;
          border-radius: 10rem !important;
          height: 50px !important;
          padding-left: 15px !important;
        }
        .msg_errors {
          padding-left: 20px !important; 
          font-size: 12px !important; 
          color:red !important;  
        }

    </style>
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
            <h1 class="h3 mb-0 text-gray-800">Editar Registro Escuela cursada</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
          <!-- Content Column -->
          <div class="col-lg-12 mb-4">
           <form class="user" action="<?=base_url(route_to('escuela_regis_actualiza'))?>" method="POST" enctype="multipart/form-data" >
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Editar Registro</h6>
                  </div>
                                    <div class="card-body">
                    <div class="field is-horizontal">
                      <div class="field-label is-normal" style="padding-top: 0px;">
                        <label class="label">Información de la persona: </label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-6">
                          <label class="label">Estudiante:</label>
                          <div class="field has-addons">
                            <input type="hidden" name="id_registro" id="id_registro" value="<?=$registro->id?>">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="user_id" name="user_id" style="padding-left: 2.5em;">
                                  <option value=""> Seleccione la persona </option>
                                  <?php  
                                    $select = "";
                                    foreach($usuarios as $per){
                                      $select = "";
                                      if($registro->user_id == $per->user_id){
                                         $select = "selected";
                                      }
                                      echo "<option ".$select." value='".$per->user_id."'>".strtolower($per->first_name)." ".strtolower($per->secund_name)." ".strtolower($per->last_name)." ".strtolower($per->secundlast_name)."</option>";
                                } ?>
                              </select>
                            </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Datos personales -->
                    <div class="field is-horizontal">
                      <div class="field-label is-normal" style="padding-top: 0px;">
                        <label class="label">Información de la escuela : </label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-6">
                          <label class="label">Escuela:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                                <select class="form-control" id="id_escuela" name="id_escuela" style="padding-left: 2.5em;">
                                  <option value=""> Seleccione la escuela </option>
                                  <?php  
                                  $selected = "";
                                  foreach($escuelas as $escue){
                                    $selected = "";
                                    if($registro->id_escuela == $escue->id_escuela){
                                         $selected = "selected";
                                      }
                                    echo "<option ".$selected." value='".$escue->id_escuela."'>".ucfirst($escue->nombre_escuela)."</option>";
                                } ?>
                              </select>
                              <span class="icon is-small is-left">
                                <i class="fas fa-school"></i>
                              </span>
                            </p>
                          </div>
                         </div>   
                          <p class="msg_errors"><?=session('errors.id_escuela')?></p>
                        </div>
                        <div class="field col-md-3">
                          <label class="label">Año cursado:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="aniocursado" name="aniocursado" style="padding-left: 2.5em;" <?php if($registro->anio == 0){ echo "disabled";} ?>>
                                  <option value=""> N/A </option>
                                  <?php  
                                  $selecta = "";
                                  foreach($aniocursado as $anio){
                                    $selecta = "";
                                      if($registro->anio == $anio->id){
                                         $selecta = "selected";
                                      }
                                    echo "<option ".$selecta." value='".$anio->id."'>".ucfirst($anio->nombre_detalle)."</option>";
                                } ?>
                              </select>
                              <span class="icon is-small is-left">
                                <i class="fas fa-check"></i>
                              </span>
                            </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-10">
                          <label class="label"> observaciones: </label>
                          <div class="control">
                            <textarea class="textarea" id="observaciones_escuela" name="observaciones_escuela" placeholder="Algún comentario acerca de la escuela cursada"><?=old('observaciones_escuela')  ?? ucfirst($registro->observaciones_escuela) ;?></textarea>
                          </div>
                        </div>
                        <p class="msg_errors"><?=session('errors.observaciones_escuela')?></p>
                      </div>
                    </div>
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-6">
                          <label class="label">Estado actual de la escuela cursada:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="estado_escuela" name="estado_escuela" style="padding-left: 2.5em;">
                                  <option value=""> Seleccione el Estado </option>
                                  <?php  
                                  $sele = "";
                                  foreach($estatusescu as $stat){
                                    $sele = "";
                                    if($registro->estado_escuela == $stat->id){
                                      $sele = "selected";
                                    }
                                      echo "<option ".$sele." value='".$stat->id."'>".strtolower($stat->nombre_detalle)."</option>";
                                } ?>
                              </select>
                              <span class="icon is-small is-left">
                              <i class="fas fa-bookmark"></i>
                            </span>
                            </p>
                            </div>
                          </div>
                        </div>
                        <div class="field col-md-3">
                          <label class="label">Fecha Completada :</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="date" placeholder="Casa" value="<?=old('fecha_completada') ?? strtolower($registro->fecha_completada);?>" id="fecha_completada" name="fecha_completada" >
                            <span class="icon is-small is-left">
                              <i class="fas fa-calendar-week"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.fecha_completada')?></p>
                        </div>
                      </div>
                    </div>                       
                  </div>
                  <div class="card-body">
                    <div class="field is-horizontal">
                    <div class="field-label">
                      <!-- Left empty for spacing -->
                    </div>
                    <div class="field-body">
                      <div class="field is-grouped is-grouped-right">
                        <p class="control">
                          <button type="submit" class="button is-primary"> Guardar </button>
                        </p>
                        <p class="control">
                          <a class="button is-light">
                            Cancel
                          </a>
                        </p>
                      </div>
                    </div>
                    </div>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Page Wrapper -->
<!-- End of Main Content -->
<?= $this->renderSection('include/copyright');?>
<?=$this->endSection();?>
<?=$this->section('js')?>
  <!--Select2 -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>/public/assets/select2/select2.min.css">
  <script type="text/javascript">
    $(document).ready(function() {
        $("#id_escuela").change(function(){
          var tipo = $(this).val();
          if(tipo == 5){
            $("#aniocursado").prop('disabled', false);  
          } else {
            $("#aniocursado").prop('disabled', true);
          }
        })
    });
  </script>
<?=$this->endSection();?>