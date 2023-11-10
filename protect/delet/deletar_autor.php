<?php
// Verifique se o ID do autor foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["autor_id"])) {
    // Conexão com o banco de dados
    include('../db.php');

    // Obtenha o ID do livro a ser excluído
    $autor_id = $_POST["autor_id"];

    // Consulta SQL para excluir o autor
    $sql = "DELETE FROM autor WHERE id = $autor_id";

    if ($conn->query($sql) === TRUE) {
        // autor excluído com sucesso, redirecione de volta à página de exibição de autors
        header("Location:  {$_SERVER['HTTP_REFERER']}");
    } else {
        // Erro ao excluir o autor
        echo "Erro ao excluir o autor: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    // Redirecionar se o ID do autor não foi enviado
    header("Location:  {$_SERVER['HTTP_REFERER']}");
}
?>
