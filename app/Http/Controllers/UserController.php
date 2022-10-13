<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function recordCreation(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->validate([
                'name' => 'required|min:2|max:100',
                'phone' => 'required|phone|min:7|max:11',
                'address' => 'required|min:2|max:250',
                'case-desc' => 'required|min:10|max:1000',
            ]);



        }
    }

    public function delete($id)
    {
        $record = User::find($id);
        $record->delete($id);
        return redirect()->route('users.index');
    }
}
