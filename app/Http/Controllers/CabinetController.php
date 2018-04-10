<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Declaration;
use App\User;

class CabinetController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $id_doctor = [];
        $doctors = [];
        $i = 0;
        $declorations = Declaration::where('id_user','=',$user->id)
            ->get();
        foreach ($declorations as $decloration){
            $id_doctor[$i] = $decloration->id_doctor;
            $i++;
        }
        for( $i = 0 ; $i<count($id_doctor) ;$i++ ){
            $doctors[$i] = User::where('id','=',$id_doctor[$i])
                ->get();
        }

        return view('hospital.cabinet',['user' => $user ,'doctors'=>$doctors,'declorations'=>$declorations]);
    }

    public function DoctorCabinet(){
        $user = Auth::user();
        return view('hospital.doctor_cabinet',['user'=>$user]);
    }


}
