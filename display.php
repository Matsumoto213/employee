<?php
include 'conn.php';
include 'header.php';
session_start();

if(!$_SESSION['name']){
    header("location:login.php");

}

?>

<div class="container">
<div class="col-lg-12"><br>
<div class="row">
<h3 class="col-lg-6">Displaying Records</h3>
<a href="insert.php" class="col-lg-3"><button class="btn btn-success col-lg-3">Add</button></a>
<a href="logout.php" class="col-lg-3"><button class="btn btn-success col-lg-3" name="logout">Logout</button></a>
</div><br>
<table class="table table-stripped table-hover table-bordered">
<tr class="text-dark">
<th><h5>ID</h5></th>
<th><h5>Name</h5></th>
<th><h5>Age</h5></th>
<th><h5>Salary</h5></th>
<th><h5>Qualification</h5></th>
<th><h5>Date of Birth</h5></th>
<th><h5>Date of Join</h5></th>
</tr>
<?php
include 'conn.php';

$q="SELECT * FROM employee";
$query=mysqli_query($conn,$q);
while($res = mysqli_fetch_array($query)){ 
?>  

<tr>
<th><?php echo $res['id'] ?></th>
<th><?php echo $res['name'] ?></th>
<th><?php echo $res['age'] ?></th>
<th><?php echo $res['salary'] ?></th>
<th><?php echo $res['qualification'] ?></th>
<th><?php echo $res['date_of_birth'] ?></th>
<th><?php echo $res['date_of_join'] ?></th>
<th><a href="update.php?id=<?php echo $res['id']; ?>" class="text-white">
<button class="btn btn-success">View</button></a></th>

</tr>

<?php
}
?>


</table>
</div>
</div>
