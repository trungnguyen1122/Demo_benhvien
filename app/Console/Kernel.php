<?php

namespace App\Console;
use App\Model\Booking;
use App\Model\Node;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('inspire')
//                  ->hourly();
//
        $schedule->call(function() {
           Node::where('priority', 1)->where('status', 0)->delete();
        })->name('remove')->withoutOverlapping(1)->hourly();

        // tu dong them nguoi dat online vao hang doi truoc 15p
        $schedule->call(function() {
            $now = new Carbon();
            $nextHour = $now->hour + 1;
            $today = Carbon::today();
            $time = $today->addHours($nextHour);
            $booking_list = Booking::where('datetime', $time)
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
        })->name('add')->withoutOverlapping(1)->hourlyAt(45);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
