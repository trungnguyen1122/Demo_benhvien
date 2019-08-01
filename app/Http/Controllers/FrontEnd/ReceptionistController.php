<?php

namespace App\Http\Controllers\FrontEnd;

use App\Events\AddToQueue;
use App\Model\Booking;
use App\Model\Node;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Events\UpdateStatusQueue;

class ReceptionistController extends Controller
{
    public function getBooking(){
        return view('FrontEnd.receptionist.booking');
    }
    public function getFromBooking($h) {
        $today = Carbon::today();
        $time = $today->addHours($h);
        $booking_list = Booking::where('status', 1)
            ->where('datetime', $time->toDateTimeString())->get();
        return $booking_list;
    }
    public function addBookingToQueue($h) {
        $booking_list = $this->getFromBooking($h);
        foreach ($booking_list as $b) {
            $node = new Node();
            $node->user_id = $b->user_id;
            $node->expected_time = 15;
            $node->status = 0;
            $node->priority = 0;
            $node->khoa_id = $b->khoa_id;
            $node->answer = $b->answer;
            $node->save();
            $b->update(['status', 0]);
        }
    }
     public function getPatientList() {
        $nodes = Node::all();
        $total_time  = 0;
        $n_doctor = 10;

        for($i = 0; $i < count($nodes); $i++) {
            $total_time += $nodes[$i]->expected_time;
        }
        $now = Carbon::now();
        $t = $now->addMinutes($total_time/$n_doctor + 5);
        if($t->minute > 45 && $t->minute< 59) {
            $this->addBookingToQueue($t->hour+1);
         }
        $done_time = $t->toTimeString();

        return view('FrontEnd.receptionist.patientlist',['nodes'=>$nodes,'done_time'=>$done_time]);

    }
    public function addUser(Request $request) {
        $data = $request->input('data');


        // Dang ki thong tin nguoi dung
        $birthday = Carbon::createFromFormat('d/m/Y',$data['birthday'])->toDateTimeString();
        $user = new User();
        $user->role = 0;
        $user->password = Hash::make('12345678');
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->birthday = $birthday;
        $user->phone = $data['phone'];
        $user->address = $data['address'];

        $user->save();
        $node = new Node();
        $node->user_id = 1;
        $node->priority = 0;
        $node->status = 1;
        $node->khoa_id = $data['khoa_id'];
        $node->answer = $data['answer'];
        $node->save();

        // tao event
        event(new AddToQueue());
        // Tinh thoi gian kham xong het queue

//        $nodes = Node::all();
//        $total_time  = 0;
//        $n_doctor = 10;
//        for($i = 0; $i < count($nodes); $i++) {
//            $total_time += $nodes[$i]->expected_time;
//        }
//        $now = Carbon::now();
//        $t = $now->addMinutes($total_time/$n_doctor);
//        $done_time = $t->toTimeString();
//
//
//        return view('FrontEnd.receptionist.patientlist', ['nodes'=>$nodes, 'done_time'=>$done_time]);
        return $this->getPatientList();
    }
    public function getConfirm(){
        $now = Carbon::now()->toDateTimeString();
        $booking_list = Booking::where('status',1)->where('datetime', ">", $now)->get();
        return view('FrontEnd.receptionist.formconfirm',['list'=>$booking_list]);
    }

    public function confirm(Request $request){
        $user_id = $request->input('user_id');
        Booking::where('user_id', $user_id)->update(['status'=>0]);
        Node::where('user_id' , $user_id)->update(['status'=>1]);
        event(new UpdateStatusQueue());

        return $this->getPatientList();
    }
}
