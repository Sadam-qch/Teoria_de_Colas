<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cola Monocanal Poblacion Finita</title>
</head>
<body>
  <h2>RESULTADOS DE LA COLA MONOCANAL POBLACION FINITA</h2>
<?php
//Datos de entrada
$lamda = $_POST['lamda1'];
$mu = $_POST['mu1'];
$m = $_POST['M1'];  //clientes
$nclientes = $_POST['n1'];
$sumatoria = 0; // Variable para almacenar la sumatoria
$f_utilizacion = 0; //variable para almacenar el factor de utilizacion
$pro = 0; // variable de almacenamiento de la resta
//lamda sobre mu
$f_utilizacion = ($lamda / $mu);
echo "El factor de utilizacion es: ","$f_utilizacion";
//para generar la factorial de mu
function factorial_m($m) {
    $result = 1;
    for($i = 1; $i <= $m; $i++) {
      $result *= $i;
    }
    return $result;
  }
  function factorial_n($nclientes) {
    $result = 1;
    for($i = 1; $i <= $nclientes; $i++) {
      $result *= $i;
    }
    return $result;
  }
  
  function factorial_pro($pro) {
    $result = 1;
    for($i = 1; $i <= $pro; $i++) {
      $result *= $i;
    }
    return $result;
  }
  function factorialclientes($m, $nclientes) {
    $result = 1;
    for($i = 1; $i <= ($m - $nclientes); $i++) {
      $result *= $i;
    }
    return $result;
  }
  //echo factorial($m); // Output: 120

  //incremento y decremento
  for ($i=0; $i <=$m ; $i++) { 
      $increment = $i;
      $pro = ($m -$increment); //resta de m-n
      $sumatoria = $sumatoria + (factorial_m($m) / factorial_pro($pro) * pow($f_utilizacion,$increment));
  }
    echo "<br>";

    echo "<br>";

    //////


//Probabilidad de que el sistema este vacio
$Po = 1/ $sumatoria;
echo "Prbabilidad de encontrar el sistema vacio: ", "$Po";  
//Probabilidad de encontrar n clientes en el sistema
$Pn = ((factorial_m($m) / factorialclientes($m, $nclientes)) * pow($f_utilizacion,$nclientes))*$Po;
echo "<br>";
echo "La probabilidad de encontrar ","$nclientes"," clientes en el sistema: ","$Pn";
$Lq = $m-(($lamda + $mu) / $lamda)*(1 - $Po);
echo "<br>";
echo  "Numero esperado de clientes en la cola: ","$Lq";
$L = $Lq+(1- $Po);
echo "<br>";
echo "Numero esperado de clientes en el sistema: ", "$L";
$Wq = $L/($mu*(1-$Po));
echo  "<br>";
echo "Tiempo esperado de clientes en la cola: ". $Wq * 365 ." años";
$W = $Wq + (1/$mu);
echo "<br>";
echo "Tiempo esperado de clientes en el sistema: ". $W * 365 ." años";

?>
</body>
</html>