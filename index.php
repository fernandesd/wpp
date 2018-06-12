<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Meu link WhatsApp</title>
<link rel="stylesheet" href="assets/css/gaintime.min.css" media ="screen" title="no title">
<link rel="stylesheet" href="assets/css/style.css" media ="screen" title="no title">
</head>
    <body>
      <div class="formulario content-align center">
        <form class="gt-form center table-cell full" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="input">
                <input class="padding" type="tel" name="fone" placeholder=" Código do país + DDD + Número do WhatsApp. Ex: 55 71 98888-8888" autofocus required size="55%">
            </div>

            <div class="input">
                <textarea class="padding" name="msg" rows="3" cols="54" placeholder="#opcional - Insira uma mensagem legal..." maxlength="144" wrap=""></textarea>
            </div>

            <button class="btn danger lg right" type="submit" name="enviar" data-modal="Modal">Obter Link</button>

        </form>
        </div>


<?php

if(isset($_POST['enviar']))
{

    $number = $_POST['fone'];
    $text = $_POST['msg'];


    if(strrpos($number ,'-'))
    {
        $a1 = explode('-', $number);
        $semTraco = implode('', $a1);

        $a2 = explode('+', $semTraco);
        $separado = implode('', $a2);
    }
    else
    {
        $separado = $number;
    }
        $b1 = explode(' ', $text);
        $textfinal = implode('%20', $b1);

    //Tratamento dos dados
    $text = filter_var($textfinal, FILTER_SANITIZE_SPECIAL_CHARS);

    $number = filter_var($separado, FILTER_SANITIZE_NUMBER_INT);

    //echo "https://api.whatsapp.com/send?phone=$number&text=$text";
}
 ?>

<div class="gt-modal">
<!-- Aqui você vai atribuir um id ao seu modal -->
  <div id="Modal" class="modal">
<!-- Este botão é responsável por fechar o modal -->
  <button class="modal-close" type="button">×</button>
    <div class="modal-body">
<!-- Digite o conteúdo do modal aqui -->
  <?php echo "https://api.whatsapp.com/send?phone=$number&text=$text"; ?>
    </div>
  </div>
</div>
<script type="text/javascript" src="assets/js/gaintime.min.js"></script>

</body>
</html>
