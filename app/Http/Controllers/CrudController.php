<?php

namespace App\Http\Controllers;

use App\Crud;
use Illuminate\Http\Request;
use Datatables;
use DB;
class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cruds.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $data = Crud::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '';
                           $btn = $btn.' <a href="'.route('crud.edit', $row->sapid) .'" class="edit btn btn-primary btn-sm">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0);" class="edit btn btn-danger btn-sm" onclick="deleteclients('.$row->sapid.')">Delete</a>';
                            
                            return $btn;
                    })
                    ->rawColumns(['delete' => 'delete','action' => 'action'])
                    ->make(true);
      
        
        return view('cruds.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Crud $crud)
    {
        //
        $id = $request->get('id');
        
        $request->validate([
            'hostname'=>'required',
            'loopback'=>'required',
            'mackaddress'=>'required',

        ]);
        if(!empty($id))
        {
            //dd($id);
			
			



$hostname = $request->get('hostname');
$loopback = $request->get('loopback');
$mackaddress = $request->get('mackaddress');

DB::statement("UPDATE cruds SET hostname = '".$hostname."',loopback = '".$loopback."',mackaddress = '".$mackaddress."' where sapid = ".$id);

           // $crud->update($request->all());
            $message = "Item Update!";
        }else{
            
            $crud = new Crud([
                'hostname' => $request->get('hostname'),
                'loopback' => $request->get('loopback'),
                'mackaddress' => $request->get('mackaddress'),
            ]);
            
            $crud->save();
            $message = "Crud Saved!";
        }
        return redirect('/crud')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function addCrud()
    { 
        //
        $crud = new Crud;
        return view('cruds.edit',compact(['crud'=>'crud']));
    }
    public function edit($id)
    { 
	
        //
        //$crud = Crud::find(['sapid'=>$id]); 
		$crud = DB::table('cruds')->where('sapid', $id)->first();


        return view('cruds.edit',compact(['crud'=>'crud'])); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crud $crud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$crud=Crud::find($id);  
		DB::table('cruds')
			->where('sapid',$id)
			->delete();

        //$crud->delete();
    }
}
