<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
     $users = User::Where('id',"!=",1)
                   ->orderByDesc('created_at')
                    ->paginate(20);
     return view('users.index',compact('users'));
    }
    public function show(User $user){
        return view('users.show',compact('user'));
       }
    public function create(){
        $roles = Role::select(['id','title',])
                      ->where('id',"!=",1)->get();
        return view('users.create',compact('roles'));
    }
    public function store(UserRequest $request){
        User::create($request->validated());
        return back()->with('success','user has been created successfully');
    }
    public function edit( $user){
        $roles = Role::where('id',"!=",1)->get();
        $user = User::findorFail($user);
        return view('users.edit',compact('user','roles'));
    }
    public function update(Request $request,User $user){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'phone'=>'required',
            'password' => ['required', 'string', 'min:8', ],
            'role_id'=>'required',
        ]);
       
        $user->update($data);
        return back()->with('success','user has been updated successfully');

    }
    public function delete(User $user){
        $user->delete();
        return back()->with('success','user deleted successfully');
        
       
    }
}