<?php
			$servername = "localhost";
			$database	= "bd133";
			$username	= "root";
			$password	= "";

			$nombre = $_POST["nombre"];

			$banderaconexion = true;
			$conexion = mysqli_connect($servername,$username,$password,$database);

		if(isset($_POST["submit"])){
			echo "</BR> Se presiono un boton submite con metodo POST</BR>";
			$archivoOrigen = $_FILES["fileToUpload"]["tmp_name"];
			$archivoDestino = "img/".$_FILES["fileToUpload"]["name"];
			echo "El archivo a subir es: ".$archivoDestino."</BR>";








			$imageFileType = pathinfo($archivoDestino,PATHINFO_EXTENSION);

			$check = getimagesize($archivoOrigen);

			ECHO "Extension del archivo ".$imageFileType."</br>";

			if($check!==false){
				echo "El archivo es una imagen </BR>";
				move_uploaded_file($archivoOrigen, $archivoDestino);
				
				$query = "INSERT INTO usuario(id, nombreUsuario, foto) VALUES (NULL,'".$nombre."','".$archivoOrigen."')";
				ECHO "Query a ejecutar:".$query."</BR>";
			 	if($query_a_ejecutar = mysqli_query($conexion, $query)){
			 		ECHO "Query ejecutado correctamente</br>";
			 		header("Refresh:1; url =http://localhost:81/S133-6/Practica%207/Formulario.html");
			 	}
			 	else{
			 		ECHO "Query no ejecutado</br>";
			 	}
			}
			else{
				ECHO "El archivo NO es una imagen</br>";
			}
		}




?>