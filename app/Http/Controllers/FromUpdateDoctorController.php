<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class FromUpdateDoctorController extends Controller
{
    public function UpdateDoctor($id,Request $request)
    {
        $doctor = User::where('id','=',$id)
            ->get();
        if($request->method() == 'POST'){
            $this->validate($request,[
                'full_name' => 'required|string',
                'email' => 'required|email',
                'number' => 'required',
                'address' => 'required',
                'specialization'=> 'required|string',
                'start_working' => 'required|date_format:"H:i:s"',
                'finish_working' => 'required|date_format:"H:i:s"',
                'about_doctor' => 'required'
            ],[
                'full_name.required' => 'Укажите ФИО',
                'email.required' => 'Укажите Email',
                'email.email' => 'Не верный формат ввода',
                'number.required' => 'Укажите номер телефона',
                'address.required' => 'Укажите адрес',
                'specialization.required' => 'Укажите специализацию',
                'start_working.required' => 'Укажите времня начала рабочего дня доктора',
                'start_working.date_format' => 'Укажите верный формат временим (час:минта:секунды)',
                'finish_working.required' => 'Укажите времня конца рабочего дня доктора',
                'finish_working.date_format' => 'Укажите верный формат временим (час:минта:секунды)',
                'about_doctor.required' => 'Укажите информацию о доктрое',
            ]);

            if(!empty($request->img)){
                $image =  'storage/app/'.$request->img->store('images');
            }

            else {
                $image = $doctor[0]->path_to_image;
            };

            $full_name = $request->full_name;
            $email = $request->email;
            $number = $request->number;
            $address = $request->address;
            $specialization = $request->specialization;
            $start_working = $request->start_working;
            $finish_working = $request->finish_working;
            $about_doctor = $request->about_doctor;

            $doctor = ['full_name' => $full_name ,'email' => $email ,'number' => $number,
                'address' => $address,'specialization' =>$specialization, 'start_working'=> $start_working ,
                'finish_working' =>$finish_working , 'about_doctor' => $about_doctor , 'path_to_image' => $image];

            User::where('id','=',$id)
                ->update($doctor);
            return redirect('home');
        }

        return view('hospital.update_form',['doctor'=>$doctor[0]]);
    }

    public function AddDoctor(Request $request){
        if($request->method() == 'POST'){
            $this->validate($request,[
                'full_name' => 'required|string',
                'email' => 'required|email',
                'password' => 'required',
                'number' => 'required',
                'address' => 'required',
                'specialization'=> 'required|string',
                'start_working' => 'required|date_format:"H:i:s"',
                'finish_working' => 'required|date_format:"H:i:s"',
                'about_doctor' => 'required'
            ],[
                'full_name.required' => 'Укажите ФИО',
                'email.required' => 'Укажите Email',
                'email.email' => 'Не верный формат ввода',
                'number.required' => 'Укажите номер телефона',
                'address.required' => 'Укажите адрес',
                'specialization.required' => 'Укажите специализацию',
                'start_working.required' => 'Укажите времня начала рабочего дня доктора',
                'start_working.date_format' => 'Укажите верный формат временим (час:минта:секунды)',
                'finish_working.required' => 'Укажите времня конца рабочего дня доктора',
                'finish_working.date_format' => 'Укажите верный формат временим (час:минта:секунды)',
                'about_doctor.required' => 'Укажите информацию о доктрое',
            ]);

            $image = (isset($request->img)) ?  'storage/app/'.$request->img->store('images') : 'storage/app/images/default.png';

            $full_name = $request->full_name;
            $password = Hash::make($request->password);
            $email = $request->email;
            $number = $request->number;
            $address = $request->address;
            $specialization = $request->specialization;
            $start_working = $request->start_working;
            $finish_working = $request->finish_working;
            $about_doctor = $request->about_doctor;
            $role = 'doctor';

            $doctor = ['full_name' => $full_name , 'email' => $email ,'password' => $password ,
                'number' => $number , 'address' => $address , 'specialization' => $specialization ,
                'start_working' => $start_working , 'finish_working' => $finish_working ,
                'about_doctor' => $about_doctor  , 'path_to_image' => $image , 'role' => $role];
            User::insert($doctor);

            return redirect('home');
        }
        $isAddForm = 'ok';
        return view('hospital.update_form',['isAddForm' => $isAddForm]);
    }

}
