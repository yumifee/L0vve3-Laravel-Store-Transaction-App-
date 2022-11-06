<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $users = User::all();
            return DataTables::of($users)
            ->addColumn('action', function ($row) {
                $html = '<a href='.route('users.edit',$row->id).' class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>';
                $html.= '<a href='.route('users.destroy', $row->id).' class="btn btn-xs btn-default text-danger mx-1 shadow" title="Edit" onclick="notificationBeforeDelete(event, this)">
                <i class="fa fa-lg fa-fw fa-trash"></i>
                </a>';
                return $html;
            })
            ->toJson();
            }
        return view('users.index');
        Log::info('Pengguna sedang mengakses', ['user' => Auth::user()->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        Log::warning('User mencoba untuk menambah data', ['user' => Auth::user()->id, 'data' => $request]);
        $request->validate([
            'name' => 'required',
            'username'=> 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'address' => 'required'
        ]);
        $array = $request->only([
            'name', 'username','email', 'password', 'address'
        ]);
        // $array['password'] = bcrypt($array['password']);
        $user = User::create($array);
        Log::info('Berhasil menambah user baru', ['user' => Auth::user()->id, 'user' => $user->id]);
        return redirect()->route('users.index');
        }
        catch (\Exception $e) {
        Log::error('User tidak dapat dibuat karena email sudah terdaftar', ['user' => Auth::user()->id, 'data' => $request]);
        return redirect()->route('users.create'); //422
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menambahkan
        $user = User::find($id);
        Log::info('User sedang menggunakan sebagian data', ['user' => Auth::user()->id, 'user' => $user->id]);
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if ($id == $request->user()->id){
            Log::error('Anda tidak dapat mengedit admin.', ['user' => Auth::user()->id, 'user' => $id]);
            return view('users.edit', [
                'user' => $user
            ]);
        }
        if (!$user){
            Log::error('User dengan id '.$id.' tidak ditemukan', ['user' => Auth::user()->id, 'user' => $id]);
            return;
            // return redirect()->route('users.index');
        }
        return view('users.edit', [
            'user' => $user
        ]);
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
        $request->validate([
            'name' => 'required',
            'username'=> 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required',
            'address' => 'required'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        // if ($request->password) $user->password = bcrypt($request->password);
        $user->address = $request->address;
        if($user->save()){
        Log::info('Berhasil mengupdate user', ['user' => Auth::user()->id, 'user' => $user->id]);
        return redirect()->route('users.index');
        }
        Log::error('Gagal mengupdate user', ['user' => Auth::user()->id, 'user' => $id]);
        return; //401
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if ($id == $request->user()->id){
        Log::error('User tidak dapat terhapus', ['user' => Auth::user()->id, 'user' => $id]);
        return; //404
        }
        if ($user){
        Log::info('Berhasil menghapus data', ['user' => Auth::user()->id, 'user' => $id]);
        $user->delete();
        return redirect()->route('users.index');
        }
    }
}
