<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cola Monocanal Poblacion Infinita</title>	
</head>
<body>
    <h2>RESULTADOS COLA MONOCANAL POBLACION INFINITA</h2>
	<?php 
	$a = $_POST['lamda'];
	$m = $_POST['mu'];
	$n = $_POST['n'];
	echo "A es: ",$a,"<br>";
	echo "M es: ",$m,"<br>";
	echo "Numero de Clientes: ",$n,"<br><br>";
    $P=$a/$m;
    echo "Factor de Utilizacion: ",$P,"<br>";
    $Po=1-$P;
    echo "Probalidad de Encontrar el Sistema Vacio: ",$Po,"<br>";
    
    $Pn=pow($P,$n)*$Po;
    echo "Probalidadde en Encontrar ",$n," Cliente en el Sistema: ",$Pn,"<br>";
    $Lq=(pow($a,2)/($m*($m-$a)));
    echo "Numero Esperado de Clientes en la Cola: ",$Lq,"<br>";
    $L= ($a/($m-$a));
    echo "Numero Esperado de Clientes en en Sistema: ",$L,"<br>";
    $Wq=($a/($m*($m-$a)));
    echo "Tiempo Esperado de Clientes en la Cola: ",($Wq*60)," minutos","<br>";
    $W=(1/($m-$a));
    echo "Tiempo Esperado de Clientes en el Sistema: ",(($W*60)-($Wq*60))," minutos","<br>";
	 ?>
</body>
</html>