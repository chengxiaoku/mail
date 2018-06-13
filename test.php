<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
$path =  dirname(__FILE__);

require $path.'/PHPMailer-master/src/PHPMailer.php';
require $path.'/PHPMailer-master/src/Exception.php';
require $path.'/PHPMailer-master/src/SMTP.php';

/**
 * @param $host 邮件服务器地址
 * @param $send 发送者邮箱
 * @param $sendpass 发送者密码 （QQ的使用smtp 密码）
 * @param $jieshou  接收者邮箱
 * @param $title    邮件标题
 * @param $content  邮件内容
 */
function send_mail($host,$send,$sendpass,$jieshou,$title,$content){
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        //$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        $mail->Host = $host;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        //$this->CharSet = 'UTF-8';
        $mail->Username = $send;                 // SMTP username
        $mail->Password = $sendpass;                           // SMTP password
        // $mail->Password = 'C710425820';                           // SMTP password
        //$mail->SMTPSecure = 'tls';                            // 加密方式
        //$mail->Port = 587;                                    // 端口

        //Recipients
        $mail->setFrom($send, 'clf');   //发送人 参数二姓名（可选）
        $mail->addAddress($jieshou, 'clfff');     // 收件人
        //$mail->addAddress('ellen@example.com');               // 如果还有收件人 就添加
        $mail->addReplyTo($send, 'qq');    //收件人回复的地址
        //$mail->addCC('cc@example.com'); 抄送
        //$mail->addBCC('bcc@example.com'); 密送

        //Attachments  附件
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content   邮件正文是否携带HTML 标签 有的话设置为true
        $mail->isHTML(true);                                  //
        $mail->Subject = $title;             //邮件主题
        $mail->Body    = $content;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  //不带html 标签的则用此方法

        return $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
//循环轮询进行发送
/**
 * 发送邮箱
 */
$obj = mysqli_connect('localhost','root','root','datas');

$num = 2;
$page = 1;
while(true){
    $arr = [];
    $tr = false;
    $start = ($page-1)*$num;
    $sql = "select * from task_list where status = 0 ORDER BY task_id ASC limit $start,$num";

    $res = $obj->query($sql);

    while($row = mysqli_fetch_assoc($res)){
        $tr = true;
        $arr[] = $row['user_email'];
    }
    if(!$tr){
        break;
    }
    foreach ($arr as $key => $val){
        $t = send_mail('smtp.qq.com','710425820@qq.com','nbhhxxjckrsybehj',$val,'这是测试题目','<b>这是一封测试邮件</b>');
        if($t){
            $sql = "UPDATE task_list SET status = 1 WHERE user_email='$val'";
            $res = $obj->query($sql);
        }
        echo 'OK'."<br/>";
        //sleep(1);
    }
    if($page == 0){
        $page += 2;
    }else{
        $page ++;
    }

}


