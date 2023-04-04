<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuidadores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
            <li class="nav-item active">
                <a class="nav-link" href="ListarPetDono.php">Pets de um dono</a>
            </li>
            </ul>
        </div>
    </nav>

    <div class="row">
    <div class="col">
        
    </div>
    <div class="col-6">
    <br>
    <table class="table bg-light">
        <thead>
            <tr>
            <th scope="col">Telefone</th>
            <th scope="col">Nome Pet</th>
            
            </tr>
        </thead>
        <tbody>
      
    <?php


require_once "configs/Pet.php";


if(isset($_POST["TelefoneDono"]) and !empty($_POST["TelefoneDono"])){
    $telefone = $_POST["TelefoneDono"];
    $listaPetDono=Pet::listarPetDono($telefone);
   
    foreach ($listaPetDono as $pet) {
        echo "<tr>";
        echo "<td>" . $pet["tel_tutor"] . "</td>";
        echo "<td>" . $pet["nome"] . "</td>";
        echo "</tr>";
    }

}

?>

    <div class="form-group">
    <form method="POST">

            <select name="TelefoneDono"                                                                                                                                                                                                                                                                    ">
            <option value=""></option>
            
            <?php
            $listaPets= Pet::listarTelefone();
            foreach ($listaPets as $pet) {
                $telefone = $pet["tel_tutor"];
                echo "<option value='$telefone'>$telefone</option>";
            }

            ?>
            
            </select>
            <button type="submit" class="btn btn-info">Mostrar</button>
        </form>
</div>

            
        </tbody>
    </table>
            
    </div>
    <div class="col">
     
    </div>
  </div>

</body>
</html>