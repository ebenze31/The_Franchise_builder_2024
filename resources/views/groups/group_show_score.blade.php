
@extends('layouts.theme_user')

@section('content')    
<style>
    .header-team{
        position: relative;
        margin-top: 55px;
        padding: 15px;
        background: rgb(7,139,166);
        background: linear-gradient(180deg, rgba(7,139,166,1) 0%, rgba(40,63,136,1) 51%, rgba(8,49,90,1) 84%, rgba(11,40,70,1) 100%);
        border-radius: 10px 0 0 0;
        display: flex;
        align-items: center;

       
    }
    .header-team img{
        width: 114px;
        height:114px;
        position: absolute;
        bottom: 0;
        left: 15px;
    }
    .header-team .detail-team{
        text-indent: 140px;
        color: #fff;
        font-weight: lighter;
    }.content-section{
        padding: 0;
        justify-content: space-between;
    }
</style>
<div class="d-flex header-team">
    <img src="{{ url('/img/group_profile/profile/id (') . Auth::user()->group_id . ').png' }}" width="114" height="114" class="mt-2 mb-2 img-header-team">
    <div class="d-flex justify-content-between">
        <div class="detail-team">
             <h1 class="mb-0" style="color: #FFF;font-size: 24px;font-style: normal;font-weight: 400;line-height: normal;">
                Team {{Auth::user()->group_id}}
            </h1>
            <p style="color: #FCBF29;font-family: Inter;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">
                PC : xxxxxxx
            </p>
        </div>
        <div class="d-flex justify-content-end float-end">
            <p style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 500;line-height: normal;float:right;width: 100%;">Minimum PC 50K</p> 
        </div>
    </div>
   
</div>
    @foreach($data_groups as $item)
    {{$item->id}}


    @endforeach
@endsection