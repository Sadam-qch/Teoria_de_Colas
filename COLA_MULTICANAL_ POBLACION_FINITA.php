<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cola Muticanal Poblacion Finita</title>
</head>
<body>
<h1>RESULTADOS COLA MULTICANAL POBLACION FINITA</h1>
<?php 
$A= $_POST['lamda3'];
$M= $_POST['mu3'];
$m= $_POST['n3'];
$s= $_POST['k3'];
$suma=0;
$sumb=0;
echo "A es: ",$A,"<br>";
echo "M es: ",$M,"<br>";
echo "Numero de Clientes: ",$m,"<br>";
echo "Numero de Canales: ",$s,"<br><br>";

$P=($A/$M);
echo "Numero de Canales: ",$P,"<br>";

 for ($n=0; $n <$s ; $n++) { 
    $fn=0;
	$f = 1; 
    for ($i = 1; $i <= $n; $i++){ 
      $f= $f* $i; 
    }  
    $fn=$fn+$f;

    $fm=0;
	$f = 1; 
    for ($i = 1; $i <= $m; $i++){ 
      $f= $f* $i; 
    }  
    $fm=$fm+$f;

	$fb=0;
	$f = 1; 
    for ($i = 1; $i <= ($m-$n); $i++){ 
      $f= $f* $i; 
    }  
    $fb=$fb+$f;
    $suma=$suma+(($fm/($fb*$fn))*pow($P,$n));	
}

for ($n=$s; $n <$m+1 ; $n++) { 
	$fm=0;
	$f = 1; 
    for ($i = 1; $i <= $m; $i++){ 
      $f= $f* $i; 
    }  
    $fm=$fm+$f;

    $fb=0;
	$f = 1; 
    for ($i = 1; $i <= ($m-$n); $i++){ 
      $f= $f* $i; 
    }  
    $fb=$fb+$f;

    $fk=0;
	$f = 1; 
    for ($i = 1; $i <= $s; $i++){ 
      $f= $f* $i; 
    }  
    $fk=$fk+$f;
    $sumb=$sumb+(($fm/($fb*$fk*pow($s,($n-$s)))*pow($P,$n)));
}
$Po=(1/($suma+$sumb));
echo "Probalidad de Encontrar el Sistema Vacio: ",$Po,"<br><br>";

for ($n=1; $n<=$m ; $n++) { 
	
        if ($n<=$s) {
        	$fn=0;
	$f = 1; 
    for ($i = 1; $i <= $n; $i++){ 
      $f= $f* $i; 
    }  
    $fn=$fn+$f;

    $fm=0;
	$f = 1; 
    for ($i = 1; $i <= $m; $i++){ 
      $f= $f* $i; 
    }  
    $fm=$fm+$f;

	$fb=0;
	$f = 1; 
    for ($i = 1; $i <= ($m-$n); $i++){ 
      $f= $f* $i; 
    }  
    $fb=$fb+$f;
    $Pn=((($fm/($fb*$fn))*pow($P,$n))*$Po);	
    echo "Probalidadde en Encontrar ",$n," Cliente en el Sistema: ",$Pn,"<br>";
        
	}elseif ($s<$n) {
		if ($n<=$m) {
			$fm=0;
	$f = 1; 
    for ($i = 1; $i <= $m; $i++){ 
      $f= $f* $i; 
    }  
    $fm=$fm+$f;

    $fb=0;
	$f = 1; 
    for ($i = 1; $i <= ($m-$n); $i++){ 
      $f= $f* $i; 
    }  
    $fb=$fb+$f;

    $fk=0;
	$f = 1; 
    for ($i = 1; $i <= $s; $i++){ 
      $f= $f* $i; 
    }  
    $fk=$fk+$f;
    $Pn=((($fm/($fb*$fk*pow($s,($n-$s)))*pow($P,$n)))*$Po);
     echo "Probalidadde en Encontrar ",$n," Cliente en el Sistema: ",$Pn,"<br>";
		}
	}
}
echo "<br><br>";

?>
</body>
</html>