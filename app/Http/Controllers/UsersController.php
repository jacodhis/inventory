<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function index(){
     $users = User::orderBy('created_at','desc')->paginate(20);
    //  return ($users);
     return view('users.index',compact('users'));
    }
    public function show( $user){
        $roles = Role::get();
        $user = User::findorFail($user);
        return view('users.show',compact('user','roles'));
       }
    public function create(){
        $roles = Role::select(['id','title',])->get();
        return view('users.create',compact('roles'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_id'=>'required',
        ]);
         if(User::create([
             'name'=>$data['name'],
             'email'=>$data['email'],
             'password'=> Hash::make($data['password']),
             'role_id'=>$data['role_id']
         ])){
             return back()->with('success','user has been created successfully');
         }
         return back()->with('error','user not created');

    }
    public function edit( $user){
        $roles = Role::get();
        $user = User::findorFail($user);
        return view('users.edit',compact('user','roles'));
    }
    public function update(Request $request,$user){
      $user = User::findorFail($user);
      
      
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'password' => ['required', 'string', 'min:8', ],
            'role_id'=>'required',
        ]);

        $user->name =  $data['name'];
        $user->email =  $data['email'];
        $user->password =  Hash::make($data['password']);
        $user->role_id =  $data['role_id'];
         if($user->save()){
             return back()->with('success','user has been updated successfully');
         }
         return back()->with('error','user not updated');
        
    }
    public function delete( $user){
        $user = User::findorFail($user);
        // dd($user);
        if($user->delete()){
            return back()->with('success','user deleted successfully');
        }
       
    }
}
