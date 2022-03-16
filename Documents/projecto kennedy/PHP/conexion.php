<?php
	class conexion{

		public static $db;
    	private static $user = 'root';
    	private static $password = '';
		public static function openConnection()
	    {
	        self::$db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=sitio_kennedy', self::$user, self::$password);
	        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        return self::$db;

	    }
	    public static function closeConnection()
	    {
	        self::$db = null;
	    }
	}
?>