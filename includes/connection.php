<?php

$con = mysqli_connect('localhost', 'allan', 'Ayman@2001.', 'final');
if(!$con){
    die("'QUERY FAILED' . mysqli_error($con)");
}
