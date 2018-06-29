<?php
			$servername = "localhost";
			$database	= "examen_2";
			$username	= "root";
			$password	= "";

			$nombre_viajero = $_POST["nombre_viajero"];
			$fecha_viaje = $_POST["fecha_viaje"];

			$conexion = mysqli_connect($servername,$username,$password,$database);
			$banderaconexion = true;

			if($conexion){
       			echo "Conexion exitosa :v </br>";
    		 }else{
      			  echo "Conexión Denegada >:v </br>";
     			  $banderaconexion = false;
      		}

      		if ($banderaconexion == true){

      			echo "Ejecutando consulta";
      			$query = " "."SELECT*FROM viajeros";
      			echo $query."<br>";
      			$resultados = mysqli_query($conexion,$query);
      			$banderaconsulta = true;

      				if($banderaconsulta==true){
      					echo "Consulta concretada con éxito";
      				}else{
      					echo "Consulta realizada con errores";
      				}

				if ($banderaconsulta == true){
					$numfilas = mysqli_num_rows($resultados);	
					echo "Imprimiendo ".$numfilas." resultados";

				}else{
					echo "No se imprimirán resultados";

				}

      		}else{
      			echo "Error 404 - Not Found";
      		}

		
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
				
				$query = "INSERT INTO viajeros(id_viajero, nombre_viajero, fecha_viaje, foto_boleto) VALUES (NULL,'".$nombre_viajero."','".$fecha_viaje."','".$archivoOrigen."')";
				ECHO "Query a ejecutar:".$query."</BR>";
			 	if($query_a_ejecutar = mysqli_query($conexion, $query)){
			 		ECHO "Query ejecutado correctamente</br>";
			 		header("Refresh:40; url =http://localhost:81/S133-6/Practica%207/Formulario.html");
			 	}
			 	else{
			 		ECHO "Query no ejecutado</br>";
			 	}
			}
			else{
				ECHO "El archivo NO es una imagen</br>";
			}
		}
		echo "<table border = 5>";
      		
      		echo "<th>id_beca</th>";
      		echo "<th>nombre</th>";
	        echo "<th>id_pais</th>";
	        echo "<th>id_tipocurso</th>";
	        for ($i=0; $i <= $row = mysqli_fetch_array($resultados,MYSQLI_ASSOC);$i++) {
	    			$id_viajero $row['id_viajero'];
	    			$nombre_viajero= $row['nombre_viajero'] ;
	    			$fecha_viaje = $row['fecha_viaje'];
	    			$foto_boleto = $row['foto'];
	    			echo "<tr>";
	    				echo "<td>".$id_viajero."</td>";
	    				echo "<td>".$nombre_viajero."</td>";
	    				echo "<td>".$fecha_viaje."</td>";
	    				echo "<td>".$foto_boleto."</td>";

	    			echo "</tr>";



?>