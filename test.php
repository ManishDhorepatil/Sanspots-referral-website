<?php
 require('connection.php'); 




?>
<?php
$id='63';
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
    





?>