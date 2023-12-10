@extends('layouts.theme_admin')

@section('content')

<style>
    
    .loader {
        display: flex;
        /* align-items: center;*/
        /* justify-content: center;*/
        flex-direction: row;
    }

    .slider {
        overflow: hidden;
        background-color: white;
        margin: 0 15px;
        height: 40px;
        width: 20px;
        border-radius: 30px;
        box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.1), -15px -15px 30px #fff,
        inset -5px -5px 10px rgba(0, 0, 255, 0.1),
        inset 5px 5px 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .slider::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        border-radius: 100%;
        box-shadow: inset 0px 0px 0px rgba(0, 0, 0, 0.3), 0px 420px 0 400px #2697f3,
        inset 0px 0px 0px rgba(0, 0, 0, 0.1);
        animation: animate_2 2.5s ease-in-out infinite;
        animation-delay: calc(-0.5s * var(--i));
    }

    @keyframes animate_2 {
        0% {
            transform: translateY(250px);
            filter: hue-rotate(0deg);
        }

        50% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(250px);
            filter: hue-rotate(180deg);
        }
    }

    .loading-container {
        display: flex;
    }

    .loading-spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #000;
        animation: spin 1s linear infinite;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 20px;
        margin-top: 50px;
        margin-bottom: 50px;
    }


    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes drawCheck {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }

    .checkmark {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #29cc39;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #ffffff;
        animation: fill 0.9s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.8s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 60px #fff
        }
    }

    .radius-20 {
        border-radius: 20px;
    }

</style>

<div class="card">
    <div class="card-body">

        <h4 class="mb-0 text-uppercase">รายชื่อสมาชิกทั้งหมด</h4>
        <hr class="mt-3 mb-3">

        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead>
                    <tr>
                        <th></th>
                        <th>Account</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="content_tbody">
                    <!-- DATA USER -->
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_account('all');
    });

    function get_data_account(type_get_data){
        // console.log(type_get_data);

        fetch("{{ url('/') }}/api/get_data_account/" + type_get_data)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result){

                    let content_tbody = document.querySelector('#content_tbody');
                        content_tbody.innerHTML = '';

                    for (let i = 0; i < result.length; i++) {

                        // status
                        let class_status = '';
                        if(result[i].status == "ชำระเงินแล้ว"){
                            class_status = 'success';
                        }else{
                            class_status = 'danger';
                        }

                        // check role
                        let class_role = '';
                        let html_status = '';

                        if(result[i].role == "Member"){
                            class_role = 'secondary';
                        }else{
                            class_role = 'primary';

                            html_status = `
                                <a href="javaScript:;" class="btn btn-sm btn-`+class_status+` radius-30">
                                    `+result[i].status+`
                                </a>
                            `;

                        }

                        // photo 
                        let html_img = ''
                        if(result[i].photo){
                            html_img = `<img src="{{ url('storage')}}/`+result[i].photo+`" class="p-1" alt="">`;
                        }else{
                            html_img = `<img src="{{ url('/img/icon/profile.png') }}" class="p-1" alt="">`;
                        }

                        let html = `
                            <tr>
                                <td>
                                    <div class="product-img bg-transparent border">
                                        `+html_img+`
                                    </div>
                                </td>
                                <td>`+result[i].account+`</td>
                                <td>`+result[i].name+`</td>
                                <td>`+result[i].email+`</td>
                                <td>`+result[i].phone+`</td>
                                <td>
                                    <a href="javaScript:;" class="btn btn-sm btn-`+class_role+` radius-30">
                                        `+result[i].role+`
                                    </a>
                                </td>
                                <td>
                                    `+html_status+`
                                </td>
                            </tr>
                        `;

                        content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                    }

                }

            });
    }

</script>


@endsection
