<?php 
namespace App\Illuminate;

class Helpers{

    //render token
    public function token(){
        $token = bin2hex(random_bytes(16));
         return ["token" => $token];
      }
    //password hasher
      public function hash($password){
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        return $hashed;
      }

      public function registerRequestBinder($request ,$hashedPassword, $token){
        $request =  $request + $token;
        $request['password'] = $hashedPassword;
        return $request;
      }
      public function congesRequestBinder($request ,$userId){
        $request =  $request + ["user_id" => $userId];
        $request =  $request + ["status" => "non traité"];
        $request =  $request +  ["justificatif" => null];
        return $request;
      }
    public function passwordVerify($password, $hash)
    {
        if (password_verify($password , $hash)) {
           return true;
        } else {
           return false;
        }
    }

}