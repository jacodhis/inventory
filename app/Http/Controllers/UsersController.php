<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Shop;
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
        $shops = Shop::get();
        return view('users.create',compact('roles','shops'));
    }
    public function store(UserRequest $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
            'role_id'=>$request->role_id,
            'shop_id'=>$request->shop_id
        ]);
        return back()->with('success','user has been created successfully');
    }
    public function edit( $user){
        $shops = Shop::get();
        $roles = Role::where('id',"!=",1)->get();
        $user = User::findorFail($user);
        return view('users.edit',compact('user','roles','shops'));
    }
    public function update(Request $request,User $user){

       $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'phone'=>'required',
            'password' => ['required', 'string', 'min:8', ],
            'role_id'=>'required',
            'shop_id'=>'required'
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
            'role_id'=>$request->role_id,
            'shop_id'=>$request->shop_id
        ]);
       

        return back()->with('success','user has been updated successfully');

    }
    public function delete(User $user){
        $user->delete();
        return back()->with('success','user deleted successfully');
        
       
    }
}