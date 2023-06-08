<?php
    session_start();
    function agreste($calculao){
        if(isset($_POST["numero"])||isset($_POST["opcion"])){
            if($_POST["opcion"] == "c"){
                $_SESSION = null;
            }else if($_POST["opcion"] == "⇦"){
                $_SESSION[$calculao] = substr($_SESSION[$calculao],0,-1);
            }else{
                if(isset($_SESSION[$calculao])){
                    $_SESSION[$calculao] .= $_POST["numero"];
                }else{
                    $_SESSION[$calculao] = $_POST["numero"];
                }
            }
        }
        return $_SESSION[$calculao];
    };
    if($_POST['enviar'] == "Enviar"){

    }
    var_dump($_SESSION['num1']);
    echo "<hr>";
    var_dump($_SESSION['num2']);
    echo "<hr>";
    var_dump($_SESSION['opc']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="resultado" value="<?php if($_POST['operador'] == null && empty($_SESSION['opc'])){
            $_SESSION['num1'] = agreste('num1');
            echo $_SESSION['num1'];
        }else{
            $_SESSION['num2'] = agreste('num2');
            $_SESSION['opc'] .= $_POST['operador'];
            echo $_SESSION['num1'].$_SESSION['opc'][-1].$_SESSION['num2'];
        };
        ?>">
        <button type="submit" name="numero" value="1">1</button>
        <button type="submit" name="numero" value="2">2</button>
        <button type="submit" name="numero" value="3">3</button>
        <button type="submit" name="numero" value="4">4</button>
        <button type="submit" name="numero" value="5">5</button>
        <button type="submit" name="numero" value="6">6</button>
        <button type="submit" name="numero" value="7">7</button>
        <button type="submit" name="numero" value="8">8</button>
        <button type="submit" name="numero" value="9">9</button>
        <button type="submit" name="numero" value="0">0</button>
        <button type="submit" name="opcion" value="⇦">⇦</button>
        <button type="submit" name="opcion" value="c">c</button>
        <button type="submit" name="operador" value="+">+</button>
        <button type="submit" name="operador" value="-">-</button>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
