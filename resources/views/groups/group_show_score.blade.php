@extends('layouts.theme_user')

@section('content')
<style>
    .header-team {
        position: relative;
        margin-top: 55px;
        padding: 15px;
        background: rgb(7, 139, 166);
        background: linear-gradient(180deg, rgba(7, 139, 166, 1) 0%, rgba(40, 63, 136, 1) 51%, rgba(8, 49, 90, 1) 84%, rgba(11, 40, 70, 1) 100%);
        border-radius: 10px 0 0 0;
        display: flex;
        align-items: center;


    }

    .header-team img {
        width: 114px;
        height: 114px;
        position: absolute;
        bottom: 0;
        left: 15px;
    }

    .header-team .detail-team {
        text-indent: 140px;
        color: #fff;
        font-weight: lighter;
    }

    .content-section {
        padding: 0;
    }.memberInRoom{
        padding: 0px 10px 10px 15px;
    }

    .member-section {
    width: 100%;
  }

  @media only screen and (max-width: 680px) {
        .member-item{
            width: 30%;
            height: 128px;
            margin: 0 2px;
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
            height: 128px;
            margin: 0 10px;
        }
         
        .member-section{
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
            width: 100%;
            

        }
    }.member-card{
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

  }
</style>
<button id="btn_mission_success" class="d-nodne" style="margin-top: -500px;" data-toggle="modal" data-target="#mission_success"></button>

<div class="d-flex header-team">
    <img src="{{ url('/img/group_profile/profile/id (') . Auth::user()->group_id . ').png' }}" width="114" height="114" class="mt-2 mb-2 img-header-team">
    <div class="d-flex justify-content-between w-100">
        <div class="detail-team">
            <h1 class="mb-0" style="color: #FFF;font-size: 24px;font-style: normal;font-weight: 400;line-height: normal;">
                Team {{Auth::user()->group_id}}
            </h1>
            <p style="color: #FCBF29;font-family: Inter;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">
                PC : xxxxxxx
            </p>
        </div>
        <div class="d-flex align-items-center float-end">
            <div>
                <p style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 500;line-height: normal;float:right;width: 100%;">Minimum PC 50K</p>
                <div>
                    <div class="float-end mt-1">
                        <i class="fa-regular fa-user text-white me-2"></i>
                        <span style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">05/10</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex  justify-content-between w-100 pt-4" style="padding: 0 18px;">
    <div class="d-flex align-items-center">
        <span style="color: #05ADD0;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">Members : </span><span style="color: #F4F4F4;font-size: 18px;font-style: normal;font-weight: 400;line-height: normal;margin-left: 5px;">Team {{Auth::user()->group_id}}</span>
    </div>
    <div class="d-flex align-items-center float-end">
        <div>
            <img src="{{ url('/img/icon/mission-1.png') }}" style="width: 140px;height: 18px;" alt="">
            <div>
                <div class="float-end mt-1" style="color: #01B0F1;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">
                    05/10
                </div>
            </div>
        </div>
    </div>
</div>


<div class="memberInRoom">
    <div class="member-section" id="div_content_data">

        <!-- DATA -->
   
    </div>
</div>


<!-- moda -->

<div class="modal fade" style="z-index:999999999" id="mission_success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered px-3">
        <div class="modal-content " style="border-radius: 10px; margin: 0 40px;">
            <div id="modal_body_content"  class="modal-body text-center pb-0">
                <div class="px-3">
                    <img src="{{ url('/img/icon/mission_success.png') }}"  class="mt-2 mb-2 w-100">
                </div>
                <p id="title_mission_success" class="mt-1" style="color: #1F1F1F;text-align: center;font-size: 14px;font-style: normal;font-weight: 600;line-height: normal;">
                    <b>ยินดีด้วย <br>
                        คุณมี PC สะสมครบ 50,000 <br>
                        ได้สำเร็จ!
                    </b>
                </p>
            </div>
            <div class="d-flex justify-content-center mt-1 mb-3">
                <a  type="button" class="btn btn-submit padding-btn" data-dismiss="modal">
                    Close
                </a>
            </div>
            
        </div>
    </div>
</div>


<script>
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_group_show_score();
    });

    function get_data_group_show_score(){

        fetch("{{ url('/') }}/api/get_data_group_show_score" + "/" + "{{ Auth::user()->group_id }}")
            .then(response => response.json())
            .then(result => {
            console.log(result);

            let div_content_data = document.querySelector('#div_content_data');
                div_content_data.innerHTML = '' ;

            for (let i = 0; i < result['json'].length; i++) {

                let for_host = ``;
                if(result['host'] == result['json'][i]['user_id']){
                    for_host = `
                        <span class="btn host-member">
                            <i class="fa-solid fa-key text-warning"></i>
                        </span>
                    `;
                }

                let img_profile = `
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">
                    `;
                if(result['json'][i]['photo_user']){
                    img_profile = `
                        <img src="{{ url('storage')}}/`+result['json'][i]['photo_user']+`" class="img-member">
                    `;
                }

                let html = `
                    <div class="member-item col-4 mt-2 " style="margin-bottom: 42px;">
                        <div class="member-card-join">
                            `+for_host+`
                            <div class="text-center">
                                <div class="text-center">
                                    `+img_profile+`
                                </div>
                                <div class="name-member">
                                    <span style="color: #07285A;font-size: 10px;font-style: normal;font-weight: bolder !important;line-height: normal;">`+result['json'][i]['name_user']+`</span>
                                    <div class="d-flex justify-content-start ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;">
                                        <span style="color: #FCBF29;font-size: 10px;font-style: normal;font-weight: 700;line-height: normal;">
                                            PC : 
                                        </span>
                                        <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;font-weight: 700;line-height: normal;"">
                                        8,412,781
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-start ps-2 mt-1" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;">
                                        <span style="color: #FCBF29;font-size: 10px;font-style: normal;font-weight: 700;line-height: normal;">
                                        Active :
                                        </span>
                                        <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;font-weight: 700;line-height: normal;"">
                                        2
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                div_content_data.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                
            }

        });

    }

</script>
@endsection