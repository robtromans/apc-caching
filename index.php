<?php
/**
 * Checks to see if the users settings array exists
 * in cache. If not then add them.
 * 
 * Done in netbeans which I do not normally use and I 
 * don't have the time to tweak formatting.
 */

$user = ($_GET['username']) ? $_GET['username'] : 'bob';



// Pretend table
$user_settings = array('real_name' => 'bob', 'address1' => '123 fake street', 'telephone' => '123459');

if (!apc_exists($user)) {
    $data = apc_fetch($user);
    
    if (!is_array($data)) {
        apc_store($user, $user_settings);
        echo 'cache saved<br /><br />';
    }
} else {
    echo 'cache not saved because it already exists in memory<br /><br />';
}


?>

<a href="apc_fetch.php?username=<?php echo $user; ?>">View saved cache</a>