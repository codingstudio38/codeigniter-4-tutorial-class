<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\PostModel;
class PdfController extends Controller
{ 
    private $userModel =null;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index() 
    {
        $query = $this->postModel->get();
        $result = $query->getResultArray();
        $datac=[
            'dataPdf'=> $result,
            'title'=> 'Generate PDF',
        ];
        return view('pdf_view',$datac);
    } 

    function htmlToPDF(){
        $query = $this->postModel->get();
        $result = $query->getResultArray();
        $datac=[
            'dataPdf'=> $result,
            'title'=> 'Generate PDF',
        ];
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('pdf_view',$datac));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

}