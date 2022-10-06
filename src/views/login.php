<?php
//modelsフォルダの中のfileをrequire
foreach(glob("../models/*") as $filename) {
  require($filename);
}

session_name();
session_start();

unset($_SESSION['user_id']);

if(!empty($_POST)) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if(!empty($email) && !empty($password)){
  $condition = 'email = ?';
  $user = userSearch($db, $condition, $email);
  if(password_verify($password, $user[0]['password'])){
    $_SESSION['user_id'] = $user[0]['id'];
    $_SESSION['time'] = time(); 
    header("Location: top.php");
    exit();
  }else{
    $err_msg = "メールまたはパスワードが違います";
  }
}
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Login</title>
</head>

<body>
  <header class="h-16 flex justify-center">
    <div class="flex justify-between items-center w-full h-full mx-auto pl-2 pr-5 max-w-xl">
      <div class="h-full ml-5 flex items-center">
        <img src="../img/posse.jpg" alt="" class="h-2/3">
      </div>
    </div>
  </header>

  <main class="bg-gray-100 h-screen">
    <div class="w-full mx-auto px-5 max-w-xl relative pt-24">
      <h2 class="text-md font-bold mb-7">ログイン</h2>
      <form action="./login.php" method="POST">
        <input type="email" placeholder="メールアドレス" class="w-full p-4 text-sm mb-5" name="email">
        <input type="password" placeholder="パスワード" class="w-full p-4 text-sm mb-5" name="password">
        <?php
        if(!empty($err_msg)){
          echo $err_msg;
        }
        ?>
        <input type="submit" value="ログイン" class="cursor-pointer w-4/5 mx-auto block p-3 text-md text-white bg-blue-400 rounded-3xl bg-gradient-to-r from-blue-600 to-blue-300">
      </form>
      <div class="text-center text-xs text-gray-400 mt-6">
        <a href="pasReset.php">パスワードを忘れた方はこちら</a>
      </div>
    </div>
  </main>
</body>

</html>