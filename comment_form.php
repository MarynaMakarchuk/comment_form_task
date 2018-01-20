
<?php
define('FILE_NAME', 'info.txt');

$allComments = [];
if(file_exists(FILE_NAME)) {
    $oldSerializedComments = file_get_contents(FILE_NAME);
    $allComments = unserialize($oldSerializedComments);
}

$comment = [];
if(isset($_POST['username'])){
    $comment['username'] = $_POST['username'];
}
if(isset($_POST['comment'])){
    $comment['comment'] = $_POST['comment'];
}
if ((isset($_POST['username'])) and (isset($_POST['comment']))){
    $allComments[] = $comment;
}

$serializedComments = serialize($allComments);
file_put_contents(FILE_NAME, $serializedComments);


function changeWards($str){
    $badWords = file_get_contents('bad_words.txt');
     $badWords = explode(',', $badWords);
    foreach ($badWords as $i=> $badWord ){
        $badWords[$i] = trim($badWord);
    }
    return htmlspecialchars(str_ireplace($badWords, "***", $str));
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='style_for_comment_form.css' rel='stylesheet' type='text/css'>
    <title>Document</title>
</head>
<body>
<div class="form_box">
    <div class="form_field">
<form action="" method="post">
        <div class="form_name">
            <input class="username_line" type="text" name="username" id="username" placeholder="Enter your name">
        </div>
        <div class="comments_name">
            <textarea class="comment_line" name="comment" id="comment" cols="51" rows="6" placeholder="Enter your comments"></textarea>
        </div>
        <div class="button_name">
            <input class="button_line" type="submit" value="Submit">
        </div>

</form>
</div>

<div class="comments_field">
    <?php foreach ($allComments as $comment){
        echo '
    <div class="comments">
    <div class="username">
             <span>Name:</span>' ." ".changeWards($comment['username']).'
    </div>
    <div class="comment">
            <span>Comments:</span>' ." ".changeWards($comment['comment']).'
    </div>
     </div>';
    }?>
</div>
</div>
</body>
</html>