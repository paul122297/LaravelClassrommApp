<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\AccountRequest;
use Carbon;

class AccountsController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('accounts.index')->with('users', $users);
    }

    public function store(AccountRequest $request)
    {
        //$teacher = User::where('role', 1)->count();

        if($request->role == 0){
            return redirect('home')->with('error', 'Invalid request');
        }

        $user = new User;
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('accounts')->with('success', 'Account successfully Created');
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('accounts.edit')->with('user', $user);
    }

    public function update(AccountRequest $request, $id)
    {
        //$teacher = User::where('role', 1)->count();

        if($request->role == 0){
            return redirect('home')->with('error', 'Invalid request');
        }

        $user = User::find($id);
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('accounts')->with('success', 'Account successfully Updated');
    }

    public function activate($id)
    {
       $user = User::find($id);
       $user->email_verified_at = Carbon\Carbon::now();
       $user->save();

       return redirect('accounts')->with('success', 'Account successfully Activated');
    }

    public function destroy($id)
    {
       $post = User::find($id);
       $post->delete();

       return redirect('accounts')->with('error', 'Post successfully deleted');
    }

}
