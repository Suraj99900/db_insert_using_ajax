<?php
// for localserver database
$server = "localhost";
$database = "emp";
$user = "root";
$password = "";



$conn = new mysqli($server, $user, $password, $database);

if ($conn->connect_error) {
    echo "error in connection";
}
// Read POST data
$data = json_decode(file_get_contents("php://input"));
if ($data) {
  

    if (!$data->action) {
        $fname = $data->fname;
        $lname = $data->lname;
        $email = $data->email;
        $password = $data->password;
        $number = $data->number;

        $query_insert = "INSERT INTO reg (srno,fname,lname,email,password,phone) value(null , '$fname','$lname','$email','$password','$number')";

        $result = mysqli_query($conn, $query_insert);

        if (mysqli_error($conn)) {
            echo 'Error in query';
        } else {
            echo 'Data inserted in database successfully';
        }

    }else{

        $srno = $data->srno;
        $fname = $data->fname;
        $lname = $data->lname;
        $email = $data->email;
        $number = $data->number;
        $query_up = "UPDATE `reg` SET`fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$number' WHERE srno = $srno";

        $result = mysqli_query($conn, $query_up);

        if (mysqli_error($conn)) {
            echo 'Error in updation';
        } else {
            echo 'Data updated in database successfully';
        }
    }
}

if (isset($_GET['show'])) {
    $query_show = "SELECT * FROM reg";
    $result = mysqli_query($conn, $query_show);
    $data = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query_del = "DELETE FROM `reg` WHERE srno = $id";

    $result = mysqli_query($conn, $query_del);
    if (!mysqli_error($conn)) {
        echo "Data Deleted successfully";
    } else {
        echo "Error";
    }
}
