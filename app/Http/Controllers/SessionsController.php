<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}
    public function create()
    {
    	return view('sessions.create');
    }

    public function store() 
    {
    	var_dump(request(['email', 'password'])); exit;
    	if (! auth()->attempt(request(['email', 'password']))) {
    		return back()->withErrors([
    			'message' => 'something is wrong'
    			]);
    	}
    	return redirect()->home();
    }
    public function destroy() 
    {
    	auth()->logout();
    	return redirect()->home();
    }
}
