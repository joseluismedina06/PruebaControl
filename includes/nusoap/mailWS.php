<?php
	chdir(dirname(__FILE__));
	
	include_once("../email/class.phpmailer.php");
	chdir(dirname(__FILE__));

	class mailWS {
		private $mail; // Objeto PHP Mailer
		private $mailAccount; // credencial parameter
		private $mailServer; // credencial parameter
		private $login; // credencial parameter
		private $password; // credencial parameter
		
		//function __construct($mailAccount="noreply@italcambio.com", 
		//		     //$mailServer="mail.italcambio.com",
		//		     $mailServer="64.135.76.70",
		//		     //$mailServer="64.135.76.89",
		//		     $login="noreply",
		//		     $password="\$ecure*17")

		//function __construct($mailAccount="iepcsinaloapipc@gmail.com", 
		function __construct($mailAccount="artumarc.test@gmail.com", 
				     $mailServer="smtp.gmail.com",
					 //$login="iepcsinaloapipc@gmail.com",
					 $login="artumarc.test@gmail.com",
				     //$password="marcela1827A") {
					 $password="Tsubaki1974") {
        	$this->mail = new PHPMailer();
			$this->mail->IsSMTP();
			$this->mail->SMTPDebug = false;
			//$this->mail->SMTPDebug = 2;    
			$this->mail->SMTPAuth = true;
			$this->mail->SMTPSecure = "tls";
			$this->mail->Host = $mailServer;
			$this->mail->Port = 587;
			$this->mail->Username = $login;
			$this->mail->Password = $password;
			$this->mail->SetFrom($mailAccount, "No Reply");
			$this->mail->AddReplyTo($mailAccount,"No Reply");

		} //__construct

		
		function sendEmail($subject,$to,$header,$body,$footer) {
			$this->mail->Subject = $subject;
			$body = "<strong>".$header."</strong>"."<br><br>".$body."<br><br>"."<strong>".$footer."</strong>"."<br>";
			$this->mail->MsgHTML($body);
			foreach ($to as $value) {
				$this->mail->AddAddress($value,"");
			}
			return($this->mail->Send()); 
		}

	} // class	
	
	//$mws = new mailWS();
	//$to = array("mvazquezo@hotmail.com","mvazquezo@gmail.com","mvazquez@italcambio.com","mvazquezo@hotmail.com");
	//$mws->sendEmail("Envio desde SMTP 2",$to,"Header","Body","Footer");

?>