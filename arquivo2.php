<?php
session_start();

$playlist = $_SESSION['playlist'] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Playlist Final</title>
</head>
<body>
    <h1>Sua Playlist de Músicas</h1>

    <?php
    if (!empty($playlist)) {
    ?>
        <ul>
            <?php
            foreach ($playlist as $item) {
            ?>
                <li>
                    <?php echo ($item['musica']); ?> - <?php echo ($item['artista']); ?>
                </li>
            <?php
            }
            ?>
        </ul>
    <?php
    } else {
    ?>
        <p>Sua lista de músicas está vazia!</p>
    <?php
    }
    ?>

    <br>
    <a href="index.php">Voltar e adicionar mais músicas</a>
</body>
</html>