<?php

namespace App\Http\Controllers\FrontEnd;

use App\Model\Booking;
use App\Model\Medicine;
use App\Model\Node;
use App\Model\Prescription;
use App\Model\Question;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Model\Order;
use Illuminate\Support\Facades\Input;
use Image;


class UserController extends Controller
{

    public function updateUser(Request $request){
        $birthday = Carbon::createFromFormat('d/m/Y', $request->input('birthday'))->toDateTimeString();
        Auth::user()
            ->update(['email'=>$request->input('email'),'birthday'=>$birthday,'phone'=>$request->input('phone'),'address'=>$request->input('address'),'gender'=>$request->input('gender'),'remember_token'=>$request->input('remember'),'comment'=>$request->input('comment')]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(150,150)->save(public_path('/uploads/image/'. $filename));
            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }
        return view('FrontEnd.user.update_user',array('user'=>Auth::user()));
    }

    public function getPrescription($id){
        $order = Order::find($id);
        $donthuoc = $order->don_thuoc;
        $donthuoc1 = json_decode($donthuoc);
        //dd($donthuoc1);
        return view('FrontEnd.user.prescription',['json'=>$donthuoc1]);
    }
    public function getMedicalrecord($id){
        $order = Order::find($id);
        return view('FrontEnd.user.medicalrecord',['order'=>$order]);
    }

    public function getHistory() {
        $orders = Order::where('user_id', Auth::user()->user_id)->orderBy('creation_date', 'desc')->get();

        return view('FrontEnd.user.history',['orders'=>$orders]);
    }

    public function getCalendar(){

        $isBooking = Booking::where('user_id', Auth::user()->user_id)
            ->where('status', 1)
        ->count();
        $b = Booking::where('user_id', Auth::user()->user_id)
            ->where('status', 1)->first();
        if($isBooking > 0) {
            return view('FrontEnd.user.succes', ['b'=>$b]);
        }
        $now = new Carbon();
        $data = [];
        for($i = 0; $i < 3; $i++) {
            $date = $now->toDateString();
            for($h = 8; $h < 18; $h++) {
                $datetime = $date." ".$h.":00:00";
                $data[] = Booking::where('datetime', $datetime)
                    ->where('status', 1)->count();
            }
            $now->addDay();
        }
        return view('FrontEnd.user.calendar', ['data'=>$data]);
    }

    public function confirm(Request $request) {
        $data = $request->input('data');
        $booking = new Booking();
        $booking->user_id = $data['user_id'];
        $booking->datetime = $data['date_time'];
        $booking->status  = 1;
        $booking->answer = $request->input('answer');
        $booking->khoa_id = $request->input('khoa');
        $booking->save();


//        $to_name = Auth::user()->name;
//        $to_email = Auth::user()->email;
//        $data = array('name'=>"Sam Jose", "body" => "Test mail");
//
//        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
//            $message->to($to_email, $to_name)
//                ->subject('Artisans Web Testing Mail');
//            $message->from('FROM_EMAIL_ADDRESS','Artisans Web');
//        });
        return view('FrontEnd.user.succes', ['b'=>$booking]);
    }

    public function getQuestion(Request $request) {
        $questions = Question::where('khoa_id', $request->input('data'))->get();
        return view('FrontEnd.user.list_question', ['questions'=>$questions]);
    }
    public function cancel() {
        Booking::where('user_id', Auth::user()->user_id)
            ->where('status', 1)
            ->update(['status'=> 0]);
        $isBooking = Booking::where('user_id', Auth::user()->user_id)
            ->where('status', 1)
            ->count();
        if($isBooking > 0) {
            return view('FrontEnd.user.succes');
        }
        $now = new Carbon();
        $data = [];
        for($i = 0; $i < 3; $i++) {
            $date = $now->toDateString();
            for($h = 8; $h < 18; $h++) {
                $datetime = $date." ".$h.":00:00";
                $data[] = Booking::where('datetime', $datetime)
                    ->where('status', 1)->count();
            }
            $now->addDay();
        }
        return view('FrontEnd.user.calendar', ['data'=>$data]);
    }
    public function ajax() {
        $nodes = Node::all();
        return  view('FrontEnd.doctor.ajax_table_list', ['nodes'=>$nodes]);
    }
}
