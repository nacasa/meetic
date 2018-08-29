<?php
class Connexion 
{
	private $pseudo;
	private $password;
	protected $db;

	public function __construct($pseudo,$password,$db,$user_model,$error="null")
	{
		$this->pseudo = htmlspecialchars($pseudo);
		$this->password = md5(htmlspecialchars($password));  // APPAREMENT PASSWORD_HASH est plus sur.... 
		$this->error = $error;

		if($this->verif($db,$user_model) == true)
		{
			header("Location: index.php?page=account");
		}
	}

	public function verif($db,$user_model)
	{
		$accountverif = $user_model->VerifConnexion($this->pseudo , $this->password , $db);
      	if(!empty($this->pseudo) && !empty($this->password))
      	{
			if ($accountverif==1) 
			{
				$userinfo = $user_model->InfoUser($this->pseudo , $this->password , $db);
				if($userinfo['confirmed'] == 1)
				{
					if($userinfo['visibility'] == 1)
					{
						$_SESSION['id'] = $userinfo['id'];
						$_SESSION['pseudo'] = $userinfo['pseudo'];
						$_SESSION['email'] = $userinfo['email'];
						$_SESSION['name'] = $userinfo['name'];
						$_SESSION['surname'] = $userinfo['surname'];
						$_SESSION['city'] = $userinfo['city'];
						$_SESSION['birthdate'] = $userinfo['birthdate'];
						return true;
					}
					else
					{
						$this->error = "Ce compte n'existe plus !";
						return false;
					}
				}
				else
				{
						$this->error = "Veuillez confirmer votre compte !";
						return false;
				}
	    	}
			else
			{
				$this->error = "Les données saisies (Pseudonyme ou Mot de passe) sont incorrectes ! " ;
				return false;
			}
		}
		else
		{
			$this->error = "Veuillez remplir tous les champs !";
		}
	}
}
?>
