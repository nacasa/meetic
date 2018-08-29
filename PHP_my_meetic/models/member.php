<?php
class Member
{
	private $name;
	private $surname;
	private $birthdate;
	private $email;
	private $pseudo;
	private $password;
	private $repassword;
	private $gender;
	private $city;
	protected $dbase;


	public function __construct($name, $surname,$birthdate,$email,$pseudo,$password, $gender, $city, $key,$db,$member_model,$error="null", $valid='null')
	{
		$this->name = htmlspecialchars($name);
		$this->surname = htmlspecialchars($surname);
		$this->birthdate = htmlspecialchars($birthdate);
		$this->email = htmlspecialchars($email); 
		$this->pseudo = htmlspecialchars($pseudo);
		$this->password = md5(htmlspecialchars($password));
		// $this->repassword = md5(htmlspecialchars($repassword));
		$this->error = $error;
		$this->valid = $valid;
		$this->gender = htmlspecialchars($gender);
		$this->city = htmlspecialchars($city);


		if($this->pseudo($db) && $this->password() && $this->email() && $this->gender() && $this->city() && $this->birthdate())
		{
			$key_lenght = 8;
			$key = "";
			for($i=1; $i < $key_lenght; $i++)
			{
				$key .= mt_rand(0,15);
			}

			$email = new email($this->email, $this->pseudo, $key);

			$member_model->register($this->name,$this->surname,$this->birthdate,$this->email,$this->pseudo,$this->password, $this->gender, $this->city, $key, $db);
			$this->valid = "Veuillez confirmer votre inscription avec le mail recu.";
		}
	}

	public function pseudo($db)
	{
		$lenght = strlen($this->pseudo);
		$set = $db->query("SELECT * FROM members WHERE pseudo = '$this->pseudo'");
		$Logset=$set->fetchAll();

		if(!empty($this->pseudo))
		{
			if($lenght<= 20 && empty($Logset))
			{
				return true;
			}
			else
			{
				$this->error = " Votre pseudo comprends plus de 20 caractéres et/ou est déjà pris par quelqu'un d'autre !";
				return false;
			}
		}
		else
		{
			$this->error = "Veuillez remplir tout les champs !";
			return false;
		}
	}
      
    public function password()
	{
		if(!empty($this->password))
		{
			if($this->password == $this->repassword)
			{
				return true;       
			}
			else
			{
				$this->error = "Vos mots de passes sont différent, veuillez les ressaisir à l'indentique.";
				return false;
			}
		}
		else
		{
			$this->error = "Veuillez remplir tout les champs !";
			return false;
		}       
	}

	public function birthdate()
	{
		if(!empty($this->birthdate))
		{
			$age = (time() - strtotime($this->birthdate)) / 3600 / 24 / 365;
			if(floor($age) >= 18)
			{
				return true;
			}
			else
			{
				$this->error = "Vous devez etre majeur pour vous inscrire sur ce site ! ";
				return false;
			}
		}
		else
		{
			$this->error = "Veuillez remplir tout les champs !";
			return false;
		}
	}
       
    public function email()
    {
    	if(!empty($this->email))
    	{
		    if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $this->email))
		    {
				return true;
		    }
		    else
		    {
		    	$this->error = 'L\'adresse ' . $this->email . ' n\'est pas valide !';
		    	return false;
		    }
		}
		else
		{
			$this->error = "Veuillez remplir tout les champs 3!";
			return false;
		}
    }

    public function gender()
    {
    	if(!empty($this->gender))
    	{
	    	if($this->gender == "homme" || $this->gender == "femme" || $this->gender == "autre")
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		$this->error = "Veuillez selectionner un sexe !";
				return false;
	    	}
	    }
	    else
	    {
	    	$this->error = "Veuillez remplir tout les champs !";
	    	return false;
	    }
    }

    public function city()
    {
    	$citylenght = strlen($this->city);
    	if(!empty($this->city))
    	{
	    	if($citylenght > 2)
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		$this->error = "Veuillez indiquez une ville !";
	    		return false;
	    	}
	    }
	    else
	    {
	    	$this->error = "Veuillez remplir tout les champs !";
	    	return false;
	    }
    }
}
?>
