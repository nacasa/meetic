<!DOCTYPE html>
<html>
<head>
	<title>COMPTE</title>
	
	<link href="vues/style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body id="body_panel">
	<?php require_once 'header.php' ?>

	<div class="search_profile">
		<p>Rechercher un membre</p>
		<form method="post">
			<input class="user_search" type="text" name="user_search" value="<?php if(isset($_POST['user_search']))echo $_POST['user_search']; ?>">
			<input class="user_submit" type=image alt="logo d'une loupe" src="vues/images/loupe.png"/>
		</form>
		<form method="post" class="search_form">
			<P><select name="gender_search">
				<option value="">Recherchez par sexe</option>
				<option value="homme">Homme</option>
				<option value="femme">Femme</option>
				<option value="autre">Autre...</option>
			</select></P>
			<P><label id="city_search">Ville</label>
			<input type="text" name="city_search"></p>
			<p><input type="submit" name="search_partner_gender" value="Rechercher"></p>
		</form>
	</div>

	<h1 class="titreprofil"> PROFILE </h1>
	<div class="account">
		<div>
			<form action="index.php?page=account" method="POST">
				<table>
					<?php
					if(isset($result_profil))
					{
						foreach($result_profil as $sort_profil)
						{
							$age = (time() - strtotime($sort_profil['date_naissance'])) / 3600 / 24 / 365;
							?>
							<tr>
								<?php
								echo "<td>".$sort_profil['pseudo']."</td>";
								echo "<td>".$sort_profil['sexe']."</td>";
								echo "<td>".floor($age)."</td>";
								
								?>
								
									<td><button name="valid_search" class="buton_noir" value="<?php echo $trie_profil['id']?>">Voir profil</button></td>
							</tr>
							<?php
						}
					}
					?>
				</table>
			</form>
		</div>
		<?php if(isset($info_member) && $info_member == true){?>
		<form method="post">
			<table>
				<tr>
					<td>Pseudo</td>
					<td><?php echo $info_member['pseudo'];?></td>
				</tr>
				<tr>
					<td>Nom</td>
					<td>
						<?php echo $info_member['surname'];?>
					</td>
				</tr>
				<tr>
					<td>Prenom</td>
					<td>
						<?php echo $info_member['name'];?>
					</td>
				</tr>
				<tr>
					<td>Sexe</td>
					<td><?php echo $info_member['gender'];?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $info_member['email'] ?></td>
				</tr>
				<tr>
					<td>Ville</td>
					<td>
						<?php echo $info_member['city'];?>
					</td>
				</tr>
				<tr>
					<td>Date de naissance</td>
					<td>
						<?php echo $info_member['birthdate'];?>
					</td>
				</tr>

			</table>
		</form>

		<?php }
		elseif(isset($info_member) && $info_member == false)
		{?>
		<p>Aucun utilisateur avec ce pseudo</p>
		<?php } ?>
	</div>
</body>
</html>