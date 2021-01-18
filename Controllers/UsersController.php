<?php 

namespace App\Controllers;
use App\Core\Form;
use App\Models\Users;

class UsersController extends Controller
{

    //connexion des utilisteurs
    public function login(){


        //On vérifie si le formulaire est complet

        if(Form::validate($_POST,['email', 'password'])){
            //le formilaire est complet
            //On vas chercher dans la base de donnéés l'utilisateur avec l'email entré

            $usersModel = new Users;
            $userArray = $usersModel->findOneByEmail(strip_tags($_POST['email']));

            

            //si l'utilisateur n'existe pas
            if(!$userArray){
                // On envoie un message de session 
 
                $_SESSION['erreur'] = 'L\'adresse e-mail ou le mot de passe est incorrect';
                header('Location: /blog-koffi/public/users/login');
                exit;

            }

            //L'utilisateur existe
            $user = $usersModel->hydrate($userArray);
    
            //On vérifie si le mot de passe entrée est correct 
            if(password_verify($_POST['password'], $user->getPassword())){
                // Le mot de passe est bon 
                //On crée la session
                $user->setSession();
                var_dump($user);
                header('Location:/blog-koffi/public/main');

                exit;
            }else{
                //Mauvais mot de passe 
                $_SESSION['erreur'] = 'L\'adresse e-mail et/ou le mot de passe est incorrect';
                // var_dump($user);
                header('Location: /blog-koffi/public/users/login');

                exit;

            }
        }

        $form = new Form;

        $form->startForm()
            
            ->addLabelFor('email', 'E-mail:')
            ->addInput('email','email',['class' => 'form-control','id' => 'emailLogin'])
            ->addLabelFor('pass','mot de passe :')
            ->addInput('password','password',['id' => 'pass','class' =>'form-control'])
            ->addButton('Me connecter', ['class' => 'btn btn-primary'])
            ->endForm();

            $this->render('users/login',['loginForm' => $form->create()]);
    }


    //Inscription des utilisateurs
    public function register(){

        //On vérifie si le formulaire est valide
        if(Form::validate($_POST,['email','password'])){
            //le formulaire est valide
            //ON nettoie l'adresse email
            $email = strip_tags($_POST['email']);

            //On chiffre le mot de passe 
            $pass = password_hash($_POST['password'], PASSWORD_ARGON2I);
            
            // On hydrate l'utilisateur 

            $user = new Users;

            $user->setEmail($email)
                ->setPassword($pass);


            //On stocke l'utilisateur en bdd
            $user->create();

            
        }

        $form = new Form;

        $form->startForm()
            ->addLabelFor('email', 'E-mail')
            ->addInput('email','email',['id'=>'email','class' => 'form-control'])
            ->addInput('password','password',['id'=>'password','class' => 'form-control'])
            ->addButton('M\'inscrire',['class' => 'btn btn-primary'])
            ->endForm();


            $this->render('users/register',['registerForm' => $form->create()]);
    }


    //Déconnexion de l'utilisateur

    public function logout(){
        unset($_SESSION['user']);
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit;
    }

}