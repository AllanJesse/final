<?php

$con = mysqli_connect('localhost', 'allan', 'allanjesse', 'final');
if(!$con){
    die("'QUERY FAILED' . mysqli_error($con)");
}
