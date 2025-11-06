<?php
session_start(); // セッションを開始

// ログインしているかチェック
if (!isset($_SESSION["login_user"])) {
    // ログインしていなければ、login.php に戻す
    header("Location: login.php");
    exit;
}

// ログインしていれば以下を表示
$user = $_SESSION["login_user"];
?>

<h2>マイページ</h2>
<p>ようこそ、<?php echo htmlspecialchars($user, ENT_QUOTES, "UTF-8"); ?>さん！</p>

<form method="post" action="logout.php">
  <input type="submit" value="ログアウト">
</form>
