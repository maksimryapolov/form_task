<?php
    /*
        класс контроллер всего сайта
    */
    class SiteController
    {
        /*
            метод проверки данных
            для доступа в личный кабинет
        */
        public static function actionIndexLogin()
        {

            if(!User::Guest()) {
                header("Location: /profile/");
            } else {
                $email = '';
                $password = '';
                if (isset($_POST['sibmit'])) {
    
                    $errors = false;
                    
                    $email = $_POST['email'];
                    $password =  $_POST['password'];
    
    
                    $userId = User::CheckUserData($email, $password);
    
                    if ($userId == false) {
                        $errors = 'Пользователь с такой электронной почтой или паролем не найден';
                       } else {
                         User::auth($userId);
                         header("Location: /profile/");
                       }
                }
                require_once ROOT . "/view/user/indexLogin.php";
            }
            return true;
        }
        /*
            регистрация
        */
        public static function actionRegister()
        {
            $name = '';
            $email = '';
            $password = '';
            $result = false;

            if(isset($_POST['submit'])) {

                $errors = false;

                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];

                if(!User::checkLogin($name)) {
                    $errors["login"] = "Логин может состоять только из букв английского, русского алфавита и цифр";
                }

                if(User::checkLoginExists($name)) {
                    $errors["login"] = "Пользователь с таким логином уже существует";
                }

                if(!User::checkEmail($email)) {
                    $errors["email"] = "Пожалуйста, введите действительный адрес электронной почты. Например, max@domain.com";
                }

                $password = User::checkPassword($password);

                if(!$password) {
                    $errors["password"] = "Пароль не должен быть короче 5-ти символов и должен содержать буквы латинского алфавита";
                }
                if($errors == false) {
                    $result = User::addUser($name, $email, $password);
                }
            }
            require_once ROOT . "/view/user/register.php";
            return true;
        }
         /* 
             получение данных о пользователе
        */
        public static function actionProfile()
        {
            $id = User::checkLogged();

            $user = User::UserGetData($id);

            require_once ROOT . "/view/user/profile.php";
            return true;
        }
         /*
            выход из системы
        */
        public static function actionLogout() 
        {
            unset($_SESSION['user_id']);
            header("Location: /");
            exit();
        }
    }
?>