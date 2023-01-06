

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
  <title>User - Login and Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<style>

h4
{
  text-align: center;
  font-weight: bold;
  margin: 20px 10px;
  font-size: 1.5rem;
  

}



.blog_flex{
	display: flex;
	width: 100%;
 
}
.flex-part1{
	width: 20%;
	height: 10rem !important;
	border: 1px solid #eee;
}
.flex-part2{
	border: 1px solid #eee !important;
	padding-left: 10px;
	width: 90%;
}
.flex-part1 img{
	width: 100%;
	height: 100%;
	object-fit: cover;
}
.flex-part2 #title{
	color: #544E48;
	text-decoration: none;
	font-weight: bold;
	text-align: justify;
}
.flex-part2 #body{
	color: #544E48;
	text-decoration: none;
	text-align: justify;
	font-size: 0.9rem;
}
.flex-part2 ul{
	display: flex;
	padding: 0 !important;
	margin: 0 !important;
}
.flex-part2 ul li{
	list-style: none;
}
.flex-part2 ul li a{
	color: gray;
	text-decoration: none;
	font-size: 1.0rem;
}
.right-section{
	flex-direction: column;
}
.right-section h6{
	background-color: #bbb;
	color: #000;
	padding: 10px;
	border-radius: 5px;
}
.right-section ul li a{
	text-decoration: none;
	color: #555;
	font-size: 0.9rem;
}
.right-section ul li{
	list-style: none;
	border-bottom: 1px solid #eee;
	padding: 4px 0 4px 0;
}
#single_img{
    width: 100%;
    height: 20rem;
}
#single_img img{
	width: 100%;
	height: 100%;
	object-fit: contain;
}
@media screen and (max-width: 768px) {
  .flex-part2 p{
    display: none;
  }
  .flex-part1{
	height: 6rem !important;
  }
  .flex-part2 ul{
		display: flex;
		flex-direction: column;
	}
}
@media screen and (max-width: 992px) {
  .flex-part1{
	height: 8rem !important;
  }
}
@media screen and (max-width: 1200px) {
  .flex-part1{
	height: 10rem !important;
  }
}
    .button {
            border: none;
            padding: 15px 42px;
            border-radius: 15px;
            color: black;
            text-align: auto;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 10px;
            cursor: pointer;
            
        }
    .form-control {
    /* width: 200px;
    height: 3px;
    outline: 1px solid red;
    position: relative; */
    background-color: #d1d1d1;
}
.form-field {
    display: block;
    width: 100%;
    padding: 8px 16px;
    line-height: 25px;
    font-size: 18px;
    font-weight: 500;
    font-family: inherit;
    border-radius: 6px;
    -webkit-appearance: none;
    color: var(--input-color);
    border: 1px solid var(--input-border);
    background:  #d1d1d1;   
}

table {
  width: 100%;
}

th {
  height: 70px;
}
tr > * + * {
  padding-left: 4em;
}
td {
  text-align: center;
}

