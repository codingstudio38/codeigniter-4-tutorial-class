<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthUser;
use App\Models\ProfileModel;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class User extends BaseController
{
    private $userModel =null;
    private $profileModel =null;
    private $login_userp =null;
    private $postModel =null;

    public function __construct(){
        $this->userModel = new AuthUser();
        $this->profileModel = new ProfileModel();
        $this->postModel = new PostModel();
        $this->login_userp = session()->get('user');
    }
    public function login()
    {
        $datac=[
            'title'=>'Login Page',
        ];
        echo view('template/header',$datac);
        echo view('login');
        echo view('template/footer');
    }
    public function register()
    {
        $datac=[
            'title'=>'Register Page',
        ];
        echo view('template/header',$datac);
        echo view('register');
        echo view('template/footer');
    }
    public function index()
    {
        //
    }
    public function new()
    {
        //
    }
    public function create()
    {
        $validtion_msg = $this->validate([
            'name'=>'required',
            'username'=>'required|min_length[6]|max_length[10]|is_unique[auth_users.username]',
            'email'=>'required|valid_email|min_length[6]|is_unique[auth_users.email]',
            'phone'=>'required|min_length[10]|is_unique[auth_users.phone]',
            'password'=>'required|min_length[8]',
            'con_password'=>'required|min_length[8]|matches[password]'
        ]);
        //return print_r($this->request->getMethod());
        if($validtion_msg == false){
            $error =$this->validation->getErrors(); 
            $this->session->setFlashdata('error_msg', $error);
            return redirect('register')->withInput();
        } else {
            $Auth_data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
                'options' => null,
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            $Auth_result = $this->userModel->save($Auth_data);
            if(!($Auth_result)){
                $this->session->setFlashdata('errors', 'Failed to upload user data..');
                return redirect('register');
            } else { 
                $data = [
                    'user_id' => $this->userModel->insertID(),
                    'name' => $this->request->getPost('name'),
                    'address' => null,
                    'city' => null,
                    'state' => null,
                    'country' => null,
                    'thumbnail' => null,
                ];
                $result = $this->profileModel->save($data);
                if($result){
                    $this->session->setFlashdata('message', 'User Account Create Successfully...');
                    return redirect()->to('userlogin');
                } else {
                    $this->session->setFlashdata('errors', 'Failed to upload profile data..');
                    return redirect('register');
                }
            }
        }
    }
 
    public function verify(){
        $throttler = Services::throttler();
        if ($throttler->check(md5($this->request->getIPAddress()), 10, MINUTE) === false){
            //return Services::response()->setStatusCode(429);
            $this->session->setFlashdata('failed','You Need to Send Request Every Second Only..!!');
            return redirect('userlogin');
        }
        if(!$this->validate([
            'email'=>'required|min_length[6]',
            'password'=>'required|min_length[8]'])){
            $validate=$this->validator->listErrors(); 
            $this->session->setFlashdata('failed', $validate);
            return redirect('userlogin')->withInput();
        } else {
            $email =  $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $query = $this->userModel->where(['email'=>$email])->orWhere(['username'=>$email])->get();
            $result = $query->getRow();
            if($result == NULL){
                $this->session->setFlashdata('failed','User Id Not Exists..!!');
                return redirect('userlogin');
            } else {
                $varify = password_verify($password,$result->password);
                if($varify == true){
                    $userData = [
                        'user_Id'=>$result->id,
                        'user_name'=>$result->username,
                        'user_email'=>$result->email,
                        'isLoggedIn'=> true
                        ];
                    $this->session->set('user',$userData);
                    $this->session->setFlashdata('message','LoggedIn Successfully');
                    return redirect('modelTest');    
                } else {
                    $this->session->setFlashdata('failed','LogIn Failed..!!');
                    return redirect('userlogin');
                }
            }
        }
    }

    public function logout()
    {
        $this->session->remove('user');
        $this->session->setFlashdata('message','LoggedOut Successfully');
        return redirect('userlogin');
    }

    public function profile()
    {
    $builder_user = $this->userModel
    ->select('auth_users.id as uId,auth_users.username as uname,auth_users.email as uemail,auth_users.phone as uphone,auth_users.updated_at as uupdated_at,profiles.id as pId,profiles.name as pname,profiles.address as paddress,profiles.city as pcity,profiles.state as pstate,profiles.country as pcountry,profiles.thumbnail as pthumbnail')
    ->join('profiles', 'auth_users.id = profiles.user_Id')
    ->find($this->login_userp['user_Id']);

    $builder = $this->userModel
    ->select('auth_users.id as userId,auth_users.username as username,auth_users.email as useremail,auth_users.phone as userphone,profiles.id as proId,profiles.name as proname,profiles.address as proaddress,profiles.city as procity,profiles.state as prostate,profiles.country as procountry,profiles.thumbnail as thum')
    ->join('profiles', 'auth_users.id = profiles.user_Id')
    ->get();
    $Alluser = $builder->getResultArray(); 

    $counter = $this->userModel->select('COUNT(auth_users.id) as total')->first();
    $data=[
        'title'=>'Profile Page',
        'user'=>$builder_user,
        'Alluser'=>$Alluser,
        'totalUser'=>$counter['total'],
    ];
    echo view('template/header',$data);
    echo view('profile');
    echo view('template/footer');
    }

    public function profiledelete($id) 
    { 
        $result= $this->userModel->delete($id);
        $profileD = $this->profileModel->where(['user_id'=>$id])->first();
        $result1=$this->profileModel->delete($profileD['id']);
        session()->remove('user');
        if($result1){
            session()->setFlashdata('failed', 'Profile Delete Successfully..!!'); 
            return redirect('userlogin');
        } else {
            session()->setFlashdata('failed', 'Delete Failed..'); 
            return redirect('profile');
        }
       
    }

    public function userUpdate()
    {
        $Uid = $this->request->getPost('Uid');
        $Pid = $this->request->getPost('Pid');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $city = $this->request->getPost('city');
        $country = $this->request->getPost('country');
        $address = $this->request->getPost('address');
        $state = $this->request->getPost('state');
        if(!$this->validate([
            'name'=>'required',
            'email'=>'required|valid_email|min_length[6]',
            'phone'=>'required|min_length[10]',
            'city'=>'required',
            'country'=>'required',
            'address'=>'required',
            'state'=>'required'])){
            $validated=$this->validator->listErrors(); 
            $this->session->setFlashdata('errors', $validated);
            return redirect('profile');
        } else {
            $dataUser = $this->userModel->find($Uid);
            $dataUser['email'] = $email;
            $dataUser['phone'] = $phone;
            $result1 = $this->userModel->save($dataUser);

            $dataProfile = $this->profileModel->find($Pid);
            $dataProfile['name'] = $name;
            $dataProfile['address'] = $address;
            $dataProfile['city'] = $city;
            $dataProfile['state'] = $state;
            $dataProfile['country'] = $country;
            $result2 = $this->profileModel->save($dataProfile);
            if($result2){
                session()->setFlashdata('message', 'Profile Update Successfully..'); 
                return redirect('profile');
            } else {
                session()->setFlashdata('errors', 'Failed to update..!!'); 
                return redirect('profile');
            }
        }
    }


    public function changePassword()
    { 
         if(!$this->validate([
            'Current_Password'=>'required|min_length[8]',
            'New_Password'=>'required|min_length[8]',
            'Confirm_Password'=>'required|min_length[8]|matches[New_Password]'])){

            $validate=$this->validator->listErrors(); 
            $this->session->setFlashdata('errors', $validate);
            return redirect('profile')->withInput();
        } else {
            $CEid = $this->request->getPost('CE_id');
            $CPassword = $this->request->getPost('Current_Password');
            $NPassword = $this->request->getPost('New_Password');
            $CONPassword = $this->request->getPost('Confirm_Password');

            $changePassword = $this->userModel->find($CEid);
            $Password_varify = password_verify($CPassword,$changePassword['password']);
                if($Password_varify == true){
                    $changePassword['password'] = password_hash($CONPassword, PASSWORD_DEFAULT);
                    $this->userModel->save($changePassword);
                    session()->setFlashdata('message', 'Password Has Been Changed.. Please Login..'); 
                    session()->remove('user');
                    return redirect('userlogin');
                } else {
                    session()->setFlashdata('errors', 'Current Password Not Match..!!'); 
                    return redirect('profile');
                }
        }
        
    }


    public function updateThumbnail()
    {
        $updateId = $this->request->getPost('thumbnail_id');
        $file = $this->request->getFile('thumbnail');
        $filename = 'test-'.$file->getClientName();
        $tempfile = $file->getTempName();
        $ext = $file->getClientExtension();
        $type = $file->getClientMimeType();
        $file->move('uploads/images', $filename);
        $editPhoto = $this->profileModel->find($updateId);
        $editPhoto['thumbnail'] = $filename;
        $result = $this->profileModel->save($editPhoto);
        if($result){
            session()->setFlashdata('message', 'Thumbnail Update Successfully..'); 
            return redirect('profile');
        }  else {
            session()->setFlashdata('errors', 'Failed to update..!!'); 
            return redirect('profile');
        }
    }

}

