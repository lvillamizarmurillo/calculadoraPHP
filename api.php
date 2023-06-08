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
    function calculo(){
        if($_SESSION['opc'][-1] == "+"){
            $resultado1 = (float)$_SESSION['num1']+(float)$_SESSION['num2'];
        }else if($_SESSION['opc'][-1] == "-"){
            $resultado1 = (float)$_SESSION['num1']-(float)$_SESSION['num2'];
        }else if($_SESSION['opc'][-1] == "*"){
            $resultado1 = (float)$_SESSION['num1']*(float)$_SESSION['num2'];
        }else if($_SESSION['opc'][-1] == "/"){
            $resultado1 = (float)$_SESSION['num1']-(float)$_SESSION['num2'];
            if($_SESSION['opc'][-1] == "/" && $_SESSION['num2'] == 0){
                $resultado1 = "No se puede dividir entre 0, intente nuevamente";
            };
        }else if($_SESSION['opc'][-1] == "^"){
            $resultado1 = (float)$_SESSION['num1']**(float)$_SESSION['num2'];
        }else if($_SESSION['opc'][-1] == "mod"){
            $resultado1 = (float)$_SESSION['num1']%(float)$_SESSION['num2'];
        };
        return $resultado1;
    };
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
    <link rel="stylesheet" href="css/stile.css">
</head>
<body>
    <div class="container">
        <div class="calculadora">
            <form method="POST">
                <table>
                    <tr>
                        <td colspan="6"><input type="text" name="resultado" value="<?php if($_POST['operador'] == null && empty($_SESSION['opc'])){
                        $_SESSION['num1'] = agreste('num1');
                        echo $_SESSION['num1'];
                    }else{
                        $_SESSION['num2'] = agreste('num2');
                        $_SESSION['opc'] .= $_POST['operador'];
                        echo $_SESSION['num1'].$_SESSION['opc'][-1].$_SESSION['num2'];
                    };
                    ?>"></td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="numero" value="1">1</button></td>
                        <td><button type="submit" name="numero" value="2">2</button></td>
                        <td><button type="submit" name="numero" value="3">3</button></td>
                        <td><button type="submit" name="operador" value="+">+</button></td>
                        <td><button type="submit" name="opcion" value="⇦">⇦</button></td>
                        <td><button type="submit" name="opcion" value="c">c</button></td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="numero" value="4">4</button></td>
                        <td><button type="submit" name="numero" value="5">5</button></td>
                        <td><button type="submit" name="numero" value="6">6</button></td>
                        <td><button type="submit" name="operador" value="-">-</button></td>
                        <td><button type="submit" name="operador" value="*">*</button></td>
                        <td><button type="submit" name="operador" value="/">/</button></td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="numero" value="7">7</button></td>
                        <td><button type="submit" name="numero" value="8">8</button></td>
                        <td><button type="submit" name="numero" value="9">9</button></td>
                        <td><button type="submit" name="numero" value="0">0</button></td>
                        <td><button type="submit" name="operador" value="^">^</button></td>
                        <td><button type="submit" name="operador" value="mod">mod</button></td>
                    </tr>
                    <tr>
                        <td colspan="6"><input type="submit" name="enviar" value="="></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="respueta4">
        <h1><?php if($_POST['enviar'] == "="){$mostrar = calculo();echo $mostrar;};?></h1>
    </div>
</body>
</html>
