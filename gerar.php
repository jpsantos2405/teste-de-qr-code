<?php

function gerarCodigo($tamanho = 38)
{
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $codigo = '';

    for ($i = 0; $i < $tamanho; $i++) {
        $codigo .= $caracteres[random_int(0, strlen($caracteres) - 1)];
    }

    return $codigo;
}

?>

<form method="POST">
    <label>Quantidade de QR Codes:</label>
    <input type="number" name="qtd" min="1" max="1000" value="10">
    <button type="submit">Gerar</button>
</form>

<?php

if (isset($_POST['qtd'])) {

    $qtd = intval($_POST['qtd']);

    for ($i = 1; $i <= $qtd; $i++) {

        $codigo = gerarCodigo();

        $link = "https://jpsantos2405.github.io/teste-de-qr-code/index.html?" . $codigo;

        echo "<div style='display:inline-block;text-align:center;margin:20px;'>";

        echo "<img src='https://api.qrserver.com/v1/create-qr-code/?size=250x250&data="
            . urlencode($link)
            . "'>";

        echo "<br>";

        echo "<small>{$codigo}</small>";

        echo "</div>";
    }

}
?>
