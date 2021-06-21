<?php
    require_once "./partials/crawl.php";

    class PetsController
    {
        protected $pattern;

        public function crawl($count)
        {
            if (
                $count == 1
            ) {
                $url = 'https://www.akc.org/dog-breeds/';
            } else {
                $url = "https://www.akc.org/dog-breeds/page/$count/";
            }
            $matches = new CRAWL($url);

            $this->pattern = '/<h3 class="breed-type-card__title(.*?)">(.*?)<\/h3>/si';
            $name = $matches->crawl(2, $this->pattern);

            $this->pattern = '/<div class="grid-col">(.*?)<img(.*?)src="(.*?)"(.*?)data-src="(.*?)"(.*?)srcset="(.*?)"(.*?) \/>/si';
            $link_img = $matches->crawl(5, $this->pattern);

            $this->pattern = '/<p class="f-16 mt1">(.*?)<\/p>/si';
            $introduce = $matches->crawl(1, $this->pattern);

            return [$name, $link_img, $introduce];
        }
    }

 ?>