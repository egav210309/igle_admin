<?=$this->extend('Admin/main')?>
<?=$this->section('title')?>
  Editar Usuario: <?=$usuario->first_name;?>
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
            <h1 class="h3 mb-0 text-gray-800"><?=ucfirst($usuario->first_name)." ".ucfirst($usuario->last_name) ;?></h1>
        </div>
        <!-- Content Row -->
        <div class="row">
          <!-- Content Column -->
          <div class="col-lg-12 mb-4">
           <form class="user" action="<?=base_url(route_to('actualizar'))?>" method="POST" enctype="multipart/form-data" >
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Editar</h6>
                  </div>
                <div class="card-body">
                   <div class="field is-horizontal">
                    <div class="field-body" style="margin: auto;" >
                      <div class="card-img">
                          <figure class="image" style="width: 15%; margin: auto;" >
                            <img  class="img-profile rounded-circle" src="<?=strtolower($usuario->getLinkFoto())?>" style="width: auto; margin: auto;">
                          </figure>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="card-body">
                    <!-- Datos de la cuenta -->
                    <div class="field is-horizontal">
                      <div class="field-label is-normal" style="padding-top: 0px;">
                        <label class="label">Información de la Cuenta : </label>
                      </div>
                      <div class="field-body">
                        <div class="field">
                          <label class="label">Usuario:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" placeholder="Username" value="<?=old('username') ?? strtolower($usuario->username);?>" id="username" name="username" >
                            <span class="icon is-small is-left">
                              <i class="fas fa-user-tie"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.username')?></p>
                        </div>
                        <div class="field">
                          <label class="label">Email:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" id="usuario" name="usuario" placeholder="Segundo Nombre" value="<?=old('usuario') ?? strtolower($usuario->usuario);?>">
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
                            <input class="input" type="password" placeholder="Ingrese contraseña" value="" id="password" name="password">
                            <span class="icon is-small is-left">
                              <i class="fas fa-key"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.password')?></p>
                        </div>
                        <div class="field">
                          <label class="label">Repetir Contraseña:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="password" id="repeatpassword" name="repeatpassword" placeholder="Repita la Contraseña" value="">
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
                            <input type="hidden" name="userid" id="userid" value="<?=$usuario->user_id?>">
                            <input class="input" type="text" placeholder="Primer Nombre" value="<?=old('first_name') ?? ucfirst($usuario->first_name);?>" id="first_name" name="first_name">
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.first_name')?></p>
                        </div>
                        <div class="field">
                          <label class="label">Segundo Nombre:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" id="secund_name" name="secund_name" placeholder="Segundo Nombre" value="<?=old('secund_name') ?? ucfirst($usuario->secund_name);?>">
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
                            <input class="input" type="text" id="last_name" name="last_name" placeholder="Primer Apellido" value="<?=old('last_name') ?? ucfirst($usuario->last_name);?>" >
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                          </p>
                          <p class="msg_errors"><?=session('errors.last_name')?></p>
                        </div>
                        <div class="field">
                          <label class="label">Segundo Apellido:</label>
                          <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" id="secundlast_name" name="secundlast_name" placeholder="Segundo Apellido" value="<?=old('secundlast_name') ?? ucfirst($usuario->secundlast_name);?>" >
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
                            <input class="input" type="text" id="apell_casada" name="apell_casada" placeholder="Apellido de Casada" value="<?=old('apell_casada') ?? ucfirst($usuario->apell_casada);?>" style="padding-right: 60px;">
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
                              <input class="input" type="tel" placeholder="Ingresa tu número de teléfono" id="telefono" name="telefono" value="<?=old('telefono') ?? ucfirst($usuario->telefono);?>">
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
                            <input class="input" type="date" placeholder="Fecha de Nacimiento" value="<?=old('fecha_nacimiento') ?? ucfirst($usuario->fecha_nacimiento);?>" id="fecha_nacimiento" name="fecha_nacimiento">
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
                                    $sel = "";
                                    if($civil->id_estado == intval($usuario->estadociv)){ $sel = "selected";}
                                      echo "<option ".$sel." value='".$civil->id_estado."'>".strtolower($civil->name_estado)."</option>";
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
                            <textarea class="textarea" id="direccion" name="direccion" placeholder="Dirección de Residencia"><?=old('direccion') ?? ucfirst($usuario->direccion);?></textarea>
                          </div>
                        </div>
                        <div class="field">
                          <label class="label">Fotografía: </label>
                          <input type="hidden" name="namefile"id="namefile" value="<?=ucfirst($usuario->fotografia);?>">
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
                                  <option value="0"> Seleccione el Estado </option>
                                  <?php  foreach($status as $stat){
                                    $sel = "";
                                    if($stat->cod_estado == intval($usuario->cod_estado)){ $sel = "selected";}
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
                          <label class="label">Rol: <?=intval($usuario->type)?></label>
                          <div class="field has-addons">
                            <div class="select is-fullwidth">
                              <p class="control is-expanded has-icons-left">
                              <select class="form-control" id="type" name="type" style="padding-left: 2.5em;">
                                  <option value="0"> Seleccione un Rol </option>>
                                  <?php  foreach($grupos as $cargo){
                                    $sel = "";
                                    if($cargo->id_group == intval($usuario->type)){ $sel = "selected";}
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
                              <input type="radio" class="class_cdp" val="1" id="cdpbool" name="cdpbool" <?= (ucfirst($usuario->casadepaz) == 1) ? 'checked' : '';?>>
                              Sí
                            </label>
                            <label class="radio">
                              <input type="radio" class="class_cdp" val="0" id="cdpbool" name="cdpbool" <?= (ucfirst($usuario->casadepaz) == 0) ? 'checked' : '';?>>
                              No
                            </label>
                          </div>
                          <input type="hidden" name="casadepaz"id=" casadepaz" value="">
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
                                  <option value="0"> Seleccione el Cargo </option>
                                  <?php  foreach($gobern as $gob){
                                    $sel = "";
                                    if($gob->id_gobierno == intval($usuario->id_gobierno)){ $sel = "selected";}
                                      echo "<option ".$sel." value='".$gob->id_gobierno."'>".ucfirst($gob->nombre)."</option>";
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
                                    $sel = "";
                                    if($sub->id_subred == intval($usuario->id_subred)){ $sel = "selected";}
                                      echo "<option ".$sel." value='".$sub->id_subred."'>".ucfirst($sub->subred)."</option>";
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
                                    $sel = "";
                                    if($datacdp->id_cdp == intval($usuario->id_gobierno)){ $sel = "selected";}
                                      echo "<option ".$sel." value='".$datacdp->id_cdp."'>".strtolower($datacdp->nombre_cdp)." | ".strtolower($datacdp->dia_que_realiza)." - ".strtolower($datacdp->hora)."</option>";
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
                            <textarea class="textarea" id="observacion" name="observacion" placeholder="Alguna observación acerca de la persona"><?=old('informacionadicional') ?? ucfirst($usuario->informacionadicional);?>"</textarea>
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
        $(".class_cdp").click(function(){
          /*var val = document.getElementById('cdpbool').val;
          alert(val)
          document.getElementById('casadepaz').val = val;*/
          
        })
      });
  </script>
<?=$this->endSection();?>