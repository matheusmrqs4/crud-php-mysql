<?php

require 'connect.php';

/**
 * Validando o método post ($_POST) e fazendo o INSERT dos dados no BD
 */
if (isset($_POST['submit'])) {
    $filme = $_POST['filme'];
    $plataforma = $_POST['plataforma'];
    $nota = $_POST['nota'];
    $status = $_POST['status'];

    $sql = "INSERT INTO `list`(`id`, `filme`, `plataforma`, `nota`, `status`)
    VALUES (NULL, '$filme', '$plataforma', '$nota', '$status')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: index.php?msg=Inserido com Sucesso!");
    } else {
        echo "Erro" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
          crossorigin="anonymous">
</head>
<body class="bg-light text-dark">
    <div class="container">
        <div class="mt-4 mb-4 p-5 bg-dark rounded text-light text-center">
            <h1>Adicionar novo Filme</h1>
        </div>
    </div>
        <form action="" method="post" class="p-3">

            <div class="input-group mb-3 mt-3">
                <span class="input-group-text">Filme</span>
                    <input required  type="text" class="form-control" name="filme">
            </div>

            <div class="input-group mb-3 mt-3">
                <span class="input-group-text">Plataforma</span>
                    <input required  type="text" class="form-control" name="plataforma">
            </div>

            <div class="input-group mb-3 mt-3">
                <span class="input-group-text">Nota</span>
                    <input type="number" class="form-control" name="nota">
            </div>

            <div class="form-group">
                <label class="mb-3">Já Assistiu?</label>

                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="status" id="sim" value="Sim"> Sim
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="status" id="nao" value="Não"> Não
                        </label>
                    </div>
            </div>


        </div>

            <button type="submit" class="btn btn-success" name="submit">Salvar</button>

            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>
            <a href="index.php" class="btn btn-primary m-3">Lista de Filmes</a>

        <!-- Bootstrap JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
        crossorigin="anonymous">
    </script>
</body>
</html>