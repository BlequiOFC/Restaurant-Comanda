<?php



// Essa parte trás o script do connection.php para fazer a conexão com o BD nesse arquivo
include_once ("connection.php");


// Testa a conexão
if ($dbConnection->connect_error) {
    die("Falha na conexão: " . $dbConnection->connect_error);
}


// Armazena a linha de código do SQL na variavel $selectGarcons
$selectGarcons = "SELECT id_garcom, nm_garcom, ft_garcom FROM garcoms";

// Armazena os dados obtidos atráves do código armazenado em selectGarcons
$dadosGarcons = $dbConnection->query($selectGarcons);

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
    <a href="index.php">index</a>


    <div class="container h-100 d-flex justify-content-center align-items-center">


        <div>

        <?php
        
        
        if ($dadosGarcons->num_rows > 0) {

            while($row = $dadosGarcons->fetch_assoc()) {

                echo $row["nm_garcom"] ;
            
        
        } ; }

        $dbConnection->close();







        
        ?>


        </div>

    </div>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>