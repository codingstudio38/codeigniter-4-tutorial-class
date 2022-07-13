<?php

namespace App\Controllers;
use App\Models\ProfileModel;
use App\Models\AuthUser;
use App\Models\ForTest;
use App\Models\PostModel;

class Demo extends BaseController
{
    private $userModel =null;
    private $profileModel =null;
    private $postModel =null;
    public function __construct(){
        $this->userModel = new AuthUser();
        $this->profileModel = new ProfileModel();
        $this->postModel = new PostModel();
    }
    public function index()
    {
        //$query = $this->db->query("SELECT * From users");
        //$result = $query->getRow();
        //$result = $query->getResult();
        //$result = $query->getRowArray();
        //$result = $query->getResultArray();
        $query = $this->db->table('users')->get();

        //$query = $this->db->table('users')->where(['id'=>1])->get();
        //$query = $this->db->table('users')->where(['id'=>1])->orWhere(['name'=>'Bidyut'])->get();
        $result = $query->getResultArray();
        // echo $this->db->getLastQuery()."<br/>";
        //echo $this->db->table('users')->countAll()."<br/>";
        //print_r($result);exit;
        // $table = $this->db->table('users');
        // $query=$table->select('id, name, email, phone')->get();
        // $result = $query->getResultArray();
        //return var_dump(env('app.baseURL'));
        //var_dump($result);
        return view('demo_view',['data'=>$result]);
    }
    public function about($id='')  
    {
        echo "1st- ".$id."<br>";
        if($id!=null){
             $name = $id;
        } else {
            return redirect('modelTest');
        }
         echo "2nd- ".$name;exit;
       
        $dataA=[
            'name'=>$name,
            'title'=>"About",
        ];
        echo view('template/header',$dataA);
        echo view('about');
        echo view('template/footer');

    }
//INSER
    public function modeldataview()
    {
        // $query = $this->postModel->asObject()->findAll();
        // $query = $this->postModel->select('id,title,content,thumbnail')->where('id >','1')->first();
        // $query = $this->postModel->select('id,title,content,thumbnail')->where('id >','1')->orderBy('id','DESC')->first();
        // $query = $this->postModel->select('id,title,content,thumbnail')->where('id =','1')->orWhere('content=','vicky')->find();
        // $query = $this->postModel->select('id,title,content,thumbnail')->where('id =','1')->orWhere('content=','vicky')->find();
        // $query = $this->postModel->select('id,title,content,thumbnail')->like('content','idyut')->find();
        // echo "<pre>";
        // var_dump($query);exit;

        $query = $this->postModel->orderBy('id', 'DESC')->paginate(5);
        $datac=[
            'data'=> $query,
            'pager' => $this->postModel->pager,
            'title'=> 'Main Page',
        ]; 

        echo view('template/header',$datac);
        echo view('modalDataview');
        echo view('template/footer');
    }

    public function modeldataInsert() 
    {
        //return print_r($this->request->getMethod());
        if($this->request->getMethod() == 'post'){
            if(!$this->validate([
            'title'=>'required|min_length[5]',
            'content'=>'required|min_length[10]']))
            {
                $validate=$this->validator->listErrors();
                session()->setFlashdata('status', $validate); 
                return redirect('modelTest')->withInput();
            } else {
                $file = $this->request->getFile('thumb');
                $filename = rand()."$".$file->getSize().".".$file->getClientExtension();
                $tempfile = $file->getTempName();
                $ext = $file->getClientExtension();
                $type = $file->getClientMimeType();
                $file->move('uploads/images', $filename);
                $data = [
                    'title'=>$this->request->getPost('title'),
                    'content'=>$this->request->getPost('content'),
                    'thumbnail'=>$filename,
                ];
                $result = $this->postModel->save($data);

                

                // $editPhoto = $this->profileModel->find($this->postModel->insertID());
                // $editPhoto['thumbnail'] = $filename;
                // $result = $this->profileModel->save($editPhoto);
                if($result){
                    session()->setFlashdata('status', 'Data has been successfully Uploaded..'); 
                    return redirect('modelTest');
                } else {
                    session()->setFlashdata('status', 'Upload Failed..'); 
                    return redirect('modelTest');
                }
            }
        }
        //$result = $this->db->table('auth_users')->insert($data);
    }

    public function modeldataDelete($id) 
    { 
            $result= $this->postModel->delete($id);
            if($result){
                    session()->setFlashdata('statusAN', 'Record delete successfully..'); 
                    return redirect('modelTest');
                } else {
                    session()->setFlashdata('statusAN', 'Delete Failed..'); 
                    return redirect('modelTest');
                }
    }

    public function modelEditdataView($Eid) 
    { 
            $result = $this->postModel->where(['id'=>$Eid])->first();
            $dataE=[
            'datae'=>$result,
            'title'=>"Edit Page",
            ];
            echo view('template/header',$dataE);
            echo view('modalDataedit');
            echo view('template/footer');
    }

    public function modeldataUpdate() 
    { 
        //return print_r($this->request->getMethod());
            $Eid =  $this->request->getPost('UP_id');
            $title = $this->request->getPost('title');
            $content =  $this->request->getPost('content');
            $postD = $this->postModel->find($Eid);
            $postD['title'] = $title;
            $postD['content'] = $content;
            $result = $this->postModel->save($postD);
            if($result){
                session()->setFlashdata('statusAN', 'Record Updated successfully..'); 
                return redirect('modelTest');
            } else {
                session()->setFlashdata('statusAN', 'Updated Failed..'); 
                return redirect('modelTest');
            }
    }  

 
//csrf token- cross site resource forgery

}  
 
?> 
