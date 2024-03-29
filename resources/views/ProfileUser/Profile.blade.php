@extends('layouts.theme_user')

@section('content')

<style>
    .content-section {
        padding: 0 !important;
    }

    .btn-outline-light,
    #header-text-login {
        display: none;
    }

    .profile-header {
        background-color: rgb(255, 255, 255, .25);
        -webkit-border-radius:  0 0 40px 40px;    
        border-radius:  0 0 40px 40px; 
        -moz-border-radius: 0 0 40px 40px;
        -khtml-border-radius: 0 0 40px 40px;
        position: relative;
        /* padding-bottom: 5px; */
    }

    .btn-edit-profile {
        position: absolute;
        bottom: 0;
        right: 10px;


    }

    .btn-edit-profile img {
        width: 26px;
        height: 26px;
    }

    .user-new-img {
        margin-top: 20px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        -webkit-border-radius: 50%;    
        border-radius: 50%; 
        -moz-border-radius:50%;
        -khtml-border-radius:50%;
    }

    .edit-profile {
        position: relative;
    }

    .content-section {
        margin: 0;
    }

    .btn-logout {
        color: rgb(244, 244, 244, .7);
        border: 1px solid rgb(244, 244, 244, .7);
        -webkit-border-radius: 50px;    
        border-radius: 50px; 
        -moz-border-radius:50px;
        -khtml-border-radius:50px;
        font-size: 12px;
        display: flex;
        align-items: center;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        opacity: .7;
    }

    .btn-logout i {
        font-size: 15px;
        margin-top: -12px;

    }

    .textScore {
        color: #FCBF29;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .text-rank {
        color: #FCBF29;
    font-size: 20px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
    }

    .header-badges {
        color: #fff;
        margin: 40px 40px 20px 20px;
    }

    .badges-item {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .badges-item img {
        width: 90px;
        height: 90px;
    }

    .img-show-badges {
        width: 137px;
        height: 137px;
        flex-shrink: 0;
        position: absolute;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #contentBadges {
        border: #2E2E2E 1px solid;
        background-color: #686666;
    }

    #contentBadges.active {

        border: #00E0FF 1px solid;
        background-color: #07203F;
    }

    .btn-submit {
        -webkit-border-radius: 5px;    
        border-radius: 5px; 
        -moz-border-radius:5px;
        -khtml-border-radius:5px;
        width: auto;
        font-size: 16px;
        margin-top: 15px;
        padding: 10px 40px;
        background-color: #005CD3;
        color: #fff;

    }

    .btn-disabled{
        -webkit-border-radius: 5px;    
        border-radius: 5px; 
        -moz-border-radius:5px;
        -khtml-border-radius:5px;
        width: auto;
        font-size: 16px;
        margin-top: 15px;
        padding: 10px 40px;
        background-color: #5C5C5C;
        color: #fff;
    }

    .btn-submit:hover {
        border: 1px solid #00E0FF;
        box-shadow: 0px 0px 3px 1px #00FBFF;
        color: #fff;

    }.sectionBadge{
        padding-top:60p;
        display: flex;
        flex-wrap: wrap;
    }.asd{
        display: flex;
        flex-wrap: wrap;
    }.badges-item.un-active img{
        filter: grayscale(100%);
    }.textPC{
        color: #FFF;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }#close_Pending{
        position: absolute;
  top: 50%;
  right: -20px;
  transform: translate(-50%, -50%);
        z-index: 9999;
    }.modal-header{
        position: relative;
        padding: 20px;
    }
    .fix-border-right-top-section:after {
        border-right: 1px solid #fff;
        content: "";
        position: absolute;
        top: -6px;
        left: 14.5%;
        right: -4.5px;
        bottom: 0;
        z-index: 1;
        height: 160%;

    }
    
    .fix-border-right-bottom-section:after {
        border-right: 1px solid #fff;
        content: "";
        position: absolute;
        top: -4px;
        left: 14.5%;
        right: -4.5px;
        bottom: 0;
        z-index: 1;
        height: 130%;

    }
