// <button type='button' onclick=window.location.href='admin.php';>Admin</button>

<a href="edit_user.php?email=<?=$result['email']?>" class="btn btn-sm btn-success">Accept</a>

echo"
      <script>
        alert('Status 0');
        window.location.href='admin_images.php';
      </script>
    ";








    $update="UPDATE `images` SET `status`= True WHERE image_id='$id'";
    $run=mysqli_query($con,$update);
    
    $update2="UPDATE `registered_users` SET `referral_point`=`referral_point`+20  WHERE email='$email'";
    $run2=mysqli_query($con,$update2);
    
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









    <?php
    if(isset($_POST['copylink']))
    {
      $link=$_POST['link'];
    
    function Copy($link) {
    
    $link.select();
    document.execCommand("copy");
}
    }
?>



<?php
      echo"<h3 class='box'>
        Your Referral Link: 
          <a href='http://localhost/ref/?refer=$result_fetch[referral_code]'>
            http://localhost/ref/?refer=$result_fetch[referral_code]
          </a>
          
          
      </h3>";
      ?>







<?php 


if(isset($_POST['add_blog'])){
    
    echo $title=mysqli_real_escape_string($config,$_POST['blog_title']);
    
    $body=mysqli_real_escape_string($config,$_POST['blog_body']);
    $category=mysqli_real_escape_string($config,$_POST['categories']);
    $filename= $_FILES['blog_image']['name'];
    $tmp_name= $_FILES['blog_image']['tmp_name'];
    $size=$_FILES['blog_image']['size']; 
    $image_ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $allow_type=['jpg','png','jpeg'];
    $destination="upload/.$filename";

    
    if(in_array($image_ext,$allow_type)){
        if($size<=2000000){
            move_uploaded_file($tmp_name,$destination);
            $sql2="INSERT INTO blog(blog_title,blog_body,blog_image,category,author_id) VALUES('$title','$body','$filename','$category','$author_id')";
            $query2=mysqli_query($config,$sql2);
            if($query2){
                $msg= ['Post has sucessfully added','alert-success'];
                $_SESSION['msg']=$msg;
                header("location:add_blog.php");
        
            }
            else{
                $msg= ['Something Went wrong(internal problem)','alert-danger'];
                $_SESSION['msg']=$msg;
                header("location:add_blog.php");
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



SELECT *,RANK() OVER (ORDER BY referral_point DESC) rank FROM registered_users ;









$mail1= "<?php echo $email=$_POST['email']; ?>";

<p id="email"><?php echo $result['email'] ?> </p>