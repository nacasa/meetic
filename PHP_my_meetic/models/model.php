<?php

Class model
{

	public function register($pseudo, $email,$password, $surname, $name, $birthdate, $gender, $city, $key, $db)
	{
		$req="INSERT INTO members(id, pseudo, email, password, surname, name, birthdate, gender, city, valid) VALUES ('','$pseudo', '$email','$password', '$surname', '$name', '$birthdate', '$gender', '$city', '$key')";
		$db->exec($req);
	}

	public function loginVerif($pseudo, $password, $db)
	{
		$requser = $db->prepare("SELECT * FROM members WHERE pseudo = ? AND password = ?");
		$requser->execute(array($pseudo, $mdp));
      	return $requser->rowCount();
	}

	public function InfoUser($pseudo, $password, $db)
	{
		$requser = $db->prepare("SELECT * FROM members WHERE pseudo = ? AND password = ?");
		$requser->execute(array($pseudo, $password));
      	return $requser->fetch();
	}

	public function NameModif($new_name, $db)
	{
		$this->new_name = htmlspecialchars($new_name);
		$query_modif_name ="UPDATE members SET name ='".$new_name."' WHERE id ='".$_SESSION['id']."'";
    	$db->exec($query_modif_name);
	}

	public function surnameModif($new_surname, $db)
	{
		$this->new_surname = htmlspecialchars($new_surname);
	    $query_modif_surname ="UPDATE members SET surname ='".$new_surname."' WHERE id ='".$_SESSION['id']."'";
	    $db->exec($query_modif_surname);
	}

	public function birthdateModif($new_date, $db)
	{
		$this->new_birthdate = htmlspecialchars($new_birthdate);
    	$query_modif_birthdate = "UPDATE members SET birthdate ='".$new_birthdate."' WHERE id ='".$_SESSION['id']."'";
	    $db->exec($query_modif_birthdate);
	}

	
	public function PasswordModif($new_password, $db)
	{
		$this->new_password = md5(htmlspecialchars($new_password));
        $query_modif_password = "UPDATE members SET password ='".$new_password."' WHERE id ='".$_SESSION['id']."'";
        $db->exec($query_modif_password);
	}

	public function MembreSearch($search_member, $db)
	{
		$this->search_member = htmlspecialchars($search_member);
		$query_info = "SELECT * FROM members WHERE pseudo ='".$_POST['user_search']."'";
	    $query_info_member = $db->query($query_info);
	    return $info_member = $query_info_member->fetch();
	}

	public function InfoPerso($db)
	{
		$requete_info = "SELECT * FROM members WHERE pseudo ='".$_SESSION['pseudo']."'";
	    $query_info_member = $db->query($query_info);
	    return $info_member = $query_info_member->fetch();
	}

	public function CityModif($new_city, $db)
	{
		$this->new_city = htmlspecialchars($new_city);
	    $query_modif_city ="UPDATE members SET city ='".$new_city."' WHERE id ='".$_SESSION['id']."'";
	    $db->exec($query_modif_city);
	}

	public function EmailModif($new_email, $db)
	{
		$this->new_email = htmlspecialchars($new_email);
	    $query_modif_email ="UPDATE members SET email ='".$new_email."' WHERE id ='".$_SESSION['id']."'";
	    $db->exec($query_modif_email);
	}

	public function ProfilSearch($r_gender,$r_city,$db)
	{
		$this->r_gender = htmlspecialchars($r_gender);
		$this->r_city = htmlspecialchars($r_city);
		$profil_search = "SELECT * FROM members WHERE gender = '".$r_gender."'";
		if(!empty($r_city))
		{
			$profil_search .= " AND members.city LIKE '%$r_city%'";
		}
	    $query_profil_search = $db->query($profil_search);
	    return $profil_search = $query_profil_search->fetchAll();
	}

	public function ProfilSelection($id,$db)
	{
		$query = $db->prepare("SELECT * from members WHERE id = ?");
		$query->execute(array($id));
		return $query->fetch();
	}

	public function DeleteAccount($db)
	{
		$req_ban = "UPDATE members set visibility = '0' WHERE id = '".$_SESSION['id']."'";
		$db->exec($req_ban);
	}

	public function VerifKey($pseudo, $key, $db)
	{
		$requser = $db->prepare("SELECT * FROM members WHERE pseudo = ? AND confirmkey = ?");
		$requser->execute(array($pseudo, $key));
      	return $requser->rowCount();
	}

	public function RecupKey($pseudo, $key, $db)
	{
		$requser = $db->prepare("SELECT * FROM members WHERE pseudo = ? AND confirmkey = ?");
		$requser->execute(array($pseudo, $key));
      	return $requser->fetch();
	}

	public function ConfirmKey($pseudo, $key, $db)
	{
		$requser = $db->prepare("UPDATE members SET confirmed = '1' WHERE pseudo = ?");
		$requser->execute(array($pseudo));
	}
}

$user_model = new model;
?>