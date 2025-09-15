<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth/login');
        }

        // Check for role-based access if arguments are provided
        if (!empty($arguments)) {
            $sessionRole = session()->get('role');
            if (!in_array($sessionRole, $arguments)) {
                // If the user's role is not in the allowed list, redirect them
                // You might want to redirect to a generic access denied page
                // or back to their respective dashboard.
                if ($sessionRole === 'admin') {
                    return redirect()->to('/admin/dashboard');
                }
                if ($sessionRole === 'mahasiswa') {
                    return redirect()->to('/mahasiswa/dashboard');
                }
                // Fallback for any other roles or if dashboard is not suitable
                return redirect()->to('/');
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
