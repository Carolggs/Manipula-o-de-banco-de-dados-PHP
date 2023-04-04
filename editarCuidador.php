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
        require_once "configs/Cuidador.php";
        
        //editar cuidadores
if (isset($_POST["id"]) and !empty($_POST["id"])) {
    if (isset($_POST["nome"]) and !empty($_POST["nome"])) {
                    if (isset($_POST["email"]) and !empty($_POST["email"])) {
                       
                       
                        $id = $_POST["id"];
//                      echo ($id);
                        $nome = $_POST["nome"];
                        $email = $_POST["email"];
                        //$data = new DateTime();
                       
                        echo "<br>";
                        if (Cuidador::existeId($id)) {
                            if (!Cuidador::existeEmail($email, $id)){
                                
                                    $resultado = Cuidador::editar_cuidador($nome, $email,  $id);
                                    echo "<p>Foi editado!</p>";
                                
                               
                            }else{
                                echo "<p>Email inválido</p>";
                        
                            }
                        }
                                
                    }
                    
                }
            }
            
        $cuidadorEditar = null;
        if (isset($_GET["id"]) and !empty($_GET["id"])) {$id = $_GET["id"];
            if (Cuidador::existeId($id)) {
                $cuidadorEditar = Cuidador::getCuidadorId($id);
            } else {
                echo "<p>Esse cuidador não existe!</p>";
                die;
            }
        } else {
            echo "<p>Você não pode editar um cuidador sem dizer quem é</p>";
            die;
        }

        ?>

        
<div class="mt-4 p-1 bg-secondary text-white rounded">   
<h1>Editar <?= $cuidadorEditar["nome"] ?></h1>
</div>

<form method="POST">
<div class="container">
        <div class="row">
            <div class="col">
                    <div class="form-group">
                        <label>Nome do Cuidador</label>
                        <input type="text" class="form-control" name="nome" value="<?= $cuidadorEditar["nome"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email do Cuidador</label>
                        <input type="text" class="form-control" name="email" value="<?= $cuidadorEditar["email"] ?>" required>
                    </div>
                    <input type="hidden" name="id" value="<?= $cuidadorEditar["id"] ?>">
                    <button type="submit" class="btn btn-info">Editar</button>
                </form>
                <br>
                <br>
                <a href="ListaCuidadores.php">Voltar</a>

            </div>
</div>
</div>
<br>








</body>
</html>