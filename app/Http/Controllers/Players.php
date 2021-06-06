<?php

//April 2, 2021, 11:47 pm
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\ Player;
use App\Http\Requests\PlayersFormRequest;
use App\logowania;
;

class Players extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $sortField = ['order_field' =>$request->session()->get('players_table_session.order_field',"updated_at"), 'sort'=>  $request->session()->get('players_table_session.sort',"desc")]; //po jakim polu pierwsze sortowanie - domyslnie pierwsze pole tabeli
        $players = Player::query();
        
        
        if ($request->get("ajax_search") == "1") { //ajaxowe wywołanie
            
            $inputs = $this->clearArray($request->all(), ['ajax_search', 'order_field', 'sort', 'page']);         
            //$inputs['canLogin'] = isset($inputs['canLogin']) ? "1" :  "0";    
            
            foreach ($inputs as $field => $value) {
                if ($value != "")
                    $players->where("{$field}", 'like', "%{$value}%");
            }
            
            if ($request->has('order_field')) {                
                $players->orderBy($request->get("order_field"), $request->get("sort"));
                $sortField['order_field'] = $request->get("order_field");
                $sortField['sort'] = $request->get("sort");                
            }

            $players = $players
                    ->withCount('logowanias')->with('logowanias')
                    
                    ->paginate(5);
             $request->session()->put('players_table_session',$request->all());
            echo view('frontend\ajax_table_players', ['players' => $players, 'search_items' => $request->all(), 'sortField' => $sortField]);
            
        } else {
             $inputs = $this->clearArray($request->session()->get('players_table_session'), ['ajax_search', 'order_field', 'sort', 'page']);                
             if($inputs)           
             foreach ($inputs as $field => $value) {
                if ($value != "") 
                    $players->where("{$field}", 'like', "%{$value}%");
            }

            $players = $players->orderBy($sortField['order_field'],$sortField['sort'])
                     ->withCount('logowanias')->with('logowanias')
                     
                     ->paginate(5);
                     
            $table_search_container = view('frontend\ajax_table_players', ['players' => $players, //rekordy
                                            'search_items' => $request->session()->get('players_table_session'), // pola po ktorych jest filtrowanie - do wypenienia pol
                                            'sortField' => $sortField]             // pola po ktorych sortujemy (np w tabeli rysowanie fortowaniaw nagłowku pola
                                           )->render();

            return view('frontend\table_players', ['table_search_container' => $table_search_container]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
           return view('frontend.form_players');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayersFormRequest $request)
    {
    //nowe
          $parametrs['canLogin'] = isset($parametrs['canLogin']) ? '1' : '0'; // checkbox - canLogin

         $parametrs = $request->all();
//      $parametrs[''] = isset($parametrs[''])? '1':'0'; // przygotowane dla checkboxow.
//      Retrieve the validated input data...
$validated = $request->validated();
if ($request->hasFile('avatar')) {
            $img_tmp = $request->file('avatar')->store('img', 'public');
            $avatar_img_filename = $request->file('avatar')->move(public_path("img/tmp"), $img_tmp);
            $parametrs['avatar'] = $avatar_img_filename->getFilename();
         }
 Player::create($parametrs);     
        return redirect('players')->with('update', false);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::find($id);            
                        
        // show the edit form and pass the shark
        return View('frontend.form_players')
->with('player', $player)
                   ->with('update',true)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlayersFormRequest $request, $id)
    {
       $parametrs = $this->clearArray($request->all(), ['_token','_method']);  
      // $parametrs[''] = isset($parametrs['']) ? '1' : '0'; // przygotowane dla checkboxow.
      $parametrs['canLogin'] = isset($parametrs['canLogin']) ? '1' : '0'; // checkbox - canLogin

         $validated = $request->validated();
          if ($request->hasFile('avatar')) {
                    $img_tmp =$request->file('avatar')->store('img', 'public');
                    $avatar_img_filename = $request->file('avatar')->move(public_path('img/tmp'), $img_tmp);
                    $parametrs['avatar'] = $avatar_img_filename->getFilename();
                }

        Player::where('id', $id)->update($parametrs);
    return redirect('players');
    }
    
public function ajaxField(Request $request) {
       
        $f = new PlayersFormRequest();
        $validator = Validator::make([$request->get("field") => $request->get("value")], ["{$request->get("field")}" => $f->my_rules[$request->get("field")]]);
        if ($validator->fails()) {
            return response()->json(["messages" => $validator->errors()->first($request->get("field"))]);
        } else {
            return response()->json(["messages" => "OK"]);
        }
    }
      public function getOne(Request $request){
        if($request->ajax()){
             return response()->json([DB::table("{$request->get('model')}")->select("*")->where("id","{$request->get('id')}")->get()[0]]);
        }
    }
    public function select2_ajax(Request $request){
      if ($request->ajax()) {
            $res = [DB::table("{$request->get('model')}")->select("id", "{$request->get('field')} as text", "{$request->get('model')}.*")
                        ->where("{$request->get('field')}", 'like', "%{$request->get('search')}%")->get()];
            return response()->json($res);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('players')->where('id', $id)->delete();
        return redirect('players');
    }
       private function clearArray($source = [], $target = []) {

        foreach ($target as $value) {
            unset($source[$value]);
}

        return $source;
    }
}

