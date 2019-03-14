<?php

class admin {
                
                private $admin_id ;
                private $admin_email ;
                private $admin_password ;
                public $privs;
                
                public function Login ($admin_email,$admin_password){
                    include_once 'select.php';
                    $sedata = new select("*","admin","admin_email = '".$admin_email."' and admin_password = '".$admin_password."'");
                    $data = $sedata->getRecord();
                    
                    if ($data){ 
                        $this->admin_id = $data[0]['admin_id'];
                        $this->admin_email = $data[0]['admin_email'];
                        $this->admin_password = $data[0]['admin_password'];
                        $this->privs = $data[0]['privs'];
                        return $this->admin_id;
                    }else{
                    return 0;
                    }
                }

                public function deleteadmin ($admin_id){

                    include_once 'delete.php';
                    $cond = "admin_id = '".$admin_id."'";
                    $del = new delete($cond,"admin");
                    if($del->deleteadmin()){
                        return true;
                    }else{
                        return false;
                    }

                }


                public function admininfo ($admin_id){

                    include_once 'select.php';
                    $sedata = new select("*","admin","admin_id = '".$admin_id."'");
                    $data = $sedata->getRecord();
                    return $data;

                }

                public function adminedit ( $admin_id , $admin_email , $admin_password ){
                    include_once 'update.php';
                    $set = " admin_email = '" .$admin_email. "' , admin_password = '" .$admin_password. "' " ;
                    $cond = "admin_id = '".$admin_id."'";
                    $update = new update($set,$cond, "admin");
                    if($update->updatedata()){
                        return true;
                    }else{
                        return false;
                    }
                    
                }

                public function addadmin($admin_email,$admin_password,$privs){
                    include_once 'Add.php';
                    $this->admin_email = $admin_email;
                    $this->admin_password = $admin_password;
                    $this->privs = $privs;
                    $coloum = "admin_email,admin_password,privs";
                    $data = "'" .$admin_email . "','" . $admin_password . "' ," . $privs . " " ;
                    $adding = new Add( $coloum , $data , "admin");
                    if ($adding->addData()){
                        return true;
                    }else{
                        return false;
                    }

                }

                
                public function listadmins() {
                    include_once 'select.php';
                    $sedata = new select("*","admin","");
                    return $data = $sedata->getadminRecord();
                }

                public function privall ( $admin_id ){
                    //ContactName = 'Alfred Schmidt', City= 'Frankfurt'
                    include_once 'update.php';
                    $set = "privs = 2" ;
                    $cond = "admin_id = '".$admin_id."'";
                    $update = new update($set,$cond, "admin");
                    if($update->updatedata()){
                        return true;
                    }else{
                        return false;
                    }
                    
                }

                public function privuser ( $admin_id ){
                    //ContactName = 'Alfred Schmidt', City= 'Frankfurt'
                    include_once 'update.php';
                    $set = "privs = 1" ;
                    $cond = "admin_id = '".$admin_id."'";
                    $update = new update($set,$cond, "admin");
                    if($update->updatedata()){
                        return true;
                    }else{
                        return false;
                    }
                    
                }
                
                
                
}
