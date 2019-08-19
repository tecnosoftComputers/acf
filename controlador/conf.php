<?php 

	const SERVERURL = "http://localhost/bitacora/cid/inicializador/vistas/web/clientes.php";
	const COMPANY = "CID";
	const URL_CSS = "inicializador/vendor/bootstrap/css/";
    //const URL_JS = "inicializador/vendor/bootstrap/css/boostrap.min.css";
    const URL_JQUERY = "http://localhost/bitacora/cid/inicializador/jquery/";
    const URL_SRC = "http://localhost/bitacora/cid/inicializador/src/";
    
    @date_default_timezone_get("America/Ecuador");

    class SEG {

        public static function clean($string){
            $string=trim($string);
            $string=stripcslashes($string);
            $string=str_ireplace("<script>", "", $string);
            $string=str_ireplace("</script>", "", $string);
            $string=str_ireplace("<script src", "", $string);
            $string=str_ireplace("<script type=", "", $string);
            $string=str_ireplace("SELECT * FROM", "", $string);
            $string=str_ireplace("DELETE FROM", "", $string);
            $string=str_ireplace("INSERT INTO", "", $string);
            $string=str_ireplace("--", "", $string);
            $string=str_ireplace("^", "", $string);
            $string=str_ireplace("[", "", $string);
            $string=str_ireplace("]", "", $string);
            $string=str_ireplace("==", "", $string);
            $string=str_ireplace(";", "", $string);
            return $string;
        }
    }