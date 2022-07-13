<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthUser;
use App\Models\ProfileModel;
use App\Models\PostModel;
use App\Models\UserModel;

class MultiplesController extends BaseController
{
    private $userModel =null;
    private $profileModel =null;
    private $postModel =null;
    private $userModel1 =null;

    public function __construct()
    {
        $this->userModel = new AuthUser();
        $this->profileModel = new ProfileModel();
        $this->postModel = new PostModel();
        $this->userModel1 = new UserModel();
    }
    public function index()
    {
        $data = $this->postModel->orderBy('id', 'DESC')->paginate();
        $datac=[
            'data'=> $data,
            'pager' => $this->postModel->pager,
            'title'=> 'Upload Multiples',
        ];

        echo view('template/header',$datac);
        echo view('multiples');
        echo view('template/footer');
    }

    public function create()
    {
        //var_dump($this->request->getPost());exit;
        $allfiless = $this->request->getFiles('files');
        $title=$this->request->getPost('title');
        $content=$this->request->getPost('content');
        $categoryid=$this->request->getPost('categoryid');
        foreach($allfiless['files'] as $key => $file){
                $fileNews = $key."$".rand()."$".$file->getSize().".".$file->getClientExtension();
                $file->move('uploads/images',$fileNews);
                $thumNames[] = $fileNews;
        }
        for($i=0; $i<count($categoryid); $i++ ){
            $saveData = [
                'title' => $title[$i], 
                'content' => $content[$i],  
                'thumbnail' => $thumNames[$i],
                'category_id' => $categoryid[$i],   
            ];
            $result = $this->postModel->save($saveData);
        }
        if($result){
           session()->setFlashdata('massage', 'Data has been successfully Uploaded..'); 
            return redirect('multiple');
        } else {
           session()->setFlashdata('massage', 'Failed To Upload..'); 
            return redirect('multiple');
        }
    }
    public function deleteData()
    {
        $deleteIds =explode(",",$this->request->getPost('delete_ids'));
        $result = $this->postModel->whereIn('id',$deleteIds)->delete();
        if($result == true){
            session()->setFlashdata('massage', 'Data has been successfully Deleted..'); 
            return redirect('multiple');
        } else {
            session()->setFlashdata('massage', 'Failed To Delete..'); 
            return redirect('multiple');
        }
        
    }
    public function editdataview()
    {
        $deleteIds =explode(",",$this->request->getPost('edit_ids'));
        $query = $this->postModel->whereIn('id',$deleteIds)->get();
        $AllEditData = $query->getResultArray(); 
        $builder = $this->userModel->findAll();
        $datac=[
            'EditData'=> $AllEditData,
            'title'   => 'Edit Multiples',
            'AllUser' => $builder,
        ];
        echo view('template/header',$datac);
        echo view('editmultiples');
        echo view('template/footer');
        
    }
    public function multipleUpdate()
    {
        // $data = $this->request->getPost();
        // var_dump($data);exit;
        $title = $this->request->getPost('title');
        $update_id = $this->request->getPost('update_id');
        $content = $this->request->getPost('content');
        $categoryid = $this->request->getPost('categoryid');
        $thumbnail = $this->request->getPost('thumbnail');
        for($i=0; $i < count($update_id); $i++){
            $update = $this->postModel->find($update_id[$i]);
            $update['title'] = $title[$i];
            $update['content'] = $content[$i];
            $update['category_id'] = $categoryid[$i];
            $update['thumbnail'] = $thumbnail[$i];
            $result=$this->postModel->save($update);
        }
        // foreach($update_id as $key => $val){
        //         $update = $this->postModel->find($update_id[$key]);
        //         $update['title'] = $title[$key];
        //         $update['content'] = $content[$key];
        //         $update['category_id'] = $categoryid[$key];
        //         $update['thumbnail'] = $thumbnail[$key];
        //         result = $this->postModel->save($update);
        // }
        if($result == true){
            session()->setFlashdata('massage', 'Data has been successfully updated..'); 
            return redirect('multiple');
        } else {
            session()->setFlashdata('massage', 'Failed To Updated..'); 
            return redirect('multiple');
        }
    }
    public function fileUpload()
    {
        $allfiles = $this->request->getFiles('thumbnail');
        $ids = $this->request->getPost('slid');
            foreach($allfiles['thumbnail'] as $key => $file){
                    $fileNew = $key."$".rand()."$".$file->getSize().".".$file->getClientExtension();
                    $file->move('uploads/images',$fileNew);
                    $thumName[] = $fileNew;
            }
            foreach($ids as $key => $val){
                $update = $this->postModel->find($ids[$key]);
                $update['thumbnail'] = $thumName[$key];
                $result2 = $this->postModel->save($update);
            }
        if($result2 == true){
            session()->setFlashdata('massage', 'File Update successfully..'); 
            return redirect('multiple');
        } else {
            session()->setFlashdata('massage', 'Failed To Update..'); 
            return redirect('multiple');
        }
    } 
    public function photoUpload()
    {  
        $files = [];
        if($this->request->getMethod() == 'post'){
            $rules = [
                'photo' => 'uploaded[photo.0]|max_size[photo,1024]|ext_in[photo,png,jpg,gif]|is_image[photo]',
            ];
            if($this->validate($rules)){
            $files = $this->request->getFiles('photo');
            foreach($files['photo'] as $img){
                if($img->isValid() && !$img->hasMoved()){
                    if($img->move('uploads/img',$img->getClientName())){
                        echo "<p>".$img->getClientName()." Is moved..</p>";
                        // $allfiles[] = $img->getClientName();
                        // $daata = implode(",", $allfiles);
                    } else {
                        echo "<p>".$img->getErrorString()."</p>";
                    }
                }
            }
            } else {
               $data['validation'] = $this->validator;
               var_dump($data);exit;
            }
        }
    } 
    public function getSelectids()
    {
        $data = $this->userModel->findAll();
        $dataa = ['AllData'=>$data,'status'=>200,'massage'=>'Successful'];
        return $this->response->setJSON($dataa);
        exit;
    }
    public function getpostids()
    {
        $Pdata = $this->postModel->findAll();
        $dataa = ['postData'=>$Pdata,'status'=>200,'massage'=>'Successful'];
        return $this->response->setJSON($dataa);
        exit;
    }

} 
