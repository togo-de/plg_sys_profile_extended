<?php
  
  /**
   * @package     Joomla.Plugins
   * @subpackage  tomg_profile_extended
   *
   * @copyright   Copyright (C) 2002 - 2020 Thomas Goldbach, Inc. All rights reserved.
   * @license     GNU General Public License version 2 or later; see LICENSE.txt
   */
  
  defined('_JEXEC') or die;
  
  
  class tomg_profile_extended_helper {
	/** @var string $key Hex encoded binary key for encryption and decryption */
	public $key = '';
	/** @var string $encrypt_method Method to use for encryption */
	public $encrypt_method = 'AES-256-CBC';
	
	/**
	 * Construct our object and set encryption key, if exists.
	 *
	 * @param   string  $encryption_key  Users binary encryption key in HEX encoding
	 */
	
	public function setKey($encryption_key = false){
	  if($key = hex2bin($encryption_key))
	  {
		$this->key = $key;
	  }
	  else
	  {
		echo "Key in construct does not appear to be HEX-encoded...";
	  }
	}
	public function encrypt($string) {
	  $new_iv = bin2hex(random_bytes(openssl_cipher_iv_length($this->encrypt_method)));
	  if($encrypted = base64_encode(openssl_encrypt($string, $this->encrypt_method, $this->key, 0, $new_iv)))
	  {
		return $new_iv . ':' . $encrypted;
	  }
	  else
	  {
		return false;
	  }
	}
	
	public function decrypt($string) {
	  $parts     = explode(':', $string);
	  $iv        = $parts[0];
	  $encrypted = $parts[1];
	  if($decrypted = openssl_decrypt(base64_decode($encrypted), $this->encrypt_method, $this->key, 0, $iv))
	  {
		return $decrypted;
	  }
	  else
	  {
		return false;
	  }
	}
  }
