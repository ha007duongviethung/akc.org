<?php
    class CURL
    {
        protected $curl;

        public function createCurl($url) {
            $this->curl = curl_init();

            curl_setopt($this->curl, CURLOPT_URL, $url);
            curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($this->curl, CURLOPT_TIMEOUT, 1000);

            return curl_exec($this->curl);
        }

        public function closeCurl() {
            curl_close($this->curl);
        }
    }
