
<?php
 require('connection.php'); 
 session_start();




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="style.css">
</head>
<style>
  body1 {
	background: #fafafa url(https://jackrugile.com/images/misc/noise-diagonal.png);
	color: #444;
	font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
	text-shadow: 0 1px 0 #fff;
}

strong {
	font-weight: bold; 
}

em {
	font-style: italic; 
}

table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 17px;
	line-height: 24px;
	margin: 30px auto;
	text-align: left;
	width: 100%;
  
}	

th {
	background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#16222A , #16222A);
	border-left: 1px solid #555;
	border-right: 1px solid #777;
	border-top: 1px solid #555;
	border-bottom: 1px solid #333;
	box-shadow: inset 0 1px 0 #999;
	color: #fff;
  font-weight: bold;
	padding: 10px 15px;
	position: relative;
	text-shadow: 0 1px 0 #000;	
  
}

th:after {
	background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
	content: '';
	display: block;
	height: 25%;
	left: 0;
	margin: 1px 0 0 0;
	position: absolute;
	top: 25%;
	width: 98%;
  
}

th:first-child {
	border-left: 1px solid #777;	
	box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
	box-shadow: inset -1px 1px 0 #999;
}

td {
	border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 10px 15px;
	position: relative;
	transition: all 300ms;
  
}

td:first-child {
	box-shadow: inset 1px 0 0 #fff;
}	

td:last-child {
	border-right: 1px solid #e8e8e8;
	box-shadow: inset -1px 0 0 #fff;
}	

