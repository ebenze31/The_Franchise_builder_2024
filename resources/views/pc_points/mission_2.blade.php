@extends('layouts.theme_user')
@section('content')
<style>
    *:not(i){
        font-family: Sukhumvit !important;
        letter-spacing: 0px !important;
      -webkit-letter-spacing: 0px !important;  
      letter-spacing:0px !important; 
      -moz-letter-spacing:0px !important;
      -khtml-letter-spacing:0px !important;
        word-spacing: 0rem !important;
        -webkit-word-spacing: 0rem !important;
        -moz-word-spacing: 0rem !important;
    }
    .header-team {
        position: relative;
        margin-top: 55px;
        padding: 5px 5px 15px 15px;
        background: rgb(7, 139, 166);
        background: linear-gradient(180deg, rgba(7, 139, 166, 1) 0%, rgba(40, 63, 136, 1) 51%, rgba(8, 49, 90, 1) 84%, rgba(11, 40, 70, 1) 100%);
        border-radius: 10px 0 0 0;
        display: flex;
        align-items: center;

    }

    .header-team img {
        width: 100px;
        height: 100px;
        position: absolute;
        bottom: 0;
        left: 15px;
    }

    .header-team .detail-team {
        text-indent: 110px;
        color: #fff;
        font-weight: lighter;
    }

    .content-section {
        margin-top: -20px;
        padding: 0;
    }.memberInRoom{
        padding: 0px 10px 10px 15px;
    }

    .member-section {
    width: 100%;
  }
  .member-item{
            margin: 10px 2px;
            
        }
  @media only screen and (max-width: 680px) {
        .member-item{
            width: 32%;
            margin: 10px 2px;
            /* margin-bottom: 75px !important; */
            
        }
         
        .member-section{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
            width: 100%;
        }
    }
   
    @media only screen and (min-width: 680px) {
        .member-item{
            width: 150px;
        }
         
        .member-section{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;

            margin-top: 50px;
            width: 100%;
        }
    }
   
    .member-card{
        background-color: #fff;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        position: relative;
    }.member-card-join{
        background-color: #fff;
        padding: 10px;
        border-radius: 10px;
        position: relative;
    }.host-member{
        position:absolute;
        right: -10px;
        top: -10px;
        background-color: #fff;
        border-radius: 50%;
        width: 31px;
        height: 31px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 2px 0 0 0;
    }.host-member i{
        margin-left: 5px;
        /* margin-top: 0px; */
        font-size: 17px;
    }.img-member{
        width: 100%;
height: 87px;
        /* outline: 1px solid #000; */
        border-radius: 5px;
        -webkit-border-radius: 5px; 
    -moz-border-radius: 5px;
        object-fit: cover;
    }.btn-submit {
    border-radius: 5px;
    width: auto;
    font-size: 16px;
    margin-top: 15px;
    padding: 8px 35px;
    background-color: #005CD3;
    color: #fff;
  }

  .btn-submit:hover {
    border: 1px solid #00E0FF;
    box-shadow: 0px 0px 15px 1px #00FBFF;
    
    color: #fff;

  }#header-text-login {
        width: 45% !important;
    }

    .btn-sort-data{
        /* padding: 6px 20px ; */
        width: 100px;
        background-color: rgb(0, 155, 176 , .61);
        border: 1px solid #00E0FF;
        color: #fff;
        font-weight: bold;
    }

    .btn-sort-data:hover{
        color: #055683;
        border: 1px solid #00E0FF;
        background-color: #00E0FF;
        font-weight: bold;
    }
    .btn-sort-data.active{
        color: #055683;
        border: 1px solid #00E0FF;
        background-color: #00E0FF;
        font-weight: bold;
    }

    .btn-sort-data.not-open{
        color: #365F91;
        width: 110px;

        border: 1px solid #365F91;
        background-color: #091636;
        font-size: 14px;
        font-weight: bold;
    }.item-team{
        padding: 5px 5px 0 5px;
    }
    .item-team .img_team{
        border: 2px solid #00E0FF;
        border-radius: 5px !important;
            -webkit-border-radius: 5px; 
        -moz-border-radius: 5px;
    }
    .team_new_code_success{
        border: 2px solid #FFD233 !important;

    }
    .progress{
        height: 23px; 
        border-radius: 50px !important;
        -webkit-border-radius: 50px; 
        -moz-border-radius: 50px;
    }.progress-bar{
        background: rgb(27,92,217);
background: linear-gradient(100deg, rgba(27,92,217,1) 0%, rgba(0,255,255,1) 100%);
    }.img-rocket::before{
        content: "";
        display: inline-block;
        position: absolute;
        width: 15px;
        height: 23px;
        margin-right: 5px;
        background: rgba(0,255,255,1);
    }
    .progressbar_primary{
        background-color: #00E0FF !important;
    }
    .progressbar_success{
        background-color: #FFC40E !important;
    }
