<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\Mylog;
use App\Models\Group_line;
use App\Models\Group;

class LineApiController extends Controller
{
    public function store(Request $request)
    {
        //SAVE LOG
        $requestData = $request->all();
        $data = [
            "title" => "Line",
            "content" => json_encode($requestData, JSON_UNESCAPED_UNICODE),
        ];
        MyLog::create($data);  

        //GET ONLY FIRST EVENT
        $event = $requestData["events"][0];

        switch($event["type"]){
            case "message" : 
                // $this->messageHandler($event);
                // SAVE LINK LINE GROUP
                if($event["source"]['type'] == 'group'){
                    $this->save_link_line_group($event);
                }
                break;
            case "postback" : 
                // $this->postbackHandler($event);
                break;
            case "join" :
                $this->save_group_line($event);
                break;
            case "memberJoined" :
                $this->check_memberJoined($event);
                break;
            case "follow" :
                // $this->user_follow_line($event);
                break;
        }
    }

    public function save_group_line($event)
    {
        $opts = [
            'http' =>[
                'method'  => 'GET',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
            ]
        ];

        $group_id = $event['source']['groupId'];

        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/group/".$group_id."/summary";
        $result = file_get_contents($url, false, $context);

        $data_group_line = json_decode($result);

        $save_name_group = [
            "groupId" => $data_group_line->groupId,
            "groupName" => $data_group_line->groupName,
            "pictureUrl" => $data_group_line->pictureUrl,
        ];
        
        Group_line::firstOrCreate($save_name_group);

        $data = [
            "title" => "บันทึก Name Group Line",
            "content" => $data_group_line->groupName,
        ];
        MyLog::create($data);

        // $line = new LineMessagingAPI();
        // $line->send_HelloLinegroup($event,$save_name_group);

    }

    public function check_memberJoined($event)
    {
        $provider_id = $event['joined']['members'][0]['userId'];
        $group_id = $event['source']['groupId'];

        // หาชื่อ user จากไลน์
        $channelAccessToken = env('CHANNEL_ACCESS_TOKEN');
        $url = "https://api.line.me/v2/bot/profile/" . $provider_id;
        $headers = array(
            "Authorization: Bearer " . $channelAccessToken,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data_response = json_decode($response, true);
        $name_user_form_line = $data_response["displayName"];
        // จบ หาชื่อ user จากไลน์
        
    }

    function save_link_line_group($event){

        // $data_group_line = Group_line::where('groupId' , $event['source']['groupId'])->first();

        // SAVE LOG
        $dataSAVELOG = [
            "title" => $event['message']['text'],
            "content" => $event['source']['groupId'],
        ];
        MyLog::create($dataSAVELOG);

        // if( !empty($data_group_line->group->link_line_group) ){
        //     $text_reply = "กลุ่มนี้มีลิงก์ไลน์กลุ่มแล้ว" ;
        // }else{
            DB::table('group_lines')
                ->where([ 
                        ['groupId', $event['source']['groupId']],
                    ])
                ->update([
                        'link_line_group' => $event['message']['text'],
                    ]);

            $text_reply = "บันทึกลิงก์ไลน์กลุ่มเรียบร้อยแล้ว" ;
        // }

        $template_path = storage_path('../public/json/message_text.json');   
        $string_json = file_get_contents($template_path);
        $string_json = str_replace("message_text", $text_reply,$string_json);

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "replyToken" => $event["replyToken"],
            "messages" => $messages,
        ];

        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '. env('CHANNEL_ACCESS_TOKEN'),
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];
                            
        $context  = stream_context_create($opts);
        //https://api-data.line.me/v2/bot/message/11914912908139/content
        $url = "https://api.line.me/v2/bot/message/reply";
        $result = file_get_contents($url, false, $context);

        // SAVE LOG
        $data = [
            "title" => "SAVE Link Line Group >> " . $data_group_line->groupName,
            "content" => $text_reply,
        ];

        MyLog::create($data);
        return $result;
    }

}
