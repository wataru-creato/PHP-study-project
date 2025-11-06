<?php
session_start();

if (!isset($_SESSION["login_user"])) {
    header("Location: login.php");
    exit;
}
?>

<h2>ようこそ、<?= htmlspecialchars($_SESSION["login_user"]) ?> さん！</h2>
<p>ログイン中です。</p>

<form method="post" action="logout.php">
  <input type="submit" value="ログアウト">
</form>
