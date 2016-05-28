<?php

class Dashboard_model extends CI_Model
{
        public $table = "announcements"; //table name
        public $pk_id = "announce_id"; //primary key id


        function __construct()
        {
            // Call the Model constructor
            parent::__construct();

        }


}



?>