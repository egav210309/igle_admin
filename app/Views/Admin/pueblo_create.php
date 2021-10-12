<?=$this->extend('Admin/main')?>
<?=$this->section('title')?>
Crear usuario
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
            <h1 class="h3 mb-0 text-gray-800">Nueva Persona</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
          <!-- Content Column -->
          <div class="col-lg-12 mb-4">
           <form class="user" action="<?=base_url(route_to('user_store'))?>" method="POST"  enctype="multipart/form-data" >
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Crear persona </h6>
                  </div>
                  <div class="card-body">
                    <!-- Datos de la cuenta -->
                    <div class="field is-horizontal">
                      <div class="field-label is-normal" style="padding-top: 0px;">
                        <label class="label">Información de la Cuenta : </label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-6 ">
                          <label class="label">Email:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" id="usuario" name="usuario" placeholder="Segundo Nombre" value="<?=old('usuario');?>">
                            <span class="icon is-small is-left">
                              <i class="fas fa-envelope-square"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.usuario')?></p>
                        </div>
                      </div>
                    </div>
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body">
                        <div class="field">
                          <label class="label">Contraseña:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="password" placeholder="Ingrese contraseña" value="<?=old('password');?>" id="password" name="password">
                            <span class="icon is-small is-left">
                              <i class="fas fa-key"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.password')?></p>
                        </div>
                        <div class="field">
                          <label class="label">Repetir Contraseña:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="password" id="repeatpassword" name="repeatpassword" placeholder="Repita la Contraseña" value="<?=old('repeatpassword');?>">
                            <span class="icon is-small is-left">
                              <i class="fas fa-key"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.repeatpassword')?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Datos personales -->
                    <div class="field is-horizontal">
                      <div class="field-label is-normal" style="padding-top: 0px;">
                        <label class="label">Información General : </label>
                      </div>
                      <div class="field-body">
                        <div class="field">
                          <label class="label">Primer Nombre:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" placeholder="Primer Nombre" value="" id="first_name" name="first_name" value="<?=old('first_name');?>">
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.first_name')?></p>
                        </div>
                        <div class="field">
                          <label class="label">Segundo Nombre:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" id="secund_name" name="secund_name" placeholder="Segundo Nombre" value="<?=old('secund_name');?>">
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.secund_name')?></p>
                        </div>
                      </div>
                    </div>
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body">
                        <div class="field">
                          <label class="label">Primer Apellido:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" id="last_name" name="last_name" placeholder="Primer Apellido" value="<?=old('last_name');?>" >
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.last_name')?></p>
                        </div>
                        <div class="field">
                          <label class="label">Segundo Apellido:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" id="secundlast_name" name="secundlast_name" placeholder="Segundo Apellido" value="<?=old('secundlast_name');?>" >
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.secundlast_name')?></p>
                        </div>
                      </div>
                    </div>
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body ">
                        <div class="field">
                          <label class="label">Apellido de Casada:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" id="apell_casada" name="apell_casada" placeholder="Apellido de Casada" value="" style="padding-right: 60px;">
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.apell_casada')?></p>
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
                              <input class="input" type="tel" placeholder="Ingresa tu número de teléfono" id="telefono" name="telefono" value="">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body">
                        <div class="field" style="width: 12%;">
                          <label class="label">Fecha de nacimiento:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="date" placeholder="Fecha de Nacimiento" value="" id="fecha_nacimiento" name="fecha_nacimiento">
                            <span class="icon is-small is-left">
                              <i class="fas fa-birthday-cake"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.fecha_nacimiento')?></p>
                        </div>
                        <div class="field col-md-6">
                          <label class="label">Estado Civil:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="estadociv" name="estadociv" style="padding-left: 2.5em;">
                                  <option value="0"> Seleccione el Estado </option>
                                  <?php  foreach($estadcivil as $civil){
                                      echo "<option value='".$civil->id_estado."'>".strtolower($civil->name_estado)."</option>";
                                } ?>
                              </select>
                              <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
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
                          <label class="label">Dirección: </label>
                          <div class="control">
                            <textarea class="textarea" id="direccion" name="direccion" placeholder="Dirección de Residencia"></textarea>
                          </div>
                        </div>
                        <div class="field">
                          <label class="label">Fotografía: </label>
                          <div class="file has-name is-boxed">
                            <label class="file-label">
                              <input class="file-input" type="file" name="fotografia" id="fotografia">
                              <span class="file-cta">
                                <span class="file-icon">
                                  <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                  Seleccione el archivo…
                                </span>
                              </span>
                              <span class="file-name">
                                Selecciona una imagen...
                              </span>
                            </label>
                          </div>
                          <p class="msg_errors"><?=session('errors.fotografia')?></p>
                        </div>
                      </div>
                    </div>
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body">
                        <div class="field">
                          <label class="label">Estatus:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="cod_estado" name="cod_estado" style="padding-left: 2.5em;">
                                  <option value="0"> Seleccione el Estatus </option>
                                  <?php  foreach($status as $stat){
                                    $sel = "";
                                    if($stat->cod_estado == 3){ $sel = "selected";}
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
                        <div class="field col-md-6">
                          <label class="label">Rol:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="type" name="type" style="padding-left: 2.5em;">
                                  <option value="0"> Seleccione un Rol </option>
                                  <?php  foreach($grupos as $cargo){
                                    $sel = "";
                                    if($cargo->id_group == 3){ $sel = "selected";}
                                      echo "<option ".$sel." value='".$cargo->id_group."'>".strtolower($cargo->name_group)."</option>";
                                  } ?>
                              </select>
                              <span class="icon is-small is-left">
                              <i class="fas fa-briefcase"></i>
                            </span>
                            </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                      
                  </div>
                  <hr>
                  <div class="card-body">
                    <!-- Datos Ministeriales -->
                    <div class="field is-horizontal">
                      <div class="field-label is-normal" style="padding-top: 0px;">
                        <label class="label">Información Ministerial:</label>
                      </div>
                      <div class="field-body">
                        <div class="field">
                          <label class="label">Tiene Casa de Paz ?</label>
                          <div class="control field has-addons col-md-6">
                            <label class="radio">
                              <input type="radio" value="1" id="casadepaz" name="casadepaz" >
                              Sí
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" id="casadepaz" name="casadepaz" >
                              No
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label"></label>
                      </div>
                      <div class="field-body">
                        <div class="field col-md-6">
                          <label class="label">Cargo:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="id_gobierno" name="id_gobierno" style="padding-left: 2.5em;">
                                  <option value="0"> Seleccione el cargo </option>
                                  <?php  foreach($gobern as $gob){
                                      echo "<option value='".$gob->id_gobierno."'>".ucfirst($gob->nombre)."</option>";
                                } ?>
                              </select>
                              <span class="icon is-small is-left">
                              <i class="fas fa-award"></i>
                            </span>
                            </p>
                            </div>
                          </div>
                        </div>
                        <div class="field col-md-6">
                          <label class="label">Sub-red:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="id_subred" name="id_subred" style="padding-left: 2.5em;">
                                  <option value="0"> Seleccione una Sub red </option>
                                  <?php  foreach($subredes as $sub){
                                      echo "<option value='".$sub->id_subred."'>".ucfirst($sub->subred)."</option>";
                                } ?>
                              </select>
                              <span class="icon is-small is-left">
                              <i class="fas fa-network-wired"></i>
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
                        <div class="field col-md-6">
                          <label class="label">Casa a la que pertenece:</label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="id_cdp" name="id_cdp" style="padding-left: 2.5em;">
                                  <option value="0"> Seleccione CDP </option>
                                  <?php  foreach($cdp as $datacdp){
                                      echo "<option value='".$datacdp->id_cdp."'>".strtolower($datacdp->nombre_cdp)." | ".strtolower($datacdp->dia_que_realiza)." - ".strtolower($datacdp->hora)."</option>";
                                  } ?>
                              </select>
                              <span class="icon is-small is-left">
                              <i class="fas fa-map-marker-alt"></i>
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
                          <label class="label">Información Adicional: </label>
                          <div class="control">
                            <textarea class="textarea" id="observacion" name="observacion" placeholder="Alguna observación acerca de la persona"></textarea>
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
                          <button type="submit" class="button is-primary"> Crear </button>
                        </p>
                        <p class="control">
                          <button type="submit" class="button is-danger"> Cancelar </button>
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
  </script>
<?=$this->endSection();?>
