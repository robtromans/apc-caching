<?php

if ($_GET['delete']) {
    apc_delete($_GET['username']);
    $confirm = 'Cache cleared.<br/>';
}

$user = $_GET['username'];
if (apc_exists($user)) {
    $data = apc_fetch($user);
    echo 'Name: '.$data['real_name'].'<br />';
    echo 'Address Line 1: '.$data['address1'].'<br />';
    echo 'Phone: '.$data['telephone'].'<br />';
}

echo $confirm;

echo '<a href="'.$_SERVER['PHP_SELF'].'?username='.$user.'&delete=1">delete</a><br />';
echo '<a href="index.php">Back</a>';

