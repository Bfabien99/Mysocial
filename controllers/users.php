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

        
        public function save($name,$fname,$email,$address,$phone,$gender,$birth,$password)
        {
            $initModel = new usersModel();
            $callModel = $initModel->create($name,$fname,$email,$address,$phone,$gender,$birth,$password);
            if ($callModel) 
            {
                $response = 
                [
                "ok" => true,
                "message" => "Ressource Create",
                "results" => $callModel
                ];
            }
            else 
            {
                $response = 
                [
                    "ok" => false,
                    "message" => "Ressource not created",
                    "results" => $callModel
                ];
            }

            return $this->Tojson($response);
        }



    }
