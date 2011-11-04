<?php

	class Stack_User_Factory{
		
		
			private static $_front;
			
			/**
			 * @return  Stack_User_Interface_Front
			 */
			public static function Front(){
				if( !self::$_front ){
					self::$_front = new Stack_User_Imple_Front();
				}
				return self::$_front;
			}
	}