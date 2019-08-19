<?php
	class Ventas{

		public function obtenerDatosProducto($idproducto){
			require_once ("../../datos/db/admysql.php");
			$sql = "SELECT ASIENTO
							
					FROM DPNUMERO

					WHERE TIPO_ASI like '{$idproducto}'";

			$result = $con->query($sql);
			$ver = mysqli_fetch_row($result);
            
            $sum = 0;
            $sum = ($ver[0] + 1 );
            $convert = str_pad($sum,8, "0", STR_PAD_LEFT);
			$data = array(
							'ASIENTO' => $convert
			);

			return $data;
		}
	}