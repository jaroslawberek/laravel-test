<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\TrainerRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Player;
use App\Logowania;
//
//  if ($field == "login") {
//                        $logowanias = Logowania::query()->whereHas('players', function (Builder $query) use ($value) {
//                            $query->where('login', 'like', "{$value}%");
//                        });
//                    }else
class Trainers extends Controller {

    public function index(Request $request) {
//        return view("frontend.test");
        $logowanias = Logowania::query()->whereHas('players', function (Builder $query) {
        $query->where('login', 'like', 'lo%');
        })->paginate(2);
        //$d = $logowanias->players()->get();

        echo "<pre>" . print_r($logowanias, true);
    }

    public function store(TrainerRequest $request) {
        // The incoming request is valid...
        // Retrieve the validated input data...
        $validated = $request->validated();
        return response()->json(["message" => "POST - Udało sie kurwa mac", $request->all()]);
    }

    public function ajaxRequestPost(Request $request) {
        $input = $request->all();
        echo "kurwa";
    }

    public function imageLoad(Request $request) {
        return view("frontend.upload_img");
    }

    public function imageAjax(Request $request) {
        if ($request->hasFile('file_ajax')) {
            $validator = Validator::make($request->all(), [
                        'file_ajax' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ])->validate();

            $img_tmp = $request->file('file_ajax')->store('img', 'public');
            $t = $request->file('file_ajax')->move(public_path("img/tmp"), $img_tmp);
            //echo $t->getFilename();
            return response()->json(['img_path' => $t->getFilename()]);
        }
    }
    
    public function select2(Request $request){
        
        
        return view("frontend.select2");
    }
    
    public function select2_ajax(Request $request){
        $players = Player::select("id","login as text","players.*")->where('login','like',"%{$request->get("search")}%")->get();
        $resu=[ 
                            ['id'=>'1','text'=>'Jaro1',"trzeci"=>3],
                            ['id'=>'2','text'=>'Jaro2'],
                            ['id'=>'3','text'=>'Jaro3'],            
               ] ;
        Log::channel('crud')->debug($request->all());
        return response()->json(['result'=>$players]);
    }
    
    public function val(){
        return view("frontend.val");
    }

}
