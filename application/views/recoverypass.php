<?$this->load->view('layouts/head');?>

<body>

    <div class="container accounts">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Reestablecer contraseña</h3>
                    </div>
                    <div class="panel-body">

                    <? if(!$verifyed){ ?>
                        <p>Introduce aquí la dirección de correo electronico con la que te registraste, nosotros te enviarémos un email con las acciones que debes hacer para restaurar tu contraseña</p>
                        <br/>
                        <div class="alert alert-danger<?if($e_type != 'RECOVERY'){ echo ' dNone';}?>" role="alert">
                            <strong>Error!</strong> No encontramos ese usuario en nuestro sistema. Intentalo con otra combinación.
                        </div>
                        <form role="form" action="<?=base_url()?>accounts/recoveryPass" name="login" method="POST" class="col-md-12 clearfix">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control<?if($e_type == 'EMAIL'){ echo ' error';}?>" placeholder="E-mail" name="email" type="email" value="<?if(isset($email)){echo $email;}?>" autofocus>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" value="Regístrate">Reestablecer contraseña</button>
                            </fieldset>
                        </form>
                    <? } else { ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Verificado!</strong> Te hemos enviado un email con los pasos necesarios para reestablecer tu contraseña por una nueva. Si tienes cualquier problema, por favor, ponte en contacto con nosotros a través de <?=SUPPORT_MAIL?>.
                        </div>                        
                    <? } ?>
                    </div>
                </div>
                <br/>
                <hr/>
                <br/>
                <p>Si no tienes cuenta puedes crear una nueva en el siguiente enlace de <a href="<?=base_url() . 'accounts/registro'?>">registro</a></p>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?=base_url()?>assets/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>assets/js/sb-admin-2.js"></script>

</body>

</html>
