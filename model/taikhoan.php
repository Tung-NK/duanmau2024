<?php
function insert_taikhoan($email, $user, $pass)
{
    $sql = "insert into acount(email,user,pass) values ('$email','$user','$pass')";
    pdo_execute($sql);
}

function check_user($email, $pass)
{
    $sql = "select * from acount where email='" . $email . "' AND  pass='" . $pass . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function update_taikhoan($id, $user, $pass, $email, $phone)
{
    $sql = "update acount set user='" . $user . "', pass='" . $pass . "', email='" . $email . "', phone='" . $phone . "' where id=" . $id;
    pdo_execute($sql);
}

function update_taikhoan_admin($id, $user, $pass, $email, $phone, $role)
{
    $sql = "update acount set user='" . $user . "', pass='" . $pass . "', email='" . $email . "', phone='" . $phone . "', role='" . $role . "' where id=" . $id;
    pdo_execute($sql);
}

function delete_taikhoan($id)
{
    $sql = "delete from acount where id=" . $id;
    pdo_execute($sql);
}

function load_taikhoan()
{
    $sql = "SELECT * FROM acount";
    $listtk = pdo_query($sql);
    return $listtk;
}

function loadone_taikhoan($id)
{
    $sql = "select * from acount where id=" . $id;
    $tk = pdo_query_one($sql);
    return $tk;
}

function sendMail($email)
{
    $sql = "SELECT * FROM acount WHERE email='$email'";
    $taikhoan = pdo_query_one($sql);

    if ($taikhoan != false) {
        sendMailPass($email, $taikhoan['user'], $taikhoan['pass']);
        return "Gửi Email thành công";
    } else {
        return "Email bạn nhập không có trong hệ thống";
    }
}

function sendMailPass($email, $username, $pass)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = '5fd6546604c0cb';                     //SMTP username
        $mail->Password = '0069dff886a902';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('duanmau@example.com', 'duanmau');
        $mail->addAddress($email, $username);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Người dùng quên mật khẩu';
        $mail->Body = 'Mật khẩu của bạn là: ' . $pass;


        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

