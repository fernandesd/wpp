<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Link Para conversa WhatsApp</title>
    </head>
    <body>
        <form class="" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

            <input type="tel" name="fone" placeholder=" Código do país + DDD + Número do WhatsApp. Ex: 55 71 98888-8888" autofocus required size="55%"><br><br>

            <textarea name="msg" rows="3" cols="54" placeholder="#opcional - Insira uma mensagem legal..." maxlength="144" wrap=""></textarea><br><br>

            <button type="submit" name="enviar">Obter Link</button>

        </form>
    </body>
</html>

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

    echo "https://api.whatsapp.com/send?phone=$number&text=$text";
}




 ?>
