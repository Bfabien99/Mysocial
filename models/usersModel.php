<?php

    class usersModel{

        private $table = 'users';

        public function dbConnect() 
        {
            $dsn="mysql:dbname=MysocialNetwork;host=localhost";
            $password = "";
            $user = "root";

            $connect = new PDO($dsn,$user,$password,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ]);

            if (!$connect) 
            {
                return new \Exception("Database cannot connect");
            }
            else
            {   
                return $connect;
            }
        }

        public function create($name,$fname,$email,$address,$phone,$gender,$birth,$password,$picture)
        {
            $db = $this->dbConnect();
            $query = $db->prepare('INSERT INTO '.$this->table.' SET name = :name, firstname = :fname, email = :email, address = :address, phone = :phone, gender = :gender, birth = :birth, password = :password, picture = :picture');
            $result = $query->execute([
                'name' => $name,
                'fname' => $fname,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'gender' => $gender,
                'birth' => $birth,
                'password' => $password,
                'picture' => $picture
            ]);

            return $result;
        }

        public function verify($email,$password)
        {
            $db = $this->dbConnect();
            $query = $db->prepare('SELECT email, password FROM '.$this->table.' WHERE email = '.'"'.$email.'"'.' AND password = '.'"'.md5($password).'"');
            $query->execute();
            $result = $query->fetch();
            return $result;
        }

        public function getAll()
        {
            $db = $this->dbConnect();
            $query = $db->prepare('SELECT * FROM '.$this->table.' ORDER BY id DESC');
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function userinfo($email){
            $db = $this->dbConnect();
            $query = $db->prepare('SELECT * FROM '.$this->table.' WHERE email = '.'"'.$email.'"');
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

    }