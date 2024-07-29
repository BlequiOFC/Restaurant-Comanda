<?php

// Essa parte define que quando apertar no botão configurado como "Submit" é para 
// armazenar e enviar os dados com o $_POST (pelo que eu entendi rs)
if (isset($_POST['submit'])) {

    $teste = "teste";

    // Essa parte trás o script do connection.php para fazer a conexão com o BD nesse arquivo
    include_once ('connection.php');


    // Define as variaveis com o dado que for inserido no form
    $nome = $_POST['nome'];

    // Esse código serve para o armazenamento das fotos no BD
    // VALEU CHATGPT!
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Lê o conteúdo do arquivo
        $foto = file_get_contents($_FILES['foto']['tmp_name']);
    } else {
        // Caso haja erro no upload
        echo "Erro no upload da foto.";
        exit();
    }


    // Cria a instrução para executar o código SQL para armazenar os dados no banco, com
    // o placeholder "?" nos valores, para que seja alterado pelo bind_param com os
    // valores das variaveis.
    $stmt = $dbConnection->prepare("INSERT INTO garcoms (nm_garcom, ft_garcom) VALUES (?, ?) ");

    // Verificação adicional para ver se o prepare() funcionou
    if ($stmt === false) {
        die("Erro na preparação da instrução: " . $dbConnection->error);
    }

    $null = NULL;
    $stmt->bind_param("sb", $nome, $null);


    // Envia os dados binários de forma adequada
    $stmt->send_long_data(1, $foto);


    // Confere se deu certo, se não, mostra o erro
    if ($stmt->execute()) {
        header('Location: admin.php');
        echo "Dados enviados com sucesso";
        exit();
    } else {
        echo "Erro: " . $stmt->error;
    }


    // Fecha a consulta e a conexão
    $stmt->close();
    $dbConnection->close();

}

?>






<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">


    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <a href="index.php">index</a>
    <br><br>

    <div class="container h-75">


        <div class="reg-grcm-box-admin">
            <form action="admin.php" method="post" enctype="multipart/form-data">
                <div style="margin:20px";>
                    <br>
                    <h2>Registrar garçom</h2>
                    <div class="gap-2 d-inline-flex flex-column">
                        <input type="text" name="nome" id="" required placeholder="Nome do garçom">
                        <span>Foto de perfil do garçom:</span>
                        <input type="file" name="foto" required accept="image/*">
                        <input type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>

        <div>

            

        </div>



    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>