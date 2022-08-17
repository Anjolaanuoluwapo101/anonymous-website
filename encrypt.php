<?php 
// Store the cipher method
$ciphering = "AES-128-CTR";
  
// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
  
// Non-NULL Initialization Vector for encryption
$encryption_iv = '3002200330022003';
  
// Store the encryption key
$encryption_key = "secretville";
  
// Use openssl_encrypt() function to encrypt the data
$encryped = openssl_encrypt($username, $ciphering,$encryption_key, $options, $encryption_iv);

?>