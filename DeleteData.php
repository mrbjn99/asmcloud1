<!DOCTYPE html>
<html>
<body>

<h1>DELETE TO DATABASE ATN</h1>

<?php
ini_set('display_errors', 1);
echo "Delete database!";
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

$sql = "DELETE FROM customer WHERE customerid = 'c03'";
$stmt = $pdo->prepare($sql);
if($stmt->execute() == TRUE){
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: ";
}

?>
</body>
</html>