</style>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <header>
    <h2>TechFest</h2>
    <nav>
      <a href="user.php">HOME</a>
      <a href="#">BLOG</a>
      <a href="#">CONTACT</a>
      <a href="button.php">ABOUT</a>
      
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
        echo" Home
          <div class='sign-in-up'>
            
          
          <script>
          window.location.href='admin.php';
          </script>
            
          
            
          </div>
        ";
      }
    
    ?>
  </header>

  
  
  <!-- Admin login -->
  



  


  <?php 
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
    {
      // first query
      echo"<h1 style='text-align: center; margin-top: 50px;'> WELCOME TO TechFest -  $_SESSION[username]</h1>";
      $query="SELECT * FROM `registered_users` WHERE `username`='$_SESSION[username]'";
     

      // $query="UPDATE registered_users set rank = $rank+1";
      // $query="SELECT * from(SELECT *,RANK() OVER (ORDER BY referral_point DESC) rank FROM registered_users)  WHERE `username`='$_SESSION[username]'";
      
      $result=mysqli_query($con,$query);
      $result_fetch=mysqli_fetch_assoc($result);
      $rurl="http://localhost/ref/?refer=$result_fetch[referral_code]";
    
      
      
      // ------------------------================For getting count=====--------------------------------------
      
      $query3="SELECT count(*) AS count FROM `registered_users` ";
     

      $result3=mysqli_query($con,$query3);
      $result_fetch3=mysqli_fetch_assoc($result3);





      // ---------------------While loop for RAnking------------------------------------

      // ECHO "HEOOL out  "; 
      // $rank=1;
      // echo $result_fetch3['count'];
      
      // while($rank < $result_fetch3['count']+1){
        
        
      //   ECHO "Rank is ",$rank ;
        
      //   // echo $result_fetch3['referral_code'];
      //   $query1="UPDATE registered_users set rank = $rank";
      //   $result1=mysqli_query($con,$query1);
      //   $rank=$rank+1;
      //   ECHO "im run " ;


      // }

    //  second quet for rank and top students
    
  //   $query1="SELECT full_name,referral_point ,RANK() OVER(ORDER BY referral_point ASC) 
  //   //   as 
  //   //   'Rank' from registered_users;";
  //  $query1="SELECT ROW_NUMBER() OVER(ORDER BY name) AS num_row,name,code FROM furniture ORDER BY code"; 
  //     $result1=mysqli_query($con,$query1);
      // $query1="SELECT *, RANK() OVER(ORDER BY referral_point DESC) Rank FROM registered_users"; 
      // $result1=mysqli_query($con,$query1);
      // $result_fetch1=mysqli_fetch_assoc($result1);

    // -------------end---------------

echo"<h3 class='box'> 
        Overall My Rank : $result_fetch3[count] 
        <button type='button' onclick=\"popup('top10')\">Check Top 10 participants</button>
      </h3>";
      
      echo"<h3 class='box'> 
        Your Referral Code: $result_fetch[referral_code] 
      </h3>";
      
      echo"<h3 class='box'> 
        Your Referral Points: $result_fetch[referral_point] 
      </h3>";
      
      ?>
      <h3 class='box'>
      Your Referral Link (Get 10 points):
      <input type="text" class="form-field"   value="http://localhost/ref/?refer=<?=$result_fetch['referral_code']?>" id="myInput">
      <button class="button" onclick="myCopy()">Copy Link</button>  
      </h3>

      <?php
       echo"<h3 class='box' align-center> 
       -------------------------------Complate the following task :----------------------------------
     </h3>";
      ?>
      
      <h3 class='box'>
      <?php
      
        echo"
        <div class='sign-in-up'>
        <button type='button' onclick=\"popup('task')\">Completed Task</button> 
        </div>
      ";
      
      ?>
       </h3>
      
     
      
    <?php  
    }
  ?>
  
   
<!-- Pending TAsk start -->

<div class= "popup-container1"  id="p_task">
<h4 >Pending Tasks</h4>
    <div class=" register popup"  >
    <?php 
    echo $email1= $result_fetch['email'];


$sql2= "SELECT * From task where task_id IN (SELECT task_id FROM task
Except
SELECT task_id FROM images WHERE email='$email1' ) "  ;

$run2=mysqli_query($con,$sql2);
$row1=mysqli_num_rows($run2);



// $sql3= "SELECT * FROM task WHERE email='$email1'  "  ;

// $run2=mysqli_query($con,$sql2);
// $row1=mysqli_num_rows($run2);