</style>
<div class="w-100 d-noe">
    <div class="profile-header w-100">
        <div class=" d-flex justify-content-center w-100">
            <div class="edit-profile" id="DivEditProfile">
                <a href="{{url('/first_profile?type=edit_profile')}}">
                    @if( !empty(Auth::user()->photo) )
                    <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" class="user-new-img" alt="รูปภาพผู้ใช้">
                    @else
                    <img src="{{ url('/img/icon/profile.png') }}" class="user-new-img" alt="รูปภาพผู้ใช้">
                    @endif
                </a>
                <a href="{{url('/first_profile?type=edit_profile')}}" class="btn-edit-profile">
                    <img src="{{ url('/img/icon/edit-profile.png') }}" alt="รูปภาพผู้ใช้">
                </a>
            </div>

        </div>

        @php
            $text_name_group = '';
            if( intval(Auth::user()->group_id) < 9 ){
                $text_name_group = '0'.Auth::user()->group_id;
            }else{
                $text_name_group = Auth::user()->group_id;
            }
        @endphp
        <div class="d-flex justify-content-center align-items-center text-white h6" style="margin-top: 10px;">
            <span>Team : {{ $text_name_group }}</span>
        </div>

        <h4 style="color: #FFF;font-size: 16px;font-style: normal;font-weight: 600;line-height: normal;margin-top: -5px;" class="text-center mb-0">
            {{Auth::user()->name}}
        </h4>
        <p class="text-center ">
            <p class="text-center text-white" style="font-size: 10px;font-style: normal;font-weight: 500;line-height: normal;">ID : {{ Auth::user()->account }}</p>
        </p>
        <a class="btn btn-logout" onclick="create_logs('000_Log out page')" style="position: absolute;top:10px;right: 20px;">
        <img class="me-2" src="{{ url('/img/icon/Logo-logout.png') }}" alt="" width="15" height="15"> &nbsp;logout
        </a>
        <a class="d-none" href="{{ route('logout') }}" id="btn-logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position: absolute;top:10px;right: 20px;"></a>


        <div id="div_my_point" class="card-body d-none">
                <table class="table table-sm mb-0" style="position: relative;">
                <thead >
                    <tr style="background-color: #D9D9D9;margin-top: 50px;">
                        <th style="width:33%;
                        border-radius: 10px 0 0 0;
                        -moz-border-radius:10px 0 0 0;
                        -khtml-border-radius:10px 0 0 0;
                        border-top: 10px solid transparent;
                        -moz-border-top: 10px solid transparent;
                        -khtml-border-top: 10px solid transparent;
                         border-bottom: none !important; 
                         -moz-border-bottom: none !important; 
                         -khtml-border-bottom: none !important; 
                         color: #07285A;
                         font-weight: bold;
                         font-size: 14px;" class="text-center">
                         <div style="position: relative;" class="fix-border-right-top-section">
                         PC
                         </div>
                        </th>
                        <th style="width:33%;
                        border-top: 10px solid transparent;
                        border-bottom: none !important; 
                        color: #07285A;
                        font-weight: bold;
                        font-size: 14px;
                        -moz-border-top: 10px solid transparent;
                        -khtml-border-top: 10px solid transparent;
                        " class="text-center">
                        <div style="position: relative;" class="fix-border-right-top-section">
                            Active agent
                        </div>
                        </th>
                        <th style="width:33%;
                        border-top: 10px solid transparent;
                        border-radius:  0 10px 0 0;
                        -moz-border-radius:10px 0 0 0;
                        -khtml-border-radius:10px 0 0 0;
                        border-bottom: none !important;  
                        color: #07285A;
                        font-weight: bold;
                        font-size: 14px; -moz-border-bottom: none !important; 
                         -khtml-border-bottom: none !important;" 
                        class="text-center">
                            New code
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="background-color: #07285A;">
                        <td style="
                        
                        border-bottom: 10px solid transparent;
                        -moz-border-bottom:  10px solid transparent;
                         -khtml-border-bottom:  10px solid transparent;
                        -moz-border-radius: 0 0  0 25px;
                        -khtml-border-radius: 0 0  0 25px;
                        border-radius:  0 0  0 25px;
                        color:#FCBF29;
                        font-size: 22px;
                        font-weight: bolder; 
                        " 
                        class="text-center" >
                        <div id="my_point_grand" class="fix-border-right-bottom-section" style="position: relative;">
                        
                        </div>
                        </td>
                        <td style="
                        border-bottom: 10px solid transparent;
                        -moz-border-bottom:  10px solid transparent;
                         -khtml-border-bottom:  10px solid transparent;
                         color:#FCBF29;font-size: 22px;
                         font-weight: bolder;
                          " class="text-center">
                          <div id="my_point_aa" class="fix-border-right-bottom-section" style="position: relative;">
                          
                        </div>
                        </td>
                        <td style="
                        border-bottom: 10px solid transparent;
                        -moz-border-bottom:  10px solid transparent;
                         -khtml-border-bottom:  10px solid transparent;
                        -moz-border-radius: 0 0  0 25px;
                        -khtml-border-radius: 0 0  0 25px;
                        border-radius:  0 0 25px 0;
                        color:#FCBF29;
                        font-size: 22px;
                        font-weight: bolder; " class="text-center" id="my_point_nc"></td>
                    </tr>
                </tbody>
            </table>
        </div>
       
