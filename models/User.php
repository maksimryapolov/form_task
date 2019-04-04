<?php 
    /*
        класс модели данных
        добавление и проверка данных пользователя
    */
    class User 
    {
        public static function addUser($name, $email, $password) 
        {
            $db = Db::getConnection();

            $sql = 'INSERT INTO users (login, email, password) VALUES (:name, :email, :password)'; 
            $result = $db->prepare($sql);
    
            $result->bindParam(':name', $name, PDO::PARAM_STR);      
            $result->bindParam(':email', $email, PDO::PARAM_STR); 
            $result->bindParam(':password', $password, PDO::PARAM_STR);
    
            return  $result->execute();
        }

        public static function checkUserData($email, $password) 
        {
            $password = self::passwordEncryption($password);

            $db = Db::getConnection();

            $sql = 'SELECT * from users WHERE email = :email AND password = :password';
            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);

            $result->execute();
            $data = $result->fetch();

            if($data) {
                return $data['id'];
            }
            return false;
        }

        public static function auth($userId) 
        {
            $_SESSION['user_id'] = $userId;
        }

        public static function checkLogin($login)
        {
            if((!strlen($login) < 3 or strlen($login) > 30) && preg_match("/^[a-zA-Zа-яА-ЯёЁ][a-zA-Zа-яА-ЯёЁ0-9-_\.]{1,20}$/", $login)) {
                    return true;
            }
            return false;
        }

        public static function checkLoginExists($login_user) 
        {
            $db = Db::getConnection();

            $sql = 'SELECT COUNT(*) FROM users WHERE login = :login_user';

            $result = $db->prepare($sql);
            $result->bindParam(':login_user', $login_user, PDO::PARAM_STR);
            $result->execute();

            if($result->fetchColumn()) {
                return true;
            }
            return false;
        }

        public static function checkEmail($email) 
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            return false;
        }

        public static function checkPassword($password)
        {
            if(preg_match("/^[a-zA-Z][a-zA-Z0-9-_\.]{4,30}$/", $password)) {

                $password = self::passwordEncryption($password);
                return $password;
            }
            return false;
        }

        static public function checkLogged()
        {
    
            if($_SESSION['user_id']){
                return $_SESSION['user_id'];
            }
            header ("Location: /");
        }

        public static function UserGetData($id)
        {
            $id = intval($id);

            $db = Db::getConnection();

            $sql = "SELECT login, email, date_register from users WHERE id = :id";

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_STR);
            $result->execute();
            
            return $result->fetch(PDO::FETCH_ASSOC);

        }

        static public function Guest()
        {
            if(isset($_SESSION['user_id'])) {
                return false;
            }
            return true;
        }

        static private function passwordEncryption($password)
        {
            return md5(md5($password));
        }

    }

?>