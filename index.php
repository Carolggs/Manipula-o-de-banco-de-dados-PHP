<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop</title>
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
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
        
        //cadastrar Cuidador
        require_once "configs/Cuidador.php";
            if (isset($_POST["nomeC"]) and !empty($_POST["nomeC"])) {
                if (isset($_POST["email"]) and !empty($_POST["email"])) {

                        $nome = $_POST["nomeC"];
                        $email = $_POST["email"];
                        
                        if (!Cuidador::existe($email)) {
                            $resultado = Cuidador::cadastrar($nome, $email);

                        }
                    }
                }
            



        //cadastrar Pet
        require_once "configs/Pet.php";
        require_once "configs/Cuidador_Pet.php";
            if (isset($_POST["nomeP"]) and !empty($_POST["nomeP"])) {
                if (isset($_POST["descricao"]) and !empty($_POST["descricao"])) {
                    if (isset($_POST["telefone"]) and !empty($_POST["telefone"])) {
                        
                            $name = $_POST["nomeP"];
                            $descricao = $_POST["descricao"];
                            $telefone = $_POST["telefone"];
                           
                            

                            
                                if (!Pet::existePet($name, $telefone)){
                                    $resultado = Pet::cadastrar($name, $descricao, $telefone);

                                }
                            }
                    }
                    
                }

        ?>



    <!-- interface inicial -->
    <div class="mt-4 p-5 bg-secondary text-white rounded">
        <h1>Bem-vindo ao nosso site!</h1>
        <p>Um sistema de cadastros dos nossos pets e cuidadores</p>
    </div>

    <!-- formulários de cadastro -->
    <h1>Cadastre aqui</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Cuidadores</h3>

                <form method="POST">
                    <div class="form-group">
                        <label>Nome Completo</label>
                        <input type="text" class="form-control" name="nomeC" placeholder="Enter name" required
                            maxlength="100">
                    </div>
                    <div class="form-group">
                        <label>Endereço de E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required
                            maxlength="100">
                    </div>


                    <button type="submit" class="btn btn-info">Cadastrar</button>
                </form>

            </div>




            <div class="col ">
                <h3>Pets</h3>

                <form method="POST">
                    <div class="form-group">
                        <label>Nome do Animal</label>
                        <input type="text" class="form-control" name="nomeP" placeholder="Enter name" required
                            maxlength="100">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input type="textarea" class="form-control" name="descricao" placeholder="Enter description"
                            required maxlength="300">
                    </div>
                    <div class="form-group">
                        <label>Telefone do Tutor</label>
                        <input type="text" class="form-control" name="telefone" placeholder="Enter phone number"
                            required maxlength="11">
                    </div>



                    <button type="submit" class="btn btn-info">Cadastrar</button>
                </form>

            </div>
        </div>
    </div>


</body>

</html>