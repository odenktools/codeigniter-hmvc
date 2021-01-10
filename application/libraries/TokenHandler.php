<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

require APPPATH . 'libraries/JWT.php';

class TokenHandler
{
    //////////The function generate token/////////////
    private $key = "academy-lms-api-token-handler";

    public function GenerateToken($data)
    {
        $jwt = JWT::encode($data, $this->key);
        return $jwt;
    }

    //////This function decode the token////////////////////
    public function DecodeToken($token)
    {
        $decoded = JWT::decode($token, $this->key, array('HS256'));
        $decodedData = (array)$decoded;
        return $decodedData;
    }
}

?>
