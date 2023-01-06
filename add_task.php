<?php
 require('connection.php'); 
 session_start();




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
                    <input type="text" id="fname" name="tname" placeholder="Enter your Task Name">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="lname">Discription:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="lname" name="disc" placeholder="Enter your Discription">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="email">Points:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="email" name="points" placeholder="Enter Maximum Points">
                </div>
            </div>
            
           
            <div class="row">
                <div class="col-10">
                    <label for="dob">Start Date:</label>
                </div>
                <div class="col-90">
                    <input type="Date" id="s_date" name="s_date">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="dob">End Date :</label>
                </div>
                <div class="col-90">
                    <input type="Date" id="e_date" name="e_date">
                </div>
            </div>

            <div class="row">
                <div class="col-10">
                    <label for="lname">Upload File :</label>
                </div>
                <div class="col-90">
                <input type="file" name="blog_image" class="form-control" required>
                </div>
            
            <br>
            <br>
            <br>
            
            <div class="row">
                
                    <input type="submit" onclick="mail()" name="add_blog" value="Add" class="btn btn-primary">
            </div>
            <br>
            
            <div class="row">
                    <a href="manage_task.php" class="btn btn-secondary">Back</a>
            </div>    
        </div>
</form>  
    </body>
    
    
    <?php
    if(isset($_POST['add_blog'])){
    
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

    
    if(in_array($image_ext,$allow_type)){
        if($size<=2000000){
            move_uploaded_file($tmp_name,$destination);
            $sql2="INSERT INTO `task` (`task_name`, `discription`, `points`, `s_date`, `e_date`, `image_name`, `task_status`) VALUES ('$tname', ' $disc', ' $points', '  $sdate', '  $edate', '$filename','0');";
            $query2=mysqli_query($con,$sql2);
            if($query2){
               
                $sql="SELECT * FROM registered_users";
                $query=mysqli_query($con,$sql);
                $rows=mysqli_num_rows($query);
                if($rows){
                    while($result=mysqli_fetch_assoc($query)){
                        

                        echo"  <br>  ";
                        echo $mail=$result['email'];

                        ?>


                        

<!--                  
                        <script>
                        function mail(){
                         
                        
                            $mail1= document.getElementById($mail).innerHTML;
                        
                            Email.send({
                            Host : "smtp.elasticemail.com",
                            Username : "shreemanishdsa@gmail.com",
                            Password : "331E756C510AC0637C346B143E05C1F2105B",
                            To : $mail1,
                            From : "shreemanishdsa@gmail.com",
                            Subject : "New Task Assigned",
                            Body : "New Task is update Hurry Up !!!! Complete andGain Points "
                        }).then(
                          message => alert(message)
                        );
                        }
                        
                        </script>
                        <script src="https://smtpjs.com/v3/smtp.js"></script> -->

                   
                   
                   <?php





                    
                        
                    }
                }
            
                
















                echo"<script>
                alert('Task has sucessfully added','alert-success');
                window.location.href='manage_task.php';
                </script>
              ";
        
            }
            else{
                
                echo"<script>
                alert('Something Went wrong(internal problem)','alert-success');
                window.location.href='manage_task.php';
                </script>
              ";
            }
        }
        else
        {
            echo "image size should be greater than 2mb";
        }
    }
    else
    {
        echo "File type is not allowed(only jpg,png and jpeg)";
    
    }
    

    
}
?>

</html>