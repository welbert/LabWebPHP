<html>
	<head>
		<title>Editar Mensagem</title>
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
      include 'connection_database.php';
      if ( !empty($_GET) && isset($_GET["id"])) {
         $id = $_GET["id"];
         $result = DataBase::getInstance()->executeQuerySelect("
                  SELECT id,nome,email,assunto,mensagem
                  FROM formulario
                  WHERE id = ".$_GET["id"]."
                  LIMIT 1
                  ");
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
               $nome = $row["nome"];
               $email = $row["email"];
               $assunto = $row["assunto"];
               $mensagem = $row["mensagem"];
            }
         }
      }else{
         header("Location: list.php");
      }
      if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
         $id=$_POST["id"];
         $nome=$_POST["nome"];//aqui pega os dados que foram preenchidos la no formulário com o ID NOME
         $email=$_POST["email"];//aqui a mesma coisa, mas com o email
         $assunto=$_POST["assunto"];//aqui a mesma coisa, mas com o assunto
         $mensagem=$_POST["mensagem"];//aqui a mesma coisa, mas com o assunto

         $result = DataBase::getInstance()->executeQuery("
                  UPDATE formulario
                  set nome='$nome',
                  email='$email',
                  assunto='$assunto',
                  mensagem='$mensagem'
                  WHERE id = ".$_GET["id"]."
                  ");

         if($result[0]){
            echo "<p style='color: green;'>
               Registro atualizado com sucesso.
               </p>";
         }else{
            echo "<p style='color: red;'>
            Falha ao atualizar o registro. Mensagem retornado do banco: $result[1]
            </p>";
         }
      }
      ?>

		<form name="form1" method="post"  onsubmit="return doSubmit();">
         <input name="id" type="hidden" id="id" value="<?php echo $id?>"/>
			<p>Nome:
				<input name="nome" type="text" id="nome" required value="<?php echo $nome?>">
			</p>
			<p>Email:
				<input name="email" type="text" id="email" required onblur="validacaoEmail(this)"
             value="<?php echo $email?>">
				<label id="msgemail"></label>
			</p>
			<p>Assunto:
				<input name="assunto" type="text" id="assunto" required value="<?php echo $assunto?>">
			</p>
			<p>Mensagem:<br>
				<textarea name="mensagem" wrap="VIRTUAL" id="mensagem" required><?php echo $mensagem?></textarea>
			</p>
			<p>
				<input type="submit" name="Submit" value="Atualizar">
			</p>
		</form>
      <a href="list.php">
         <p>Voltar para a lista</p>
      </a>

	</body>
</html>
