<?php 

class MoviesController{

    private $apiUrl = "https://www.omdbapi.com/?apiKey=fc59da33&s=";
    private $file_path = "../resources/movies.json";

    public function getAll(){        

        $json = file_get_contents("../resources/movies.json");
        $data = json_decode($json);       

        return $data->Search;
        
    }

    public function getByFilter(String $title, int $startDate, int $endDate){   
        
        $data = $this->getAll();
        $endDate = $endDate ? $endDate : 2022;
        $tmp = array();
        foreach ($data as $item) {
            if(isset($title) && !$startDate){
            if (strpos(strtoupper($item->Title), strtoupper($title))) {
                array_push($tmp, $item);
            }
            }elseif($title == "" && $startDate){
                if ($startDate <= $item->Year && $item->Year <= $endDate) {
                    array_push($tmp, $item);
                }
            }
            elseif(isset($title) && $startDate){
                if (strpos(strtoupper($item->Title), strtoupper($title)) && $startDate <= $item->Year && $item->Year <= $endDate) {
                    array_push($tmp, $item);
                }
            }
        }

        return $tmp;
    }

    public function sortByFilter($data, $sort){
        
        if($sort == "asc"){
            usort($data, function($a, $b) {return strcmp($a->Title, $b->Title);});
        }elseif($sort == "desc"){
            usort($data, function($a, $b) {return strcmp($b->Title, $a->Title);});            
        }
        elseif($sort == "title"){
            usort($data, function($a, $b) {return strcmp($a->Title, $b->Title);});            
        }
        elseif($sort == "date"){
            usort($data, function($a, $b) {return strcmp($a->Year, $b->Year);});            
        }
        return $data;

    }

    public function getData($string){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "{$this->apiUrl}{$string}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        file_put_contents($this->file_path, $data);


    }

}