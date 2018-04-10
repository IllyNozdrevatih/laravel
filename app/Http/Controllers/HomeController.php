<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Declaration;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->role == 'doctor'){
            $id_client = [];
            $clients = [];
            $declorations = [];
            $i = 0;
            $declorations = Declaration::where('id_doctor','=',$user->id)
                ->get();
            foreach ( $declorations as $decloration){
                $id_client[$i] = $decloration->id_user;
                $i++;
            }
            for ($i = 0;$i < count($id_client);$i++){
                $clients[$i] = User::where('id','=',$id_client[$i])
                    ->get();
            }
            for ($i = 0;$i < count($id_client);$i++){
                $declorations[$i]['client_name'] = $clients[$i][0]->full_name;
                $declorations[$i]['client_id'] = $clients[$i][0]->id;
            }

            $waitng_declorations = $this->GetСountWaitingDecloration($user->id);
            $accept_declorations = $this->GetСountAcceptDecloration($user->id);
//             [ 'user'=>$user ,'declorations' => $declorations ,
//                'clients' => $clients ]
            return view('hospital.doctor_cabinet',compact('user','declorations',
                'waitng_declorations','accept_declorations'));
        }

        elseif($user->role == 'admin'){
            $doctors = User::where('role','=','doctor')
                ->get();
            foreach ($doctors as $doctor){
                $doctor['declaration_count'] = $this->GetCountDecloration($doctor->id);
                $doctor['declaration_accept'] = $this->GetСountAcceptDecloration($doctor->id);
            }
            return view('hospital.admin_cabinet',['doctors'=>$doctors ]);
        }

        $id_doctor = [];
        $doctors = [];
        $i = 0;
        $declorations = Declaration::where('id_user',$user->id)
            ->orderBy('created_at','DESC')
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

    public function sendSMS($id){

        $user = Auth::user();

        $id_doctor = [];
        $doctors = [];
        $i = 0;
        $declorations = Declaration::where('id_user',$user->id)
            ->orderBy('created_at','DESC')
            ->get();
        foreach ($declorations as $decloration){
            $id_doctor[$i] = $decloration->id_doctor;
            $i++;
        }
        for( $i = 0 ; $i<count($id_doctor) ;$i++ ){
            $doctors[$i] = User::where('id','=',$id_doctor[$i])
                ->get();
        }
        $doctor = User::where('id',$id)->get();
        $number = $doctor[0]->number;
        $nexmo = app('Nexmo\Client');


        $id = $doctor[0]->id;
        Declaration::where('id_doctor',$id)
            ->where('id_doctor', $id)
            ->update(['send_sms' => 1]);
        return view('hospital.cabinet',['user' => $user ,'doctors'=>$doctors,'declorations'=>$declorations ]);
    }

    /**
     * Получение всех докторов
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function GetAllDoctors(){
        $doctors = User::where('role','=','doctor')
            ->paginate(4);
        return view('hospital.doctors_page',['doctors' => $doctors]);
    }
    /**
     * Функция получение профиля пользователя
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function GetUser($id){
        $user = User::where('id','=',$id)
            ->get();
        $status = 'ne-ok';
        $declorations = [];
        $i=0;
        if($this->GetСountAcceptDecloration($user[0]->id)){
            if(Auth::user()->role == 'admin'){
                 if($user[0]->role == 'doctor'){
                     $declorations = Declaration::where('id_doctor',$user[0]->id)
                         ->get();
                     if($declorations[0]->status == 'принят'){
                         foreach ( $declorations as $decloration){
                             $id_client[$i] = $decloration->id_user;
                             $i++;
                         }
                         for ($i = 0;$i < count($id_client);$i++){
                             $clients[$i] = User::where('id','=',$id_client[$i])
                                 ->get();
                         }
                         for ($i = 0;$i < count($id_client);$i++){
                             $declorations[$i]['client_name'] = $clients[$i][0]->full_name;
                             $declorations[$i]['client_id'] = $clients[$i][0]->id;
                         }
                         $status = 'ok';
                     }
                 }
            }
        }
        return view('hospital.user_profile',['user'=>$user[0] , 'status' => $status ,
            'declorations' => $declorations]);
    }
    /**
     * Функция принятия заявления
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function AcceptDecloration($id){
        Declaration::where('id','=',$id)
            ->update(['status' => 'принят']);
       return back();
    }

    /**
     * Функция отказа от заявления
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function RefuseDecloration($id){
        Declaration::where('id','=',$id)
            ->update(['status' => 'отказ']);
        return back();
    }
    /**
     * Функция получения количества договоров
     * @param $id
     * @return int
     */
    public function GetCountDecloration($id){
        $decloration = Declaration::where('id_doctor','=',$id)
            ->get();
        $count = count($decloration);
        return $count;
    }

    /**
     * Функция получения количества принятых договоров
     * @param $id
     * @return int
     */
    public function GetСountAcceptDecloration($id){
        $declorations = Declaration::where('id_doctor','=',$id)
            ->get();
        $count = 0;
        foreach ( $declorations as $decloration ){
            if ($decloration->status == 'принят'){
                $count++;
            }
        }
        return $count;
    }

    /**
     * Функция получения количества  договоров статуса ожидания
     * @param $id
     * @return int
     *
     */
    public function GetСountWaitingDecloration($id){
        $declorations = Declaration::where('id_doctor','=',$id)
            ->get();
        $count = 0;
        foreach ( $declorations as $decloration ){
            if ($decloration->status == 'ожидание'){
                $count++;
            }
        }
        return $count;
    }

    /**
     * Функция удаления договора и удаления доктора
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function DeleteDoctor($id){
        Declaration::where('id_doctor',$id)->delete();
        User::destroy($id);
        return back();
    }
}
