<?php
try {
    $dbname = "test";
    $user = "root";
    $password = "";
    
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $option=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $connect = new PDO($dsn, $user, $password, $option); 
} catch (PDOException $e) {
    echo '錯誤行號:', $e->getLine(), '<br>';
    echo '錯誤訊息:', $e->getMessage(), '<br>';
}
?>