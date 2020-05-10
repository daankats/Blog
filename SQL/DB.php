<?php
// connectie naar MYSQL
$link = mysqli_connect('localhost', 'root', 'root');
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}

// blog db selecteren
$db_selected = mysqli_select_db('blog', $link);

if (!$db_selected) {
  // Database aanmaken indien hij niet bestaat  
  $sql = 'CREATE DATABASE blog';

  if (mysqli_query($link, $sql)) {
      echo "Database blog created successfully\n";
  } else {
      echo 'Error creating database: ' . mysqli_error() . "\n";
  }
}

$sql_tables = 'CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);';

if (mysqli_query($link, $sql_tables)) {
    echo "tables for blog created successfully\n";
} else {
    echo 'Error creating database: ' . mysqli_error() . "\n";
}

mysqli_close($link);
?>