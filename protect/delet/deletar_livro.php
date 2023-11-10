<?php
// Verifique se o ID do livro foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["livro_id"])) {
    // Conexão com o banco de dados
    include('../db.php');

    // Obtenha o ID do livro a ser excluído
    $livro_id = $_POST["livro_id"];

    // Consulta SQL para excluir o livro
    $sql = "DELETE FROM livros WHERE id = $livro_id";

    if ($conn->query($sql) === TRUE) {
        // Livro excluído com sucesso, redirecione de volta à página de exibição de livros
        header("Location:  {$_SERVER['HTTP_REFERER']}");
    } else {
        // Erro ao excluir o livro
        echo "Erro ao excluir o livro: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    // Redirecionar se o ID do livro não foi enviado
    header("Location:  {$_SERVER['HTTP_REFERER']}");
}
?>
