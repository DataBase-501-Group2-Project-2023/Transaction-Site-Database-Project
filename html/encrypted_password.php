<?php

/**
 * Encrypts the password using md5() for PHP versions 5.3.6 and below.
 *
 * IMPORTANT: MD5 is considered insecure for password hashing. 
 * It is recommended to use more secure algorithms like bcrypt or Argon2.
 * This script is only provided for historical context.
 *
 * @param string $password The password to be encrypted.
 * @return string The encrypted password.
 */
function encryptPassword($password) {
    // Use md5 for encryption (not recommended for real-world security)
    return md5($password);
}
?>