tr {
	background: url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:nth-child(odd) td {
	background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:last-of-type td {
	box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
	box-shadow: inset 1px -1px 0 #fff;
}	

tr:last-of-type td:last-child {
	box-shadow: inset -1px -1px 0 #fff;
}	

tbody1:hover td {
	color: transparent;
	text-shadow: 0 0 3px #aaa;
}

tbody1:hover tr:hover td {
	color: #444;
	text-shadow: 0 1px 0 #fff;
}

td 
{
    text-align: center; 
    vertical-align: middle;
}
tr
{
    text-align: center; 
    vertical-align: middle;
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

<table >
  <thead>
    <tr>
      <th>Sr.No</th>
      <th>Email</th>
      <th>Image</th>

    </tr>
  </thead>

  <tbody >
    <br>
    <br>
  <a href="admin.php" class="btn btn-primary" >Back</a>
    <?php 
    $sql="SELECT * FROM images order by status asc";
    $query=mysqli_query($con,$sql);
    $rows=mysqli_num_rows($query);
    $count=0;
    if($rows){
        while($result=mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?= ++$count ?></td>
                <td><?= $result['email'] ?></td>
                <td>
                    <?php $img=$result['image_name']?>
                    <img src="upload/.<?=$img?>" width="20%" height="40%" >       
                
                
                <br>
                <br>
              
                
                <form class ="mt-2"  method="POST" onsubmit="return confirm('Accept Image ?')">
                <input type="hidden" id="email" name="email" value="<?=$result['email'] ?>">
                <input type="hidden" name="id" value="<?=$result['image_id'] ?>">
                <input type="submit" onclick="mail()"  name="accept" value="Accept" class="btn btn-sm btn-danger">
                </form>
                
                
                <script src="https://smtpjs.com/v3/smtp.js"></script>
                <script>
                  function mail(){
                   
                    $mail1= document.getElementById("email").value;
                  
                      Email.send({
                      Host : "smtp.elasticemail.com",
                      Username : "shreemanishdsa@gmail.com",
                      Password : "331E756C510AC0637C346B143E05C1F2105B",
                      To : $mail1,
                      From : "shreemanishdsa@gmail.com",
                      Subject : "Task Accepted ",
                      Body : "You have sucessfull Completed task "
                  }).then(
                    message => alert(message)
                  );
                  }
                  </script>

                <br>
                
                
                <form class ="mt-2"  method="POST" onsubmit="return confirm('Are you sure want to delete?')">
                <input type="hidden" name="id" value="<?=$result['image_id'] ?>">
                <input type="submit" name="deletePost" value="Delete" class="btn btn-sm btn-danger">
                </form> 
        
        <?="Display: ";?><?= $result['status'] ?></td>    
            
                
            
  
            </tr>
        <?php    
        }
  
    }
    else
    {
        ?>
        <tr><td colspan="7">No record Found </td></tr>
    <?php
    }

    ?>
    

                                    
  </tbody>
  </table>
  </div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>


<?php 
if(isset($_POST['deletePost'])){
    $id=$_POST['id'];
    
    $delete="DELETE FROM images WHERE image_id='$id'";
    $run=mysqli_query($con,$delete);
    if($run){
       
        $msg=['Post has been deleted successfully','alert-success'];
        $_SESSION['msg']=$msg;
        echo"
        <script>
          alert('Delete Sucesfull');
          window.location.href='admin_images.php';
        </script>
      ";
        

    }
    else
    {
        $msg=['Failed, please try again','alert-danger'];
        $_SESSION['msg']=$msg;
        echo"
          <script>
            alert('Cannot Run Query');
            window.location.href='admin_images.php';
          </script>
        ";
        

    }
}



?>


<?php 
if(isset($_POST['accept'])){
    echo $email=$_POST['email'];
    echo $id=$_POST['id'];
    
    
    $status="SELECT * FROM `images` WHERE image_id='$id' ";
    $run3=mysqli_query($con,$status);
    $result=mysqli_fetch_assoc($run3);
    echo $fstatus=$result['status'];
    echo $tid=$result['task_id'];

    $tid2="SELECT * FROM `task` WHERE task_id='$tid' ";
    $run4=mysqli_query($con,$tid2);
    $result1=mysqli_fetch_assoc($run4);
    echo $points=$result1['points'];


    if( $fstatus=='1')
    {
      echo"
        
        <script>
          alert('Post Already Displayed');
          window.location.href='admin_images.php';
          
        </script>
        
      ";
    }

    else{
    $update="UPDATE `images` SET `status`= True WHERE image_id='$id'";
    $run=mysqli_query($con,$update);
    
      $update2="UPDATE `registered_users` SET `referral_point`=`referral_point`+'$points'  WHERE email='$email'";
    $run2=mysqli_query($con,$update2);

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // Query for differntiate the the months



    $sql5=" SELECT * FROM images WHERE image_id='$id' ";
    $run5=mysqli_query($con,$sql5);
    $result5=mysqli_fetch_assoc($run5);
    echo $image_taskid5=$result5['task_id'];




    $sql6=" SELECT *,MONTH(s_date) AS s_date FROM task WHERE task_id='$image_taskid5' ";
    $run6=mysqli_query($con,$sql6);
    $rows6=mysqli_num_rows($run6);
    $result6=mysqli_fetch_assoc($run6);
    echo" =-----from task------- ";
    echo $image_taskid6=$result6['task_id'];
    echo" =------------ ";
    
    echo $task_points=$result6['points']; 
    echo" =------------ ";
    echo $task_month=$result6['s_date']; 
    echo" =------------ ";
    echo $eamil_task=$result5['email']; 




    if($task_month == 1)
    {
        $sql7=" SELECT * from january where email='$eamil_task' ";
        $run7=mysqli_query($con,$sql7);
        echo "row 7 data   ";
        echo $rows7=mysqli_num_rows($run7);





         if($rows7 > 0)
         {
             echo "data found";
            $update="UPDATE january SET referral_point = referral_point + '$task_points' WHERE email='$eamil_task'";
            $run=mysqli_query($con,$update);

            if($run)
            {     
              echo" i  runed";
            }
            else
            {
               echo"i cant run";
            }

        }
        else
        {
            echo "data Not Found";
            
            $sql8=" SELECT * from registered_users where email='$eamil_task' ";
            $run8=mysqli_query($con,$sql8);
            $result8=mysqli_fetch_assoc($run8);
           echo  $reg_username = $result8['username']; 
            echo $reg_fullname = $result8['full_name'];
            echo "TAsk point"; 
            echo $task_points2=$result6['points'];


            $sql2="INSERT INTO `january` (`full_name`, `username`, `email`, `referral_point`) VALUES ('$reg_fullname', '$reg_username', '$eamil_task', ' $task_points2')";
            $query2=mysqli_query($con,$sql2);
            echo "new inserted";
            
            
            if($query2)
            {
                
                echo"<script>
            alert('Image has sucessfully added','alert-success');
            </script>
          ";
        
            }
            else
            {
                
                    
            echo"<script>
            alert('Something Went wrong(internal problem)');
            </script>
          ";
            }
        }
        
     

       
    }
    elseif($task_month==2)
    {
        $sql7=" SELECT * from february where email='$eamil_task' ";
        $run7=mysqli_query($con,$sql7);
        echo "row 7 data   ";
        echo $rows7=mysqli_num_rows($run7);





         if($rows7 > 0)
         {
             echo "data found";
            $update="UPDATE february SET referral_point = referral_point + '$task_points' WHERE email='$eamil_task'";
            $run=mysqli_query($con,$update);

            if($run)
            {     
              echo" i  runed";
            }
            else
            {
               echo"i cant run";
            }

        }
        else
        {
            echo "data Not Found";
            
            $sql8=" SELECT * from registered_users where email='$eamil_task' ";
            $run8=mysqli_query($con,$sql8);
            $result8=mysqli_fetch_assoc($run8);
           echo  $reg_username = $result8['username']; 
            echo $reg_fullname = $result8['full_name'];
            echo "TAsk point"; 
            echo $task_points2=$result6['points'];


            $sql2="INSERT INTO `february` (`full_name`, `username`, `email`, `referral_point`) VALUES ('$reg_fullname', '$reg_username', '$eamil_task', ' $task_points2')";
            $query2=mysqli_query($con,$sql2);
            echo "new inserted";
            
            
            if($query2)
            {
                
                echo"<script>
            alert('Image has sucessfully added','alert-success');
            </script>
          ";
        
            }
            else
            {
                
                    
            echo"<script>
            alert('Something Went wrong(internal problem)');
            </script>
          ";
            }
        }
        
    }
    
    elseif($task_month==3)
    {
        $sql7=" SELECT * from march where email='$eamil_task' ";
        $run7=mysqli_query($con,$sql7);
        echo "row 7 data   ";
        echo $rows7=mysqli_num_rows($run7);





         if($rows7 > 0)
         {
             echo "data found";
            $update="UPDATE march SET referral_point = referral_point + '$task_points' WHERE email='$eamil_task'";
            $run=mysqli_query($con,$update);

            if($run)
            {     
              echo" i  runed";
            }
            else
            {
               echo"i cant run";
            }

        }
        else
        {
            echo "data Not Found";
            
            $sql8=" SELECT * from registered_users where email='$eamil_task' ";
            $run8=mysqli_query($con,$sql8);
            $result8=mysqli_fetch_assoc($run8);
           echo  $reg_username = $result8['username']; 
            echo $reg_fullname = $result8['full_name'];
            echo "TAsk point"; 
            echo $task_points2=$result6['points'];


            $sql2="INSERT INTO `march` (`full_name`, `username`, `email`, `referral_point`) VALUES ('$reg_fullname', '$reg_username', '$eamil_task', ' $task_points2')";
            $query2=mysqli_query($con,$sql2);
            echo "new inserted";
            
            
            if($query2)
            {
                
                echo"<script>
            alert('task added','alert-success');
            </script>
          ";
        
            }
            else
            {
                
                    
            echo"<script>
            alert('Something Went wrong(internal problem)');
            </script>
          ";
            }
        }
        
     

       
        
      
    }
    else{

      echo"<script>
            alert('Task till march Allowed');
            </script>
          ";
    }
    











    

    
    if($run && $run2){
      
        
        echo"
        
        <script>
          alert(' $email Post has been Saved successfully');
          window.location.href='admin_images.php';
          
        </script>
        
      ";
        

    }
    else
    {
      
        echo"
          <script>
            alert('Cannot Run Query');
            window.location.href='admin_images.php';
          </script>
        ";
        

    }
      echo"
        
      <script>
        alert(' Status 0');
        window.location.href='admin_images.php';
        
      </script>
      
    ";
    }



  
    
}



?>

