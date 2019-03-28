<?php

class user {
                
                private $user_id ;
                private $user_email ;
                private $user_fname ;
                private $user_lname;
                private $user_password ;
                private $user_phhone;
                private $user_address;
                public $isBlocked;
                
                public function Sign_up($user_email,$user_fname,$user_lname,$user_password,$user_phhone,$user_address){
                    include_once 'Add.php';
                    $this->user_email = $user_email;
                    $this->user_fname = $user_fname;
                    $this->user_lname = $user_lname;
                    $this->user_password = $user_password;
                    $this->user_phhone = $user_phhone;
                    $this->user_address = $user_address;
                    $this->isBlocked = "false";
                    $coloum = "user_email,user_fname,user_lname,user_password,user_phhone,user_address,isBlocked";
                    $data = "'" .$user_email . "','" . $user_fname . "','" . $user_lname . "','" . $user_password . "','" . $user_phhone . "','" . $user_address. "' , 'false'" ;
                    $adding = new Add( $coloum , $data , "users");
                    if ($adding->addData()){
                        include_once 'select.php';
                        $sedata = new select("user_id","users","user_email = '".$user_email."' and user_password = '".$user_password."'");
                        $data = $sedata->getRecord();
                        if ($data){ 
                            $this->user_id = $data[0]['user_id'];
                            return $this->user_id;
                        }
                    }else{
                        return 0;
                    }

                }

                
                public function Login ($user_email,$user_password){
                    include_once 'select.php';
                    $sedata = new select("*","users","user_email = '".$user_email."' and user_password = '".$user_password."'");
                    $data = $sedata->getRecord();
                    
                    if ($data){ 
                        $this->user_id = $data[0]['user_id'];
                        $this->user_email = $data[0]['user_email'];
                        $this->user_fname = $data[0]['user_fname'];
                        $this->user_lname = $data[0]['user_lname'] ;
                        $this->user_password = $data[0]['user_password'];
                        $this->user_phhone = $data[0]['user_phhone'];
                        $this->user_address = $data[0]['user_address'];
                        $this->isBlocked = $data[0]['isBlocked'];
                        
                        return $this->user_id;
                    }else{
                    return 0;
                    }
                }


                public function deleteuser ($user_id){

                    include_once 'delete.php';
                    $cond = "user_id = '".$user_id."'";
                    $del = new delete($cond,"users");
                    if($del->deleteuser()){
                        return true;
                    }else{
                        return false;
                    }

                }



                public function userinfo ($user_id){

                    include_once 'select.php';
                    $sedata = new select("*","users","user_id = '".$user_id."'");
                    $data = $sedata->getRecord();
                    return $data;

                }

                public function useredit ( $user_id ,$user_fname,$user_lname,$user_password,$user_phhone,$user_address){
                    //ContactName = 'Alfred Schmidt', City= 'Frankfurt'
                    include_once 'update.php';
                    $set = " user_fname = '" .$user_fname. "' , user_lname = '" .$user_lname. "' , user_password = '" .$user_password. "' , user_phhone = '" .$user_phhone. "' , user_address = '" .$user_address. "' , isBlocked = 'false' " ;
                    $cond = "user_id = '".$user_id."'";
                    $update = new update($set,$cond, "users");
                    if($update->updatedata()){
                        return true;
                    }else{
                        return false;
                    }
                    
                }

                public function blockuser ( $user_id ){
                    //ContactName = 'Alfred Schmidt', City= 'Frankfurt'
                    include_once 'update.php';
                    $set = "isBlocked = 'true'" ;
                    $cond = "user_id = '".$user_id."'";
                    $update = new update($set,$cond, "users");
                    if($update->updatedata()){
                        return true;
                    }else{
                        return false;
                    }
                    
                }

                public function unblockuser ( $user_id ){
                    //ContactName = 'Alfred Schmidt', City= 'Frankfurt'
                    include_once 'update.php';
                    $set = "isBlocked = 'false'" ;
                    $cond = "user_id = '".$user_id."'";
                    $update = new update($set,$cond, "users");
                    if($update->updatedata()){
                        return true;
                    }else{
                        return false;
                    }
                    
                }

                public function listusers() {
                    include_once 'select.php';
                    $sedata = new select("*","users","");
                    return $data = $sedata->getuserRecord();
                }
                
                
                
}
