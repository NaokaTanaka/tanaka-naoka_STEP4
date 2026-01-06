<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>入力内容確認</title>
</head>
<body>
  <h1>入力内容確認</h1>
    <?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
      $name = $_POST["name"];
      $age = $_POST["age"];
      $tel = $_POST["tel"];
      $email = $_POST["email"];
      $address = $_POST["address"];
      $question = $_POST["question"];
      $selectedValue = $_POST["gender"];
      $gender = [
        "male" => "男性",
        "female" => "女性"
      ];
      $errors = [];

        if(!preg_match('/^[ぁ-んァ-ヶーー-龠a-zA-Z\s]+$/u', $name)) {
        $errors[] = "ひらがな、カタカナ、漢字、英字のみで入力してください。";
        }
        if (!is_numeric($age) || $age < 0 || $age > 150) {
        $errors[] = "0から150の半角数字で入力してください。";
        }
        if (!preg_match('/^[0-9-]+$/', $tel)) {
        $errors[] = "半角数字とハイフンのみで入力してください。";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "メールアドレスの形式で入力してください。";
        }
        if (!preg_match('/^[ぁ-んァ-ヶーー-龠a-zA-Z\s]+$/u', $address)) {
        $errors[] = "ひらがな、カタカナ、漢字、英字のみで入力してください。";
        }
        if (!preg_match('/\S/', $question)) {
        $errors[] = "質問を入力してください。";
        }

        if (count($errors) > 0) {
          foreach ($errors as $error) {
            echo "<p>{$error}</p>";
          }
        } else {
          // 入力内容表示
          echo "<p>名前:".htmlspecialchars($name,ENT_QUOTES,'UTF-8')."</p>";
          echo "<p>年齢:{$age}</p>";
          echo "<p>電話番号:{$tel}</p>";
          echo "<p>メールアドレス:".htmlspecialchars($email,ENT_QUOTES,'UTF-8')."</p>";
          echo "<p>住所:".htmlspecialchars($address,ENT_QUOTES,'UTF-8')."</p>";
          echo "<p>質問:".htmlspecialchars($question,ENT_QUOTES,'UTF-8')."</p>";
          $selectedLabel = $gender[$selectedValue];
          echo "<p>性別:".htmlspecialchars($selectedLabel,ENT_QUOTES,'UTF-8')."</p>";
        }
    }
    ?>
</body>
</html>