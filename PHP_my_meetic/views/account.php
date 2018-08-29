<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	 
	<link href="vues/style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body id="body_panel">
	<?php require_once 'header.php' ?>
	<h1 class="titreaccount"> COMPTE </h1>
	<div class="account">
		<div class="account_pseudo">
			<form id="delete_compte" method="post">
				<input type="submit" name="account_account" value="Supprimer mon compte">
			</form>
		<div>
		<form method="post">
			<table>
				<tr>
					<td>Pseudo</td>
					<td><?php echo $info_member['pseudo'];?></td>
				</tr>
				<tr>
					<td>Nom</td>
					<td>
						<input type="text" name="surname" value="<?php echo $info_member['surname'] ?>">
					</td>
				</tr>
				<tr>
					<td>Prenom</td>
					<td>
						<input type="text" name="name" value="<?php echo $info_member['name'] ?>">
					</td>
				</tr>
				<tr>
					<td>Sexe</td>
					<td><?php echo $info_member['gender'];?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>
						<input type="text" name="email" value="<?php echo $info_member['email'] ?>">
					</td>
				</tr>
				<tr>
					<td>Ville</td>
					<td>
						<input type="text" name="city" value="<?php echo $info_member['city'] ?>">
					</td>
				</tr>
				<tr>
					<td>Date de naissance</td>
					<td>
						<input type="text" class="form-control" name="birthdate" placeholder="AAAA-MM-JJ" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo $info_member['birthdate']; ?>">
					</td>
				</tr>
				<tr>
					<td>Ancien mot de passe</td>
					<td><input type="password" class="form-control" name="former_password" placeholder="<?php if(isset($mismatch_password)){echo $mismatch_password;}else{echo 'Votre ancien mot de passe'; } ?>"></td>
				</tr>
				<tr>
					<td>Nouveau mot de passe</td>
					<td><input type="password" class="form-control" name="new_password" placeholder="Votre nouveau mot de passe"></td>
				</tr>
				<tr>
					<td>Confirmation du mot de passe</td>
					<td><input type="password" class="form-control" name="confirm_password" placeholder="<?php if(isset($mismatch_password)){echo $mismatch_password;}else{echo 'Confirmez votre mot de passe';} ?>"></td>
				</tr>
			</table>
			<input class="send_info" type="submit" name="submit_info" value="Envoyer" id="bouton_chg" />
		</form>
	</div>
</body>
</html>