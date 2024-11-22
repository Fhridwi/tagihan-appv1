<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as Model;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Model::where('akses', '<>', 'wali')->latest()->paginate(50);
    
        return view('operator.user_index', compact('models'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'model'  => new \App\Models\User(), 
            'method' => 'POST',                 
            'route'  => 'user.store',           
            'button' => 'SIMPAN'                
        ];
    
        return view('operator.user_form', compact('data'));
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   // Fungsi untuk menyimpan data user
   public function store(Request $request)
{
    $requestData = $request->validate([
        'name' => 'required|string|max:255',
        'nohp' => 'required|string|max:15',
        'email' => 'required|email|unique:users,email',
        'akses' => 'required|string|in:operator,admin',
        'password' => 'required|string|min:8', 
    ]);

    Model::create([
        'name' => $request->name,
        'nohp' => $request->nohp,
        'email' => $request->email,
        'akses' => $request->akses,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
