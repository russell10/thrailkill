<?php
    require_once(__DIR__ . "/../model/database.php");

    $connection = new mysqli($host, $username, $password);
    
    if($connection->connect_error) {
        die("<p>Error: " . $connection->connect_error . "</p>");
    }
    
    $exists = $connection->select_db($database);
    
    if(!$exists) {
       $qurey = $connection->query("CREATE DATABASE $database");
       
       if($qurey) {
           echo "<p>Successfully created database" . $database; "</p>";
       }
    }
    else {
        echo "<p>Database already exists.</p>"; 
    }
    
    $query = $connection->query("CREATE TABLE post ("
            . "id int(11) NOT NULL AUTO_INCREMENT,"
           . "title varchar(255) NOT NULL,"
            . "post text NOT NULL,"
           . "PRIMARY KEY (id))");
    
                                                                                                                                                                                                                                                                                                                                            
    if($query) {
        echo "<p>Succesfully create table: posts</p>";
    }
    else {
        echo "<p>$connection->error</p>";
    }
    
    
    
    
    
    $connection->close();  
    
    