?>
<div class="container mt-2">
	<div class="row">
		<div class="col-lg-8">


        <?php
        if($row1)
        {
            while($result=mysqli_fetch_assoc($run2))
            {
              echo $task_id_pen=$result['task_id'];
              echo $task_image=$result['image_name'];
              
              ?>
            
			<div class="card shadow">
				<div class="card-body d-flex blog_flex">
					<div class="flex-part1">
						
                            <?php $img=$result['image_name']?>
                            <img src="upload/.<?=$img?>"> 
                        
					</div>

        	<div class="flex-grow-1 flex-part2">
          <?php echo"Points : "?> <?=$result['points'] ?> 
						<p>
						
                        
						<ul>


					<div class="flex-grow-1 flex-part2">
						<?=$result['task_id'] ?><?=ucfirst($result['task_name']) ?>
						<p>
						<?=strip_tags(substr($result['discription'],0,140))." " ?> <span><br>
                        
						<ul>
							
							</li>&nbsp;&nbsp;&nbsp;
							<li class="me-2">
								<a href=""> <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                <?php echo"Start Date : "?>
                                <?php $date=$result['s_date'] ?> 
                                <?= date('d,M,Y',strtotime($date)) ?>&nbsp;&nbsp;&nbsp;
                                </a>
							</li>

              <li class="me-2">
								<a href=""> <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                
                                <?php echo"End Date :"?><?php $date=$result['e_date'] ?> 
                                <?= date('d,M,Y',strtotime($date)) ?>&nbsp;&nbsp;&nbsp;
                                </a>
							</li>
            </ul>
            <ul>
              <li class="me-2">
              <form action="" method="POST" enctype="multipart/form-data">
     
       
        <br>
                    <input  type="file" name="image" class="form-control"  required >
                    <div class="mb-3">
                    <input type="hidden" name="id1" value="<?=$result['task_id'] ?>">
                    <input type="submit" name="add_image" value="Submit" class="btn btn-primary">
                    
              
               
</form>

</li>


							
						</ul>
					</div>
				</div>
			</div>
            
        <?php
            }
        }
        ?>
            
		</div>
		
	</div>
</div>
        
        
      </form>
    </div>
  </div>


<!-- Pending task end -->



<?php
    if(isset($_POST['add_image']))
    {
      $taskid2=$_POST['id1'];
    
    $filename= $_FILES['image']['name'];
    $tmp_name= $_FILES['image']['tmp_name'];
    $size=$_FILES['image']['size']; 
    $image_ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $allow_type=['jpg','png','jpeg'];
    $destination="upload/.$filename";

    

    
    if(in_array($image_ext,$allow_type)){
        if($size<=3000000){
            move_uploaded_file($tmp_name,$destination);
            $sql2="INSERT INTO `images`(`task_id`,`image_name`, `email`, `status`) VALUES ('$taskid2','$filename','$result_fetch[email]',False)";
            
            $query2=mysqli_query($con,$sql2);
            if($query2)
            {
                
                echo"<script>
            alert('Image has sucessfully added','alert-success');
            window.location.href='user.php';
            </script>
          ";
        
            }
            else
            {
                
                    
            echo"<script>
            alert('Something Went wrong(internal problem)');
            window.location.href='user.php';
            </script>
          ";
            }
        }
        else
        {
            
            echo"<script>
        alert('image size should be less than 5mb');
        window.location.href='user.php';
        </script>
      ";
        }
    }
    else
    {
      echo"<script>
      alert('only jpeg, jpg ,png ','alert-success');
      window.location.href='user.php';
      </script>
    ";
    }
    

    
}
?>













<!-- Completed Task Start -->






<div class= "popup-container"  id="task" >

    <div class=" register popup1"  >
    <?php
     $email1= $result_fetch['email']; 

// $sql= "SELECT * FROM task  ORDER BY s_date DESC";
// $run=mysqli_query($con,$sql);
// $row=mysqli_num_rows($run); 
// $sql1= "SELECT * FROM task LEFT JOIN images ON task.task_id = images.task_id where email='$email1'"  ;

$sql1="SELECT  * ,i.status FROM task as t INNER JOIN images as i ON t.task_id = i.task_id AND email='$email1'";

$run1=mysqli_query($con,$sql1);
$row=mysqli_num_rows($run1);


