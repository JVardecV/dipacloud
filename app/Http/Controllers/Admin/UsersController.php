<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'image' => $request->get('image'),
            'password' => $request->get('password')
        ]);*/

        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->password = bcrypt($request->get('password'));
        $user->save();


       // $user = User::create($request->except('permissions'));
        $user->roles()->sync($request->get('roles'));

        return back()->with('info',['success','Se ha creado el usuario']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();
        return view('admin.users.edit',compact('roles','user'));
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
        $user = User::find($id);
        $img_prev = $user->image;
        $user->update($request->except('roles','image'));
        $user->roles()->sync($request->get('roles'));
        //dd($request->get('image'));
        $max_size = (int)ini_get('upload_max_filesize')*1000;

        $request->file('image');

        $uploadFile = new File();
        $file = $request->file('image');

        //$name = time().$file->getClientOriginalExtension();
        //$name = time().$file->getClientOriginalName();
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();

        $user->update(['image' => $name]);


        if(Storage::putFileAs('/public/'. $this->getUserFolder(). '/' . 'avatar' . '/', $file, $name)){
        }

        if(Storage::disk('local')->exists('/public/' . $this->getUserFolder() . '/' . 'avatar' . '/', $file, $name)){
            if(Storage::disk('local')->delete('/public/' . $this->getUserFolder() . '/' . 'avatar' . '/', $file, $name )){
                $file->delete();
            }
        }

        
        return back()->with('info',['success','Se han actualizado los datos del usuario']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return back()->with('info',['success','Se ha eliminado el usuario']);
    }

    
    private function getUserFolder(){
        $folder = Auth::user()->name . '-' . Auth::id();
        return str_slug($folder);
    }





}
