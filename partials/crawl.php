<?php
    require_once "./partials/curl.php";

    class CRAWL
    {
        protected $curl;
        protected $content;
        protected $pattern;
        protected $matches;

        public function __construct($url)
        {
            $this->curl = new CURL();
            $this->content = $this->curl->createCurl($url);
        }

        public function crawl($deep, $pattern) {
            $this->pattern = $pattern;
            preg_match_all($this->pattern, $this->content, $this->matches);
            return $this->matches[$deep];
        }

        public function __destruct()
        {
            $this->curl->closeCurl();
        }
    }
