<?php
include('./menu.php');
include('./protect/db.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/lista_livro.css">
    <title>lib</title>
    <style>
    </style>
</head>

<body>

<main>
    <div class="flex-container">
        <?php
            // Obter o termo de pesquisa do formulário
            $search = $_GET['search'];

            // Consulta SQL para buscar livros com base no título, autor ou gênero
            $sql = "SELECT livros.id, livros.titulo, autor.nome, autor.sexo, livros.genero, livros.image, livros.link
                    FROM livros
                    INNER JOIN autor ON livros.autor = autor.id
                    WHERE livros.titulo LIKE '%$search%' OR autor.nome LIKE '%$search%' OR livros.genero LIKE '%$search'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Exibir os resultados
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="item">';
                    echo '<h4>' . $row['titulo'] . '</h4>';
                    echo '<img src="' . $row['image'] . '" />';
                    echo '<h4>';
                    if ($row['sexo'] == 'F') {
                        echo "Autora: {$row['nome']}";
                    } else {
                        echo "Autor: {$row['nome']}";
                    }
                    echo "</h4>";
                    echo '<div class="button-container">';
                    echo "<a href='./detalhes_livro.php?id=". $row['id'] . "' class='button read-more-button'><ion-icon name='menu'></ion-icon>Ver mais</a>";
                    echo '</div>';
                    echo '</div>';
                    

                }
            }
        ?>
    </div>
    <br><br><br><br><br><br><br>
</main>

</body>

</html>
<?php
include('./footer.php');
?>
