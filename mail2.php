<script src="https://smtpjs.com/v3/smtp.js"></script>
<form method="POST" >
        <h2>
          <span>USER REGISTER</span>
          <button type="reset" onclick="popup('register-popup')">X</button>
        </h2>
        <input type="text" placeholder="Full Name" name="fullname">
        <input type="text" placeholder="Username" name="username">
        <input type="email" placeholder="E-mail" name="email">
        <input type="password" placeholder="Password" name="password">
        <input type="text" placeholder="Referral Code" name="referralcode" id="refercode">
        <button onclick="mail($_POST['email'])" >REGISTER</button>


        <?php 

        $email=$_POST['email'];

        echo $email;
         
        
        ?>
        
       
      
    
    </form>

    <script>
          function mail(){
              $email=$_POST['email'];
              Email.send({
              Host : "smtp.elasticemail.com",
              Username : "shreemanishdsa@gmail.com",
              Password : "331E756C510AC0637C346B143E05C1F2105B",
              To : 'yram18223@gmail.com' ,
              From : "shreemanishdsa@gmail.com",
              Subject : "Regestration 3 ",
              Body : "You have sucessfull registerd second try"
          }).then(
            message => alert(message)
          );
          }
          
          </script>