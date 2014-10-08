<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>assets/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registrate en socialgen.com</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?=base_url()?>accounts/registro" name="registro" method="POST" class="col-md-12 clearfix">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control<?if($e_type == 'EMAIL'){ echo ' error';}?>" placeholder="E-mail" name="email" type="email" value="<?if(isset($email)){echo $email;}?>" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control<?if($e_type == 'EMAIL'){ echo ' error';}?>" placeholder="Repite el e-mail" name="reemail" type="email" value="">
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
