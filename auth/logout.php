<?php

session_start();
session_abort();
session_destroy();

echo "<script>window.location.href='http://localhost/online-voting/index.php'</script>";

?>