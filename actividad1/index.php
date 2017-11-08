<?php
session_start();
if(isset($_POST['txtidusu'])||isset($_POST['txt_id_admin']))
{
    if($_POST['tipo']=="Usuario"){
        $_SESSION['usuario']=$_POST['txtidusu'];
    }
    else{
        $_SESSION['usuario']=$_POST['txt_id_admin'];
    }
    $_SESSION['pass']=$_POST['txt_pass'];
    $_SESSION['tipo']=$_POST['tipo'];
}
?>
<!DOCTYPE html>
<html lang="esp">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modulo-01</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="img/icono.png" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>d
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        $(document).ready(function(){
            $(".btnadmin").click(function(){
                $(".form-admin").slideDown();
                $(".form-colabor").slideUp();
                });
            $(".btncolabo").click(function(){
                $(".form-colabor").slideDown();
                $(".form-admin").slideUp();
            });
        }); 
    </script>
     <script>
        $(document).ready(function(){
            $(".btn-colabor-insertar").click(function(){
                $(".form-colabor-insertar").slideDown();
                $(".form-colabor-actualizar").slideUp();
                $(".form-colabor-borrar").slideUp();
                });
            $(".btn-colabor-actualizar").click(function(){
                $(".form-colabor-actualizar").slideDown();
                $(".form-colabor-insertar").slideUp();
                $(".form-colabor-borrar").slideUp();
            });
            $(".btn-colabor-borrar").click(function(){
                $(".form-colabor-borrar").slideDown();
                $(".form-colabor-insertar").slideUp();
                $(".form-colabor-actualizar").slideUp();
            });
        }); 
    </script>
    <script>
    function showHint(str) {
        if (str.length == 0) { 
            document.getElementById("usu_nom").value = "";
            document.getElementById("usu_pass").value = "";
            document.getElementById("usu_tel").value = "";
            document.getElementById("usu_correo").value = "";
            document.getElementById("usu_dir").value = "";
            return;
        } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                 var res = this.responseText.split(",");
                document.getElementById("usu_nom").value = res[2];
                document.getElementById("usu_pass").value = res[4];
                document.getElementById("usu_tel").value = res[6];
                document.getElementById("usu_correo").value = res[8];
                document.getElementById("usu_dir").value = res[10];
                
            }
        };
        xmlhttp.open("GET", "muestra.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

</head>

<body id="page-top" class="index">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">Comienza</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#most">Mostrar</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#opc">Opciones</a>
                    </li>
                    <?php
                        session_start(); 
                        if(isset($_SESSION['usuario'])){
                            $url="http://mod-01.esy.es/muestra/metodos/".$_SESSION['tipo']."/".$_SESSION['usuario'];
                            $adminJSON =file_get_contents($url);
                            $admin =json_decode($adminJSON, true);

                                if ($admin['Password']==$_SESSION['pass']) {
                                    echo "<li class=page-scroll>
                                    <a href=cerrar_sesion.php>Cerrar Sesion</a>
                                    </li>";
                                    $_SESSION['estado']="paso";
                                }
                        }
                        
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
     <!-- About Section -->
     
    <section class="success" id="about" <?php if(isset($_SESSION['estado'])) echo "style='display: none;'";?>>
        <div class="container">
            <div class="row">
                <div class="bg-info col-lg-2"></div>
                <div class="col-lg-8 text-center">
                    <h2>Inicio de Sesion</h2>
                    <hr class="star-light">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-md btncolabo">Usuario</button>
                        <button type="button" class="btn btn-primary btn-md btnadmin">Administrador</button>
                    </div>
                    <form class="form-colabor form-horizontal" action="index.php" method="post">
                        <label class="control-label col-sm-2">Id Usuario</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="txtidusu" type="text" required placeholder="2013....."></input>
                        </div>
                        <label class="control-label col-sm-2">Contraseña</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="txt_pass" type="password" required placeholder="******"></input>
                            <input class="form-control" name="tipo" type="text" value="Usuario" style="display: none;"></input>
                        </div>
                        <div class="col-sm-12">
                            <input class="btn btn-lg btn-outline" type="Submit" value="Ingresar"></input>
                        </div>
                        <div class="alert alert-info col-sm-12">
                        <strong>Usuario</strong>
                        </div>
                    </form>

                    <form class="form-admin" action="index.php" method="post" style="display: none;">
                    <label class="control-label col-sm-2">Id Admin</label>
                    <div class="col-sm-10"><input class="form-control" name="txt_id_admin" type="text" required placeholder="1"></input></div>
                    <label class="control-label col-sm-2">Contraseña</label>
                    <div class="col-sm-10"><input class="form-control" name="txt_pass" type="password" required placeholder="******"></input>
                     <input class="form-control" name="tipo" type="text" value="admin" style="display: none;"></input></div>
                    <div class="col-sm-12"><input class="btn btn-lg btn-outline" type="Submit" value="Ingresar"></input></div>
                    <div class="alert alert-info col-sm-12">

                        <strong>Administrador</strong>
                    </div>
                    </form> 
                </div>
                <div class="bg-info col-lg-2"></div>
            </div>
              

        </div>
    </section>


<!-- Mostrar Section -->
    <section id="most" <?php if(!isset($_SESSION['estado'])) echo "style='display: none;'";?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Mostrar</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
		<div class="col-sm-12 portfolio-item">
			<form action='index.php' method=post class='form-group'>
                	<label class='control-label col-sm-4'>Buscar Contactos por Usuario</label>
                        <div class=col-sm-4><input class=form-control type=number name=id_usu required></input></div>
                	<div class='col-sm-4'><input class='btn btn-lg btn-success' type='Submit' value=Enviar></input></div>
                        </form>
		</div>
        <div class="col-sm-12 portfolio-item">
        <?php
            if(isset($_POST['id_usu'])){
                echo "
                            <table class='table table table-hover'>
                            <tr class=info>
                                <th>ID Usuario</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Direccion</th>
                                
                            </tr>";
                            $urlconta="http://mod-01.esy.es/muestra/metodos/contacto/".$_POST['id_usu'];
                            $contaJSON =file_get_contents($urlconta);
                            $conta =json_decode($contaJSON, true);
                            $urlcol="http://mod-01.esy.es/muestra/metodos/Usuario/".$conta['Contacto'];
                            $colJSON =file_get_contents($urlcol);
                            $col =json_decode($colJSON, true);
                            echo "<h6>Informacion de Contactos de usuario ".$_POST['id_usu']."</h6><br>";
                                echo "<tr class='active'>
                                    <td>".$col['Id_Usuario']."</td>
                                    <td>".$col['Nombre']."</td>
                                    <td>".$col['Telefono']."</td>
                                    <td>".$col['Correo']."</td>
                                    <td>".$col['Direccion']."</td>
                                </tr>";  
                            
                            echo "</table>";
            }

        ?>

        </div>

                <div class="col-sm-12 portfolio-item">
                   <?php
                    
                            echo "<h6>Informacion de todos los usuarios registrados</h6><br>";
                            
                            echo "
                            <table class='table table table-hover'>
                            <tr class=info>
                                <th>ID Usuario</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Direccion</th>
                                
                            </tr>";
                            $urlcol="http://mod-01.esy.es/muestra/metodos/usuario/total";
                            $colJSON =file_get_contents($urlcol);
                            $col =json_decode($colJSON, true);
                            foreach ($col as $colab) { 
                                echo "<tr class='active'>
                                    <td>".$colab['Id_Usuario']."</td>
                                    <td>".$colab['Nombre']."</td>
                                    <td>".$colab['Telefono']."</td>
                                    <td>".$colab['Correo']."</td>
                                    <td>".$colab['Direccion']."</td>
                                </tr>";  
                            }
                            echo "</table>";
                   ?>
                </div>
               
            </div>
        </div>
    </section>

    <section class="success" id="opc" <?php 
    if(!isset($_SESSION['estado'])) 
        echo "style='display: none;'";
    else{
        if($_SESSION['tipo']=="Usuario")
            echo "style='display: none;'";
    }
    ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Opciones</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <div class="row txt-center opc">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <h4 class="text-success bg-info">Opciones de Colaboradores</h4>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-md btn-colabor-insertar">Insertar</button>
                        <button type="button" class="btn btn-primary btn-md btn-colabor-actualizar">Actualizar</button>
                        <button type="button" class="btn btn-primary btn-md btn-colabor-borrar">Borrar</button>
                    </div>
                    <form action="http://mod-01.esy.es/muestra/metodos/Usuario/insertar" method="post" class="form-colabor-insertar form-group" style="display: none;">
                        <label class="control-label col-sm-4">Nombre</label>
                        <div class="col-sm-8"><input class="form-control" type="text" name="usu_nom" required placeholder="Juan..."/></div>
                        <label class="control-label col-sm-4">Contraseña</label>
                        <div class="col-sm-8"><input class="form-control" type="password" name="usu_pass" required placeholder="*********"></div>
                        <label class="control-label col-sm-4">Telefono</label>
                        <div class="col-sm-8"><input class="form-control" type="number" min="100000000" max="999999999" name="usu_tel" required placeholder="222...."></div>
                        <label class="control-label col-sm-4">Correo</label>
                        <div class="col-sm-8"><input class="form-control" type="email" name="usu_correo" required placeholder="ejemplo@ejemplo.com"/></div>
                        <label class="control-label col-sm-4">Direccion</label>
                        <div class="col-sm-8"><input class="form-control" type="text" name="usu_dir" required placeholder="col. snt...."/></div>
                        <div class="col-sm-12"><input class="btn btn-lg btn-warning" type="Submit" value="Enviar"></input></div>
                    </form>
                    <form action="http://mod-01.esy.es/muestra/metodos/Usuario/actualizar" method="post" class="form-colabor-actualizar form-group" style="display: none;">
                        <label class="control-label col-sm-4" id="usu_id">Id Usuario </label>
                        <div class="col-sm-8"><input class="form-control" type="number" onkeyup="showHint(this.value)" name="id_usu_ac" required placeholder="201313..."/></div>
                        <label class="control-label col-sm-4">Nombre</label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="usu_nom" name="usu_nom_ac" placeholder="Juan..."></div>
                        <label class="control-label col-sm-4">Contraseña</label>
                        <div class="col-sm-8"><input class="form-control" type="password" id="usu_pass" name="usu_pass_ac" placeholder="**********"></div>
                        <label class="control-label col-sm-4">Telefono</label>
                        <div class="col-sm-8"><input class="form-control" type="number" id="usu_tel" max="9999999999" min="100000000" name="usu_tel_ac" placeholder="2221313..."/></div>
                        <label class="control-label col-sm-4">Correo</label>
                        <div class="col-sm-8"><input class="form-control" type="email" id="usu_correo" name="usu_correo_ac" placeholder="ejemplo@ejemplo.com"/></div>
                        <label class="control-label col-sm-4">Direccion</label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="usu_dir" name="usu_dir_ac" placeholder="Col. Snt..."/></div>
                        <div class="col-sm-12"><input class="btn btn-lg btn-warning" type="Submit" value="Enviar"></input></div>
                    </form>
                    <form action="http://mod-01.esy.es/muestra/metodos/Usuario/borrar" method="post" class="form-colabor-borrar form-group" style="display: none;">
                        <label class="control-label col-sm-4">Id Usuario</label>
                        <div class="col-sm-8"><input class="form-control" type="number" min="0" name="id_usu_del" required placeholder="201313..."/></div>
                        <div class="col-sm-12"><input class="btn btn-lg btn-warning" type="Submit" value="Enviar"></input></div>
                    </form>

                    </div>
                </div>
                <div class="col-lg-4">
                   
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                   
                </div>
            </div>
        </div>
    </section>
       <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="index.html">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>



    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
