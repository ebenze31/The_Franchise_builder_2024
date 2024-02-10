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

  @media only screen and (max-width: 680px) {
        .member-item{
            width: 32%;
            height: 128px;
            margin: 0 2px;
            /* margin-bottom: 10px !important; */

        }
         
        .member-section{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
            width: 100%;
        }
    }
    @media only screen and (min-width: 359px) and (max-width: 435px){
        .member-item{
            margin-top: 10px !important;
        }
    }

    @media only screen and (min-width: 435px) and (max-width: 480px){
        .member-item{
            margin-top: 30px !important;
        }
    }

    @media only screen and (min-width: 480px) and (max-width: 535px){
        .member-item{
            margin-top: 40px !important;
        }
    }

    @media only screen and (min-width: 535px) and (max-width: 680px){
        .member-item{
            margin-top: 50px !important;
        }
    }
    @media only screen and (min-width: 680px) {
        .member-item{
            width: 150px;
            height: 128px;
            margin: 50px 10px;
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
        color: #707070;
        border: 1px solid #707070;
        background-color: #707070;
        font-weight: bold;
    }.item-team{
        padding: 5px 5px 0 5px;
    }
    .item-team img{
        border: 1px solid #00E0FF;
        border-radius: 5px !important;
            -webkit-border-radius: 5px; 
        -moz-border-radius: 5px;
    }
</style>


<div class="w-100 d-flex justify-content-center mt-4 my-3">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-sort-data active">Mission 2</button>
        <button type="button" class="btn btn-sort-data not-open">Mission 3</button>
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
                <p style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: 1;">Mission 2 Newcode</p>
                    
                <span id="span_sum_score_team" style="margin-left:110px;color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: 1;">< 30 Newcode</span> 
                <span id="trophy_for_700K" class="d-nne"><img src="{{ url('/img/icon/trophy.png') }}" style="margin-top: -2px;width: 16px;height:16px;position: relative!important;left: 5px !important;"></span>

            </div>
        </div>

        <div class="d-flex align-items-top float-end">
            <div>
                <p style="margin-top: 10px;color: #fff;font-size: 12px;font-style: normal;font-weight: 500;line-height: normal;float:right;width: 100%;">Period : 1 Mar - 31 May</p>
                <!-- <div>
                    <div class="float-end" style="margin-top:-1px">
                        <i class="fa-regular fa-user text-white me-2"></i>
                        <span style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;"><span id="span_amount_member_50k"></span>/10</span>
                    </div>
                </div> -->
            </div>
        </div>
        <span style="position: absolute;bottom: 5px; right: 15px;color: #FFF;font-size: 9px;font-style: normal;font-weight: 500;line-height: normal;">
            As of  : <span id="date_as_of"></span>
        </span>
    </div>
</div>
<input type="text" name="" placeholder="กรอกเลขสิ" class="form-control" id="" oninput="convertToPercentage(this.value)">
<div class="d-flex">
    <div class="p-3" style="width: calc(100% - 34px);">
        <div style="border-radius: 50px;position: relative;">
            <div class="progress mb-3" style="height:7px;">
                <div  class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" id="progressBar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="30" style="width: 50%;"></div>
                <p class="text-white" id="textprogressBar" style="transition: all .5s ease-in-out;position: absolute;z-index: 999999999999999;margin-left: -8px;bottom: -20px;left:  50%;">15</p>
            </div>
        </div>
    </div>
    <div class="" style="width: 34px;padding-top: 12px;">

        <img src="{{ url('/img/icon/trophy.png') }}" style="margin-top: -2px;width: 16px;height:16px;position: relative!important;left: 5px !important;position: absolute;">
    </div>
</div>

<div class="memberInRoom d-flex justify-content-center text-center px-1">
    <div class="member-section mt-0" id="div_content_data">
        <!-- DATA -->
        <div class="member-item col-4 " style="margin-bottom: 42px;">
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

        <div class="member-item col-4 " style="margin-bottom: 42px;">
            <div class="member-card-join">
                
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        
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

        <div class="member-item col-4 " style="margin-bottom: 42px;">
            <div class="member-card-join">
                
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        
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


        <div class="member-item col-4 " style="margin-bottom: 42px;">
            <div class="member-card-join">
                
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        
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

        <div class="member-item col-4 " style="margin-bottom: 42px;">
            <div class="member-card-join">
                
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        
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

        <div class="member-item col-4 " style="margin-bottom: 42px;">
            <div class="member-card-join">
                
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        
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

        <div class="member-item col-4 " style="margin-bottom: 42px;">
            <div class="member-card-join">
                
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        
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

        <div class="member-item col-4 " style="margin-bottom: 42px;">
            <div class="member-card-join">
                
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        
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

        <div class="member-item col-4 " style="margin-bottom: 42px;">
            <div class="member-card-join">
                
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        
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

        <div class="member-item col-4 " style="margin-bottom: 42px;">
            <div class="member-card-join">
                
                <div class="text-center">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">

                    </div>
                    
                    <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                        <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">User 1</span>
                        
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

<div class="text-center mt-5 mb-3">
    <h6 style="color: #FCBF29;font-weight: bold;">SUCCESS TEAM</h6>
    <h4 style="color: #60FC29;font-weight: bolder;">
        <span id="">40</span>/<span id="">81</span>
    </h4>
</div>
<div class="memberInRoom d-flex justify-content-center text-center px-1 mb-5">
    <div class="member-section mt-0" id="div_content_data">
            <a id="" class="member-item div_Team mt-0"  href="">
                <div class="item-team" style="width: 100%;height: auto;position: relative;">
                    <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;">
                    <div style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999999999999999;width: 93%;">
                        <div class="progress mb-3" style="height:7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

            </a>

            <a id="" class="member-item div_Team mt-0" href="">
                <div class="item-team" style="width: 100%;height: auto;position: relative;">
                    <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;">
                    <div style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999999999999999;width: 93%;">
                        <div class="progress mb-3" style="height:7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </a>

            <a id="" class="member-item div_Team mt-0" href="">
                <div class="item-team" style="width: 100%;height: auto;position: relative;">
                    <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;">
                    <div style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999999999999999;width: 93%;">
                        <div class="progress mb-3" style="height:7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </a>

            <a id="" class="member-item div_Team mt-0" href="">
                <div class="item-team" style="width: 100%;height: auto;position: relative;">
                    <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;">
                    <div style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999999999999999;width: 93%;">
                        <div class="progress mb-3" style="height:7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </a>

            <a id="" class="member-item div_Team mt-0" href="">
                <div class="item-team" style="width: 100%;height: auto;position: relative;">
                    <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;">
                    <div style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999999999999999;width: 93%;">
                        <div class="progress mb-3" style="height:7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </a>

            <a id="" class="member-item div_Team mt-0" href="">
                <div class="item-team" style="width: 100%;height: auto;position: relative;">
                    <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;">
                    <div style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999999999999999;width: 93%;">
                        <div class="progress mb-3" style="height:7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </a>

            <a id="" class="member-item div_Team mt-0" href="">
                <div class="item-team" style="width: 100%;height: auto;position: relative;">
                    <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;">
                    <div style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999999999999999;width: 93%;">
                        <div class="progress mb-3" style="height:7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </a>

            <a id="" class="member-item div_Team mt-0" href="">
                <div class="item-team" style="width: 100%;height: auto;position: relative;">
                    <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;">
                    <div style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999999999999999;width: 93%;">
                        <div class="progress mb-3" style="height:7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </a>
            <a id="" class="member-item div_Team mt-0" href="">
                <div class="item-team" style="width: 100%;height: auto;position: relative;">
                    <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;">
                    <div style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999999999999999;width: 93%;">
                        <div class="progress mb-3" style="height:7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </a>
            <a id="" class="member-item div_Team mt-0" href="">
                <div class="item-team" style="width: 100%;height: auto;position: relative;">
                    <img src="{{ url('/img/group_profile/success/id (1).png') }}" style="width: 100%;">
                    <div style="position: absolute;position: absolute;top: 95%;left: 50%;transform: translate(-50%, -50%);color: #fff;z-index: 999999999999999;width: 93%;">
                        <div class="progress mb-3" style="height:7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </a>
    </div>
</div>

<script>
   function convertToPercentage(value) {
    // ตรวจสอบว่าค่าที่รับเข้ามาอยู่ในช่วง 1-30 หรือไม่
    if (value >= 1 && value <= 30) {
        // คำนวณเป็นเปอร์เซ็นต์
        let percentage = (value / 30) * 100;

        // console.log(percentage);

        let progressBar = document.getElementById('progressBar');
            progressBar.style.width = percentage + '%';
        let textprogressBar = document.getElementById('textprogressBar');
            textprogressBar.style.left = percentage + '%';
            textprogressBar.innerHTML = value;
        // return percentage;
    } else {
        // ถ้าค่าไม่ได้อยู่ในช่วงที่กำหนดให้
        return "กรุณาใส่ค่าระหว่าง 1 ถึง 30 เท่านั้น";
    }
}

</script>
@endsection