<?php
	class Stack
	{
		
		
		private static $_instance;
		
		
		/**
		 * @return Stack
		 */
		public static function GetInstance(){
			if( !self::$_instance ){
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		

		public $config;
		
		public function init(){
			$this->_configSystemIni();
		}
		
		
		private function _configSystemIni(){
			$this->config = WeFlex_Application::GetInstance()->configAll->stack;
		}
		
		
		
	}
?>