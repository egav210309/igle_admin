<?=$this->extend('login/login')?>

<?=$this->section('title')?>
Login
<?=$this->endSection();?>
<?=$this->section('formlogin') ?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <article class="message is-<?=session('msg.type') ?>">
                                <?php if(session('msg')):?>
                                    <div class="message-header" >
                                        <p>Error</p>
                                        <button class="delete" aria-label="delete"></button>
                                    </div>
                                    <div class="message-body">
                                        <?=session('msg.body');?>
                                    </div>
                                </article>
                                <?php endif;?>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
                                </div>
                                <form class="user" action="<?php echo base_url('/login')?>" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                            id="email" name="email" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address" required="" value="<?=old('email');?>">
                                             <p class="msg_errors"><?=session('errors.email')?></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password" required="">
                                            <p class="msg_errors"><?=session('errors.password')?></p>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Recordarme
                                                Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">Login</button>
                                    <!--a href="index.html" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </a-->
                                    <!--hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a-->
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Olvidaste tu contraseña?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?=base_url(route_to('register'))?>">Registrate </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
    <?= $this->renderSection('include/copyright');?>
<?=$this->endSection();?>