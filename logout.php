<?php
session_start();
session_unset();
session_regenerate_id();
session_destroy();
echo "the session destroy";
header("Refresh: 3;URL=index.php");