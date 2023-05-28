<?php

session_start();
echo "Taking you out, hold on...";
session_unset();
session_destroy();
header("Location: /forum");
?>