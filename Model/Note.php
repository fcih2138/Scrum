<?php

class Note {

    private $user_id;
    private $note_id;
    private $note_title;
    private $note_imageurl;

    public function addNote($user_id,$note_title, $note_imageurl,$message_length) {
     
        include_once 'Add.php';
        $this->user_id = $user_id;
        $this->note_title = $note_title;
        $this->note_imageurl = $note_imageurl;
        $coloum = "user_id,note_title,note_imageurl,message_length";
        $data = "'" .$user_id . "','" . $note_title . "','" . $note_imageurl . "','" .$message_length."'" ;
        $adding = new Add( $coloum , $data , "note");
        if ($adding->addData()){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function listNotes($user_id) {
        include_once 'select.php';
        $sedata = new select("*","note","user_id = '".$user_id."'");
        return $data = $sedata->getnoteRecord();
    }
    
    
}
