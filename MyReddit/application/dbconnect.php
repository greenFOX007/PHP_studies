<?php

$connect = mysqli_connect('localhost', 'root', '', 'myReddit');

if(!$connect){
    die('Error connect to DB');
}