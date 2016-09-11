<?php
include 'connection_database.php';
if ( !empty($_GET) ) {
   if(isset($_GET["id"])){
      $id = $_GET["id"];
      $result = DataBase::getInstance()->executeQuery("
         DELETE FROM formulario WHERE id='$id'
      ");
      if($result[0]){
         echo "<p style='color: green;'>
            Registro excluido com sucesso
         </p>";
      }else{
         echo "<p style='color: red;'>
            Falha ao excluir o registo. Mensagem retornada do banco: $result[1]
         </p>";
      }
   }
}
?>
<a href="list.php">
   <p>Voltar para a lista</p>
</a>
