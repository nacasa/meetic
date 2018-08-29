<!DOCTYPE html>
<html>
<head>
	<title>My-meetic</title>
	
	<link href="vues/style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body id="pageregister">
	<div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Inscription</div>
				<div id="divsing">
					<a id="signinlink" href="index.php?page=login">Connexion</a>
				</div>
			</div>  
			<div class="panel-body" >
				<?php
				if(isset($newMember->error) && $newMember->error != "null")
				{?>
					<div id="pseudo-alert" class="alert alert-danger col-sm-12"><?php echo $newMember->error ?></div><?php
				}
				if(isset($newMember->valid) && $newMember->valid != "null")
				{?>
					<div id="pseudo-alert" class="alert alert-danger col-sm-12" style="background-color: green; color: white;"><?php echo $newMember->valid ?></div><?php 
				}?>
				<form id="signupform" class="form-horizontal" method="post">
					<div class="form-group">
						<label id="surname" class="col-md-3 control-label">Nom</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="surname" placeholder="Nom">
						</div>

					</div>
					<div class="form-group">
						<label id="name" class="col-md-3 control-label">Prenom</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="name" placeholder="Prenom">
						</div>
					</div>

					<div class="form-group">
						<label id="gender" class="col-md-3 control-label">Sexe</label>
						<div class="col-md-9">
							<select name="gender">
								<option value="">Selectinnez un sexe</option>
								<option value="homme">Homme</option>
								<option value="femme">Femme</option>
								<option value="autre">Autre...</option>
							</select>
						</div>
					</div>					

					<div class="form-group">
						<label id="birthdate" class="col-md-3 control-label">Date de naissance</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="birthdate" placeholder="AAAA-MM-JJ" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
						</div>
					</div>

					<div class="form-group">
						<label id="email" class="col-md-3 control-label">Email</label>
						<div class="col-md-9">
							<input type="email" class="form-control" name="email" placeholder="Adresse email">
						</div>
					</div>

					<div class="form-group">
						<label id="city" class="col-md-3 control-label">Ville</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="city" placeholder="Nom de la ville">
						</div>
					</div>

					<div class="form-group">
						<label id="pseudo" class="col-md-3 control-label">pseudo</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="pseudo" placeholder="pseudo">
						</div>
					</div>           

					<div class="form-group">
						<label id="password" class="col-md-3 control-label">Mot de passe</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="password" placeholder="Mot de passe">
						</div>
					</div>
						
					<div class="form-group">
						<label id="repassword" class="col-md-3 control-label">Confirmation mot de passe</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="repassword" placeholder="Confirmation mot de passe">
						</div>
					</div>
					<div class="form-group">                   
						<div class="col-md-offset-3 col-md-9">
							<button id="btn-signup" type="submit" name="valid" class="btn btn-info"><i class="icon-hand-right"></i>S'inscrire</button>
						</div>
					</div>  
				</form>
			</div>
		</div>
	</div>
</body>