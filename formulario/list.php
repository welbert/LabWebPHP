<?php
include 'connection_database.php';
if ( !empty($_GET) ) {
   if(isset($_GET["id"])){
      $result = DataBase::getInstance()->executeQuerySelect("
               SELECT id,nome,email,assunto,mensagem
               FROM formulario
               WHERE id = ".$_GET["id"]."
               LIMIT 1
               ");
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
             $id = $row["id"];
             $nome = $row["nome"];
             $email = $row["email"];
             $assunto = $row["assunto"];
             $mensagem = $row["mensagem"];

             echo "Nome - $nome <br />
             Email - $email <br />
             Assunto - $assunto <br />
             Mensagem - $mensagem <br />
             ";
          }
      }else{
         echo "<p style='color: orange;'>
            Nenhum registro retornado para esse identificador.
         </p>";
      }
   }
}else{
   echo "<table border='1' width='100%'>
   <tr>
   <td>Id</td>
   <td>Nome</td>
   <td>Email</td>
   <td>Assunto</td>
   <td>Visualizar</td>
   <td>Editar</td>
   <td>Excluir</td>
   </tr></td>";
   $result = DataBase::getInstance()->executeQuerySelect("
            SELECT id,nome,email,assunto,mensagem
            FROM formulario
            ");

   if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
         $id = $row["id"];
         $nome = $row["nome"];
         $email = $row["email"];
         $assunto = $row["assunto"];
         echo "
            <tr>
            <td>$id</a></td>
            <td>$nome</td>
            <td>$email</td>
            <td>$assunto</td>
            <td><a href='list.php?id=$id'>Visualizar</td>
            <td><a href='editar.php?id=$id'>Editar</td>
            <td><a href='excluir.php?id=$id'>Excluir</td>
            </tr></td>
         ";
      }
      echo "</table>";
   } else {
       echo "<p style='color: orange;'>
          Nenhum registro retornado.
       </p>";
   }
}
?>
<a href="list.php">
   <p>Voltar para a lista</p>
</a>