<!-- 
        <div class="w-100  px-4 pb-2">
            <div class=" d-flex justify-content-evenly py-2" style="border-radius: 10px 10px 25px 25px;">
                <div class="text-center">
                    <div class="d-block">
                        <p style="color: #07285A;font-weight: bold;font-size: 14px;">Grand mission</p>
                    </div>
                    <div class="d-block">
                        <p id="" style="color:#FCBF29;font-size: 22px;font-weight: bolder;margin-top: 10px;">111</p>
                    </div>
                </div>      
                <div style="border-left: #fff 1px solid;"></div>  
                <div class="text-center">
                   <div class="d-block" style="color: #07285A;font-weight: bold;font-size: 14px;">Active agent</div>
                   <div class="d-block">
                        <p id="" style="color:#FCBF29;font-size: 22px;font-weight: bolder;margin-top: 10px;">111</p>
                   </div>
                </div>     
                <div style="border-left: #fff 1px solid;"></div>   
                <div class="text-center">
                    <div class="d-block" style="color: #07285A;font-weight: bold;font-size: 14px;">New code</div>
                    <div class="d-block">
                        <p id="" style="color:#FCBF29;font-size: 22px;font-weight: bolder;margin-top: 10px;">111</p>
                    </div>
                </div>    
            </div>
        </div> -->

        <div id="div_pc_point" class="d-none mt-1">
            <div class="d-flex justify-content-center align-items-center text-white h6">
                <span class="textPC"> PC : &nbsp;&nbsp;&nbsp;</span>
                <span id="pc_of_me" class="textScore">24.4M</span>
            </div>
            <div class="d-flex justify-content-around mt-0">
                <div class="text-center">
                    <p class="text-white" style="color: #FFF;font-size: 14px;font-style: normal;font-weight: 400;line-height: normal;">New code</p>
                    <h4 id="rank_of_me" class="text-rank"></h4>
                </div>
                <div class="text-center">
                    <p class="text-white" style="color: #FFF;font-size: 14px;font-style: normal;font-weight: 400;line-height: normal;">Grand mission</p>
                    <h4 id="rank_of_team" class="text-rank"></h4>
                </div>
            </div>
        </div>


    </div>
</div>


<div class="d-flex justify-content-between">
    <div>
        <h4 class="header-badges">
            My badges
        </h4>
    </div>
    @if( Auth::user()->role == 'Super-admin' || Auth::user()->role == 'Admin' )
    <div>
        <div style="margin: 40px 40px 20px 20px;float: right;">
            <a href="{{ url('/account_reg_success') }}" class="btn btn-sm btn-light" style="color: #041b3d!important;">{{ Auth::user()->role }}</a>
        </div>
    </div>
    @elseif( Auth::user()->role == 'Staff' )
    <div>
        <div style="margin: 40px 40px 20px 20px;float: right;">
            <a href="{{ url('/admin_scanner') }}" class="btn btn-sm btn-light" style="color: #041b3d!important;">{{ Auth::user()->role }}</a>
        </div>
    </div>
    @endif
</div>

<div id="div_badges" class="asd d-noe mt-3">

    <!-- <div class="col-4 badges-item @if( !empty(Auth::user()->shirt_size) ) active @else un-active @endif" activity="ป้าย1" onclick="open_badges(this)">
        <img src="{{ url('/img/icon/badges-1.png') }}"width="100%" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item un-active" activity="ป้าย2" onclick="open_badges(this)">
        <img src="{{ url('/img/icon/badges-4.png') }}"width="100%" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย3">
        <img src="{{ url('/img/icon/badges-3.png') }}" width="100%"alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย4">
        <img src="{{ url('/img/icon/badges-3.png') }}" width="100%"alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย5">
        <img src="{{ url('/img/icon/badges-3.png') }}"width="100%" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย6">
        <img src="{{ url('/img/icon/badges-3.png') }}" width="100%"alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย7">
        <img src="{{ url('/img/icon/badges-3.png') }}" width="100%"alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย8">
        <img src="{{ url('/img/icon/badges-3.png') }}" width="100%"alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย9">
        <img src="{{ url('/img/icon/badges-3.png') }}" width="100%"alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div> -->

