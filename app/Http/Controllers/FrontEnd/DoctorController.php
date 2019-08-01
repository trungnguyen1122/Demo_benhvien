<?php

namespace App\Http\Controllers\FrontEnd;

use App\Events\DoctorGetPatient;
use App\Model\Booking;
use App\Model\Doctor;
use App\Model\Medicine;
use App\Model\Order;
use App\Model\Question;
use App\User;
use App\Model\Node;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;

class DoctorController extends Controller
{
    public function getUpdate() {
        return view('FrontEnd.doctor.update_doctor');
    }
    public function updateDoctor(Request $request){
        $birthday = Carbon::createFromFormat('d/m/Y', $request->input('birthday'))->toDateTimeString();
        Auth::user()
            ->update(['email'=>$request->input('email'),
                'birthday'=>$birthday,
                'phone'=>$request->input('phone'),
                'address'=>$request->input('address'),
                'gender'=>$request->input('gender'),
                'remember_token'=>$request->input('remember'),
                'comment'=>$request->input('comment')]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(150,150)->save(public_path('/uploads/image/'. $filename));
            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }
        return view('FrontEnd/doctor/update_doctor',array('user'=>Auth::user()));
    }
    public function getPatientList(){

        $nodes = Node::orderBy('priority', 'desc')->get();

        return view('FrontEnd.doctor.patientlist_doctor',['nodes'=>$nodes]);
    }
    public function getHistory(Request $request){
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        return view('FrontEnd.doctor.medical_examination_doctor',['user'=>$user]);
    }
    public function setHistory(Request $request) {
        $user_id = $request->input('user_id');
        return view('FrontEnd.doctor.medical_examination_doctor',['user_id'=>$user_id]);
    }

        public function popPatient(Request $request) {

            event(new DoctorGetPatient(Auth::user()->user_id));
            $medicines = Medicine::all();
            $phpJson = json_encode($medicines);
            $user_id = $request->input('user_id');
            $nodes = Node::where('user_id', $user_id)->get();

            $user = User::find($user_id);
            $node = $nodes[0];
            $questionsObj = Question::where('khoa_id',$node->khoa_id)->get()->toArray();
            $nodes[0]->delete();
            $questions = array_map(function ($item) {
                return $item['question'];
            }, $questionsObj);
            $json = $node->answer;
            $answers = json_decode($json);
            $rows = array_combine($questions, $answers);

            return view('FrontEnd.doctor.medical_examination_doctor', ['user' => $user,'phpJson'=>$phpJson, 'rows'=>$rows]);

    }

    public function setPrescription(Request $request){
        $user_id = $request->input('user_id');
        $doctor = Doctor::where('user_id', Auth::user()->user_id)->first();
        $chuandoan = $request->input('chuandoan');
        $nguyennhan = $request->input('nguyennhan');
        $dieutri = $request->input('dieutri');
        $donthuoc = $request->input('donthuoc');
        $order = new Order();
         $order->doctor_id = $doctor->doctor_id;
         $order->user_id = $user_id;
         $order->chuan_doan = $chuandoan;
         $order->nguyen_nhan = $nguyennhan;
         $order->dieu_tri = $dieutri;
        $order->don_thuoc = $donthuoc;
        $order->save();
//        $medicines = Medicine::all();
//        $phpJson = json_encode($medicines);
//        return view('FrontEnd.doctor.prescription_doctor',['user'=>$user,'phpJson'=>$phpJson]);
      return $this->getPatientList();
    }

//    public function addMedicine(Request $request){
//        $data = $request->input('data');
//        $user_id = $request->input('user_id');
//
//        Order::where('user_id', $user_id)->orderBy('order_id','desc')
//            ->first()
//            ->update(['don_thuoc'=>$data]);
//
//    }
    public function getLeave(){
        return view('FrontEnd.doctor.leave');
    }
    public function getAnnouncement(){
        return view('FrontEnd.doctor.announcement');
    }
    public function getNote(){
        return view('FrontEnd.doctor.note');
    }
}
