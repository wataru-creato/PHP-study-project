<?php

session_start();

$error="";

if(isset($_POST["login"])){
    $user=trim($_POST["user"]);
    $pass=trim($_POST["pass"]);

    $users=file("DBtext.txt",FILE_IGNORE_NEW_LINES);

    $user_success=false;
    foreach($users as $line){
        list($u,$p)=explode(",",$line);

        if($user===$u && $pass===$p){
             $user_success=true;
             break;
        }

    }

    if($user_success){
        $_SESSION["login_user"]=$user;
        header("Location:bbs.php");
        exit;
    }else{
    $error="入力情報が違います";
    }
}


?>

<?php 
$message="";

$file="DBtext.txt";

if(isset($_POST["register"])){
    $newUser=trim($_POST["newUser"]);
    $newPass=trim($_POST["newPass"]);
    
    if($newUser!=="" && $newPass!==""){
        $info="{$newUser},{$newPass}\n";
        file_put_contents($file,$info,FILE_APPEND);
        $message="新規登録しました！";
    }else{
        $message="ユーザ名とパスワードを登録してください";
    }
}

?>
<h2>ログインページ</h2>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    <input type="text" name="user"><br>
    <input type="password" name="pass"><br>
    <input type="submit" name="login" value="ログイン">
</form>

<h2>新規作成</h2>
<?php if (!empty($message)) echo "<p style='color:red;'>$message</p>"; ?>
<form method="POST">
    <input type="text" name="newUser"><br>
    <input type="password" name="newPass"><br>
    <input type="submit" name="register" value="登録">
</form>
