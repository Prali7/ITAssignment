<?php
$conn=mysqli_connect("localhost","root","","bankdb");

if(!$conn){
    die("connection failed:". mysqli_connect_error());
}
echo "<h3> Bank Transaction Example </h3>";

mysqli_begin_transaction($conn);

try{
    $debit="UPDATE accounts SET balance = balance- 500 WHERE id =1";
    if(!mysqli_query($conn,$debit)){
        throw new Exception("Error debiting account A:".mysqli_error($conn));
    }
    $credit="UPDATE accounts SET balance = balance+ 500 WHERE id =2";
    if(!mysqli_query($conn,$credit)){
        throw new Exception("Error crediting account B:".mysqli_error($conn));
}
mysqli_commit($conn);
echo"<p style='color:green;'> Transaction successful ! Amount transfered";
}catch (Exception $e){
    mysqli_rollback($conn);
    echo"<p style='color:red';> Transaction Failed:".$e->getMessage()."</p>";
}
    mysqli_close($conn);
    ?>