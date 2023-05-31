<?php
    session_start();
    function agreste($calculao){
        if(isset($_POST["numero"])){
            if($_POST["numero"] == "c"){
                $_SESSION[$calculao] = null;
            }else if($_POST["numero"] == "¡"){
                $_SESSION[$calculao] = substr($_SESSION[$calculao],0,-1);
            }else{
                if(isset($_SESSION['num1'])){
                    $_SESSION[$calculao] .= $_POST["numero"];
                }else{
                    $_SESSION[$calculao] = $_POST["numero"];
                }
            }
        }
        return $_SESSION[$calculao];
    };
    $_SESSION['num1'] = agreste('num1');
    $_SESSION['num2'] = agreste('num2');
    var_dump($_SESSION['num1'].$_SESSION['num2'])
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
        <input type="text" name="resultado" value="<?php echo isset($_SESSION['num1']) ? $_SESSION['num1'] : 0;?>">
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
        <button type="submit" name="numero" value="¡">¡</button>
        <button type="submit" name="numero" value="c">c</button>
        <button type="submit" name="operador" value="-">+</button>
        <button type="submit" name="operador" value="+">-</button>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
