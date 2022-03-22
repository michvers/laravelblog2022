<?php

namespace App\Http\Controllers;

use App\Events\UsersSoftDelete;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //
        //$users = User::orderBy('id', 'DESC')->paginate(15);
        //$users = User::all();  //eloquent way ORM krijg je objecten
        //dd($users);
        //$users = DB::table('users')->get();  //query builder

        $users = User::withTrashed()->with(['photo', 'roles'])->withTrashed()->filter(request(['search']))->paginate(15);

        //dd($users);
        //return view('admin.users.index', ['users' => $users]);
        return view('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        /*User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['password']),
            'role_id'=>$request['role_id'],
            'is_active'=>$request['is_active']
        ]);*/
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->is_active = $request->is_active;

        /**photo opslaan**/
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('img', $name);
            $photo = Photo::create(['file'=>$name]);
            $user->photo_id = $photo->id;
        }

        $user->save();

        $user->roles()->sync($request->roles, false);
        return redirect('/admin/users');
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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        if(trim($request->password)==''){
            $input = $request->except('password');
        }else{
            $input = $request->all;
            $input['password'] = Hash::make($request['password']);
        }
        /**photo overschrijven**/
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('img', $name);
            $photo = Photo::create(['file'=>$name]);
            $user->photo_id = $input['photo_id'] = $photo->id;
        }
        $user->update($input);

        /**wegschrijven tussentabel met de nieuwe rollen**/
        $user->roles()->sync($request->roles, true);
        return redirect('admin/users');
        //return redirect->back();
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
        //User::findOrFail($id)->delete();
        $user = User::findOrFail($id);
        UsersSoftDelete::dispatch($user);
        $user->delete();

        Session::flash('user_message', $user->name . ' was deleted!');
        return redirect('/admin/users');

    }
    public function restore($id){
        User::onlyTrashed()->where('id', $id)->restore();
        $user = User::findOrFail($id);
        Session::flash('user_message', $user->name . ' was restored!');
        return redirect('/admin/users');
    }
}
