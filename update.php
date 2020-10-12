<?php 

session_start();
if(!$_SESSION['name']){
    header("location:login.php");
}

error_reporting(0);
include 'conn.php';
include 'header.php'; 

$id=$_GET['id'];
$name=ucfirst($_POST['name']);
$age=$_POST['age'];
$salary=$_POST['salary'];
$qualification=ucfirst($_POST['qualification']);
$dob=date("Y-m-d",strtotime($_POST['dob']));
$doj=date("Y-m-d",strtotime($_POST['doj']));
$date_of_birth=$dob;
$date_of_join=$doj;

$q="SELECT * FROM employee where id=$id";
$query=mysqli_query($conn,$q);
$res=mysqli_fetch_array($query);

?>

<div class="col-lg-6 m-auto">
<form action="post">
<br><div>
<div class="card-header bg-dark">
<h1 class="text-white text-center">Displaying Employee Details</h1>
</div><br>

<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
<label>Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $res['name']; ?>" required><br>

<label>age</label>
<input type="text" name="age" class="form-control" value="<?php echo $res['name']; ?>" required pattern="[0-9]{1,15}" title="This is field accepts only numbers"><br>

<label>qualification</label>
<input type="text" name="qualification" class="form-control" value="<?php echo $res['qualification']; ?>" required><br>


<label>date of birth</label>
<input type="text" name="dob" class="form-control" value="<?php echo $res['date_of_birth']; ?>" placeholder="date-month-year" required><br>

<label>date of Joining</label>
<input type="text" name="doj" class="form-control" value="<?php echo $res['date_of_join']; ?>" placeholder="date-month-year" required><br>


<div class="row">
<div class="col-md-3"><button class="btn btn-success" name="done">Update</button></div>
<div class="col-md-3"><input type="button" class="btn btn-success" name="delete" value="Delete"
 on click="deleteme(<?php $_SESSION['id'] = $id;?>)"></div>

 <div class="col-md-3"><button class="btn btn-success" name="view">attendance</button></div>

<script type="text/javascript">

function deleteme(delid){
    if(confirm("Are you sure you want to delete ?"))
    {
        window.location.href="delete.php";
    }
}

</script>


</div><br>
<a href="display.php"><input type="button" name="" value="Back to records" class="btn btn-primary col-lg-12"></a>
</div>
</form>
</div>

<?php 

if(isset($_POST['done'])){

}
