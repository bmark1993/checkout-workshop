<?php include 'calculateVAT.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Shop </title>
</head>

    <body>  
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <label for="product">Product</label>
            <input type="text" id="product" name="product"><br><br>
            <label for="quantity">Quantity:</label>
            <input type="text" id="quantity" name="quantity"><br><br>
            <input type="submit" name ="submit" value="Submit">
        </form>
    </body>
</html>

<?php
//database for shop 
$products = array (
  array("TV", 2200, 18),
  array("Keyboard", 25, 13),
  array("Mouse", 10, 2),
  array("Headset", 50, 15)
);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['product'];
    $qty  = (int) $_POST['quantity'];   // convert the text input to a whole number
    $found = null;

    foreach ($products as $product) {
        if ($product[0] == $name) {
            $found = $product;
            break;
        }
    }

    if ($found === null) {
        echo "Product is not in the list";
    } elseif ($qty <= 0) {
        echo "Please enter a quantity of at least 1";
    } elseif ($qty > $found[2]) {
        echo "Only " . $found[2] . " in stock";
    } else {
        $subtotal = $found[1] * $qty;
        $vat      = calculateVAT($subtotal);
        $total    = $subtotal + $vat;

        echo $found[0] . " x " . $qty . "<br>";
        echo "Subtotal: $" . $subtotal . "<br>";
        echo "VAT (18%): $" . number_format($vat, 2) . "<br>";
        echo "Total: $" . number_format($total, 2);
    }
}

/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['product'];
    $found = null;

    foreach($products as $product){
    if($product[0] == $name){
        $found = $product;
        break;
    }
    }
    if($found === null){
        echo "Product is not in the list";
    } else{
        echo $found[0] ."<br> Price: $" . $found[1];
    }
}*/
?>



<?php
//database for shop 
/*$products = array (
  array("TV", 2200, 18),
  array("Keyboard", 25, 13),
  array("Mouse", 10, 2),
  array("Headset", 50, 15)
);

foreach($products as $product){
    echo "Product: $product[0],  Price: $$product[1]<br>";
}*/

//foreach($parameter plural (arrayname) as $parameter single){
//echo $parameter single [(number is the multidimensional)] etc.....
//}



?>