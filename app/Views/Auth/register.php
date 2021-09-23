
<?=$this->extend('login/login')?>
<?=$this->section('title')?>
Registro
<?=$this->endSection();?>
<?=$this->section('formlogin') ?>
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
      <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrate ahora!</h1>
                            </div>
                            <form class="user" action="<?=base_url('auth/store')?>" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="first_name" name="first_name" placeholder="Primer Nombre" value="<?=old('first_name');?>">
                                        <p class="msg_errors"><?=session('errors.first_name')?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="secund_name" name="secund_name" placeholder="Segundo Nombre" value="<?=old('secund_name');?>">
                                        <p class="msg_errors"><?=session('errors.secund_name')?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="last_name" name="last_name" placeholder="Primer Apellido" value="<?=old('last_name');?>">
                                        <p class="msg_errors"><?=session('errors.last_name')?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="secundlast_name" name="secundlast_name" placeholder="Segundo Apellido" value="<?=old('secundlast_name');?>">
                                        <p class="msg_errors"><?=session('errors.secundlast_name')?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="apell_casada" name="apell_casada" placeholder="Apellido de Casada">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <div class="control">
                                          <select id="estadociv" name="estadociv" class="form-control form-control-user-select">
                                            <option disabled selected="">Estado Civil</option>
                                            <?php foreach ($estadocivil as $estado): ?>
                                                <option value="<?= $estado->id_estado;?>" <?php if($estado->id_estado == old('estadociv')):?> selected <?php endif; ?> ><?= $estado->name_estado?></option>
                                            <?php endforeach; ?>    
                                          </select>
                                      </div>
                                      <p class="msg_errors"><?=session('errors.estadociv')?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="telefono" name="telefono" placeholder="Teléfono">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control form-control-user" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de Nacimiento">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" value="<?=old('email');?>" class="form-control form-control-user" id="usuario" name="usuario" placeholder="Correo Electrónico"  value="email@" >
                                    <p class="msg_errors"><?=session('errors.usuario')?></p>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password">
                                        <p class="msg_errors"><?=session('errors.password')?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="repeatpassword" name="repeatpassword" placeholder="Repeat Password">
                                        <p class="msg_errors"><?=session('errors.repeatpassword')?></p>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">Registrar Cuenta </button>
                                <!--a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Registrar Cuenta 
                                </a>
                                <hr-->
                                <!--a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a-->
                                <!--a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a-->
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Olvidaste tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=base_url(route_to('login'))?>">Ya tienes una cuenta ? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?= $this->renderSection('include/copyright');?>
</div>
<?=$this->endSection();?>