<?php
session_start();

if (!isset($_SESSION['playlist'])) {
    $_SESSION['playlist'] = [];
}

if (isset($_POST['adicionar'])) {
    $artista = $_POST['artista_atual'];
    $musicas = $_POST['musica'];

    if (!is_array($musicas)) {
        $musicas = [$musicas];
    }

    foreach ($musicas as $musica) {
        $_SESSION['playlist'][] = [
            'artista' => $artista,
            'musica'  => $musica
        ];
    }
}

if (isset($_POST['limpar'])) {
    $_SESSION['playlist'] = [];
}

if(isset($_POST["artista"])){
    $selecao = $_POST["artista"];
} else {
    $selecao = "";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Montar Playlist</title>
</head>
<body>
    <h1>Adicione músicas à sua lista</h1>

    <form action="" method="POST">
        <label>Escolha o artista:</label>
        <select name="artista" onchange="this.form.submit()">
            <option value="">-- Selecione --</option>
            <option value="Matuê" <?php if($selecao == 'Matuê') echo 'selected'; ?>>Matuê</option>
            <option value="Marília Mendonça" <?php if($selecao == 'Marília Mendonça') echo 'selected'; ?>>Marília Mendonça</option>
            <option value="ExaltaSamba" <?php if($selecao == 'ExaltaSamba') echo 'selected'; ?>>ExaltaSamba</option>
            <option value="Metallica" <?php if($selecao == 'Metallica') echo 'selected'; ?>>Metallica</option>
        </select>
    </form>

    <br>

    <?php
    if (!empty($selecao)) {
    ?>
    <form action="" method="POST">
        <input type="hidden" name="artista_atual" value="<?php echo $selecao; ?>">
        
        <p>Músicas de <?php echo $selecao; ?>:</p>

        <?php
        if ($selecao == "Marília Mendonça") {
        ?>
        <table>
        <tr>
            <td><label for="musica">Músicas da Marília Mendonça:</label></td>
            <td>
                <select id="musica" name="musica">
                    <option value="Infiel">Infiel</option>
                    <option value="Leão">Leão</option>
                    <option value="Supera">Supera</option>
                </select>
            </td>
            </tr>
        </table>

        <?php
        } elseif ($selecao == "Matuê") {
        ?>
        <table>
        <tr>
            <td><label for="musica">Músicas do Matuê:</label></td>
            <td>
                <select id="musica" name="musica">
                    <option value="Kenny G">Kenny G</option>
                    <option value="Conexões de Máfia">Conexões de Máfia</option>
                    <option value="Vampiro">Vampiro</option>
                </select>
            </td>
            </tr>
        </table>
        <?php
        } elseif ($selecao == "ExaltaSamba") {
        ?>
        <table>
        <tr>
            <td><label for="musica">Músicas do ExaltaSamba:</label></td>
            <td>
                <select id="musica" name="musica">
                    <option value="Me Apaixonei pela Pessoa Errada">Me Apaixonei pela Pessoa Errada</option>
                    <option value="Tá Vendo Aquela Lua">Tá Vendo Aquela Lua</option>
                    <option value="Livre pra Voar">Livre pra Voar</option>
                </select>
            </td>
            </tr>
        </table>
        <?php
        } elseif ($selecao == "Metallica") {
        ?>
        <table>
        <tr>
            <td><label for="musica">Músicas do Metallica:</label></td>
            <td>
                <select id="musica" name="musica">
                    <option value="Enter Sandman">Enter Sandman</option>
                    <option value="Nothing Else Matters">Nothing Else Matters</option>
                    <option value="Master of Puppets">Master of Puppets</option>
                </select>
            </td>
            </tr>
        </table>
        <?php
        }
        ?>

        <br>
        <button type="submit" name="adicionar">Adicionar música na playlist</button>
    </form>
    <?php
    }
    ?>

    <hr>

    <p>Total de músicas na lista: <?php echo count($_SESSION['playlist']); ?></p>

    <form action="" method="POST">
        <button type="submit" name="limpar">Esvaziar lista</button>
    </form>
    
    <br>
    <a href="playlistfinal.php">Veja sua playlist final!</a>
</body>
</html>