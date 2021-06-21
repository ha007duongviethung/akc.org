<?php
    class PetsModel {
        protected $query;

        public function __construct()
        {
            $this->query = '';
        }

        public function add($arr, $conn) {
            foreach ($arr[0] as $key => $value) {
                $date_time = Date('Y-m-d h:m:s');
                $this->query = "select * from pets where pet_name = '" . $value . "'";
                $result = $conn->query($this->query);
                if ($result->num_rows > 0) {
                    $this->query = "update pets set update_at = '" . $date_time . "' where pet_name = '" . $value . "'";
                } else {
                    $this->query = "insert into pets(pet_name, img, introduce, create_at) values ('" . $value . "', '" . $arr[1][$key] . "', '" . $arr[2][$key] . "', '" . $date_time . "')";
                }
                // echo $this->query."<br>";
                $conn->query($this->query);
            }
        }
    }