<?=$this->extend('Admin/main')?>
<?=$this->section('title')?>
  Editar Casa: <?=$casa->nombre_cdp;?>
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
            <h1 class="h3 mb-0 text-gray-800"><?=ucfirst($casa->nombre_cdp);?></h1>
        </div>
        <!-- Content Row -->
        <div class="row">
          <!-- Content Column -->
          <div class="col-lg-12 mb-4">
           <form class="user" action="<?=base_url(route_to('cdp_actualizar'))?>" method="POST" enctype="multipart/form-data" >
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Editar</h6>
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
                                  <?php  
                                  $primerlider = "";
                                  $selec1 = "";
                                  foreach($usuarios as $per){
                                    $selec1 = "";
                                    foreach ($liderasig as $asig) { // para seleccionar el user que esta asignado
                                      if($asig->user_id == $per->user_id && $primerlider == ""){
                                        $primerlider = $asig->user_id;
                                        $selec1 = "selected";
                                      }
                                      break;
                                    }
                                    echo "<option value='".$per->user_id."'".$selec1.">".strtolower($per->first_name)." ".strtolower($per->secund_name)." ".strtolower($per->last_name)." ".strtolower($per->secundlast_name)."</option>";
                                } ?>
                              </select>
                            </p>
                            </div>
                          </div>
                        </div>
                        <div class="field col-md-6">
                          <label class="label">Tipo de asignación:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="tipo_asignacion" name="tipo_asignacion" style="padding-left: 2.5em;">
                                  <option value=""> Tipo de Asignación </option>
                                  <?php  
                                  $secl = "";
                                  $primerli = "";
                                  foreach($tipo as $asig){
                                    if($asig->id_gobierno == 5 or $asig->id_gobierno == 8){
                                        $secl = "";
                                        foreach ($liderasig as $asiglid) { // para seleccionar el user que esta asignado
                                          if($asiglid->tipo_asignacion == $asig->id_gobierno && $primerli == ""){
                                            $primerli = $asiglid->tipo_asignacion;
                                            $secl = "selected";
                                          }
                                          break;
                                        }
                                      echo "<option ".$secl." value='".$asig->id_gobierno."'>".ucfirst($asig->nombre)."</option>";
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
                    <div class="field is-horizontal">
                      <div class="field-label is-normal" style="padding-top: 0px;">
                        <label class="label"></label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-6">
                          <label class="label">Líder:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="seg_user_id" name="seg_user_id" style="padding-left: 2.5em;">
                                  <option value=""> Seleccione el líder a cargo</option>
                                  <?php  foreach($usuarios as $per){
                                      $selec2 = "";
                                      foreach ($liderasig as $asig) { // para seleccionar el user que esta asignado
                                        if($asig->user_id != $primerlider && $asig->user_id == $per->user_id){
                                          $selec2 = "selected";
                                          break;
                                        }
                                      }
                                      echo "<option value='".$per->user_id."'".$selec2 .">".strtolower($per->first_name)." ".strtolower($per->secund_name)." ".strtolower($per->last_name)." ".strtolower($per->secundlast_name)."</option>";
                                } ?>
                              </select>
                            </p>
                            </div>
                          </div>
                        </div>
                        <div class="field col-md-6">
                          <label class="label">Tipo de asignación:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="seg_tipo_asignacion" name="seg_tipo_asignacion" style="padding-left: 2.5em;">
                                  <option value=""> Tipo de Asignación </option>
                                  <?php  foreach($tipo as $asig){
                                    if($asig->id_gobierno == 5 or $asig->id_gobierno == 8){
                                      $selecl2 = "";
                                      foreach ($liderasig as $asigl) { // para seleccionar el user que esta asignado
                                        if($asigl->tipo_asignacion != $primerli && $asigl->tipo_asignacion == $asig->id_gobierno){
                                          $selecl2 = "selected";
                                          break;
                                        }
                                      }
                                      echo "<option ".$selecl2." value='".$asig->id_gobierno."'>".ucfirst($asig->nombre)."</option>";
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
                          <input type="hidden" name="id_cdp" id="id_cdp" value="<?=$casa->id_cdp?>">
                          <label class="label">Casa:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" placeholder="Casa" value="<?=old('nombre_cdp') ?? strtolower($casa->nombre_cdp);?>" id="nombre_cdp" name="nombre_cdp" >
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
                            <textarea class="textarea" id="direccion_cdp" name="direccion_cdp" placeholder="Dirección de la Casa de Paz"><?=old('direccion_cdp') ?? ucfirst($casa->direccion_cdp);?></textarea>
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
                            <input class="input" type="text" id="ubicacion" name="ubicacion" placeholder="ubicación" value="<?=old('ubicacion') ?? ucfirst($casa->ubicacion);?>" style="padding-right: 60px;">
                            <span class="icon is-small is-left">
                              <i class="fas fa-map-marker-alt"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.ubicacion')?></p>
                        </div>
                        <div class="field">
                          <label class="label">Teléfono:</label>
                          <div class="field has-addons">
                            <p class="control">
                              <a class="button is-static">
                                +502
                              </a>
                            </p>
                            <p class="control is-expanded">
                              <input class="input" type="tel" placeholder="" id="telefonos" name="telefonos" value="">
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
                            <select class="form-control" id="dia_que_realiza" name="dia_que_realiza" style="padding-left: 2.5em;">
                                  <option value=""> Día </option>
                                  <?php  
                                  $select = "";
                                  foreach($diasemana as $dia){
                                    if($casa->dia_que_realiza == $dia->dia){
                                      $select = "selected";
                                    }
                                    echo "<option ".$select." value='".$dia->dia."'>".ucfirst($dia->dia)."</option>";
                                } ?>
                              </select>
                              <span class="icon is-small is-left">
                                <i class="fas fa-calendar-week"></i>
                              </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.dia_que_realiza')?></p>
                        </div>
                        <div class="field col-md-6">
                          <label class="label">Hora:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="time" placeholder="Hora" value="<?=old('hora') ?? ucfirst($casa->hora);?>" id="hora" name="hora">
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
                                  <option value="0"> Seleccione el Estado </option>
                                  <?php  foreach($status as $stat){
                                    $sel = "";
                                    if($stat->cod_estado == intval($casa->cod_estatus)){ $sel = "selected";}
                                      echo "<option ".$sel." value='".$stat->cod_estado."'>".strtolower($stat->name_estado)."</option>";
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.9.2/tinymce.min.js"></script>
  <script type="text/javascript">
      tinymce.init({
        selector: '#observacion',
        height:250
      });
      $(document).ready(function() {
        $("#seg_user_id").select2();
      });
  </script>
<?=$this->endSection();?>