<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\User;
use App\Models\Group;

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
        $data_user = User::where('time_request_join' , '!=' , null)->get(); 

        foreach ($data_user as $item) {
            if ($item->id) {
                $timeRequested = Carbon::parse($item->time_request_join);
                $currentTime = Carbon::now();

                $hoursDifference = $timeRequested->diffInHours($currentTime);
                // echo $item->id . " ผ่านไปแล้ว >> " . $hoursDifference . " ชม.<br>";

                $member_id_to_add = $item->id; 
                $data_group = Group::where('id', $item->group_id)->first();
                // $list_member = json_decode($data_group->member, true);
                $list_request_join = json_decode($data_group->request_join, true);

                if ($hoursDifference >= 24) {
                    // ผ่านไปมากกว่าหรือเท่ากับ 24 ชั่วโมง

                    DB::table('users')
                        ->where([ 
                                ['id', $item->id],
                            ])
                        ->update([
                                'group_status' => 'Time out',
                                'time_request_join' => null,
                            ]);

                    // ลบ $member_id_to_add ออกจาก $list_request_join
                    $list_request_join = array_diff($list_request_join, [$member_id_to_add]);

                    // ตรวจสอบว่า $list_request_join ว่างหรือไม่
                    if (empty($list_request_join)) {
                        // ถ้าว่างให้กำหนดค่าเป็น null
                        $data_group->request_join = null;
                    } else {
                        // ไม่ว่างให้ encode กลับเป็น JSON และอัปเดตในฐานข้อมูล
                        $list_request_join = array_values($list_request_join);
                        $data_group->request_join = json_encode($list_request_join);
                    }

                    // อัปเดตข้อมูลในฐานข้อมูล
                    // $data_group->member = json_encode($list_member);
                    $data_group->save();

                }

            } else {
                // ไม่พบผู้ใช้
            }
        }
    }

}
