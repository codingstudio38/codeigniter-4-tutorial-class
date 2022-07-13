<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
class Contact extends BaseController
{
    public function contact()
    {
        $dataC=[
            'title'=>"Contact Us",
            'c_f'=>[
                'form_open' =>form_open('/contactInser'),
                'email' =>form_input([
                    'type'=>'email',
                    'name'=>'email',
                    'Placeholder'=>'Email Id',
                    'class'=>'form-control',
                ]),
                'name' =>form_input([
                    'type'=>'text',
                    'name'=>'name',
                    'Placeholder'=>'Name',
                    'class'=>'form-control',
                ]),
                'file' =>form_input([
                    'type'=>'file',
                    'name'=>'photo',
                    'id'=>'photo',
                    'class'=>'custom-file-input',
                ]),
                'phone' =>form_input([
                    'type'=>'text',
                    'name'=>'phone',
                    'id'=>'phone',
                    'Placeholder'=>'Phone No',
                    'class'=>'form-control',
                ]),
                // 'massage' =>form_textarea([
                //     'name'=>'massage',
                //     'Placeholder'=>'Massage..',
                //     'class'=>'form-control',
                // ]),
                // 'submit' =>form_input([
                //     'type'=>'submit',
                //     'value'=>'Contact Us1',
                //     'name'=>'Contact Us1',
                //     'class'=>'btn',
                // ]),
                'form_close' =>form_close(),
            ],
        ];
        echo view('contact',$dataC);
    }

    public function contactFormInsert()
    {
        $email = \Config\Services::email();
        if($this->request->getMethod() == 'post'){
         //return var_dump($this->request->getPost());
        if(!$this->validate([
            'email'=>'required|valid_email',
            'name'=>'required',
            'massage'=>'required|min_length[10]',
        ])){
            $validate=$this->validator->listErrors();
            session()->setFlashdata('statusER', $validate); 
            return redirect('contact');
        } else {
            $email->setFrom($this->request->getPost('email'));
            $email->setTo('vidyut.star006@gmail.com');
            $email->setSubject($this->request->getPost('name'));
            $email->setMessage($this->request->getPost('massage'));
            $email->send();
        }
       }
    }

    public function contactInser()
    {
        $user = new UserModel();
        $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
                'photo' => "N/A",
            ];
        $result = $user->save($data);
        if($result){
                    $this->session->setFlashdata('statusER', 'Insert Successfully...');
                    return redirect()->to('contact');
            } else {
                $this->session->setFlashdata('statusER', 'Failed to Insert data..');
                return redirect('contact');
            }
    }


}
