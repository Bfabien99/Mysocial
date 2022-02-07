<?php

    class PostsModel{

        private $table = 'posts';

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

        public function create($post,$email)
        {
            $db = $this->dbConnect();
            $query = $db->prepare('INSERT INTO '.$this->table.' SET post = :post, useremail = :email');
            $result = $query->execute([
                "post" => $post,
                "email" => $email
            ]);

            return $result;
        }

        public function getAll(){
            $db = $this->dbConnect();
            $query = $db->prepare('SELECT * FROM '.$this->table.' ORDER BY id DESC');
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

    }