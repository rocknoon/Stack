<?php 
	class Stack_User_Model_User extends WeFlex_Db_Model{
		
		protected $_tableName = 'user';
		
		
		private static $_instance;
		
		/**
		 * @return Stack_User_Model_User
		 */
		public static function GetInstance(){
			if( !self::$_instance ){
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		
		public function getUserDataById( $id ){
			
			$sql = "select * from user where id = ? limit 1";
			
			$id 	= WeFlex_Db::Quote( $id , Zend_Db::INT_TYPE );
			$rtn 	= WeFlex_Db::Query( $sql, $id );
				
			if( empty($rtn) || count( $rtn ) == 0 ){
				return null;
			}
			
			
			return $rtn[0];
		}
		
		
		
	}