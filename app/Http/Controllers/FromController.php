<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Declaration;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\HomeController;

class FromController extends Controller
{
    public function createStatement(Request $request,$id)
    {
        if($request->method() == 'POST'){
            $this->validate($request,[
                'massage' => 'required',
                'doctor' => 'required'
            ],[
                'massage.required' => 'укажите сообщение',
                'doctor.required' => 'укажите доктора'
                ]);
            Declaration::create([
                'massage' => $request->massage,
                'id_doctor' => $request->doctor,
                'id_user' => Auth::user()->id
            ]);

            return view('hospital.answer');
        }
        if(isset($id)){
            $id = $id;
        }
        else {
            $id = Null;
        }
        $doctors = User::where('role','=','doctor')
            ->get();
        return view('hospital.statement_form',['doctors'=>$doctors,'id'=>$id]);
    }

}
