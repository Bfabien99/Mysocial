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

        public function create($name,$fname,$email,$address,$phone,$gender,$birth,$password)
        {
            $db = $this->dbConnect();
            $query = $db->prepare('INSERT INTO '.$this->table.' SET user_name = :name, user_firstname = :fname, user_email = :email, user_address = :address, user_phone = :phone, user_gender = :gender, user_birth = :birth, user_password = :password, created_at = :created_at');
            $result = $query->execute([
                'name' => $name,
                'fname' => $fname,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'gender' => $gender,
                'birth' => $birth,
                'password' => $password,
                'created_at' => date('Y-m-d')
            ]);

            return $result;
        }

    }