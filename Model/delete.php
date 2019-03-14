<?php

	class delete{

		private $cond;
		private $table_name;

		public function __construct($cond , $table_name){
			$this->cond = $cond;
			$this->table_name = $table_name;

		}

		public function deleteuser(){

			$connect = mysqli_connect("localhost","root","","mynotes");
			$query1   = "DELETE FROM note WHERE " .$this->cond. " ";
			$query2   = "DELETE FROM " .$this->table_name. " WHERE " .$this->cond. " ";
			mysqli_query($connect,$query1);
			$result = mysqli_query($connect,$query2);
			if ($result) {
                return TRUE;
			}else{
				die('cannot run query');
				return FALSE;
			}
			mysqli_close($connect);
			
		}

		public function deleteadmin(){

			$connect = mysqli_connect("localhost","root","","mynotes");
			$query2   = "DELETE FROM " .$this->table_name. " WHERE " .$this->cond. " ";
			$result = mysqli_query($connect,$query2);
			if ($result) {
                return TRUE;
			}else{
				die('cannot run query');
				return FALSE;
			}
			mysqli_close($connect);
			
		}
                
}