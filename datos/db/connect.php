<?php 
	require 'config.php';

	class DBSTART extends CONFIG{
		public static function abrirDB() {
			try {
				if ( 'Desarrollo'  == self::AMBIENTE ) {
					$db = new PDO(self::SERVER, self::USUARIO, self::PASSW,
								array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::FETCH_OBJ));
				//echo 'Conectado';
				}
			} catch (Exception $e) {
				echo 'Error en la conexi&oacute;n'. $e->getMessage();
			}
			return $db;
		}

		public function cerrarDB() {
			return $db->close();
		}
	}