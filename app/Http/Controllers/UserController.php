<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('users.index',[
            'users' => $users
        ]);
    }

    public function show($id)
    {
        //$user = User::where('id', '=', $id)->first();

        if(!$user = User::find($id)){
            return redirect()->route('users.index');
        }

        return view('users.show', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        //dd($request->all());
        //dd($request->only(['name']));

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($request->all());

        /*$user = new User();
        $user->name = $request->name;
        $user->email = $request->name;
        $user->password = bcrypt($user->password);
        $user->save();*/

        //return redirect()->route('users.index');
        return redirect()->route('users.show', $user->id);
    }

    public function edit($id)
    {
        if(!$user = User::find($id)){
            return  redirect()->route('users.index');
        }

        return view('users.edit',[
            'user' => $user
        ]);
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if(!$user = User::find($id)){
            return  redirect()->route('users.index');
        }

        //dd($request->all());

        /*$user = new User();
       $user->name = $request->name;
       $user->email = $request->name;
       $user->password = bcrypt($user->password);
       $user->save();*/

        $data = $request->only('name', 'email');
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.show', $user->id);
    }
}