</style>


<div class="w-100 d-flex justify-content-center mt-4 my-3">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-sort-data active">Mission 2</button>
        <button type="button" class="btn btn-sort-data not-open">coming soon</button>
    </div>
</div>

<div class="d-flex header-team">
    <img src="{{ url('/img/group_profile/profile/id (') . Auth::user()->group_id . ').png' }}" width="114" height="114" class="mt-2 mb-2 img-header-team">
    <div class="d-flex justify-content-between w-100" >
        <div class="detail-team"style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:63%">
            <h1 class="mb-0" style="color: #FFF;font-size: 24px;font-style: normal;font-weight: 400;line-height: 1.5;">
                Team {{ Auth::user()->group_id }}
            </h1>
            <!-- <p style="color: #FCBF29;font-family: Inter;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">
                PC : xxxxxxx
            </p> -->
            <div>
                <p style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: 1;">Mission 25 Newcode</p>
                    
                <span id="span_sum_score_team" style="margin-left:110px;color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: 1;">25   Newcode</span> 
                <span id="trophy_for_700K" class="d-nne"><img src="{{ url('/img/icon/trophy.png') }}" style="margin-top: -2px;width: 16px;height:16px;position: relative!important;left: 5px !important;"></span>

            </div>
        </div>

        <div class="d-flex align-items-top float-end pe-1">
            <div>
                <p style="margin-top: 10px;color: #fff;font-size: 12px;font-style: normal;font-weight: 500;line-height: normal;float:right;width: 100%;">Period : 1 Mar - 31 May</p>
                <p style="color: #FFF;font-size: 9px;font-style: normal;font-weight: 500;line-height: normal;text-align: end;">
                        As of  : <span id="date_as_of"></span>
                    </p>
                <!-- <div>
                    <div class="float-end" style="margin-top:-1px">
                        <i class="fa-regular fa-user text-white me-2"></i>
                        <span style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;"><span id="span_amount_member_50k"></span>/10</span>
                    </div>
                </div> -->
            </div>
        </div>
        
    </div>
