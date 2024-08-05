<?php

session_start();
include_once "connection.php";

if (isset($_GET['id'])) {

    $idGarcomSession = $_GET['id'];

    $nomeGarcomSessionQuery = "SELECT nm_garcom FROM tb_garcoms WHERE id_garcom = ?";
    $stmt = $dbConnection->prepare($nomeGarcomSessionQuery);
    $stmt->bind_param("i", $idGarcomSession);
    $stmt->execute();
    $nomeGarcomSession = $stmt->get_result();

}
;

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
    <a href="waiter-login.php">waiter-login</a> <br>
    <a href="index.html">index</a>

    <div class="container h-75 d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="card-body">
                <form action="register-orders.php">
                    <div>
                        <label class="form-label" style="font-size: 25px; font-weight: bold;" for="pratos">Pratos</label> <br>
                        <textarea class="input-form-pedidos" style="height: 65px" type="text" placeholder="Pratos"
                            name="pratos"></textarea>
                    </div>
                    <div>
                        <label class="form-label" style="font-size: 25px; font-weight: bold;" for="bebidas">Bebidas</label><br>
                        <input class="input-form-pedidos" type="text" placeholder="Bebidas" name="bebidas">
                    </div>
                    <div>
                        <label class="form-label" style="font-size: 25px; font-weight: bold;" for="nr_mesa">Número da mesa</label><br>
                        <input class="input-form-pedidos" type="number" placeholder="Número da mesa" name="nr_mesa">
                    </div>
                    <div>
                        <label class="form-label" style="font-size: 25px; font-weight: bold;" for="hora">Hora Atual</label><br>
                        <input class="input-form-pedidos" type="text" disabled id="hora" name="hora">
                    </div>
                    <div>
                        <label class="form-label" style="font-size: 25px; font-weight: bold;" for="nm_garcom">Garçom</label><br>
                        <input class="input-form-pedidos" type="text" name="nm_garcom" disabled 
                        value="<?php $row = mysqli_fetch_array($nomeGarcomSession);
                        echo $row['nm_garcom']; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>