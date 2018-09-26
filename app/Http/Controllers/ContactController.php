<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function creatContact()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
            $this->validate($request,[
                'fullname' => 'required|max:255',
                'email' => 'required|email',
                'message' => 'required'
            ]);
            return redirect()->back()->with('flash_message','All entries are valid');
    }
}
