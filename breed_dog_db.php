<?php
    require_once "./database.php";
    class Crawl extends Models
    {
        public function crawl()
        {
            $ch = curl_init();

            $url = "https://www.akc.org/dog-breeds/";

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $content = curl_exec($ch);

            //    preg_match_all('/<h3 class="breed-type-card__title(.*?)"(.*?)<\/h3>/si', $content, $matches);
            $pattern = '/<div(.*?)id="breed-type-card-"(.*?)>(.*?)<\/label>/si';
            preg_match_all($pattern, $content, $matches);
            //    print_r($matches[3]);
            if (!empty($matches[3])) {
                $count = 0;
                foreach ($matches[3] as $item) {
                    $count++;
                    preg_match('/<h3 class="breed-type-card__title(.*?)">(.*?)<\/h3>/si', $item, $name_arr);
                    preg_match('/<p class="f-16 mt1">(.*?)<\/p>/si', $content, $description_arr);
                    preg_match(
                        '/<img(.*?)src="(.*?)"(.*?)data-src="(.*?)"(.*?)srcset="(.*?)"(.*?) \/>/si',
                        $item,
                        $img_arr
                    );

                    $name = $name_arr[2];
                    $description = $description_arr[1];
                    $src_img = $img_arr[2];
                    $data_src_img = $img_arr[4];
                    $src_set_img = $img_arr[6];
                    $create_at =

                    $query = "insert into pets (pet_name, introduce) values ('".$name."', '".$description."')";
                    $this->conn->query($query);
                    // echo "<pre>";
                    // print_r($name);
                    // echo "</br>";
                    // print_r($description);
                    // echo "</br>";
                    // print_r($src_img);
                    // echo "</br>";
                    // print_r($data_src_img);
                    // echo "</br>";
                    // print_r($src_set_img);
                    // echo "</pre>";
                }
            }
            curl_close($ch);
        }
    }
    $crawl = new Crawl();
    $crawl->crawl();
?>