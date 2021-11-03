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
            <h1 class="h3 mb-0 text-gray-800">Nueva Casa de Paz</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
          <!-- Content Column -->
          <div class="col-lg-12 mb-4">
           <form class="user" action="<?=base_url(route_to('cdp_store'))?>" method="POST" enctype="multipart/form-data" >
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Crear Casa</h6>
                  </div>
                  <div class="card-body">
                    <div class="field is-horizontal">
                      <div class="field-label is-normal" style="padding-top: 0px;">
                        <label class="label">Líderes asignados: </label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-6">
                          <label class="label">Líder:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="user_id" name="user_id" style="padding-left: 2.5em;">
                                  <option value=""> Seleccione el líder a cargo </option>
                                  <?php  foreach($usuarios as $per){
                                      echo "<option value='".$per->user_id."'>".strtolower($per->first_name)." ".strtolower($per->secund_name)." ".strtolower($per->last_name)." ".strtolower($per->secundlast_name)."</option>";
                                } ?>
                              </select>
                            </p>
                            </div>
                          </div>
                        </div>
                        <div class="field col-md-6">
                          <label class="label">Líder:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="tipo_asignacion" name="tipo_asignacion" style="padding-left: 2.5em;">
                                  <option value=""> Tipo de Asignación </option>
                                  <?php  foreach($tipo as $asig){
                                    if($asig->id_gobierno == 5 or $asig->id_gobierno == 8){
                                      echo "<option value='".$asig->id_gobierno."'>".ucfirst($asig->nombre)."</option>";
                                    }
                                } ?>
                              </select>
                              <span class="icon is-small is-left">
                              <i class="fas fa-bookmark"></i>
                            </span>
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
                        <label class="label">Información de la Casa : </label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-6">
                          <label class="label">Casa:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" placeholder="Casa" value="<?=old('nombre_cdp') ;?>" id="nombre_cdp" name="nombre_cdp" >
                            <span class="icon is-small is-left">
                              <i class="fas fa-praying-hands"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.nombre_cdp')?></p>
                        </div>
                      </div>
                    </div>
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-10">
                          <label class="label">Dirección: </label>
                          <div class="control">
                            <textarea class="textarea" id="direccion_cdp" name="direccion_cdp" placeholder="Dirección de la Casa de Paz"><?=old('direccion_cdp');?></textarea>
                          </div>
                        </div>
                        <p class="msg_errors"><?=session('errors.direccion_cdp')?></p>
                      </div>
                    </div>
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body ">
                        <div class="field col-md-6">
                          <label class="label">Ubicación:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" id="ubicacion" name="ubicacion" placeholder="ubicación" value="<?=old('ubicacion');?>" style="padding-right: 60px;">
                            <span class="icon is-small is-left">
                              <i class="fas fa-map-marker-alt"></i>
                            </span>
                          </p>
                        </div>
                        <p class="msg_errors"><?=session('errors.ubicacion')?></p>
                        <div class="field">
                          <label class="label">Teléfono:</label>
                          <div class="field has-addons">
                            <p class="control">
                              <a class="button is-static">
                                +502
                              </a>
                            </p>
                            <p class="control is-expanded">
                              <input class="input" type="tel" placeholder="" id="telefonos" name="telefonos" value="<?=old('telefonos');?>">
                            </p>
                            <p class="msg_errors"><?=session('errors.telefonos')?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-6" style="width: 12%;">
                          <label class="label">Día:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" placeholder="Día" value="<?=old('dia_que_realiza') ;?>" id="dia_que_realiza" name="dia_que_realiza">
                            <span class="icon is-small is-left">
                              <i class="fas fa-calendar-week"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.dia_que_realiza')?></p>
                        </div>
                        <div class="field col-md-6">
                          <label class="label">Hora:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="time" placeholder="Hora" value="<?=old('hora');?>" id="hora" name="hora">
                            <span class="icon is-small is-left">
                              <i class="fas fa-clock"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.hora')?></p>
                        </div>
                      </div>
                    </div> 
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-6">
                          <label class="label">Estatus:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="cod_estatus" name="cod_estatus" style="padding-left: 2.5em;">
                                  <option value=""> Seleccione el Estado </option>
                                  <?php  foreach($status as $stat){
                                      echo "<option value='".$stat->cod_estado."'>".strtolower($stat->name_estado)."</option>";
                                } ?>
                              </select>
                              <span class="icon is-small is-left">
                              <i class="fas fa-bookmark"></i>
                            </span>
                            </p>
                            </div>
                          </div>
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
      
    });
  </script>
<?=$this->endSection();?>