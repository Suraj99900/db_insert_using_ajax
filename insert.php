<?php
// for localserver database
$server = "localhost";
$database = "emp";
$user = "root";
$password = "";



$conn = new mysqli($server,$user,$password,$database);

if($conn->connect_error){
    echo "error";
}
       // Read POST data
   $data = json_decode(file_get_contents("php://input"));
    $fname = $data->fname;
    $lname = $data->lname;
    $email = $data->email;
    $password = $data->password;
    $number = $data->number;


    $query_insert = "INSERT INTO reg (srno,fname,lname,email,password,phone) value(null , '$fname','$lname','$email','$password','$number')";

    $result =mysqli_query($conn , $query_insert);
    
    if(mysqli_error($conn)){
        echo 'Error';
    }else{
        echo 'Data inserted in database successfully';
    }


?>