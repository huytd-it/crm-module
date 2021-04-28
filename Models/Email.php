<?php

namespace Email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// include "phpmailer/class.phpmailer.php";
// include "phpmailer/class.smtp.php";

require 'vendor/autoload.php';
class Email
{
  public function sendMail()
  {
    $blacklist = array(
      'baove@lsts.edu.vn',
      'lan.ntp@huyndaingocan.com',
      'lecuong.ha@yahoo.com',
      'viet@duongai.vn',
      'thuynt@vstar.edu.vn',
      'hungvn1310@gmail.cpm',
      'solomon.nguyen@vashgroup.com',
      'hoaichaule15@gmail.com',
      'phanhuuhenpd@gmail.com',
      'tommykieu89@gmail.com',
      'sangthuanthien@gmailcom',
      'nguyen_thi_thu.huyen@se.com',
      'thanhhuyen@trihoi.com.vn',
      'afecsunny@gmail.com',
      'thuyanh.2.nguyen@gmail.com',
      'nguyen.c.thang@ocsvietnam.com',
      'huongvu_85@yahoo.com',
      'heiuqx@gmail.com',
      'ptubull@yahoo.com',
      'thuynga_77@gmail.com',
      'vantran_icmn@yahoo.com.vn',
      'hoanghuynhhcl3@gmail.com',
      'ptghoa@yahoo.com',
      'tkumnguyenpetroland@gmail.com',
      'chinguyenha@mobifone.vn',
      'vanvuvnpt@yahoo.com',
      'hongminhvnpt@yahoo.com',
      'buitrongdat@voasaigon.com',
      'ngocoil@gmail.com',
      'anhnguyengt@yahoo.com',
      'sonbinhuloc@yahoo.com.vn',
      'hljerryyeu@gmail.com',
      'loancinco@gmail.com',
      'lanlephuong@yahoo.com',
      'huongngocam@yahoo.com.vn',
      'luunguyetanh@yahoo.com',
      'baochau.tran@astraxeneca.com',
      'hoa_quanchi@yahoo.com',
      'hainv.n8y@gmail.com',
      'oubuy@yahoo.com',
      'hoa_quanchi@yahoo.com',
      'phuonghien1507@yahoo.com',
      'maiduong@mobifone.vn',
      'ptlan.amc.han@gmail.com',
      'phanminhmacien@yahoo.com.vn',
      'huyenphung@vinhphong.com',
      'khangdn@gmail.co',
      'hieponss@gmail.com',
      'sales@quanganhmachinery.com',
      'tranthuhien@novaland.com.vn',
      'mitto2000@hanmail.net',
      'tu.cam.pham@vn.ey.com',
      'psj23@hanmail.net',
      'khanhvi@upmv.com.vn'
    );

    $from_email = isset($_REQUEST['from_email']) ? $_REQUEST['from_email'] : 'noreply@lsts.edu.vn';
    $from_email_pass = 'lsts@123';
    $to_email = $_REQUEST['to_mail'];
    $to_name = isset($_REQUEST['to_name']) ? $_REQUEST['to_name'] : '';
    $subject = $_REQUEST['subject'];
    $content = $_REQUEST['content'];
    $from_name = isset($_REQUEST['from_name']) ? $_REQUEST['from_name'] : '🏫 Lawrence S.Ting School';
    $mail = $this->setMail($from_email, $from_email_pass, $to_email, $to_name, $subject, $content, $from_name);
  
    if (in_array($to_email, $blacklist)) {
      return false;
    } else {
      return $mail->send();
     
    }
  }
  function setMail($from_email, $from_email_pass, $to_email, $to_name, $subject, $content, $from_name = '')
  {
    $mail = new PHPMailer();
    $mail->setLanguage('vi', 'vendor/phpmailer/phpmailer/language/phpmailer.lang-vi.php');
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->Host = "smtp.gmail.com"; // specify main and backup server
    $mail->Port = 465; // set the port to use
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->SMTPSecure = 'ssl';
    $mail->Username = $from_email; // your SMTP username or your gmail username
    $mail->Password = $from_email_pass; // your SMTP password or your gmail password
    $mail->From = $from_email;
    $mail->FromName = $from_name; // Name to indicate where the email came from when the recepient received
    $mail->AddAddress($to_email, $to_name);
    $mail->AddReplyTo($from_email, $from_name);
    $mail->WordWrap = 50; // set word wrap
    $mail->IsHTML(true); // send as HTML
    $mail->Subject = $subject;
    $mail->Body = $content; //HTML Body
    return $mail;
  }
}