</div>

<!-- Modal -->
<div class="modal fade" id="modalBadges" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content mx-5" id="contentBadges">
            <div class="modal-body p-4">
                <img id="imgContentBadges" class="img-show-badges mb-3" src="{{ url('/img/icon/badges-1.png') }}" alt="">
                <h5 class="text-center text-white mt-5" id="badgesName">asd</h5>
                <p class="text-white" id="detailBadges"></p>

                <div class="d-flex justify-content-center mt-2">
                    <button class="btn btn-submit" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
   
    .btn-service{
        position: fixed;
        bottom: 60px;
        right: 10px;
        display: block;

    }.img-service{
        width: 41px;
        height: 40px;
    }.text-contact{
        color: #FFF;

text-align: center;
font-size: 10px;
font-style: normal;
font-weight: 400;
line-height: normal;
    }.imgCloseBTN{
        width: 25px;
        height: 25px;
    }.modal-report{
    background-color: #002449;
    background-color: #002449;
    color: #fff !important;
    padding: 3px;
  }.btn-submit{
-webkit-border-radius: 5px;    
        border-radius: 5px; 
        -moz-border-radius:5px;
    -khtml-border-radius:5px;
      font-size: 16px;
      padding: 5px 40px;
      background-color: #005CD3;
      color: #fff;
    }
    .btn-submit:hover{
      border: 1px solid #00E0FF;
      box-shadow: 0px 0px 15px 1px #00FBFF;
      color: #fff;

    }
    
    .padding-btn{
        padding: 8px 20px !important;
    }.user_phone::placeholder{
font-size: 10px;
font-style: normal;
font-weight: 400;
line-height: normal;
    }#qusertion::placeholder{
font-size: 12px;
font-style: normal;
font-weight: 400;
line-height: normal;
    }.unactive-img{
        filter: grayscale(100%);
    }.user_phone:focus{
        box-shadow: none !important;
    }
    .btn.btn-service:focus {
        outline: 0;
        box-shadow: none !important;
    }
</style>

<button id="btn_contact_staff" class="btn btn-service" data-bs-toggle="modal" data-bs-target="#modal_contact_staff">               
    <img src="{{ url('/img/icon/customer-service.png') }}"  class="mt-2 mb-2 img-service">
    <p class="text-contact">Contact staff</p>
</button>

<div class="modal fade" id="modal_contact_staff"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content mx-4" style="border-radius: 10px;">
            <div class="modal-header modalHeaderrequest modal-report">
                <div class="w-100 text-center">
                    <p class="modal-request-title text-white text-center py-3" id="exampleModalLongTitle">เเจ้งปัญหาที่ต้องการให้เราช่วย</p>
                </div>
                <button id="close_Pending" type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ url('/img/icon/closeBTN.png') }}"  class="mt-2 mb-2 imgCloseBTN">
                </button>
            </div>
            <div class="modal-body">
               
                <textarea style="border-radius: 5px;border: 1px solid #002449;background: #D9D9D9;" name="question" id="question" cols="30" rows="7" class="form-control" placeholder="กรุณากรอกรายละเอียดเพิ่มเติม" oninput="check_input();"></textarea>
                <div class="col-12 w-100 mt-3">
                    <div class="input-group"> 
                        <span class="input-group-text " style="border-radius: 5px 0 0 5px;border: 1px solid #002449;background: #D9D9D9;"><i class="fa-solid fa-phone"></i></span>
                        <input style="border-radius: 0 5px 5px 0 ;border: 1px solid #002449;background: #D9D9D9;padding-left: 0px;" type="text" class="form-control border-start-0 user_phone" id="phone" name="phone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ของคุณ" value="{{ isset(Auth::user()->phone) ? Auth::user()->phone : ''}}" oninput="check_input();">
                    </div>
                </div>
                <div class=" d-flex justify-content-center">
                    <button id="btn_Send" type="button" class="btn btn-disabled padding-btn" onclick="submit_qa();" disabled>
                        Send
                    </button>

                    <button id="close_modal_Send" type="button" class="btn btn-submit padding-btn d-none" data-dismiss="modal" aria-label="Close">
                        close
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>

