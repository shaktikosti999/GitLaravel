<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Excel;
use Input;

use App\Models\newsletter_model as newsletter;
use Psy\Util\Json;

class newsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = array(
            'newsletters' => newsletter::all(),
            'mails' =>newsletter::mails()
        );
        return view('back.newsletter.index',$data);  
    }

    /***** export the csv file *****/
    public function exportCSV(){

        $results = newsletter::all();
        $data = array();
        foreach ($results as $result) {
            $data[] = (array)$result;
        }
        $type ="csv";
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->export($type);
    }
    /***** end export the csv file *****/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        if( $request->input('mail_own') !== null && trim($request->input('mail_own')) != "" ){
            $data = [
                'mail' => trim($request->input('mail_own')),
                'tipo_mail' => 2
            ];
            \DB::table('mail_aviso')->insert($data);
        }
        if( $request->input('borrar_own') !== null && count($request->input('borrar_own')) ){
            $data = \DB::table('mail_aviso');
            foreach($request->input('borrar_own') as $borrar ){
                $data = $data->where('id',$borrar);
            }
            $data = $data->delete();
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}
}
