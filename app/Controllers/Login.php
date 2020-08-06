<?php

/*
 * This file is part of the Rent Car project.
 * (c) Kahla Anouar <kahla.anoir@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Controllers;

use App\Models\LoginModel;
use Config\Services;

class Login extends BaseController
{
    public function index()
    {
        helper('form');
        $isLoged = (bool)$this->session->get('isLogin');

        if (false === $isLoged) {
            return view('view_login');
        }

        return redirect('admin/dashboard');
    }

    public function logout()
    {
        $this->session->destroy();
        $this->session->set('isLogin', false);

        return redirect('login');
    }

    //just to check if empty, if not then verify function call and verified hoile returns to this function
    public function checklogin()
    {
        $validation = Services::validation();
        // fields name, Boxes name to show, the checks functions
        $validation->setRules(
            [
                'email' => ['label' => 'Email', 'rules' => 'trim|required|valid_email'],
                'password' => ['label' => 'Password', 'rules' => ['required', [$this, 'verifylogin']]],
            ]
        );

        if (false === $validation->withRequest($this->request)->run()) {
            return view('view_login', ['validation' => $validation]);
        }

        return redirect('admin/dashboard');
    }

    public function verifylogin()
    {
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));
        $loginModel = new LoginModel();
        $result = $loginModel->login($email, $password);

        if ($result) {
            foreach ($result as $user) {
                $s = [];
                $s['id'] = $user->id;
                $s['first_name'] = $user->first_name;
                $s['last_name'] = $user->last_name;
                $s['email'] = $user->email;
                $s['position'] = $user->position;
                $s['type'] = $user->type;
                $s['isLogin'] = true;

                $this->session->set($s);
            }

            return true;
        }
        $this->validation->setError('email', 'Incorrect Login credentials');
        $this->validation->setError('password', 'Incorrect Login credentials');

        return false;
    }
}
