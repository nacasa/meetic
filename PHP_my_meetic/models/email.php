<?php

class email
{
	function __construct($mail,$pseudo,$key)
	{
		$this->pseudo = htmlspecialchars($pseudo);
		$this->email = $mail;

		$this->SendMail($this->email,$this->pseudo,$key);
	}

	public function SendMail($mail,$pseudo,$key)
	{
		$header = "MIME-Version: 1.0\r\n";
		$header.= 'From:"My Meetic"<HereEmail>'."\n";
		$header.= 'Content-Type:text/html; charset="utf-8"'."\n";
		$header.= 'Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">
					<a href="http://localhost/PHP_my_meetic?page=confirmation&pseudo='.$pseudo.'&key='.$key.'"> Merci de validez votre inscription sur My Meetic </a>
				</div>
			</body>
		</html>			
		';	

		mail($this->email, "Validation d'inscription", $message, $header);
	}
}

?>