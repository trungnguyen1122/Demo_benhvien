<?php

namespace App\Console\Commands;

use App\Model\Booking;
use App\Model\Node;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AddToQueue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add from booking to queue';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = new Carbon();
        $nextHour = $now->hour + 1;
        $today = Carbon::today();
        $time = $today->addHours($nextHour);
        $booking_list = Booking::where('datetime', $time->toDateTimeString())
            ->where('status', 1)
            ->get();
        foreach ($booking_list as $b) {
            $node = new Node();
            $node->stt = 2;
            $node->user_id = $b->user_id;
            $node->status = 0;
            $node->priority = 1;
            $node->save();
            $b->update(['status'=>0]);
        }
    }
}
