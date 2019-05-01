<?php

//echo $_POST['Obj']['file']['name'];
if(isset($_FILES['file']['name']))
{
    echo $_FILES['file']['name'].'<br>'.$_FILES['file']['tmp_name'];
}


//if(isset($_POST['Obj']))
//{
//    echo json_decode($_POST['Obj']);
//}
//echo $_POST['id'];
if(isset($_POST['id']))
{
    
    //echo $_GET['fd'];
    echo $_POST['id'];
}

