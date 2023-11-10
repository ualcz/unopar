<?php
// Verifique se um arquivo PDF foi enviado
if (isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] === UPLOAD_ERR_OK &&
    isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK) {

    // Caminho para onde os arquivos PDF e imagem serão armazenados (altere para o seu diretório)
    $uploadDir = './pdf/';
    
    // Caminho para onde as imagens serão armazenadas (altere para o seu diretório)
    $imageUploadDir = './images/';

    // Receba o título do livro
    $titulo = $_POST['titulo'];

    // Limpe o título para criar um nome de arquivo seguro
    $cleanedTitulo = preg_replace('/[^a-zA-Z0-9]/', '_', $titulo);

    // Gere um nome de arquivo único para evitar conflitos para o PDF
    $pdfFileName = $cleanedTitulo . '_' . uniqid() . '_' . basename($_FILES['pdfFile']['name']);

    // Gere um nome de arquivo único para evitar conflitos para a imagem
    $imageFileName = $cleanedTitulo . '_' . uniqid() . '_' . basename($_FILES['imageFile']['name']);

    // Caminho completo do arquivo PDF no servidor
    $pdfFilePath = $uploadDir . $pdfFileName;

    // Caminho completo da imagem no servidor
    $imageFilePath = $imageUploadDir . $imageFileName;

    // Mova o arquivo PDF para o diretório de destino
    if (move_uploaded_file($_FILES['pdfFile']['tmp_name'],'../.'.$pdfFilePath) &&
        move_uploaded_file($_FILES['imageFile']['tmp_name'],'../.'. $imageFilePath)) {
        
        // Conecte-se ao banco de dados
        include('../db.php');

        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Receba o ID do autor do campo oculto
        $genero = $_POST['genero'];
        $autor_id = $_POST['autor_id'];
        $sinopse = $_POST['sinopse'];
        $inbs = $_POST['inbs'];

        // Inserir o caminho do arquivo PDF e imagem na tabela de livros usando instruções preparadas
        $sql = "INSERT INTO livros (titulo, inbs, genero, autor, link, image, sinopse) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiiss", $titulo, $inbs, $genero, $autor_id, $pdfFilePath, $imageFilePath, $sinopse);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location:  {$_SERVER['HTTP_REFERER']}");
        } else {
            echo "Erro ao cadastrar o livro.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Erro ao mover o arquivo para o servidor.";
    }
} else {
    echo "Erro no envio do arquivo PDF ou imagem.";
}
?>
