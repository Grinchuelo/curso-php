<?php
const API_URL = "https://www.whenisthenextmcufilm.com/api";

# Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);

# recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

# Ejecutar la petición y guardar el resultado
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
    <title>La próxima película de Marvel</title>
</head>
<main>
    <section>
        <img src="<?= $data['poster_url']; ?>" width="250" alt="Poster de <?= $data['title']; ?>" style="border-radius: 16px;">
    </section>
    <hgroup>
        <h3> <?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días </h3>
        <p> Fecha de estreno: <?= $data["release_date"]; ?> </p>
        <p> A continuación: <?= $data["following_production"]["title"]; ?> </p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
    }

    hgroup {
        text-align: center;
    }
</style>