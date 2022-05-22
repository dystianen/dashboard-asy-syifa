<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
    private $roleSession;

    public function before(RequestInterface $request, $arguments = null)
    {
        // if (!session()->get('isLoggedIn')){
        //     return redirect()->to('/login');
        // }
        // !session()->get('isLoggedIn')

        $this->roleSession = session();
        if (session()->get('isLoggedIn')) {
            if ($this->roleSession->get("level") === "admin") {
                return redirect()->to('/admin/dashboard');
            } else if ($this->roleSession->get("level") === "employee") {
                return redirect()->to('/user');
            } else {
                dd(session());
            }
        } else {
            return redirect()->to('/login/err');
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}