?>
<div class="container mt-2">
	<div class="row">
		<div class="col-lg-8">
    <h4 >Completed Tasks</h4>
    

        <?php
        if($row)
        {
            while($result=mysqli_fetch_assoc($run1))
            {
               $task_id=$result['task_id'] ?>
            
			<div class="card shadow">
				<div class="card-body d-flex blog_flex">
					<div class="flex-part1">
						
                            <?php $img=$result['image_name']?>
                            <img src="upload/.<?=$img?>"> 
                        
					</div>

        	<div class="flex-grow-1 flex-part2">
          <?php echo"Points : "?> <?=$result['points'] ?> 
						<p>
						
                        
						<ul>
        	<?php $dstatus1= $result['status']; ?>
            <div class="flex-grow-1 flex-part2">
          <?php echo"Status  : "?> <?= $dstatus1?> 
						<p>
						
                        
						<ul>


					<div class="flex-grow-1 flex-part2">
						<?=$result['task_id'] ?><?=ucfirst($result['task_name']) ?>
						<p>
						<?=strip_tags(substr($result['discription'],0,140))." " ?> <span><br>
                        
						<ul>
							
							</li>&nbsp;&nbsp;&nbsp;
							<li class="me-2">
								<a href=""> <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                <?php echo"Start Date : "?>
                                <?php $date=$result['s_date'] ?> 
                                <?= date('d,M,Y',strtotime($date)) ?>&nbsp;&nbsp;&nbsp;
                                </a>
							</li>

              <li class="me-2">
								<a href=""> <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                
                                <?php echo"End Date :"?><?php $date=$result['e_date'] ?> 
                                <?= date('d,M,Y',strtotime($date)) ?>&nbsp;&nbsp;&nbsp;
                                </a>
							</li>

              <li class="me-2">
                <?php if($dstatus1 == 0){ ?>
              <form action="" method="POST" enctype="multipart/form-data">
     
       
                  <br>
                   
                    <form class ="mt-2"  method="POST" onsubmit="return confirm('Are you sure want to delete?')">
                                    <input type="hidden" name="id" value="<?=$result['task_id'] ?>">
                                    <input type="submit" name="deletePost" value="Delete" class="btn btn-sm btn-danger">
                                    </form> 
                    
                    </div>
                    </h3>    
                </div>
            </form>
            <?php }
            
            else {?>
            <form action="" method="POST" enctype="multipart/form-data">
     
       
     <br>
      
       <form class ="mt-2"  >
                       
                       <input type="button"  value="Task Accepted" class="btn btn-sm btn-danger">
                       </form> 
       
       </div>
       </h3>    
   </div>
</form>
<?php }?>
            <!-- Enable Disable Delete Button  -->
            
            
            
            

            </li>
             
          
            
							
						</ul>
            
					</div>
           
				</div>
        
			</div>
      
      
           
        <?php
            }
        }
       
        ?>
        
       
       
        <a href="user.php" class="btn btn-primary" >Back</a>
							   
		</div>
    
    <br>
    
		
	</div>
</div>
        
        
      </form>
    </div>
  </div>



<!-- Completed Task End -->



<script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else
      {
        get_popup.style.display="flex";
      }
    }
  </script>




<!-- delete button is pending it done when completed task work properly -->

<?php 
if(isset($_POST['deletePost'])){
    $id=$_POST['id'];
    
    $delete="DELETE FROM images WHERE task_id='$id'";
    $run=mysqli_query($con,$delete);
    if($run){
       
        $msg=['Post has been deleted successfully','alert-success'];
        $_SESSION['msg']=$msg;
        echo"
        <script>
          alert('Delete Sucesfull');
          window.location.href='user.php';
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
            window.location.href='user.php';
          </script>
        ";
        

    }
}



?>







<script>
function myCopy() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");
}
</script>








<!-- -----------------------------Top 10 Recorsd User Table pop up-------------------------------------- -->







<div class= "popup-container"  id="top10" >

    <div class=" register popup1"  >
    <div class="container-fluid ">
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                <a href="user.php" class="mt-2"  >Back</a>
                    <thead>
                      
                        <tr >
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Username</th>
                            
                            <th>Points</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql="SELECT * FROM registered_users order by referral_point DESC";
                        $query=mysqli_query($con,$sql);
                        $rows=mysqli_num_rows($query);
                        $count=0;
                        if($rows){
                            while($result=mysqli_fetch_assoc($query)){
                                ?>
                                <tr>
                                    <td><?= ++$count ?></td>
                                    <td><?= $result['full_name'] ?></td>
                                    <td><?= $result['username'] ?></td>
                                    
                                    <td><?=$result['referral_point']?></td>
                                    
                                
                                    
                                

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
    
    </div>
  </div>






</body>
</html>