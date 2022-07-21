<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{background-color: #264673; box-sizing: border-box; font-family:Arial;}

        form{
            background-color: white;
            padding: 10px;
            margin: 100px auto;
            width: 400px;
        }

        input[type=text], input[type=password]{
            padding: 10px;
            width: 380px;
        }
        input[type="sumbit"]{
            border: 0;
            background-color: #ED8824;
            padding: 10px 20px;
        }

        .error{
            background-color: #FF9185;
            font-size:12px;
            padding: 10px;
        }

        .correcto{
            background-color: #A0DEA7;
            font-size:12px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action="index.php" method="post">
        <?php
            if(isset($_POST['enviar'])){
                $nombre = $_POST['nombre'];
                $password = $_POST['password'];
                $email = $_POST['email'];

                $campos = array();

                if($nombre == ""){
                    array_push($campos, "El campo nombre no puede estar vacio");
                }

                if($password == ""|| strlen($password)<5){
                    array_push($campos, "El campo password no puede estat vacio, ni tener menos de 6 caracteres");
                }

                if($email == ""|| strpos($email, "@" === false)){
                    array_push($campos, "Ingresa un correo electronico valido");
                }

                if(count($campos)>0){
                    echo "<div class='error'>";
                    for($i=0; $i<count($campos); $i++){
                        echo"<li>",$campos[$i]."</i>";
                    }
                }
                    else{
                        echo "<div class='correcto'>
                                Datos correctos";
                    }
                    echo "</div>";
            }
        ?>
            <label for="">NOMBRE</label>
            <input type="text" name="nombre">

            <label for="">PASSWORD</label>
            <input type="password" name="password">

            <label for="">CORREO ELECTRONICO</label>
            <input type="text" name="email">

            <button type="sumbit" name="enviar">Enviar</button>
    </form>
</body>
</html>