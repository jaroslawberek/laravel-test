<?php

//April 3, 2021, 7:59 pm

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\ Logowania;
use App\Http\Requests\LogowaniasFormRequest;
use App\player;
use App\user;

;

class Logowanias extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $sortField = ['order_field' => $request->session()->get('logowanias_table_session.order_field', "updated_at"), 'sort' => $request->session()->get('logowanias_table_session.sort', "desc")]; //po jakim polu pierwsze sortowanie - domyslnie pierwsze pole tabeli
        $logowanias = Logowania::query();
        $logowanias->select('logowanias.*', 'players.login as login', 'name as login_user')
                ->join('players', 'players.id', '=', 'logowanias.player_id')
                ->leftJoin('users', 'users.id', '=', 'logowanias.user_id')
        ;
        if ($request->get("ajax_search") == "1") { //ajaxowe wywołanie
            $inputs = $this->clearArray($request->all(), ['ajax_search', 'order_field', 'sort', 'page']);
            //$inputs['canLogin'] = isset($inputs['canLogin']) ? "1" :  "0";    

            foreach ($inputs as $field => $value) {
                if ($value != "")
                    $logowanias->where("{$field}", 'like', "%{$value}%");
            }

            if ($request->has('order_field')) {
                $logowanias->orderBy($request->get("order_field"), $request->get("sort"));
                $sortField['order_field'] = $request->get("order_field");
                $sortField['sort'] = $request->get("sort");
            }

            $logowanias = $logowanias
                    ->with('players')->with('users')
                    ->paginate(5);
            $request->session()->put('logowanias_table_session', $request->all());
            echo view('frontend\ajax_table_logowanias', ['logowanias' => $logowanias, 'search_items' => $request->all(), 'sortField' => $sortField]);
        } else {
            $inputs = $this->clearArray($request->session()->get('logowanias_table_session'), ['ajax_search', 'order_field', 'sort', 'page']);
            if ($inputs)
                foreach ($inputs as $field => $value) {
                    if ($value != "")
                        $logowanias->where("{$field}", 'like', "%{$value}%");
                }

            $logowanias = $logowanias->orderBy($sortField['order_field'], $sortField['sort'])
                    ->with('players')->with('users')
                    ->paginate(5);

            $table_search_container = view('frontend\ajax_table_logowanias', ['logowanias' => $logowanias, //rekordy
                'search_items' => $request->session()->get('logowanias_table_session'), // pola po ktorych jest filtrowanie - do wypenienia pol
                'sortField' => $sortField]             // pola po ktorych sortujemy (np w tabeli rysowanie fortowaniaw nagłowku pola
                    )->render();

            return view('frontend\table_logowanias', ['table_search_container' => $table_search_container]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        return view('frontend.form_logowanias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogowaniasFormRequest $request) {
        //nowe

        $parametrs = $request->all();
//      $parametrs[''] = isset($parametrs[''])? '1':'0'; // przygotowane dla checkboxow.
//      Retrieve the validated input data...
        $validated = $request->validated();

        Logowania::create($parametrs);
        return redirect('logowanias')->with('update', false);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $logowania = Logowania::find($id);
        $player = Player::find($logowania->player_id);
        $user = User::find($logowania->user_id);

        // show the edit form and pass the shark
        return View('frontend.form_logowanias')
                        ->with('logowania', $logowania)
                        ->with('update', true)
                        ->with('player', $player)->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LogowaniasFormRequest $request, $id) {
        $parametrs = $this->clearArray($request->all(), ['_token', '_method']);
        // $parametrs[''] = isset($parametrs['']) ? '1' : '0'; // przygotowane dla checkboxow.

        $validated = $request->validated();

        Logowania::where('id', $id)->update($parametrs);
        return redirect('logowanias');
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

    public function getOne(Request $request) {
        if ($request->ajax()) {
            return response()->json([DB::table("{$request->get('model')}")->select("*")->where("id", "{$request->get('id')}")->get()[0]]);
        }
    }

    public function select2_ajax(Request $request) {
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
    public function destroy($id) {
        DB::table('logowanias')->where('id', $id)->delete();
        return redirect('logowanias');
    }

    private function clearArray($source = [], $target = []) {

        foreach ($target as $value) {
            unset($source[$value]);
        }

        return $source;
    }

}
