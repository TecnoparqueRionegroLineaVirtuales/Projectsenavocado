<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Indicator;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class IndicatorApiController extends Controller
{
    private $idStation;
    private $idIndicator;
    /**
 * This function save a json of the measures for minutes.
 */
    public function indicatoRecord(Request $request){ 
        if($request->isMethod('post')){
            $result = $this->validateJson($request);
            if($result == "Ok"){
                if( $this->insertData($request) == 200) {
                    //return $this->sendResponse(200, 'Ok');     
                    return ["ok"=>"200"];                 
                } else {
                    //return $this->sendResponse(501, 'Error: Al ingresar los datos sobre la Base de Datos');
                    return ["501"=>"Error: Al ingresar los datos sobre la Base de Datos"];
                }
            } else {
                $reply = substr($result, 0, 3);
                switch ($reply) {
                    case '502':
                        //return $this->sendResponse(502, $result);  
                        return ["502"=>$result];    
                        break;
                    case '503':
                        //return $this->sendResponse(503, $result); 
                        return ["503"=>$result];   
                        break; 
                    case '504':
                        //return $this->sendResponse(504, $result); 
                        return ["504"=>$result];   
                        break;     
                    case '505':
                        //return $this->sendResponse(505, $result); 
                        return ["505"=>$result];   
                        break;           
                }
            }
        }
    }

    /**
     * This functión valide the información send in the json.
     */
    private function validateJson($Indicators){
        $result = "";
        
        $indicatorData = $Indicators->input();
        foreach($indicatorData as $value){
           if(empty($value['station'])){
                $result = '504 Error: No hay dato en estacion';
                break;
            } else {
                if(empty($value['indicator'])){
                    $result = '505 Error: No hay dato en Indicador';
                    break;
                } else {
                    $this->idStation = $this->getIdStation($value['station']);
                    if(isset($this->idStation) && ($this->idStation > 0)){
                        $this->idIndicator = $this->getIdIndicator($value['indicator']);
                        if(isset($this->idIndicator) && ( $this->idIndicator > 0)){
                            $result = "Ok";
                        
                        } else {
                            $result = '502 Error: el indicador ' . $value['indicator'] . ' No es valido.';
                            break;
                        }
                    } else {
                        $result = '503 Error: La estacion ' . $value['station'] . ' No es valida.';
                        break;
                    }
                        
                }
            }
        }  
        return $result; 
    }

    /**
     * This function get the id that match with the input parameter.
     */
    private function getIdStation($codStation){
        $statId = 0;
        $stationId = Station::select('id')
                            ->where('code', $codStation)
                            ->where('status', 1)
                            ->get();

        if(count($stationId) > 0 ) {
            foreach ($stationId as $codVar) {
                $statId = $codVar->id;
            }
        } 
        return $statId;
    }

    /**
     * This function get the id that match with the input parameter.
     */    
    private function getIdIndicator($codIndicator){
        $indId = 0;
        $indicatorId = Indicator::select('id')
                            ->where('name', $codIndicator)
                            ->get();

        if(count($indicatorId) > 0 ) {
            foreach ($indicatorId as $vbleId) {
                $indId = $vbleId->id;
            }
        }
        return $indId; 
    } 

    /**
     * This function insert the measere's data.
     */
    private function insertData($inRequest){
        try {
            $data = $inRequest->input();
            //dd(json_encode($data));
            //dd('station: ' . $this->idStation . 'indicator: ' . $this->idIndicator);
            foreach($data as $value){
                foreach ($value['data'] as $val) {
                    $objData = new Data();
                    $objData->value = (double)$val['value'];
                    $objData->date = $val['time'];  
                    $objData->indicator_id = $this->idIndicator;   
                    $objData->station_id = $this->idStation;  
                    $objData->save(); 
                }                     
            }
        } catch (\Throwable $th) {
            return 501;
        }

        return 200;
    }
}
