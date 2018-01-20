<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Crypt
{
        var $key = "";
        var $iv = NULL;
        var $iv_size = NULL;
    function __construct()
    {

    }
    function Crypt($key = "")
    {
        $this->init($key);
    }

 
        function init($key="")
        {
                
				
		//$this->key = ($key != "") ? $key : $this->key;
		 $this->key = $key."\0"."\0"."\0"."\0"."\0"."\0"."\0"."\0";
                $this->algorithm = MCRYPT_DES;
                $this->mode = MCRYPT_MODE_ECB;
 
                $this->iv_size = mcrypt_get_iv_size($this->algorithm, $this->mode);
                $this->iv = mcrypt_create_iv($this->iv_size, MCRYPT_RAND);
        }
 
        function encrypt($data)
        {       
                $size = mcrypt_get_block_size($this->algorithm, $this->mode);
                $data = $this->pkcs5_pad($data, $size);
                 $str = base64_encode(mcrypt_encrypt($this->algorithm, $this->key, $data, $this->mode, $this->iv)); die;
		return strtr($str,"+/=","-_~");
		 //return (mcrypt_encrypt($this->algorithm, $this->key, $data, $this->mode, $this->iv));
        }
 
        function decrypt($data)
        {
	       $data = strtr($data,"-_~","+/=");
               return $this->pkcs5_unpad(rtrim(mcrypt_decrypt($this->algorithm, $this->key, base64_decode($data), $this->mode, $this->iv)));
		//return $this->pkcs5_unpad(rtrim(mcrypt_decrypt($this->algorithm, $this->key, $data, $this->mode, $this->iv)));
        }
 
        function pkcs5_pad($text, $blocksize)
        {
                $pad = $blocksize - (strlen($text) % $blocksize);
                return $text . str_repeat(chr($pad), $pad);
        }
 
        function pkcs5_unpad($text)
        {
                $pad = ord($text{strlen($text)-1});
                if ($pad > strlen($text)) return false;
                if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;
                return substr($text, 0, -1 * $pad);
        }
       
	
}

	
?>