<button id="btn_Send_success" type="button" class="btn btn-submit padding-btn d-none" data-toggle="modal" data-target="#modal_contact_success">
    test ส่งเสร็จ
</button>

<div class="modal fade" id="modal_contact_success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content mx-5" style="border-radius: 10px;">
            <div class="modal-body text-center">
                <div class=" d-flex justify-content-center">
                    <img src="{{ url('/img/icon/contact-success.png') }}"  class="my-3" style="width: 149px;height: 71px;">
                </div>
               <p class="my-1" style="color: #07285A;font-size: 14px;font-style: normal;font-weight: 600;line-height: normal;letter-spacing: 0px;">
                    ทีมงานรับเรื่องเเล้วเเละจะติดต่อกลับภายหลัง
                </p>
                <button type="button" class="btn btn-submit padding-btn" data-dismiss="modal" aria-label="Close">
                    close
                </button>
            </div>
        </div>
    </div>
</div>


<button type="button" id="btnmodalBadges" class="btn btn-primary d-none" data-toggle="modal" data-target="#modalBadges">
    Launch demo modal
</button>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        change_menu_bar('profile');

        get_data_badges("{{ Auth::user()->id }}");

        check_input();

        get_pc_point_of_me();
    });

    var delay_time ;
    function check_input(){

        clearTimeout(delay_time);

        delay_time = setTimeout(() => {
            // console.log(Search_input);
            let question = document.querySelector('#question');
            let phone = document.querySelector('#phone');

            // console.log(question.value);
            // console.log(phone.value);

            if( question.value && phone.value ){
                document.querySelector('#btn_Send').disabled = false;
                document.querySelector('#btn_Send').classList.remove('btn-disabled');
                document.querySelector('#btn_Send').classList.add('btn-submit');
            }else{
                document.querySelector('#btn_Send').disabled = true;
                document.querySelector('#btn_Send').classList.remove('btn-submit');
                document.querySelector('#btn_Send').classList.add('btn-disabled');
            }
        }, 1000);

        
    }

    function get_data_badges(user_id){

        // console.log(user_id);
        fetch("{{ url('/') }}/api/get_data_badges" + "/" + user_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result){
                    for (let i = 0; i < result['data_badges'].length; i++) {
                        // console.log(result['data_badges'][i].name_Activities);

                        let user_activities = result['user_activities'].split(',');;
                        let activityToCheck = result['data_badges'][i].id.toString();

                        let check_activities = user_activities.includes(activityToCheck);
                        let class_show_badges ;

                        if (check_activities) {
                            // console.log("มี " + activityToCheck);
                            class_show_badges = 'active';
                        } else {
                            // console.log("ไม่มี " + activityToCheck);
                            class_show_badges = 'un-active';
                        }


                        let html_badges = `
                            <div class="col-4 badges-item `+class_show_badges+`" activity="`+result['data_badges'][i].name_Activities+`" onclick="open_badges(this);return create_logs('badges_`+result['data_badges'][i].name_Activities+`')">
                                <img src="{{ url('storage')}}/`+result['data_badges'][i].icon+`"width="100%">
                                <div class="d-none detail">
                                    `+result['data_badges'][i].detail+`
                                </div>
                            </div>
                        `;

                        document.querySelector('#div_badges').insertAdjacentHTML('beforeend', html_badges); // แทรกล่างสุด
                    }

                    if(result['data_badges'].length < 9){

                        let count = result['data_badges'].length + 1;

                        for (let zz = count; zz <= 9; zz++) {
                            let html_badges = `
                                <div class="col-4 badges-item " activity="badges `+zz+`" onclick="open_badges(this)">
                                    <img src="{{ url('/img/icon/badges-3.png') }}" width="100%"alt="รูปภาพป้ายประกาศ">
                                    <div class="d-none detail">
                                        Upcoming activities 
                                    </div>
                                </div>
                            `;

                            document.querySelector('#div_badges').insertAdjacentHTML('beforeend', html_badges); // แทรกล่างสุด
                        }

                    }
                }
        });
    }


    function open_badges(data_badges) {
        document.querySelector('#btnmodalBadges').click();
        // เช็คว่าป้ายประกาศมีคลาส "active" หรือไม่
        if (data_badges.classList.contains('active')) {

            document.querySelector('#imgContentBadges').classList.remove('unactive-img');
            document.querySelector('#contentBadges').classList.add('active');
            // ดึงรูปภาพที่อยู่ในป้ายประกาศ
            let imgElement = data_badges.querySelector('img');

            let badgesDetail = data_badges.querySelector('.detail').textContent;
            let badgesName = data_badges.getAttribute('activity');
            // ดึง URL ของรูปภาพ
            let imgUrl = imgElement.getAttribute('src');

            document.querySelector('#imgContentBadges').src = imgUrl;
            document.querySelector('#badgesName').innerHTML = badgesName;
            document.querySelector('#detailBadges').innerHTML = badgesDetail;
        } else {
            document.querySelector('#contentBadges').classList.remove('active');
            document.querySelector('#imgContentBadges').classList.add('unactive-img');
                
            let imgElement = data_badges.querySelector('img');

            let badgesDetail = data_badges.querySelector('.detail').textContent;
            let badgesName = data_badges.getAttribute('activity');
            // ดึง URL ของรูปภาพ
            let imgUrl = imgElement.getAttribute('src');

            document.querySelector('#imgContentBadges').src = imgUrl;
            document.querySelector('#badgesName').innerHTML = badgesName;
            document.querySelector('#detailBadges').innerHTML = badgesDetail;
        }

    }

    function submit_qa(){

        // console.log("submit_qa");
        let question = document.querySelector('#question');
        let phone = document.querySelector('#phone');

        document.querySelector('#btn_Send').disabled = true ;
        document.querySelector('#btn_Send').classList.remove('btn-submit');
        document.querySelector('#btn_Send').classList.add('btn-disabled');

        let data_arr = [] ;

        data_arr = {
            "user_id" : "{{ Auth::user()->id }}",
            "phone" : phone.value,
            "question" : question.value,
        };

        fetch("{{ url('/') }}/api/send_Line_Notify", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(data){
            // console.log(data);
            if(data){
                create_logs('010_Contact staff button');
                // setTimeout(() => {
                    document.querySelector('#close_Pending').click();
                    document.querySelector('#btn_Send_success').click();
                // }, 800);

            }
        }).catch(function(error){
            // console.error(error);
        });

    }


    function get_pc_point_of_me(){

        if("{{ Auth::user()->group_id }}"){
            // console.log(user_id);
            fetch("{{ url('/') }}/api/get_pc_point_of_me" + "/" + "{{ Auth::user()->id }}")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    if(result['data'] !== 'No'){

                        let originalNumber = result['data'][0].pc_point;
                        let formattedNumber = formatLargeNumber(originalNumber);

                        document.querySelector('#pc_of_me').innerHTML = formattedNumber ;
                        document.querySelector('#rank_of_me').innerHTML = result['data'][0].new_code ;
                        document.querySelector('#rank_of_team').innerHTML = result['data'][0].grandmission.toLocaleString() ;

                        document.querySelector('#my_point_grand').innerHTML = result['data'][0].grandmission.toLocaleString();
                        document.querySelector('#my_point_aa').innerHTML = result['data'][0].active_dream.toLocaleString();
                        document.querySelector('#my_point_nc').innerHTML = result['data'][0].new_code.toLocaleString();

                        document.querySelector('#my_point_grand').innerHTML = result['data'][0].grandmission.toLocaleString();
                        document.querySelector('#my_point_aa').innerHTML = result['data'][0].active_dream.toLocaleString();
                        document.querySelector('#my_point_nc').innerHTML = result['data'][0].new_code.toLocaleString();

                        // document.querySelector('#div_pc_point').classList.remove('d-none');
                        document.querySelector('#div_my_point').classList.remove('d-none');
                    }

            });
        }

    }

    function formatLargeNumber(number) {
        // if (number >= 1e6) { // 1e6 = 1,000,000
        //     return (number / 1e6).toFixed(3).slice(0, -1) + 'M';
        // } else {
        //     return number.toLocaleString();
        // }

        return number.toLocaleString();

    }
    
    // function create_logs(log_content) {
    //     let user_id = "{{ Auth::user()->id }}";
    //     let role = "{{ Auth::user()->role }}";
      
    //     fetch(`{{ url('/') }}/api/create_logs?user_id=${user_id}&role=${role}&content=${log_content}`)
    //         .then(response => response.json())
    //         .then(result => {
    //             // console.log(result);
    //             document.querySelector('#btn-logout').click();
    //         })
    // }
</script>
@endsection