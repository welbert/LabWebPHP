<html>
	<head>
		<title>Contato!</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		 <?php include 'connection_database.php'; ?>
		</head>

	<body>
		<?php
			if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
				session_start();
				$nome=$_POST["nome"];//aqui pega os dados que foram preenchidos la no formulário com o ID NOME
				$email=$_POST["email"];//aqui a mesma coisa, mas com o email
				$assunto=$_POST["assunto"];//aqui a mesma coisa, mas com o assunto
				$mensagem=$_POST["mensagem"];//aqui a mesma coisa, mas com o assunto

				$_SESSION["NOME"] = $nome;

				$result = DataBase::getInstance()->executeQueryLastId(
					"INSERT INTO formulario (nome,email,assunto,mensagem)".
					"VALUES ('".$nome."','".$email."','".$assunto."','".$mensagem."')"
				);
				if($result[0]>0)
					echo "<p style='color: green;'>
						Sua mensagem foi enviada com sucesso, Sr(a). ".$nome."!
					</p>";
				else
					echo "<p style='color: red;'>
					Falha no envio. Mensagem retornada do banco: $result[1]
					</p>";

			}
		?>
		<a href="index.php">
			<p>Voltar para o site</p>
		</a>
	</body>
</html>
