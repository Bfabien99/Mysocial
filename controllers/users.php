<?php 

    require "models/usersModel.php";

    class users
    {
        
        public function Tojson($data)
        {    
             header('Access-Control-Allow-Origin: *');
             header('Content-Type: application/json');
             echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }


        public function save($name,$fname,$email,$address,$phone,$gender,$birth,$password,$picture)
        {
            $initModel = new usersModel();
            $callModel = $initModel->create($name,$fname,$email,$address,$phone,$gender,$birth,$password,$picture);

            return $callModel;
        }


        public function check($email, $password)
        {
            $initModel = new usersModel();
            $callModel = $initModel->verify($email, $password);
            return $callModel;
        }

        public function getAll()
        {
            $initModel = new usersModel();
            $callModel = $initModel->getAll();
            return $callModel;
        }

        public function userinfo($email){
            $initModel = new usersModel();
            $callModel = $initModel->userinfo($email);
            return $callModel;
        }

    }
