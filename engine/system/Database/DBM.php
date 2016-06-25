<?php
	/**
	 * DBManager provides supporting of all databases by one project
	 */
	
	namespace Database;
	use \Fructum\Config as Config;
	
	class DBM
	{
		
		public static $instance;
		
		/**
		 * Get instance of driver
		 */
		public static function i() 
		{
			if(!is_object(self::$instance)) {
				$classname = "\\Database\\DBM\\" . Config::db_type;
				self::$instance = new $classname;
				if(!(self::$instance instanceof \Database\DBM\_Interface))
				{
					throw new \Fructum\Exception("{$classname} is instance of DBM interface");
				}
			}

			return self::$instance;
		}
		
	}