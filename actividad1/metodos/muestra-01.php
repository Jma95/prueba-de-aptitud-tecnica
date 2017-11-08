<?PHP
header('Content-Type:application/json');
header('Access-Control-Allow_Origin:*');
header('Access-Control-Allow_Methods: POST, GET, OPTIONS');


function admin_id($detalle){
	$usuario="u499828989_root";
	$pass="breaking";
	$host="mysql.hostinger.mx";
    $bd="u499828989_agend";
    $con=mysqli_connect($host,$usuario,$pass,$bd);

	if (mysqli_connect_errno())
  		{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
	
	$resultado = mysqli_query($con,"SELECT * FROM Administrador where Id_Administrador=".$detalle);
	
	while($ro=mysqli_fetch_array($resultado)){
		$all=$ro;
	}
	mysqli_close($con);
	return $all;
}
function contacto_id($detalle){
	$usuario="u499828989_root";
	$pass="breaking";
	$host="mysql.hostinger.mx";
    $bd="u499828989_agend";
    $con=mysqli_connect($host,$usuario,$pass,$bd);

	if (mysqli_connect_errno())
  		{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
	
	$resultado = mysqli_query($con,"SELECT * FROM Contacto where Id_Usuario=".$detalle);
	
	while($ro=mysqli_fetch_array($resultado)){
		$all=$ro;
	}
	mysqli_close($con);
	return $all;
}
function usuario_total(){
	$usuario="u499828989_root";
	$pass="breaking";
	$host="mysql.hostinger.mx";
    $bd="u499828989_agend";
    $con=mysqli_connect($host,$usuario,$pass,$bd);

	if (mysqli_connect_errno())
  		{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
	
	$resultado = mysqli_query($con,"SELECT * FROM Usuario");
	
	while($ro=mysqli_fetch_array($resultado)){
		$all[]=$ro;
	}
	mysqli_close($con);
	return $all;
}
function usuario_por_id($detalle){
	$usuario="u499828989_root";
	$pass="breaking";
	$host="mysql.hostinger.mx";
    $bd="u499828989_agend";
    $con=mysqli_connect($host,$usuario,$pass,$bd);

	if (mysqli_connect_errno())
  		{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
	
	$resultado = mysqli_query($con,"SELECT * FROM Usuario where Id_Usuario='".$detalle."'");
	
	while($ro=mysqli_fetch_array($resultado)){
		$all=$ro;
	}
	mysqli_close($con);
	return $all;
}
function admin_total(){
	$usuario="u499828989_root";
	$pass="breaking";
	$host="mysql.hostinger.mx";
    $bd="u499828989_agend";
    $con=mysqli_connect($host,$usuario,$pass,$bd);

	if (mysqli_connect_errno())
  		{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
	
	$resultado = mysqli_query($con,"SELECT * FROM Administrador");
	
	while($ro=mysqli_fetch_array($resultado)){
		$all[]=$ro;
	}
	mysqli_close($con);
	return $all;
}


function usuario_insertar(){
	$usuario="u499828989_root";
	$pass="breaking";
	$host="mysql.hostinger.mx";
    $bd="u499828989_agend";
    $con=mysqli_connect($host,$usuario,$pass,$bd);

	if (mysqli_connect_errno())
  		{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}

	mysqli_query($con,"INSERT INTO Usuario (Nombre,Password,Telefono,Correo,Direccion) VALUES ('".$_POST['usu_nom']."','".$_POST['usu_pass']."','".$_POST['usu_tel']."','".$_POST['usu_correo']."','".$_POST['usu_dir']."')");
	
	mysqli_close($con);
    header('Location: http://mod-01.esy.es/muestra/index.php');//aqui va la pagina desde donde mandan a llamar e json
    exit;
}
function usuario_actualizar(){
	$usuario="u499828989_root";
	$pass="breaking";
	$host="mysql.hostinger.mx";
    $bd="u499828989_agend";
    $con=mysqli_connect($host,$usuario,$pass,$bd);

	if (mysqli_connect_errno())
  		{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
	if ($_POST['usu_nom_ac']!=null){
		mysqli_query($con,"UPDATE Usuario SET Nombre='".$_POST['usu_nom_ac']."' WHERE Id_Usuario='".$_POST['id_usu_ac']."'");
	}
	if ($_POST['usu_pass_ac']!=null) {
		mysqli_query($con,"UPDATE Usuario SET Password='".$_POST['usu_pass_ac']."' WHERE Id_Usuario='".$_POST['id_usu_ac']."'");
		
	}
	if ($_POST['usu_tel_ac']!=null) {
		mysqli_query($con,"UPDATE Usuario SET Telefono='".$_POST['usu_tel_ac']."' WHERE Id_Usuario='".$_POST['id_usu_ac']."'");
	}
	if ($_POST['usu_correo_ac']!=null) {
		mysqli_query($con,"UPDATE Usuario SET Correo='".$_POST['usu_correo_ac']."' WHERE Id_Usuario='".$_POST['id_usu_ac']."'");
	}
	if ($_POST['usu_dir_ac']!=null) {
		mysqli_query($con,"UPDATE Usuario SET Direccion='".$_POST['usu_dir_ac']."' WHERE Id_Usuario='".$_POST['id_usu_ac']."'");
	}
	header('Location: http://mod-01.esy.es/muestra/index.php');//aqui va la pagina desde donde mandan a llamar e json
    exit;
	mysqli_close($con);
}
function usuario_borrar(){
	$usuario="u499828989_root";
	$pass="breaking";
	$host="mysql.hostinger.mx";
    $bd="u499828989_agend";
    $con=mysqli_connect($host,$usuario,$pass,$bd);

	if (mysqli_connect_errno())
  		{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
	mysqli_query($con,"DELETE FROM Usuario WHERE Id_Usuario='".$_POST['id_usu_del']."'");    	
	header('Location: http://mod-01.esy.es/muestra/index.php');//aqui va la pagina desde donde mandan a llamar e json
    exit;
	mysqli_close($con);
}

if ($_GET['peticion']=='admin'){
	if ($_GET['detalle']=='total'){
        $a=admin_total();
    }else{
         $a=admin_id($_GET['detalle']);
      }
  }
if ($_GET['peticion']=='contacto'){
	$a=contacto_id($_GET['detalle']);
}
if ($_GET['peticion']=='usuario'){
	if ($_GET['detalle']=='total'){
        $a=usuario_total();
    }
}
if ($_GET['peticion']=='Usuario'){
    if ($_GET['detalle']=='insertar'){
        usuario_insertar();
    }
    if ($_GET['detalle']=='actualizar'){
        usuario_actualizar();
    }
    if ($_GET['detalle']=='borrar'){
        usuario_borrar();
    }
    else{
    	$a=usuario_por_id($_GET['detalle']);
    }
}


echo json_encode($a);


?>
