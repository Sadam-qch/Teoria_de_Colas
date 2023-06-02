<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cola Multicanal Poblacion Infinita</title>
</head>
<body>
<h2>Resultados Cola Multicanal Poblacion Infinita</h2>
<?php 
$a = $_POST['lamda2'];
$m= $_POST['mu2'];
$num= $_POST['n2'];
$s= $_POST['s2'];
$sumt=0;
$sumk=0;

echo "A es: ",$a,"<br>";
echo "M es: ",$m,"<br>";
echo "Numero de Clientes: ",$num,"<br>";
echo "Numero de Canales: ",$s,"<br><br>";

$P=($a/$m);
echo "P: ",$P,"<br>";
echo "Factor de Utilizacion: ",($a/($s*$m)),"<br>";

for ($n=0; $n <$s ; $n++) { 
	$fact=0;
	$f = 1; 
    for ($i = 1; $i <= $n; $i++){ 
      $f= $f* $i; 
    }  
    $fact=$fact+$f;
	$sumt=($sumt+((1/$fact)*pow($P,$n)));
}
$fk = 1; 
$fact=0;
    for ($i = 1; $i <= $s; $i++){ 
      $fk= $fk* $i; 
    }  
    $fact=$fact+$fk;
 $sumk=$sumk+((1/$fact)*pow($P,$s)*(($s*$m)/(($s*$m)-$a)));
$Po=(1/($sumt+$sumk));
    echo "Probalidad de Encontrar el Sistema Vacio: ",$Po,"<br>";

$fk = 1; 
$fact=0;
    for ($i = 1; $i <= $num; $i++){ 
      $fk= $fk* $i; 
    }  
    $fact=$fact+$fk;
 $Pn=((1/$fact)*pow($P, $num)*(($s*$m)/(($s*$m)-$a))*$Po);
    echo "Probalidadde en Encontrar ",$num," Cliente en el Sistema: ",$Pn,"<br>";
$fk = 1; 
$fact=0;
    for ($i = 1; $i <= $s-1; $i++){ 
      $fk= $fk* $i; 
    }  
    $fact=$fact+$fk;
 $Lq=($a*$m*pow($P,$s)/($fact*pow(($s*$m)-$a,2)))*$Po;
    echo "Numero Esperado de Clientes en la Cola: ",$Lq,"<br>";

 $L= ($Lq+$P);
    echo "Numero Esperado de Clientes en en Sistema: ",$L,"<br>";

 $Wq=($m*pow($P,$s)/($fact*pow(($s*$m)-$a,2)))*$Po;
    echo "Tiempo Esperado de Clientes en la Cola: ",($Wq*60)," minutos","<br>";

 $W=($Wq+(1/$m));
    echo "Tiempo Esperado de Clientes en el Sistema: ",($W*60)," minutos","<br>";
?>

</body>
</html>