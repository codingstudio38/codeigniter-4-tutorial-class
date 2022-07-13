<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
//use App\Models\PostModel;
class APICotroller extends ResourceController
{
    protected $modelName = 'App\Models\PostModel';
    //protected $model = 'PostModel';
    protected $format = 'json'; 

    public function __construct()
    { 
        // code...
    }
    public function index()
    {
        $data = $this->model->findAll();
        if($data){
            $response = ['data'=>$data,'status'=>200,'massage'=>'Successful'];
            return $this->respond($response);
            exit;
        } else {
            $response = ['status'=>400,'massage'=>'No Records Found..'];
            return $this->respond($response);
            exit;
        }
    }
    public function create()
    {
        $Pdata = $this->request->getPost();
        if(count($Pdata) == "0") {
            $response = ['status'=>200,'massage'=>'Failed To Insert'];
            return $this->respond($response);
            exit;
        } else {
            $check = $this->model->insert($Pdata);
            if($check){
                $response = ['data'=>$check,'status'=>200,'massage'=>'Insert Successfully'];
                return $this->respond($response);
                exit;
            } else {
                $response = ['status'=>400,'massage'=>'Failed To Insert'];
                return $this->respond($response);
                exit;
            }
        }
    }
    public function show($id = NULL)
    {
        $Sdata=$this->model->find($id);
        if(!($Sdata == NULL)){
            $response = ['data'=>$Sdata,'status'=>200,'massage'=>'Successful'];
            return $this->respond($response);
            exit;
        } else {
            $response = ['status'=>400,'massage'=>'No Records Found..'];
            return $this->respond($response);
            exit;
        }
    }
    public function edit($id = NULL)
    { 
        $Edata=$this->model->find($id);
        if(!($Edata == NULL)){
            $response = ['data'=>$Edata,'status'=>200,'massage'=>'Successful'];
            return $this->respond($response);
            exit;
        } else {
            $response = ['status'=>400,'massage'=>'No Records Found..'];
            return $this->respond($response);
            exit;
        }
    }
    public function update($id = NULL)
    {
        $Udata=$this->model->find($id);
        if(!($Udata == NULL)){
           $Jsondata = $this->request->getJson();
           if(!$Uresponse= $this->model->update($id,$Jsondata)){
                $response = ['status'=>400,'massage'=>'Failed To Update'];
                return $this->fail($response);
                exit;
            } else {
                $response = ['data'=>$Uresponse,'status'=>200,'massage'=>'Update Successfully'];
                return $this->respondUpdated($response);
                exit;
           }
        } else {
            $response = ['status'=>400,'massage'=>'Not Found..'];
            return $this->respond($response);
            exit;
        }
    }
    public function delete($id = NULL)
    {
        $Ddata=$this->model->find($id); 
        if(!($Ddata == NULL)){
            $this->model->delete($id);
            $response = ['data'=>$Ddata,'status'=>200,'massage'=>'Delete Successfully'];
            return $this->respond($response);
            exit;
        } else {
            $response = ['status'=>400,'massage'=>'Failed To Delete'];
            return $this->respond($response);
            exit;
        }
    }
}
