<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="PetShop.css">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand">Pet Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ListaCuidadores.php">Cuidadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ListaPets.php">Pets</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="ListaCuidador_Pet.php">Cuidador_Pet</a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="ListarPetDono.php">Pets de um dono</a>
            </li>
            </ul>
        </div>
    </nav>
    <?php
        require_once "configs/Pet.php";
       
   



        if (isset($_POST["id"]) and !empty($_POST["id"])) {
            if (isset($_POST["nome"]) and !empty($_POST["nome"])) {
                            if (isset($_POST["desc"]) and !empty($_POST["desc"])) {
                                  if (isset($_POST["tel"]) and !empty($_POST["tel"])) {
                                    
                                    $id = $_POST["id"];
                                    $nome = $_POST["nome"];
                                    $descricao = $_POST["desc"];
                                    $tel_tutor = $_POST["tel"];
                                    //$data = new DateTime();
                                
                                    echo "<br>";
                                    if (Pet::existeId($id)) {
                                            $resultado = Pet::editar_pet($nome, $descricao, $tel_tutor, $id);
                                            echo  "<p>Foi editado</p>";
                                        }else{
                                            echo "<p>Edição inválida</p>";
                                    }
                                }
                            }   
                        }
                    }
            


        $petEditar = null;
        if (isset($_GET["id"]) and !empty($_GET["id"])) {$id = $_GET["id"];
            if (Pet::existeId($_GET["id"])) {
                $petEditar = Pet::getPetId($_GET["id"]);
            } else {
                echo "<p>Esse pet não existe!</p>";
                die;
            }
        } else {
            echo "<p>Você não pode editar um pet sem dizer quem é</p>";
            die;
        }

        ?>

<div class="mt-4 p-1 bg-secondary text-white rounded">
    <h1>Editar <?= $petEditar["nome"] ?>
   </h1>

</div>    

<form method="POST">
<div class="container">
        <div class="row">  
            <div class="col">
                    <div class="form-group">
                        <label>Nome do Animal</label>
                        <input type="text" class="form-control" name="nome" value="<?= $petEditar["nome"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Descrição do Animal</label>
                        <input type="textarea" class="form-control" name="desc" value="<?= $petEditar["descricao"] ?>" required >
                    </div>
                    <div class="form-group">
                        <label>Telefone do Tutor</label>
                        <input type="text" class="form-control" name="tel" value="<?= $petEditar["tel_tutor"] ?>" maxlength="11" required>
                    </div>
                    <input type="hidden" name="id" value="<?= $petEditar["id"] ?>" required>
                    <button type="submit" class="btn btn-info">Editar</button>
                </form>
                <br>
                <br>
                <a href="ListaPets.php">Voltar</a>

            </div>
</div>
</div>
<br>

</body>
</html>