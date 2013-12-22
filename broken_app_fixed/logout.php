<?php
session_start();
session_destroy();
session_start();
$_session['success'] = 'Successfully logged out.';
header("Location: index.php");
