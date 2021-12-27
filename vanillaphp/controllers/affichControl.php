<?php

    require_once 'models/affichModel.php';
    require_once 'helpers/session_helper.php';

    class affichControl {

        private $model;
        
        public function __construct(){
            $this->model = new affichModel;
        }

        function affichWilaya() {

            return $this->model->affichWilaya() ; 

                }

            }


 