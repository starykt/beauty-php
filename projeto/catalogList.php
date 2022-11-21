<?php
$ok = false;

?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'head.php';
?>




<body class="wave" style=" width: 100%;
        height: 100%;">
    <?php
    include "header.php";
    ?>


    <?php
    if ($_POST) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imagem"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["imagem"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {


                // Aqui voce coloca a conclusao da parte de inserir =D
                // Para caminho use a variavel $target_file
                // Para o tipo use a variavel $imageFileType
            } else {
                echo "Erro ao enviar imagem.";
            }
        }
    }
    ?>
    <div style="width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;">
        <div class="direita-login">
            <div class="telinha">
                <h1>Serviço</h1>
                <form method="POST" style="width:100%;" enctype="multipart/form-data">
                    <div class="texto">
                        <label for="nome">Imagem</label>
                        <input type="file" accept="image/*" name="imagem" id="imagem" placeholder="Imagem" required>
                    </div>
                    <button class="btn-padrao" value="cadastrar" name="cadastrar">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#cpf").mask("000.000.000-00");
        $("#telefone").mask("(00) 00000-0000")
    </script>