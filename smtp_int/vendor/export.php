<?php  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


    
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost:3309", "root", "", "staffattendance");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('id', 'name', 'email', 'time in'));  
      $query = "SELECT * from attend ORDER BY id DESC";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
     

      require 'autoload.php';
	  $mail = new PHPMailer(true);
	$mail->isSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = 587;								//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'hiteshkaramchandani1@gmail.com';					//Sets SMTP username
	$mail->Password = 'tomnjerry';					//Sets SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'hiteshkaramchandani1@gmail.com';			//Sets the From email address for the message
	$mail->FromName = 'hiteshkaramchandani1@gmail.com';			//Sets the From name of the message
	$mail->AddAddress('karamchandanihl@rknec.edu', 'Name');		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->AddAttachment($output);     				//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Customer Details';			//Sets the Subject of the message
	$mail->Body = 'Please Find Customer details in attach PDF File.';				//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Customer Details has been send successfully...</label>';
	}
	unlink($filename);

	fclose($output); 
       
 }  
 ?>  