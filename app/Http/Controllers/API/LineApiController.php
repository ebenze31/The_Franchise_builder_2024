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
            "group_id" => null,
        ];
        
        Group_line::firstOrCreate($save_name_group);
        $last_data = Group_line::latest()->first();

        // จับคู่กลุ่มไลน์กับบ้าน
        $groupName = str_replace(" ", "",$data_group_line->groupName);
        $num_of_group = explode("-", $groupName)[1];

        $data_home = Group::where('name_group', $num_of_group)->first();

        $update_data_hoem = [];
        $update_data_hoem['group_line_id'] = $last_data->id;

        $update_Group_line = [];
        $update_Group_line['group_id'] = $data_home->id;

        $data_home->update($update_data_hoem);
        $last_data->update($update_Group_line);

        $data = [
            "title" => "บันทึก Name Group Line",
            "content" => $data_group_line->groupName,
        ];
        MyLog::create($data);

        // $line = new LineMessagingAPI();
        // $line->send_HelloLinegroup($event,$save_name_group);

        $text_reply = "รบกวนส่งลิงก์กลุ่มไลน์นี้ให้ด้วยนะครับ" ;

        $this->send_text_to_line($event, $text_reply , $event['source']['groupId']);

    }

    function save_link_line_group($event){

        $data_group_line = Group_line::where('groupId' , $event['source']['groupId'])->first();

        if( !empty($data_group_line->group->link_line_group) ){
            $text_reply = "กลุ่มนี้มีลิงก์ไลน์กลุ่มแล้ว" ;
        }else{

            $data_home = Group::where('id', $data_group_line->group_id)->first();

            $update_data_hoem = [];
            $update_data_hoem['link_line_group'] = $event['message']['text'];
            $data_home->update($update_data_hoem);

            $text_reply = "บันทึกลิงก์ไลน์กลุ่มเรียบร้อยแล้ว" ;
        }

        // SAVE LOG
        $dataSAVELOG = [
            "title" => "บันทึกลิงก์ไลน์กลุ่ม : " . $event['message']['text'],
            "content" => "บ้านที่ : " . $data_home->name_group,
        ];
        MyLog::create($dataSAVELOG);

        $this->send_text_to_line($event, $text_reply , $event['source']['groupId']);
        
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

    function send_text_to_line($event , $text_reply , $send_to){

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
            "title" => "Send Text To Line >> " . $send_to,
            "content" => $text_reply,
        ];

        MyLog::create($data);
        return $result;
    }

}
