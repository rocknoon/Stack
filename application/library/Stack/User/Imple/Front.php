<?php 
	class Stack_User_Imple_Front implements Stack_User_Interface_Front {
		
		
		public function getMyInformation() {
			
			$id = 1;
			
			$user = Stack_User_Model_User::GetInstance()->getUserDataById( $id );
			
			return $user;
		}

		
		
		
		
	}
?>