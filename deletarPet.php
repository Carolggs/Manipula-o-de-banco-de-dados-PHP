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
                <li class="nav-item active">
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
        require_once "configs/Cuidador_Pet.php";

        //deleta um pet
        if(isset($_GET["idPet"]) and !empty($_GET["idPet"])){
            $idPet= $_GET["idPet"];
            $resultado=Pet::nomePet($idPet);
            if(count($resultado)>0){
                CuidadorPet::deletar_id_pet($idPet);
                Pet::excluir_pet($idPet);
                echo "<p>Pet Excluído</p>";
                echo "<p><a href='ListaPets.php'>Voltar</a></p>";
            }else{
                echo "Pet não existe";
            }


        }

            
            
        ?>


    
</body>

</html>