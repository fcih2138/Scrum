<?php

	class update{

		private $set;
		private $cond;
		private $table_name;

		public function __construct($set ,$cond , $table_name){
			$this->set = $set;
			$this->cond = $cond;
			$this->table_name = $table_name;

		}

		public function updatedata(){

			$connect = mysqli_connect("localhost","root","","mynotes");
			//"UPDATE MyGuests SET lastname='Doe' WHERE id=2"
			//ContactName = 'Alfred Schmidt', City= 'Frankfurt'
			//CustomerID = 1
			$query   = "UPDATE " .$this->table_name. " SET " .$this->set. " WHERE " .$this->cond. " ;";
			$result = mysqli_query($connect,$query);
			if ($result) {
                return TRUE;
			}else{
				return FALSE;
			}
			mysqli_close($connect);
			
		}
                
}