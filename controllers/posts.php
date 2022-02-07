<?php

    require "models/PostsModel.php";

    class posts{

        public function save($post,$email)
        {
            $initModel = new PostsModel();
            $callModel = $initModel->create($post,$email);

            return $callModel;
        }

    }