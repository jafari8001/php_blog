<?php
    $db_name = "blog";
    if ($db = new PDO(DNS,  DB_USER, DB_PASS)) {
        $db->exec("CREATE DATABASE IF NOT EXISTS $db_name");
        $db->exec("USE $db_name");
    
        $db->exec("CREATE TABLE IF NOT EXISTS `users`(
                `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(100) NOT NULL,
                `email` VARCHAR(100) NOT NULL,
                `password` VARCHAR(100) NOT NULL
            )");
    
        $db->exec("CREATE TABLE IF NOT EXISTS `posts`(
                `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
                `title` VARCHAR(100) NOT NULL,
                `body` TEXT,
                `aoutor` INT(11),
                `image` VARCHAR(100),
                FOREIGN KEY (aoutor) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
            )");
    
        $db->exec("CREATE TABLE IF NOT EXISTS `post_slider`(
                `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
                `post_id` int(11),
                `active` TINYINT(1) DEFAULT 0,
                FOREIGN KEY (post_id) REFERENCES posts(id) ON UPDATE CASCADE ON DELETE CASCADE
            )");
    
        $db->exec("CREATE TABLE IF NOT EXISTS `menu`(
                `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
                `title` VARCHAR(100) NOT NULL
            )");
    
        $db->exec("CREATE TABLE IF NOT EXISTS `subscribe`(
                `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(100) NOT NULL,
                `email` VARCHAR(100) NOT NULL
            )");
    
        $db->exec("CREATE TABLE IF NOT EXISTS `comments`(
                `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
                `body` TEXT NOT NULL,
                `email` VARCHAR(100) NOT NULL,
                `post_id` int(11),
                `user_id` int(11),
                FOREIGN KEY (post_id) REFERENCES posts(id) ON UPDATE CASCADE ON DELETE CASCADE ,
                FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
            )");
    }
    
?>