<?php

require 'connect.php';

$id = $_GET['id'];

/*
echo '<pre>';
print_r($_GET);
echo '</pre>';
exit;
*/

/**
 * Validando o método post ($_POST) e fazendo o UPDATE dos dados no BD
 */
if (isset($_POST['submit'])) {
    $filme = $_POST['filme'];
    $plataforma = $_POST['plataforma'];
    $nota = $_POST['nota'];
    $status = $_POST['status'];

    $sql = "UPDATE `list` 
            SET `id`='$id',`filme`='$filme',`plataforma`='$plataforma',`nota`='$nota',`status`='$status' 
            WHERE id=$id";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: index.php?msg=Atualizado com Sucesso!");
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
            <h1>Editar Dados</h1>
        </div>

        <!-- Usando o método get ($_GET) para retornar o ID do dado em que será feito o UPDATE -->
        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM  `list` WHERE id = $id LIMIT 1";
            $query = mysqli_query($conn, $sql);
            $list = mysqli_fetch_assoc($query);
        ?>

    </div>
        <form action="" method="post" class="p-3">

            <div class="input-group mb-3 mt-3">
                <span class="input-group-text">Filme</span>
                    <input required  type="text" class="form-control" name="filme" value="<?php echo $list['filme']?>">
            </div>

            <div class="input-group mb-3 mt-3">
                <span class="input-group-text">Plataforma</span>
                    <input required  type="text" class="form-control" name="plataforma" value="
                    <?php echo $list['plataforma']?>">
            </div>

            <div class="input-group mb-3 mt-3">
                <span class="input-group-text">Nota</span>
                    <input required  type="number" class="form-control" name="nota" value="<?php echo $list['nota']?>">
            </div>

            <div class="form-group">
                <label class="mb-3">Já Assistiu?</label>

                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="status" id="sim" value="Sim" <?php echo ($list['status'] == 'Sim')
                            ? "checked" : ""; ?>> Sim
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="status" id="nao" value="Não" <?php echo ($list['status'] == 'Não')
                            ? "checked" : "";?>> Não
                        </label>
                    </div>
            </div>


        </div>

            <button type="submit" class="btn btn-success" name="submit">Salvar Edição</button>

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