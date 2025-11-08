<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Users');
    }
    
    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        
        // Se já está logado, redireciona
        if ($this->request->getSession()->read('Auth.User')) {
            return $this->redirect('/');
        }
        
        if ($this->request->is('post')) {
            $login = $this->request->getData('login');
            $password = $this->request->getData('password');
            
            // Buscar usuário no banco
            $user = $this->Users->find()
                ->where(['login' => $login])
                ->first();
            
            if ($user && $password === $user->password) {
                // Salvar na sessão
                $this->request->getSession()->write('Auth.User', [
                    'id' => $user->id,
                    'login' => $user->login,
                    'name' => $user->name
                ]);
                return $this->redirect('/');
            }
        }
    }
    
    public function logout()
    {
        $this->request->getSession()->delete('Auth.User');
        return $this->redirect(['action' => 'login']);
    }
}