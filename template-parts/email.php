<?php
/**
 * Created by PhpStorm.
 * User: vladt
 * Date: 09.08.2018
 * Time: 15:27
 */
?>

<?php
$post = (!empty($_POST)) ? true : false;
if($post) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $sub = $_POST["sub"];
    $message = $_POST['message'];
    $error = '';
    if(!$name) {$error .= 'Enter first name. ';}
    if(!$email) {$error .= 'Enter your email. ';}
    if(!$sub) {$error .= 'Enter subject massage. ';}
    if(!$message || strlen($message) < 1) {$error .= 'Введите сообщение. ';}
    if(!$error) {
        $address = "vlad.tereshchenko1999@gmail.com";
        $mes = "Имя: ".$name."\n\nТема: " .$sub."\n\nСообщение: ".$message."\n\n";
        $send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = UTF-8\r\n","From:$email, To:$address");
        if($send) {echo 'OK';}
    }
    else {echo '<div class="err">'.$error.'</div>';}
}
?>
