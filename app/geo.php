<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class geo extends Model
{
    public static function localiza($value){
        $value = str_replace(" ","+",$value);
        $value = "https://us1.locationiq.com/v1/search.php?key=0f5a94624a5175&q={$value}g&format=json";
        $geocode = file_get_contents($value);
        $output = json_decode($geocode);
        $lat = $output[0]->lat;
        $long = $output[0]->lon;
        
        $data['lat']=$lat;
        $data['lng']=$long;
        return $data;
    }
}


