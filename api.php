<?php
    echo <<<HTML
        Hola mundo<br><a href="index.html" target="_blank">Volver</a>
    HTML;
    $operacion = $_POST["operacion"];
    $num1 = (float) $_POST["numero1"];
    $num2 = (float) $_POST["numero2"];
    if($operacion == "+"){
        $resultado = $num1+$num2;
        if($_POST["porcentaje"] == "%"){
            $resultado = $num1*(($num2*0.01)+1);
        }
    }else if($operacion == "-"){
        $resultado = $num1-$_POST["numero2"];
        if($_POST["porcentaje"] == "%"){
            $resultado = $num1-($num1*($num2*0.01));
        }
    }else if($operacion == "*"){
        $resultado = $num2;
    }else if($operacion == "mod"){
        $resultado = $num1%$num2;
    }else if($operacion == "√"){
        $resultado = $num1**(1/$num2);
    }else if($operacion == "^"){
        $resultado = $num1**$num2;
    }else{
        $resultado = $num1/$num2;
    }
    echo "<br>".round($resultado,2);
?>