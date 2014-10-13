<?$this->load->view('layouts/head');?>

<body>

    <div class="container accounts">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registrate en socialgen.com</h3>
                    </div>
                    <div class="panel-body">
                            <?
                            if($error){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong>
                            <?
                                    switch($e_type){
                                        case 'EMAILCHECK':
                                            echo "El <b>email</b> está ocupado, elige otro.";
                                        break;
                                        case 'NICKCHECK':
                                            echo "El <b>nick</b> está ocupado, elige otro.";
                                        break;                                    
                                        case 'NICK':
                                            echo "El <b>nick</b> debe contener entre 3 y 10 caracteres alfanuméricos.";
                                        break;
                                        case 'EMAIL':
                                            echo "No has escrito un <b>email</b> valido, intentalo con otra dirección.";
                                        break;
                                        case 'NOMBRE':
                                            echo "En el <b>nombre</b> y el <b>apellido</b>, sólo se permiten letras de la A-Z.";
                                        break;
                                        case 'PASS':
                                            echo "La <b>contraseña</b> debe contener entre 5 y 12 caracteres.";
                                        break;
                                        case 'EDAD':
                                            echo "No has introducido tu <b>fecha de nacimiento</b> correctamente.";
                                        break;
                                    }
                            ?>
                            </div>
                            <br/>
                            <?
                                }
                            ?>
                        <form role="form" action="<?=base_url()?>accounts/registro" name="registro" method="POST" class="col-md-12 clearfix">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control<?if($e_type == 'NICK' || $e_type == 'NICKCHECK'){ echo ' error';}?>" placeholder="Nick" name="nick" type="nick" value="<?if(isset($nick)){echo $nick;}?>" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control<?if($e_type == 'EMAIL' || $e_type == 'EMAILCHECK'){ echo ' error';}?>" placeholder="E-mail" name="email" type="email" value="<?if(isset($email)){echo $email;}?>" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control<?if($e_type == 'EMAIL' || $e_type == 'EMAILCHECK'){ echo ' error';}?>" placeholder="Repite el e-mail" name="reemail" type="email" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control<?if($e_type == 'NOMBRE'){ echo ' error';}?>" placeholder="Nombre" name="nombre" type="text" value="<?if(isset($nombre)){echo $nombre;}?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control<?if($e_type == 'NOMBRE'){ echo ' error';}?>" placeholder="Apellido" name="apellido" type="apellido" value="<?if(isset($apellido)){ echo $apellido;}?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control<?if($e_type == 'PASS'){ echo ' error';}?>" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Edad: </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input class="form-control<?if($e_type == 'EDAD'){ echo ' error';}?>" placeholder="DD" name="dia" type="text" value="<?if(isset($dia)){echo $dia;}?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input class="form-control<?if($e_type == 'EDAD'){ echo ' error';}?>" placeholder="MM" name="mes" type="text" value="<?if(isset($mes)){echo $mes;}?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input class="form-control<?if($e_type == 'EDAD'){ echo ' error';}?>" placeholder="AAAA" name="ano" type="text" value="<?if(isset($ano)){echo $ano;}?>">
                                    </div>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" value="Regístrate">Regístrate</button>
                                <br>
                                <p>Al pulsar el botón "Regístrate" estas aceptando nuestras políticas de uso.</p>
                            </fieldset>
                        </form>
                    </div>
                </div>
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
