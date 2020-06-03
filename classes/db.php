<?php

	class db {

		private static $instance = NULL;
		public static function getInstance() {
			if (!isset(self::$instance)) {
				self::$instance = new PDO('mysql:host=localhost;dbname=', 'root', '');
			}
			return self::$instance;
		}
	}
?>