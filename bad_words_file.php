<?php
$file = 'bad_words.txt';
$words = '';

if(file_exists($file)){
    $words = file_get_contents($file);
}
if (isset($_POST['words'])){
    $words = $_POST['words'];
    file_put_contents($file, $words);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <div>
        <textarea name="words" id="" cols="30" rows="10"><?=$words?></textarea>
    </div>
    <div>
        <input type="submit" value="Save">
    </div>
</form>
</body>
</html>