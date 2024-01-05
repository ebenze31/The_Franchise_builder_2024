<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\User;

class CheckWaitHost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name'; ($signature ชื่อสำหรับเรียกใช้ command)
    protected $signature = 'cron:check_wait_host';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check_wait_host everyMinute';

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
     * @return int
     */
    public function handle()
    {
        $userId = 1 ;
        $user = User::find($userId); // แทน $userId ด้วย ID ของผู้ใช้ที่คุณต้องการตรวจสอบ

        if ($user) {
            $timeRequested = Carbon::parse($user->time_request_join);
            $currentTime = Carbon::now();

            $hoursDifference = $timeRequested->diffInHours($currentTime);

            if ($hoursDifference >= 24) {
                // ผ่านไปมากกว่าหรือเท่ากับ 24 ชั่วโมง
                // ทำสิ่งที่คุณต้องการทำในกรณีนี้
            } else {
                // ยังไม่ครบ 24 ชั่วโมง
                // ทำสิ่งที่คุณต้องการทำในกรณีนี้
            }
        } else {
            // ไม่พบผู้ใช้
        }
    }

}
