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

if(isset($_GET['num']))
{
 $num=$_GET['num'];
    $flag=0;
    for($i=$num;$i>1;$i--)
    {
        for($j=$i-1;$j>=2;$j--)
        {
            if($i%$j==0)
            {
                $flag=1;
            }
        }
        if($flag==0)
        {
            echo " ".$i." ";
        }
        $flag=0;
    }
}
?>
<!--Write your PHP Script here-->
</body>
</html>
