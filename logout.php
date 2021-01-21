<?php

//logs the user out
//destroys sessions

session_start();
session_unset();
session_destroy();

header("location: index.html");

?>