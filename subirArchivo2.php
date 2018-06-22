<?php
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bd133";

    $conexion = mysqli_connect($servername, $username, $password, $database);

    
    if (ISSET($_POST["submit"])) {
      echo "</BR> Se presionó un botón submit con método POST </BR>";
      
      $archivoOrigen = $_FILES["fileToUpload"]["tmp_name"];
      $archivoDestino = "xd/". $_FILES["fileToUpload"]["name"];
      echo "el archivo a enviar es :".$archivoDestino."</BR>";
    }
    
    $imageFileType=pathinfo($archivoDestino, PATHINFO_EXTENSION);

    


    echo "Extensiòn del archivo: ".$imageFileType."</BR>";

    if ($imageFileType=="xlsx") {

      echo "El archivo es un excel </BR>";
    
      move_uploaded_file ($archivoOrigen, $archivoDestino);
      
      $query = "INSERT INTO usuario(id, nombreUsuario, foto) VALUES (NULL,'".$nombre."','".$archivoOrigen."')";
      echo "Esto guarda archivoOrigen: ".$archivoOrigen."</BR>";
      echo "Query a ejecutar: ".$query."</BR>"; 
      if ($query_a_ejecutar=mysqli_query($conexion, $query)) {
        echo "Query ejecutado correctamente</br>";
        header("Refresh:1; url=http://localhost:81/S133-6/Practica%207/Formulario.html");
      }else {
        echo "Query no ejecutado :(</br>";
      }
    }else {
      echo "El archivo NO es una imagen</BR>";
    }
?>
