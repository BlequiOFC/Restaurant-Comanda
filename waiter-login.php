<?php



// Essa parte trás o script do connection.php para fazer a conexão com o BD nesse arquivo
include_once "connection.php";


// Testa a conexão
if ($dbConnection->connect_error) {
    die("Falha na conexão: " . $dbConnection->connect_error);
}





// Armazena a linha de código do SQL na variavel $selectGarcons
$selectGarcons = "SELECT id_garcom, nm_garcom, ft_garcom FROM tb_garcoms";

// Armazena os dados obtidos atráves do código armazenado em selectGarcons
$dadosGarcons = mysqli_query($dbConnection, $selectGarcons);

?>






<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comanda</title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">


    <link rel="stylesheet" href="styles.css">
</head>



<body>
    <a href="index.html">index</a>
    <br><br><br>
    <div class=" d-flex justify-content-center align-items-center">
        <h2>Escolha seu perfil</h2>
    </div>

    <div class="container h-75 d-flex justify-content-center align-items-center">


        <div>
            <div class="grcm-profile-box">

                <?php

                if (mysqli_num_rows($dadosGarcons) == !null) {


                    while ($row = mysqli_fetch_array($dadosGarcons)) {

                        $garcomPfpWhile = $row['ft_garcom'];
                        $idGarcomWhile = $row['id_garcom'];

                        echo "<a href=\"register-orders.php?id=$idGarcomWhile\">";
                        echo '<div class="grcm-profile-login">';
                        echo '<img src="data:image/png;base64,' . base64_encode($garcomPfpWhile) . '" alt=' . $row['nm_garcom'] . ' /> ';
                        echo '<span> ' . $row['nm_garcom'] . ' </span>';
                        echo '</div>';
                        echo '</a>';

                    }
                    ;
                }

                ?>

            </div>

            <?php

            if (mysqli_num_rows($dadosGarcons) == null)
                echo '<h1>Sem Garçons Registrados</h1>';
            $dbConnection->close()

                ?>

        </div>
    </div>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>