<?php
require_once("check_login.php");

$file="post.txt";
$user=$_SESSION["login_user"];

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $comment=trim($_POST["comment"]);

    if($comment!==""){
        $line="{$user}:{$comment}\n";
        file_put_contents($file,$line,FILE_APPEND);
    }
}

$posts=file_exists($file) ? file($file,FILE_IGNORE_NEW_LINES):[];






?>

<h2>掲示板</h2>
<ul>
<p>ログイン中ユーザ：<?php echo htmlspecialchars($user,ENT_QUOTES) ?></p>

<form method="POST">
    <textarea name="comment" row="3" cols="50"></textarea>
    <input type="submit" value="送信">
</form>

<?php foreach($posts as $p): ?>
    <li><?php echo htmlspecialchars($p,ENT_QUOTES); ?></li>
    <?php endforeach; ?>
</ul>

<p><a href="logout.php">ログアウト</a></p>