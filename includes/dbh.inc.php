<?php

$serverName="localhost";
$Username="root";
$Password="";
$Name="fitformula";

$conn = mysqli::__construct()($serverName, $Username, $Password, $Name);

if(!$conn)
{
  die("Connection failed: " . mysqli_construct_error());
}
