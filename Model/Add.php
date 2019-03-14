<?php

	class Add{

		private $coloums;
		private $data;
		private $table_name;

		public function __construct($coloums ,$data , $table_name){
			$this->coloums = $coloums;
			$this->data = $data;
			$this->table_name = $table_name;

		}

		public function addData(){

			$connect = mysqli_connect("localhost","root","","mynotes");
			$query   = "INSERT INTO " .$this->table_name. "(" .$this->coloums. ") VALUES (" .$this->data. ");";
			$result = mysqli_query($connect,$query);
			if ($result) {
                return TRUE;
			}else{
				return FALSE;
			}
			mysqli_close($connect);
			
		}
                
}