<html>
	<head>
		<title>Contato!</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript">
			function validacaoEmail(field) {
				usuario = field.value.substring(0, field.value.indexOf("@"));
				dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);

				if ((usuario.length >=1) &&
				    (dominio.length >=3) && 
				    (usuario.search("@")==-1) && 
				    (dominio.search("@")==-1) &&
				    (usuario.search(" ")==-1) && 
				    (dominio.search(" ")==-1) &&
				    (dominio.search(".")!=-1) &&      
				    (dominio.indexOf(".") >=1)&& 
				    (dominio.lastIndexOf(".") < dominio.length - 1)) {
				document.getElementById("msgemail").innerHTML="E-mail válido";
					return true;
				}
				else{
					document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
					return false;
				}
			}

			function doSubmit() {
				return validacaoEmail(document.getElementById("email"));
			}
		</script>
		
	</head>
 
	<body>
		<?php 
			session_start();
			if(isset($_SESSION["NOME"])){
				echo "Vamos responder você logo, Sr(a). ".$_SESSION['NOME'];
			}
		?>
		<form name="form1" method="post"  onsubmit="return doSubmit();"  action="enviar.php">
			<p>Nome:
				<input name="nome" type="text" id="nome" required>
			</p>
			<p>Email:
				<input name="email" type="text" id="email" required onblur="validacaoEmail(this)"> 
				<label id="msgemail"></label>
			</p>
			<p>Assunto:
				<input name="assunto" type="text" id="assunto" required>
			</p>
			<p>Mensagem:<br>
				<textarea name="mensagem" wrap="VIRTUAL" id="mensagem" required></textarea>
			</p>
			<p>
				<input type="submit" name="Submit" value="Enviar">
				<input type="reset" name="Reset" value="Limpar">
			</p>
		</form>
	</body>
</html>
