<?php

$myName = "Lena";

?>

<p>Hi, my name is <?php echo $myName; ?>.</p>

<?php

$names = array('Jane', 'John', 'Tom', 'Jerry');

$count = 1;

while($count < 100){
    echo "<li>$count</li>";
    $count++;
}
?>

<p>Hi, my name is <?php echo $names[3]?>.</p>
