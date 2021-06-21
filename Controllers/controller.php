<?php
	require_once "./Controllers/PetsController.php";
	require_once "./Models/model.php";

	date_default_timezone_set("Asia/Ho_Chi_Minh");

	class Controller {
		protected $pets;
		protected $model;

		public function __construct()
		{
			$this->pattern = '';
			$this->pets = new PetsController();
			$this->model = new Models();
		}

		public function crawl() {
			for ($count = 1; $count <= 24; $count++) {
				$pets_arr = $this->pets->crawl($count);
				$this->model->connect('Pets', 'add', $pets_arr);
			}
			// for($count = 1 ; $count <= 116 ; $count++) {
			// 	$stories_arr = $this->stories->crawl($count);
			// }
		}
	}
 ?>