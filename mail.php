
<button onclick="mail()">Send mail</button>

<!-- <script type="text/javascript">
    mail();
</script> -->


<script src="https://smtpjs.com/v3/smtp.js"></script>

<?php
 echo $mail="yram18223@gmail.com";
 ?>


<script>
function mail(){
    

    $mail1= "<?php echo $mail; ?>";
    Email.send({
    Host : "smtp.elasticemail.com",
    Username : "shreemanishdsa@gmail.com",
    Password : "331E756C510AC0637C346B143E05C1F2105B",
    
    To : $mail1,
    From : "shreemanishdsa@gmail.com",
    Subject : "Regestration 2178 ",
    Body : "You have sucessfull registerd im from mail page"
}).then(
  message => alert($mail)
);
}

</script>

