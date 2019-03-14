<?php


class Helper {
    
    
    function clean($data)
    {
        $data = trim($data); // Strip whitespace (or other characters) from the beginning and end of a string
        $data = stripslashes($data); // Un-quotes a quoted string
        $data = htmlspecialchars($data); // Convert special characters to HTML entities
        $data = mysql_real_escape_string($data); //Escapes special characters in a string for use in an SQL statement
    }
}
