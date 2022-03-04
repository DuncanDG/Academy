<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
        return view('users.index', ['users' => $user->paginate(15)]);
    }

    public function create(){
        return view('users.create');
    }
    
    //store the data enter in the add new user /create user page
    //store a new user in the db
    public function store(Request $request){

        // $this->validate($request, [
        //     'name'=>'required',
        //     'email'=> 'required|unique:users|email',
        //     'password'=> 'required',
        //     'password_confirmation'=>'required|same:password'
        // ],[
        //     'name.required' => 'Please enter a name',
        //     'email.required' => 'Please enter an email',
        //     'email.email' => 'Please enter a valid email',
        //     'email.unique' => 'The email alredy exists',
        //     'password.required'=> 'Please enter a password'
        // ]);

        // $request->merge(['password' => Hash::make($request->get('password'))]);

        // User::create($request->all());

        // return redirect()->route('users.index')->withStatus('User successfully created.');
                 
        // OR

        $user = user::create(request(['name','email','password']));

        return redirect(route('users.index'))->with('success','User Added successfully');

    }
}
