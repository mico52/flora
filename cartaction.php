<?php
    require_once("connection.php");

$action='';
if(isset($_GET['action'])){
    $action=$_GET['action'];
}

switch($action){
    case 'cartItem':
        if(isset($_POST['code'])){
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $code = $_POST['code'];
            $pqty = '1';

            $query = $connect -> prepare("SELECT * FROM `cart` WHERE `product_code` = '$code'");
            $query -> execute();
            if($query -> rowCount() < 1){
                $sql1 = "INSERT INTO `cart`(`product_name`, `product_price`, `product_image`, `qty`, `total_price`, `product_code`) VALUES ('$product_name', '$price', '$image', '$pqty', '$price', '$code')";
                $query1 = $connect->query($sql1);
            }
            while($row = $query -> fetch(PDO::FETCH_ASSOC)){
                $sql_code = $row['product_code'];
                $sql_price = $row['product_price'];
                $sql_qty = $row['qty'];
                $sql_total_price = $row['total_price'];
                if($sql_code == $code){
                    $sql2 = "UPDATE `cart` SET `product_price` = $sql_price + $price, `qty` = $sql_qty + $pqty, `total_price` = $sql_total_price + $price WHERE `product_code` = '$code'";
                    $query2 = $connect->query($sql2);
                }
            }
        }
        break;

        case 'cartShow':
            $query3 = $connect -> prepare("SELECT SUM(qty) FROM `cart`");
            $query3 -> execute();
            $sum = $query3 -> fetch();
            echo json_encode($sum);
        break;

        case 'remove':
            $product_name = $_POST['product_name'];
            $sql = "DELETE FROM `cart` WHERE `product_name` = '$product_name'";
            $query = $connect -> query($sql);
            echo json_encode($query);
        break;

        case 'changeQty':
            $product_name = $_POST['pname'];
            $product_price = $_POST['pprice'];
            $qty = $_POST['pQty'];
            $totalPrice = $qty*$product_price;
            $sql = "UPDATE `cart` SET `product_price`='$product_price', `qty`='$qty', `total_price`='$totalPrice' WHERE `product_name`='$product_name'";
            $query = $connect->query($sql);
        break;
}
?>
            