<?php

function greet($name, $color){
    echo "<p>Hi. My $name is My favourite color is $color.</p>";
}

greet('John', 'red');
greet('Jane', 'blue');
?>

<h1><?php bloginfo('name'); ?></h1>
<h2><?php bloginfo('description'); ?></h2>