</div>
<input type="text" name="" placeholder="กรอกเลขสิ" class="form-control" id="" oninput="convertToPercentage(this.value)">
<div class="d-flex" >
    <div class="p-3" style="width: calc(100%);">
        <div class="w-100 d-flex justify-content-between px-2 mb-2">
            <div>                
                <img src="{{ url('/img/icon/trophy-sliver.png') }}" style="width: 16px;height:16px;">
            </div>
            <div>
                <p style="color: #FFD233;">New code my team</p>
            </div>
            <div>        
                <img src="{{ url('/img/icon/trophy-gold.png') }}" style="width: 16px;height:16px;">
            </div>
        </div>
        <div class="w-100 d-flex justify-content-between px-2" style="margin-bottom:-21px;position: relative;z-index: 99999999;">
            <span style="color: #fff;" id="text_progress_0">                
                0
            </span>
            <span style="color: #fff;" id="text_progress_15">
                15
            </span>
            <span style="color: #fff;" id="text_progress_25">        
                25
            </span>
        </div>  
        <div style="border-radius: 50px;position: relative;">
            <div class="progress mb-3" style="background-color: #0A102E; border: #03ABCE solid 1px;">
                <div  class="progress-bar bg-success" role="progressbar" id="progressBar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="30" style="width: 50%;height: 23px;"></div>
                <div class="text-white" id="rocket_progressBar" style="transition: all .5s ease-in-out;position: relative;z-index: 999999999999999;">
                    <!-- <p id="textprogressBar">15</p> -->
                    <span class="img-rocket"></span>
                    <img src="{{ url('/img/icon/rocket.png') }}"  style="height:23px;position: relative;">
                    <span id="textprogressBar" style="position: absolute;  top: 50%;  left: 65%;  transform: translate(-50%, -50%);font-size: 8px;">30</span>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="memberInRoom d-flex justify-content-center text-center px-1">
    <div class="member-section mt-0" id="div_content_data">
        <!-- DATA -->
        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="member-item col-4 ">
            <div class="member-card-join">
                <span class="btn host-member">
                    <i class="fa-solid fa-key text-warning"></i>
                </span>
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div >
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    PC : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                111111111
                                </span>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                            <div>
                                <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                    New code : 
                                </span>
                                <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                11
                                </span>
                            </div> 
                            <div class="me-1">
                            <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="mt-3" style="position: relative;;overflow: hidden;padding-top: 20px; border-radius: 35px 35px 0 0 !important;-webkit-border-radius: 35px 35px 0 0;-moz-border-radius: 35px 35px 0 0; background: linear-gradient(180deg, rgba(255,255,255,.62) 0%, rgba(0,224,255,0.5) 50%, rgba(0,72,156,0.25) 100%);">
    <div class="text-center mb-3">
        <div>

            <p style="color: #0A1330;font-weight: bolder;font-size: 18px;margin-bottom: 0;">
                SUCCESS TEAM
            </p>
            
            <img src="{{ url('/img/icon/Vector 543.png') }}" style="width: 120px;margin-top: -10px;">
        </div>
        <p style="color: #0A1330;font-weight: bolder;font-size: 16px;">
            <span id="">40</span>/<span id="">81</span>
        </p>
    </div>
    <div class="memberInRoom d-flex justify-content-center text-center px-1">
        <div class="member-section mt-0" id="div_content_data">
                <a id="" class="member-item div_Team mt-0"  href="">
                    <div class="item-team" style="width: 100%;height: auto;position: relative;">
                        <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;" class="img_team">
                        <div class="px-1" style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999;width: 93%;">
                            <div class="progress mb-3" style="height:14px;position: relative;background-color: #8E8E8E;">
                                <div class=" progressbar_primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <div style="position: absolute;  top: 55%;left: 50%;transform: translate(-50%, -50%);z-index: 9999;color: #07203F;font-weight: bolder;">
                                    <span id="team_new_code">1</span>/25
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a id="" class="member-item div_Team mt-0"  href="">
                    <div class="item-team" style="width: 100%;height: auto;position: relative;">
                        <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;" class="team_new_code_success img_team">
                        <img src="{{ url('/img/icon/shield.png') }}" style="width: 35px; position: absolute;top: -3px;right: -12px;">

                        <div class="px-1" style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999;width: 93%;">
                            <div class="progress mb-3" style="height:14px;position: relative;background-color: #8E8E8E;">
                                <div class=" progressbar_success"  role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <div style="position: absolute;  top: 55%;left: 50%;transform: translate(-50%, -50%);z-index: 9999;color: #07203F;font-weight: bolder;">
                                    <span id="team_new_code">1</span>/25
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                
        </div>
    </div>
    <div class="w-100 d-flex justify-content-center my-4">
        <a href="#" class="px-4 py-2" style="font-size: 14px;background-color: #DDF3FF;color: #0A0E2C;border-radius: 50px !important;-webkit-border-radius: 50px;-moz-border-radius: 50px;">Back to my team</a>
    </div>
    
    <img src="{{ url('/img/icon/ice-cliff3.png') }}" style="position: absolute;bottom: 0;left: 0;height: 312px;z-index: -1;">
</div>


<script>
   function convertToPercentage(value) {
    // ตรวจสอบว่าค่าที่รับเข้ามาอยู่ในช่วง 1-30 หรือไม่
    let text_0 = document.getElementById('text_progress_0');
    let text_15 = document.getElementById('text_progress_15');
    let text_25 = document.getElementById('text_progress_25');
    if (value >= 1 && value <= 25) {
        // คำนวณเป็นเปอร์เซ็นต์
        let percentage = (value / 25) * 100;

        // console.log(percentage);

        let progressBar = document.getElementById('progressBar');
            progressBar.style.width = percentage + '%';
        let textprogressBar = document.getElementById('textprogressBar');
            // let rocket_progressBar = document.getElementById('rocket_progressBar');
            // rocket_progressBar  .style.left = percentage + '%';
            textprogressBar.innerHTML = value;
        // return percentage;

        if (value >= 1 && value <= 14) {
            text_0.style.color = '#FFD233'
            text_15.style.color = '#646D73'
            text_25.style.color = '#646D73'
        }else if(value >= 15 && value <= 24){
            text_0.style.color = '#FFD233'
            text_15.style.color = '#FFD233'
            text_25.style.color = '#646D73'
        }else{
            text_0.style.color = '#FFD233'
            text_15.style.color = '#FFD233'
            text_25.style.color = '#FFD233'
        }
    } else {
        // ถ้าค่าไม่ได้อยู่ในช่วงที่กำหนดให้
        return "กรุณาใส่ค่าระหว่าง 1 ถึง 30 เท่านั้น";
    }
}

</script>
@endsection