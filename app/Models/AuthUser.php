<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthUser extends Model
{ 
    protected $DBGroup              = 'default';
    protected $primaryKey           = 'id';
    protected $table                = 'auth_users';
    protected $allowedFields        = ['username','email','phone','password','options'];
    protected $useTimestamps        = true;
    protected $validationRules      = [];
    protected $validationMessages   = [];
    //protected $returnType   = 'App\Entities\AuthUser';
    // public function transBegin(){
    //     return $this->db->transBegin();
    // }
    // public function transRollback(){
    //     return $this->db->transRollback();
    // }
    // public function transCommit(){
    //     return $this->db->transCommit();
    // }

    ///////////////////////////////////////////////////login start////////////////////////////////////////////////////////////////
    // $user = $this->userModel->authenticate($this->request->getPost());
    // if($user == false){
    //     $this->session->setFlashdata('failed','Unknown Email or Password..!!');
    //     return redirect('userlogin');
    // } else {
    //     $this->session->set('user',$user);
    //     $this->session->setFlashdata('message','LoggedIn Successfully');
    //     return redirect('modelTest');
    // }
    // public function authenticate($user)
    // {
    //     $email =  $user['email'];
    //     $password = $user['password'];
    //     $userCheck = $this->getWhere(['email'=>$email]);
    //     if($userCheck->resultID->num_rows > 0){
    //         $userData = $userCheck->getRow();
    //         $varify = password_verify($password,$userData->password);
    //         if($varify){
    //             //return $userData;
    //             return [
    //                 'user_Id'=>$userData->id,
    //                 'user_name'=>$userData->username,
    //                 'user_email'=>$userData->email,
    //                 'isLoggedIn'=> true
    //                 ];
    //         } else {
    //             return false;
    //         }
    //     } else {
    //         return false;
    //     }
    // }
    ///////////////////////////////////////////////////login end////////////////////////////////////////////////////////////////


}
  