<?php

require 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
          crossorigin="anonymous">
</head>
<body class="bg-light text-dark">
    <div class="container">
        <div class="mt-4 mb-4 p-5 bg-dark rounded text-light text-center">
            <h1>Lista de Filmes</h1>
        </div>
    <!-- Validando a msg (passada no header da $query) e imprimindo a mensagem de acordo (insert, delete, update) -->
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-dark alert-dismissible fade show" role="alert">
                ' . $msg . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
        ?>
    </div>

    <div>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Filme</th>
                    <th>Plataforma</th>
                    <th>Nota</th>
                    <th>Já Assistiu?</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <!-- Realizando o SELECT e imprimindo os dados do BD na tabela -->
                <?php
                    $sql = "SELECT * FROM `list`";
                    $query = mysqli_query($conn, $sql);
                while ($list = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?php echo $list['filme']?></td>
                        <td><?php echo $list['plataforma']?></td>
                        <td><?php echo $list['nota']?></td>
                        <td><?php echo $list['status']?></td>
                        <td>
                            <a href="update.php?id=<?php echo $list['id']?>" class="btn btn-primary">Editar</a>
                            <a href="delete.php?id=<?php echo $list['id']?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <a href="insert.php" class="btn btn-primary m-3">Adicionar novo Filme</a>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
        crossorigin="anonymous">
    </script>
</body>
</html>