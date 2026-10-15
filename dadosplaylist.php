<?php
session_start();

$_SESSION["playlista"] = $_POST["playlista"];

if(empty ($_POST["playlista"])){
    $_SESSION["mensagem"] = "Insira o campo solicitado";
    header ("location:index.php");
    exit;
}

echo "Parabéns! Sua playlist ". $_POST["playlista"] ." foi criada com sucesso!";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecionamento</title>
</head>
<body>
    <br>
    <a href="escolhermusica.php"><br>Escolha as músicas da sua playlist!</a>

</body>
</html>
































