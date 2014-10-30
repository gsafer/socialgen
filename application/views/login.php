<?$this->load->view('layouts/head');?>

<body>

    <div class="container accounts">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Accede a fag.com</h3>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-danger<?if($e_type != 'LOGIN'){ echo ' dNone';}?>" role="alert">
                            <strong>Error!</strong> No encontramos ese usuario en nuestro sistema. Intentalo con otra combinación.
                        </div>
                        <form role="form" action="<?=base_url()?>accounts/login" name="login" method="POST" class="col-md-12 clearfix">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control<?if($e_type == 'NICK'){ echo ' error';}?>" placeholder="Nick" name="nick" type="nick" value="<?if(isset($nick)){echo $nick;}?>" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control<?if($e_type == 'PASS'){ echo ' error';}?>" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" value="Regístrate">Entrar</button>
                            </fieldset>
                        </form>
                        <br/>
                    </div>
                </div>
                <br/>
                <hr/>
                <p>Si no recuerdas tu contraseña pulsa <a href="<?=base_url() . 'accounts/recoverypass'?>">recordar contraseña</a></p>
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
