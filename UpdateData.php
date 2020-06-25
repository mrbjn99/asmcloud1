<!DOCTYPE html>
<html>
<body>

<h1>UPDATE DATA TO DATABASE</h1>

<?php
ini_set('display_errors', 1);
echo "Update database!";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-34-202-88-122.compute-1.amazonaws.com;port=5432;user=xsebwevzooofmy;password=de5968866a36f0aeff2fac5f9f59a2c0fd7e7f87e9dbdd3e47d6790cc193c195;dbname=d8kumgi5vqei95",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

//$sql = 'UPDATE customer '
//                . 'SET customername = :name, '
//                . 'WHERE customerid = :id';
// 
//      $stmt = $pdo->prepare($sql);
//      //bind values to the statement
//        $stmt->bindValue(':name', 'van quy');
//        $stmt->bindValue(':id', 'c02');
        // update data in the database
//        $stmt->execute();

        // return the number of row affected
        //return $stmt->rowCount();
$sql = "UPDATE customer SET customername = 'van quy' WHERE customerid = 'c02'";
      $stmt = $pdo->prepare($sql);
if($stmt->execute() == TRUE){
    echo "Record updated successfully.";
} else {
    echo "Error updating record. ";
}
    
?>
</body>
</html>
