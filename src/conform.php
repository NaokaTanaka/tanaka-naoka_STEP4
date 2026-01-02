<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>入力内容確認</h1>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $name = $_POST['name'];
      $age = $_POST['age'];
      $tel = $_POST['tel'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $question = $_POST['question'];
      $gender = $_POST['gender'];

      if(!preg_match('/^[ぁ-んァ-ヶーー-龠a-zA-Z\s]+$/u', $name)){
        echo "<p>ひらがな、カタカナ、漢字、英字のみで入力してください。</p>";
      } elseif (!preg_match('/^[0-9]{0,150}+$/', $age)){
        echo "<p>0から150の半角数字で入力してください。</p>";
      } elseif (!preg_match('/^[0-9-]+$/', $tel)){
        echo "<p>半角数字とハイフンのみで入力してください。</p>";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<p>メールアドレスの形式で入力してください。</p>";
      } elseif (!preg_match('/^[ぁ-んァ-ヶーー-龠a-zA-Z\s]+$/u', $address)){
        echo "<p>ひらがな、カタカナ、漢字、英字のみで入力してください。</p>";
      } else {
      echo "<p>入力内容を確認してください。</p>";
      }
    }
    ?>
</body>
</html>