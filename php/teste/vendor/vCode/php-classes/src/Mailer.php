<?php
	namespace vCode;
	use Rain\Tpl;
	
	class Mailer{
		const USERNAME= "j.vinnycius94@gmail.com"; 
		const PASSWORD = "Mlourdes!10";
		const NAME_FROM = "Vinicius Souza";
		
		private $ismailer;
		public function __construct($toAddress,$toName,$subject,$tplName,$data = array())
		{	
				// config
			$config = array(
							"tpl_dir"       => $_SERVER['DOCUMENT_ROOT']."/views/email/",
							"cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/views-cache/",
							"debug"         => false // set to false to improve the speed
						   );

			Tpl::configure( $config );
		
			$tpl = new tpl;
			foreach ($data as $key => $value){
				$tpl->assign($key,$value);
			}
			$html = $tpl->draw($tplName,true);	
			
			//Create a new PHPMailer instance
			$this->ismailer = new \PHPMailer;
			//Tell PHPMailer to use SMTP
			$this->ismailer->isSMTP();
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$this->ismailer->SMTPDebug = 0;
			//Set the hostname of the mail server
			//$mail->Host = 'smtp.gmail.com';
			// use   
			$this->ismailer->Host =  gethostbyname('smtp.gmail.com');
			// if your network does not support SMTP over IPv6
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$this->ismailer->Port = 587;
			//Set the encryption system to use - ssl (deprecated) or tls
			$this->ismailer->SMTPSecure ='tls';
			//Whether to use SMTP authentication
			$this->ismailer->SMTPAuth = true; //true;
			//Username to use for SMTP authentication - use full email address for gmail
			$this->ismailer->Username = Mailer::USERNAME;//"username@gmail.com";
			//Password to use for SMTP authentication
			$this->ismailer->Password = Mailer::PASSWORD;//"yourpassword";
			//Set who the message is to be sent from
			$this->ismailer->setFrom (Mailer::USERNAME , Mailer::NAME_FROM) ;//('from@example.com', 'First Last');
			//Set an alternative reply-to address
			//responder para tal pessoal $mail->addReplyTo('replyto@example.com', 'First Last');
			//Set who the message is to be sent to
			$this->ismailer->addAddress($toAddress, $toName);
			//$mail->addAddress('codely.vinicius.silva@gmail.com', 'Vinicius Souza');
			//$mail->addAddress('silvas.vinicius936@gmail.com', 'Vinicius Souza');
			//Set the subject line
			$this->ismailer->Subject = $subject;//'Teste a classe PHPMailer com gmail'; //Assunto
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$this->ismailer->msgHTML ($html); //(file_get_contents('contetes.html'), __DIR__);
			//Replace the plain text body with one created manually
			$this->ismailer->AltBody = 'Esse é um texto caso o HTML nao funcionar';//'This is a plain-text message body';
			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png'); // Aqui o é o Anexo 
			//send the message, check for errors

			$this->ismailer->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			
			/// Config send class 
			// if (!$this->mailer->send()) {
				// echo "Mailer Error: " . $mail->ErrorInfo;
			// } else {
				// echo "Message sent!";
				// //Section 2: IMAP
				// //Uncomment these to save your message in the 'Sent Mail' folder.
				// #if (save_mail($mail)) {
				// #    echo "Message saved!";
				// #}
			// }
						

			
			//Section 2: IMAP
			//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
			//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
			//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
			//be useful if you are trying to get this working on a non-Gmail IMAP server.
			// function save_mail($this->ismailer)
			// {
				// //You can change 'Sent Mail' to any other folder or tag
				// $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
				// //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
				// $imapStream = imap_open($path, Mailer::USERNAME, Mailer::PASSWORD);
				// $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
				// imap_close($imapStream);
				// return $result;
			// }

		}
		public function send(){
			return $this->ismailer->send();
			
		}
		
		
	}
	





?>