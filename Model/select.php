<?php

	class select{

		private $table_name;
		private $cond;
		private $selected_columns;

		public function __construct($selected_columns ,  $table_name , $cond){
			$this->table_name = $table_name;
			$this->cond  = $cond;
			$this->selected_columns = $selected_columns;
		}
		
		public function getRecord(){

			$connect = mysqli_connect("localhost","root","","mynotes");
			$query = "select " .$this->selected_columns. " from " .$this->table_name. " where " .$this->cond. " ";                                                                           
			$result = mysqli_query($connect,$query);
			if(!$result){
				die('cannot run query');
			}
			$data=array();
			while ( $row = mysqli_fetch_assoc($result) ){
				$data[] = $row;
				break;
			}
			
			if($data){
				return $data;
			}else{
			}
			mysqli_close($connect);
		}

		public function getnoteRecord(){

			$connect = mysqli_connect("localhost","root","","mynotes");
			$query = "select " .$this->selected_columns. " from " .$this->table_name. " where " .$this->cond. " ";                                                                           
			$result = mysqli_query($connect,$query);
			if(!$result){
				die('cannot run query');
			}else{
				return $result;
			}
			while ( $row = mysqli_fetch_assoc($result) ){
				$data[] = $row;
				break;
			}
			mysqli_close($connect);
		}

		public function getuserRecord(){

			$connect = mysqli_connect("localhost","root","","mynotes");
			$query = "select * from users";                                                                           
			$result = mysqli_query($connect,$query);
			if(!$result){
				die('cannot run query');
			}else{
				return $result;
			}
			while ( $row = mysqli_fetch_assoc($result) ){
				$data[] = $row;
				break;
			}
			mysqli_close($connect);
		}

		public function getadminRecord(){

			$connect = mysqli_connect("localhost","root","","mynotes");
			$query = "select * from admin";                                                                           
			$result = mysqli_query($connect,$query);
			if(!$result){
				die('cannot run query');
			}else{
				return $result;
			}
			while ( $row = mysqli_fetch_assoc($result) ){
				$data[] = $row;
				break;
			}
			mysqli_close($connect);
		}

}