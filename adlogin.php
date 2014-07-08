<?php
$connect = ldap_connect("dc01.yelp.com");
if ($bind = ldap_bind($connect, $_POST['username'], $_POST['password'])) {
echo "You've successfully logged in";
} else {
echo "Sorry, your password is incorrect."
}
?>
