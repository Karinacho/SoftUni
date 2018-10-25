<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Form</title>

</head>
<body>
<form>
    N: <input type="text" name="num" />
    <input type="submit" />

</form>
<?php
if(isset($_GET['num'])){
    $num=intval($_GET['num']);
    for($i=1;$i<=$num;$i++){
if($i%2===0){
    echo $i.PHP_EOL;
}
    }
}
?>

</body>
</html>
