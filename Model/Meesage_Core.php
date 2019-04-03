<?php
class Mesage_Core {
    protected  $db, $result;
    private $rows;
    
    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', 'mynotes');        
        
}
public function  query($sql)
{
    $this->result = $this->db->query($sql);
}
public function rows()
{    
    for($x = 1; $x<= $this->db->affected_rows;$x++)
    {
        $this->rows[] = $this->result->fetch_assoc();
    }
    
    return $this->rows;
}
}
