<?php
class Db {
    
    public static function getConnection()
    {
        $host = 'localhost';
        $dbname = 'cv73917_formtask';
        $user = 'cv73917_formtask';
        $password = '123qweasd';
        
        $db = new PDO("mysql:host=$host; dbname=$dbname;  charset=UTF8", $user, $password);
        
        return $db;
    }
}
?>