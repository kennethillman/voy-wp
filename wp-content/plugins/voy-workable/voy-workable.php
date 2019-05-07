<?php
    /*
     * Plugin Name: Voy Workable
     * Description: Voy Workable, For Fetching Data from API (jobs, candidates etc...)
     */
    define('API_URL','https://voy-talent.workable.com/spi/v3/');
    define('API_KEY','d7225728f0aee01d73efa04b6c74fee0caf320871ec029ee6e4f021fa2bade45');

    class VoyWorkableAPI
    {
        private static $apiKey = API_KEY;
        private static $db;
        private static $args =  array();
        private static $apiUrl;

        /*
         * Connect to wordpress database through global variable $wpdb
         * to custom handle errors, they are hidden from displaying and are suppressed
         * Fatal errors are exceptional
         * */

        public static function dbInitialize(){
            global $wpdb;
            self::$db = $wpdb;
            self::$db->hide_errors();
            self::$db->suppress_errors();
        }

        /*
         * initializing curl header content with required parameters
         * */
        public static function init($url, $postData=''){
            self::$apiUrl = $url;
            self::$args = array(
                'headers'=> array(
                    'Content-Type' => 'application/json',
                    'Content-Length' => strlen($postData),
                    'Authorization' => 'Bearer '.self::$apiKey
                ),
                'body'=>$postData,
                'timeout' => 1000,
                'connecttimeout' => 0,
            );
        }

        /*
         * Getting JSON data either using GET or POST Method
         * $postData will be null for GET method
         * */
        public static function getJsonResponse($url='', $postData='', $method = ''){
            self::init($url, $postData);
            if($method === 'POST'){
                $result =  (array) wp_remote_post( self::$apiUrl, self::$args ); //wp_remote_retrieve_body
            }else{
                $result =  (array) wp_remote_get( self::$apiUrl, self::$args ); //wp_remote_retrieve_body
            }

            if (is_array($result) && !empty($result['body'])) {
                return wp_remote_retrieve_body($result);
            }else{
                return "Error in API";
            }
        }

        public static function getJobs($limit=0, $since_id=''){
            $url = API_URL;
            if($limit!=0){
                $url = $url.'jobs?state=published&limit='.$limit;
            }else{
                $url = $url.'jobs?state=published';
            }

            if($since_id!=''){
                $url = $url.'&since_id='.$since_id;
            }

            $json = self::getJsonResponse($url, '', 'GET');
            return $json;
        }

        public static function getNextJobs($limit=0){
            $url = API_URL;
            $url = $url.'jobs?state=published';

            $json = self::getJsonResponse($url, '', 'GET');
            $json = json_decode($json);

            $i=1;
            $nextIds = [];
            foreach ($json->jobs as $key=>$job){
                $c = (($limit * $i));
                if($key==$c){
                    $nextIds[$i] = $job->id;
                    $i++;
                }
            }

            return $nextIds;
        }

        public static function getJobDetails ($shortcode){
            $url = API_URL;
            $url = $url.'jobs/'.$shortcode;
            $json = self::getJsonResponse($url, '', 'GET');
            return $json;
        }

        public static function post_candidate($data = array()){
            //echo "Workable called";
            $pData = [];
            $shortcode = array_shift($data);
            foreach ($data as $key => $value){
                if($key == 'social_profiles'){
                    $pData [$key][] = ['type' => key($value), 'name' => $value[key($value)]['name'], 'url' => $value[key($value)]['url']];
                }else{
                    $pData [$key] = $value;
                }

            }

            $url = API_URL;
            $url = $url.'jobs/'.$shortcode.'/candidates';
            $json = self::getJsonResponse($url, json_encode($pData), 'POST');
            return $json;
        }
    }

    //$VoyWorkableAPI = new VoyWorkableAPI();
?>