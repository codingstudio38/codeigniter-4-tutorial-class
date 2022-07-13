<?php 
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class LoggedIn implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		$session = Services::session();
		if($session->has('user')){
			$user = $session->get('user');
			if($user['isLoggedIn']){
				return true;
			} else {
				$session->setFlashdata('failed','You Are Not LoggedIn..!!');
		        return redirect('userlogin');
			}
		} else {
			$session->setFlashdata('failed','You Are Not LoggedIn..!!');
	        return redirect('userlogin');
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{

	}

	
}

?>