<?php
 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\ProfileModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  
class XlController extends BaseController
{
    private $profileModel =null;
    private $postModel =null;

    public function __construct(){
        $this->profileModel = new ProfileModel();
        $this->postModel = new PostModel();
    }
 
    public function xlfileupload()
    {
       $vali = $this->validate([
        'fileimport' => [
            'rules' => 'uploaded[fileimport]|ext_in[fileimport,xls,xlsx,csv]',
            'errors' => [
                'uploaded' => 'Please select a Excel File..',
                'ext_in' => 'Please select xls, xlsx, csv..'
                ]
           ]
       ]);
       if(!$vali){
        $error = $this->validation->getErrors();
        $this->session->setFlashdata('error_msg', $error);
        return redirect('modelTest');
       } else {
        $file_excel = $this->request->getFile('fileimport');
        $filename = $file_excel->getClientName();
        $filesize = $file_excel->getSize();
        $tempfile = $file_excel->getTempName();
        $ext = $file_excel->getClientExtension();
        $type = $file_excel->getClientMimeType();
        if($ext== 'xls'){
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls;
        } else if($ext== 'xlsx') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Csv;
        }
        $spreadsheet = $render->load($file_excel);
        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach($data as $key => $row){
                if($key == 0){
                    continue;
                }
                $title = $row[0];
                $content = $row[1];
                $thumbnail = $row[2];
                $category_id = $row[3];
                   $dataImp = [
                    'title' => $title,
                    'content' => $content,
                    'thumbnail' => $thumbnail,
                    'category_id' => $category_id
                ];
                $result = $this->postModel->save($dataImp); 
            }
            if($result){
                $this->session->setFlashdata('postSuccess', "Data Successfully Uploaded...");
                return redirect('modelTest');
            } else {
                $this->session->setFlashdata('postFailed', "'Failed to Upload..'");
                return redirect('modelTest');
            } 
        }
    }

    public function xlfileprofile()
    {
       $vali = $this->validate([
        'profileimport' => [
            'rules' => 'uploaded[profileimport]|ext_in[profileimport,xls,xlsx,csv]',
            'errors' => [
                'uploaded' => 'Please select a Excel File..',
                'ext_in' => 'Please select xls, xlsx, csv..'
                ]
           ]
       ]);
       if(!$vali){
        $error = $this->validation->getErrors();
        $this->session->setFlashdata('proFileerror', $error);
        return redirect('modelTest');
       } else {
        $excel_profile = $this->request->getFile('profileimport');
        $filename = $excel_profile->getClientName();
        $filesize = $excel_profile->getSize();
        $tempfile = $excel_profile->getTempName();
        $ext = $excel_profile->getClientExtension();
        $type = $excel_profile->getClientMimeType();
        if($ext== 'xls'){
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls;
        } else if($ext== 'xlsx') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Csv;
        }
        $spreadsheet = $render->load($excel_profile);
        $data = $spreadsheet->getActiveSheet()->toArray();
        $checkErrors = [];
        foreach($data as $key => $row){
            if($key == 0){
                continue;
            }
            $user_id = $row[0];
            $name = $row[1];
            $address = $row[2];
            $city = $row[3];
            $state = $row[4];
            $country = $row[5];
            $thumbnail = $row[6];
            $query = $this->profileModel->where('user_id',$user_id)->get();
            $checkData = $query->getResultArray(); 
            if(count($checkData) > 0 ){
                $checkErrors[] = $user_id." id already exist..!!<br>";
            } else {
               $dataImp = [
                'user_id' => $user_id,
                'name' => $name,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'country' => $country,
                'thumbnail' => null,
            ];
            $result = $this->profileModel->save($dataImp); 
            }
        }
        if(count($checkData) > 0 ){
            $this->session->setFlashdata('checkdataerror', $checkErrors);
            return redirect('modelTest');
        } else {
            if($result){
                $this->session->setFlashdata('prosuccess', "Profile Data Successfully Uploaded...");
                return redirect('modelTest');
            } else {
                $this->session->setFlashdata('profailed', "'Failed to upload profile data..'");
                return redirect('modelTest');
            } 
        }
       }
    }
    public function xlfileexport()
    {
        $data = $this->postModel->findAll();
        $file_name = "postexport.xlsx";
        $spreadsheet =  new Spreadsheet();
        $sheet =  $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1','Sl No');   
        $sheet->setCellValue('B1','Id');   
        $sheet->setCellValue('C1','Title'); 
        $sheet->setCellValue('D1','Content');
        $sheet->setCellValue('E1','Thumbnail');
        $count = 2;
        $i=1;
        foreach($data as $row){
            $sheet->setCellValue('A'.$count,$i++);  
            $sheet->setCellValue('B'.$count,$row['id']);  
            $sheet->setCellValue('C'.$count,$row['title']);  
            $sheet->setCellValue('D'.$count,$row['content']);
            $sheet->setCellValue('E'.$count,$row['thumbnail']);  
            $count++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($file_name);
        header("Content-Type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=".basename($file_name));
        header('Expires: 0');
        header('Content-Control: must-revalidae');
        header('Pragma: public');
        header('Content-Length:'.filesize($file_name));
        flush();
        readfile($file_name);
        exit;
    }

}