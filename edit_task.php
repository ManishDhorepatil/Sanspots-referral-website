
<?php
 require('connection.php'); 
 session_start();

?>

<?php
$task_idold=$_GET['task_id'];
$sql2="SELECT * FROM task WHERE task_id='$task_idold'";
$query2=mysqli_query($con,$sql2);
$result=mysqli_fetch_assoc($query2)


// echo $result['full_name'];
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <title>Add Task</title>
        <link rel="stylesheet" href="./responsiveRegistration.css">
        <script type="text/javascript" lang="javascript" src="./responsiveRegistaration.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <style>
        *{box-sizing: border-box;
}
input[type=text], input[type=email], input[type=number], input[type=select], input[type=date],input[type=select],input[type=password], input[type=tel]
{
    width: 45%;
    padding: 12px;
    border: 1px solid rgb(168, 166, 166);
    border-radius: 4px;
    resize: vertical;
}
textarea{
    width:45%;
    padding: 12px;
    border: 1px solid rgb(168, 166, 166);
    border-radius: 4px;
    resize: vertical;
}
input[type=radio],input[type=checkbox]{
    width: 1%;
    padding-left: 0%;
    border: 1px solid rgb(168, 166, 166);
    border-radius: 4px;
    resize: vertical;
}
h1{
    font-family: Arial;
    font-size: medium;
    font-style: normal;
    font-weight: bold;
    color: brown;
    text-align: center;
    text-decoration: underline;
}
label{
    padding: 12px 12px 12px 0;
    display: inline-block;
}
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float:left;
}
input[type=submit]:hover {
background-color: #32a336;
}
.container{
    border-radius: 5px;
    background-color:#f2f2f2;
    padding: 20px;
}
.col-10{
    float: left;
    width:10%;
    margin-top: 6px;
}
.col-90{
    float: left;
    width: 90%;
    margin-top: 6px;
}
.row:after{
    content: "";
    display: table;
    clear: both;
}
@media screen and (max-width: 600px) {
    .col-10,.col-90,input[type=submit]{
        width: 100%;
        margin-top: 0;
    }
}







        </style>
       
    <body>
    <header>
    <h2>TechFest</h2>
    <nav>
      <a href="admin.php">HOME</a>
      <a href="#">BLOG</a>
      <a href="#">CONTACT</a>
      <a href="#">ABOUT</a>
      
    </nav>
    <?php 
    
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
      {
        echo"
          <div class='user'>
            $_SESSION[username] - <a href='logout.php'>LOGOUT</a>
          </div>
        ";
      }
      else
      {
        echo"
          <div class='sign-in-up'>
           
            
            
            
          </div>
        ";
      }
    
    ?>
  </header>
  
        <h1>Create New Task</h1>
        <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-10">
                    <label for="fname">Task Name:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="fname" name="tname" placeholder="Enter your Task Name"  required value="<?=$result['task_name']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="lname">Discription:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="lname" name="disc" placeholder="Enter your Discription"  required value="<?=$result['discription']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="email">Points:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="email" name="points" placeholder="Enter Maximum Points"  value="<?=$result['points']?>">
                </div>
            </div>
            
           
            <div class="row">
                <div class="col-10">
                    <label for="dob">Start Date:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="s_date" name="s_date" value=" <?=$result['s_date']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="dob">End Date :</label>
                </div>
                <div class="col-90">
                    <input type="text" id="e_date" name="e_date" value= " <?=$result['e_date']?>">
                </div>
            </div>

            <div class="row">
                <div class="col-10">
                    <label for="lname">Upload File :</label>
                </div>
                <div class="col-90">
                <input type="file" name="blog_image" class="form-control"  >
                <image src="upload/.<?=$result['image_name']?>" width="100px" class="border">
                </div>
            
            <br>
            <br>
            <br>
            
            <div class="row">
                
                    <input type="submit" name="edit_task" value="Add" class="btn btn-primary">
            </div>
            <br>
            
            <div class="row">
                    <a href="manage_task.php" class="btn btn-secondary">Back</a>
            </div>    
        </div>
</form>  
    </body>
    
    
    <?php
    if(isset($_POST['edit_task'])){
    
    echo $tname=mysqli_real_escape_string($con,$_POST['tname']);
    
    
    $disc=mysqli_real_escape_string($con,$_POST['disc']);
    $points=mysqli_real_escape_string($con,$_POST['points']);
    $sdate=mysqli_real_escape_string($con,$_POST['s_date']);
    $edate=mysqli_real_escape_string($con,$_POST['e_date']);
    $filename= $_FILES['blog_image']['name'];
    $tmp_name= $_FILES['blog_image']['tmp_name'];
    $size=$_FILES['blog_image']['size']; 
    $image_ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $allow_type=['jpg','png','jpeg'];
    $destination="upload/.$filename";

    if(!empty($filename))
    {
        echo "  im not empty";
        if(in_array($image_ext,$allow_type))
        {
            echo "  format-ok";
            if($size<=2000000)
            {
                echo "  Size-ok. ";
                $filename1=$result['blog_image'];
                
                $unlink="upload/.$filename1";
                unlink($unlink);
                echo "  unlink-ok. ";
                move_uploaded_file($tmp_name,$destination);
                $sql3="UPDATE `task` SET `task_name` = '$tname', `discription` = ' $disc ', `points` = ' $points', `s_date` = ' $sdate', `e_date` = '$edate',`image_name` = '$filename' WHERE `task`.`task_id` ='$task_idold'";
                echo $query3=mysqli_query($con,$sql3);
                echo "  Query-ok. ";
                if($query3)
                {
                    
                
                    
                    echo"
                    <script>
                      alert('Post updated sucessfully ');
                      window.location.href='manage_task.php';
                    </script>
                  ";
                }
                else
                {
                    

                    echo"
                    <script>
                      alert(''Some Error','alert-danger ');
                      window.location.href='manage_task.php';
                    </script>
                  ";
                }

            }
            else
            {
                
                echo"
                <script>
                  alert('Size Should Less than 2 MB','alert-danger' );
                  window.location.href='manage_task.php';
                </script>
              ";
            }
        }
        else
        {
            // echo "  format-Error";
            $msg= ['Only allowed Format(jpg,png,jpeg)','alert-danger'];
            $_SESSION['msg']=$msg;
            header("location:index.php");

            echo"
            <script>
              alert('Only allowed Format(jpg,png,jpeg)','alert-danger');
              window.location.href='manage_task.php';
            </script>
          ";
        }

    }
    else
    {
        echo "   Im empy image N update data";
        $sql3="UPDATE `task` SET `task_name` = '$tname', `discription` = ' $disc ', `points` = ' $points', `s_date` = ' $sdate', `e_date` = '$edate' WHERE `task`.`task_id` ='$task_idold'";
                echo $query3=mysqli_query($con,$sql3);
                echo "  Query-ok. ";
                if($query3)
                {
                    
                    
                    echo"
                    <script>
                      alert'Post updated sucessfully ','alert-success' );
                      window.location.href='manage_task.php';
                    </script>
                  ";

                    
                }
                else
                {

                    echo"
                    <script>
                      alert(''Some Error','alert-danger' ,'alert-success' );
                      window.location.href='manage_task.php';
                    </script>
                  ";

                    
                }

    }
    
}




?>
</html>