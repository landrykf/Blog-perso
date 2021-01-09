<?php 

namespace App\Controllers;
use App\Core\Form;

class UsersController extends Controller
{
    public function login(){
        $form = new Form;

        $form->startForm()
            
            ->addLabelFor('email', 'E-mail:')
            ->addInput('email','email',['class' => 'form-control','id' => 'email'])
            ->addLabelFor('pass','mot de passe :')
            ->addInput('password','password',['id' => 'pass','class' =>'form-control'])
            ->addButton('Me connecter', ['class' => 'btn btn-primary'])
            ->endForm();

            $this->render('users/login',['loginForm' => $form->create()]);
    }
}