<?php

return $conn = mysqli_connect('localhost','root','','vpm');

if (!$conn) {
  die("Connection Failed : " . mysqli_connect_error());
}
