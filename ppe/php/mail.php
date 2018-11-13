<?php

		$mail = 'kvs.eric@gmail.com'; // Déclaration de l'adresse de destination.
		$passage_ligne = "\r\n";

		//=====Déclaration des messages au format texte et au format HTML.
		$message_txt = "Corps du mail";

		//=====Création de la boundary
		$boundary = "-----=".md5(rand());

		//=====Définition du sujet.
		$sujet = "Information ";
		$from = "noreply@gmail.com";

		//=====Création du header de l'e-mail.
		$header = "From: \"Commandes\"<noreply@gmail.com>" . $passage_ligne;
		$header.= "Reply-to: \"Commandes\" <noreply@gmail.com>" . $passage_ligne;
		$header.= "MIME-Version: 1.0" . $passage_ligne;
		$header.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;

		//=====Création du message.
		$message = $passage_ligne . "--" . $boundary . $passage_ligne;
		//=====Ajout du message au format texte.
		$message.= "Content-Type: text/plain; charset=\"utf-8\"" . $passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
		$message.= $passage_ligne . $message_txt . $passage_ligne;
		//==========
		$message.= $passage_ligne . "--" . $boundary . $passage_ligne;
		//=====Ajout du message au format HTML
		$message.= "Content-Type: text/html; charset=\"utf-8\"" . $passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
		$message.= $passage_ligne . $message_html . $passage_ligne;
		$message.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
		$message.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;


		//=====Envoi de l'e-mail.
		mail($mail,$sujet,$message,$header);
		/* if (mail($mail,$sujet,$message,$header))
		{
			if(!headers_sent()){
				header("Location: http://administration.cafe-joly.com/panel.php?id=dtl_orders&f=" . $fournisseur);
			}
			else {
  				?>
  				<script type="text/javascript">
  					document.location.href="Location: http://administration.cafe-joly.com/panel.php";
  				</script>
  				Redirecting to <a href="http://administration.cafe-joly.com/panel.php">http://administration.cafe-joly.com/</a>
  				<?php
  			}
		}
		else
			echo "Nous n'avons pu donné suite à votre demande. Veuillez réessayer plus tard."; */
?>
