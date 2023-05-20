<?php
require_once("../../conexao/conexao.php");


if(isset($_POST['id'])){
  $id = $_POST["id"];
  $DeleteOff = $Con->query("DELETE FROM push_notifications WHERE id_notifications='$id'");
}

$Notify = $Con->query("SELECT * FROM push_notifications");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:image" content="https://pbs.twimg.com/profile_images/564976605479460865/6ZgfAF6b.png">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.3.1/build/ol.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.3.1/css/ol.css">
  <link rel="icon" href="../../assets/img/whatsfood.png">
  <title>Notify</title>
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
  <link href="../../assets/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
  <link href="./style.css" rel="stylesheet">

</head>

<body>

  <div class="container">
    <div class="row topStyle">

      <div class="col-md-12 mb-6 baixoStyle">
        <h1 class="text-center">Notificações e Promoções</h1>
      </div>
      <div class="col-md-12 mb-6">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Codigo/envio</th>
                <th scope="col">Ação</th>
              </tr>
            </thead>
            <?php while ($row = $Notify->fetch_assoc()) {

            ?>
              <tbody>


                <tr>
                  <th scope="row"><?php echo $row['id_notifications'];  ?></th>
                  <td><?php echo $row['nome_cliente']; ?></td>
                  <td>


                    <button class="buttonElement" id="copy<?php echo $row['id_notifications']; ?>" onclick="copyBoard(this);">
                      <i class="fas fa-copy"></i>
                      <b> Copiar</b>
                      <input type="text" class="copy<?php echo $row['id_notifications']; ?> some">
                    </button>
                    <script type="text/javascript">
                      var valueCode = `<?php echo $row['chave_notification']; ?>`;
                      var inputCopy = document.getElementsByClassName("copy<?php echo $row['id_notifications']; ?>");
                     
                      inputCopy[0].value = valueCode;
                    </script>
                  </td>
                  <td>
                    <form action="" method="post">
                      <input type="text" name="id" value="<?php echo $row['id_notifications']; ?>" hidden>
                      <button class="buttonElement excluir">
                        <i class="fas fa-trash-alt"></i>
                        <b> Excluir</b>
                      </button>
                    </form>
                  </td>
                </tr>

              </tbody>
            <?php } ?>
          </table>


        </div>
      </div>
    </div>
    <div class="row topStyle">
      <div class="col-md-12 mb-3">
        <a href="https://web-push-codelab.glitch.me/">Acessar encaminhado de notificação e promoções</a>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../../assets/js/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="./main.js"></script>

</body>

</html>