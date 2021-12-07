<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Desafío</title>
</head>

<body>
<div class="container-fluid">
<h1>Desafío</h1>
<br>
	<div class="row">
		<div class="col-md-6">
			<form action="./index.php" method='post' role="form">
				<div class="form-group">					 
					<label for="ingreso">
						Ingrese Caracteres para su comprobación.
					</label>
					<input type="text" class="form-control" name="ingreso" id="ingreso" />
				</div>
                <br>				 
				<button type="submit" class="btn btn-primary">
					Aceptar
				</button>
			</form>
		</div>
	</div>
</div>  
</body>
</html>

<?php
/*
Un mensaje tiene los paréntesis balanceados cuando cumple una de las siguientes reglas:
1. Es un mensaje vacío
2. Contiene sólo una o más repeticiones de las letras "a" a la "z", espacio " ", o dos puntos ":"
3. Comienza por un paréntesis de apertura "(", seguido de un mensaje con paréntesis balanceados, seguido de un paréntesis de cierre ")"
4. Es un mensaje con paréntesis balanceados seguido de otro mensaje con paréntesis balanceados
5. Es un emoticón feliz ":)" o uno triste ":("

Crea un programa que identifique *si existe al menos una forma* de interpretar 
la entrada como un mensaje de paréntesis balanceados. La entrada es un string y
 la salida debe ser "balanceado" o "desbalanceado"

Ejemplos:
a. "hola" -> balanceado
b. "(hola)" -> balanceado
c. "(()" -> desbalanceado
d. "(:)" -> balanceado (ej, si consideramos el mensaje como un ":" [regla 2] entre paréntesis [regla 3])
e. "no voy (:()" -> balanceado (ej, si consideramos un emoticón triste [regla 5] entre paréntesis [regla 3])
f. "hoy pm: fiesta :):)" -> balanceado
g. ":((" -> desbalanceado
h. "a (b (c (d) c) b) a :)" -> balanceado (ej, si el último paréntesis es en realidad un emoticón)
*/

function validaBalanceo($strA)
{

    $especiales = ["(:)", ":)", ":("];
    $str = str_replace($especiales, "", $strA);

    $len = strlen($str);
    $contarApertura = 0;
    $contarCierre = 0;

    for ($i = 0; $i < $len; ++$i) {
        //echo $str[$i] . "\n";

        if ($str[$i] == "(") {
            $contarApertura++;
        } else if ($str[$i] == ")") {
            $contarCierre++;
        }
    }

    if ($contarApertura == $contarCierre) {
        echo " Balanceado";
    } else {
        echo " Desbalanceado";
    }
    echo "\n";
    echo $strA;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ingreso = $_POST["ingreso"];   
    validaBalanceo($ingreso);
}
