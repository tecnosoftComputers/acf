<?php
	class Ventas{

		public function obtenerDatosProducto($idproducto){
			require_once ("../../datos/db/admysql.php");
			$sql = "SELECT TIPO_ASI,CONCEPTO
							
					FROM dpmovimi

					WHERE ASIENTO like '{$idproducto}'";

			$result = $con->query($sql);
			$ver = mysqli_fetch_row($result);

			$data = array(
							'TIPO_ASI' => $ver[0],
                            'CONCEPTO' => $ver[1]
			);

			return $data;
		}
	}