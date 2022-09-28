<?php

/*
By Hackan, 2016
Posted at PHP.net
https://www.php.net/manual/en/function.uniqid.php

Minor changes made.
*/

/**
 * Returns a random hexadecimal string.
 *
 * @param int $length Length of random string
 *
 * @throws Exception  If the system does not have cryptographically secure random function
 * @author Hackan at PHP.net
 * @return str  Random hex string
 */
function random_id($length = 13) {
    
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($length / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $length);
}
