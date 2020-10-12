<?php
error_reporting(0);
session_start();
include "conn.php";
include "header.php";

$name=$_POST['name'];
$Password=$_POST['pass'];



if(isset($_POST['Login'])){


    $q="SELECT * FROM login where name = '$name' and password ='$Password'"; 

    $res=mysqli_query($conn,$q);
    if($res){
        echo '接続成功です';
    }else{
        echo '接続されていません';
    }
    $res1=mysqli_num_rows($res);
    


    if($res1 == 0){
        header("location:login.php?user=ユーザーネームとパスワードを正しく入力してー");
       
    }

    while($row= mysqli_fetch_array($res)){
        if ($row['name']== $name && $row['password'] == $Password){

            $_SESSION['name']=$name;
            $_SESSION['password']=$Password;

            if ($row['type'] == 'admin'){
                header("location:displayhr.php");

            }
        }
    }
    
}
?>

<div class="container">
    <form action="" method="post">
        <div class="form-group col-lg-6 m-auto">

            <div class="container">
            <div class="card-header bg-dark">
            <h3 class="text-white">Login</h3>
                </div></br>


            <label><b>Username</b></label>
            <input type="text" name="name" class="form-control" required><br>
            <label><b>Password</b></label>
            <input type="password" name="pass" class="form-control" required><br>

            <button name="Login" class="btn btn-success">Login</button><br>

            <div>
            <p class="text-danger"><?php echo $_GET['user'];?></p><br>
            <p><?php echo $_GET['ppassword'];?></p><br>
            <p><?php echo $_GET['both'];?></p>
            </div>


    </div>
    </div>
    </form>
    </div>
    </body>

