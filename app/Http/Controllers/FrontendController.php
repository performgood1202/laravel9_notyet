<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;
use GuzzleHttp\Client;

use App\Models\Code;

class FrontendController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function exportcsv()
    {

        /*$link =  "https://sheets.googleapis.com/v4/spreadsheets/1MVBmYPSKFkZOrd3uFlQrVWIuTD0yiJzmxE09Uw8CiJE/values/Sheet1?alt=json&key=AIzaSyC1FIFIMOGw4SoyFVnx8P2dvabhqqMCEjM";

        $jsonData = new Client;
        $jsonData = $jsonData->get($link )->getBody()->getContents();

        $jsonData = json_decode($jsonData);

        if(isset($jsonData->values) && !empty($jsonData->values)){

            $dataa = array();

            $keyy = 0;

            Code::truncate();

            foreach ($jsonData->values as $key => $roww) {

                if(!empty($roww)){

                    $dataa[$keyy]["code"] = $roww[0];

                    $keyy++;;

                    

                }
                  
            }
            if(!empty($dataa)){
                 Code::insert($dataa);
            }  
           // echo "<pre>"; print_r($dataa); die;

        }else{

            die("Data not found!");

        }
        exit;

        echo "<pre>"; print_r($jsonData); die;

        die;*/
        die;

        Code::truncate();

        LazyCollection::make(function () {
          $handle = fopen(public_path("notyet.csv"), 'r');
          
          while (($line = fgetcsv($handle, 4096)) !== false) {
            $dataString = implode(", ", $line);
            $row = explode(';', $dataString);
            yield $row;
          }

          fclose($handle);
        })
        ->chunk(100000)
        ->each(function (LazyCollection $chunk) {
          $records = $chunk->map(function ($row) {

            if($row[0] != ""){

                return [
                    "code" => $row[0],
                ];

               /*     
                $data_count = DB::table('code')->where("code",$row[0])->count();

                if($data_count < 1){

                    return [
                        "code" => $row[0],
                    ];

                }*/

            }

            
          })->toArray();

          $dataa = array();

          foreach ($records as $key => $rec) {

            if(!empty($rec)){

                $dataa[] = $rec;

            }
              
          }

          if(!empty($dataa)){
             Code::insert($dataa);
          }      

          die;   
          
          
        });
    }

    public function checkCode(Request $request)
    {

        $cout_d = Code::where("code",$request->code)->count();

        if($cout_d > 0){

           return redirect()->back()->with("success","Code verified!");

        }else{
           
           return redirect()->back()->with("error","Code Invalid!");
        }
    }
}
