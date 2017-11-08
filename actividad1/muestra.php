<?PHP
  $usuario="u499828989_root";
  $pass="breaking";
  $host="mysql.hostinger.mx";
  $bd="u499828989_agend";
  $con=mysqli_connect($host,$usuario,$pass,$bd);
// get the q parameter from URL
$q = $_GET["q"];
echo "hola";
  if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

  if ($q != "") { 
    $resultado = mysqli_query($con,"SELECT * FROM Usuario where Id_Usuario='".$q."'");
  
    while($ro=mysqli_fetch_array($resultado)){
      $all=$ro;
    }
  }

  mysqli_close($con);

$hint = "";

// lookup all hints from array if $q is different from "" 
if(isset($all)){
    foreach($all as $col) {
      $hint .= "$col,";
    }
  }

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;

?>