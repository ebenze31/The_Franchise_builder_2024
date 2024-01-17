@extends('layouts.theme_admin')

@section('content')

<div class="card">
	<div class="card-body">
		<div class="table-responsive">
	        <table class="table mb-0 align-middle" id="content_table">
	            <thead>
	                <tr>
	                    <th class="text-center">Photo</th>
	                    <th class="text-center">Account</th>
	                    <th class="text-center">Name</th>
	                    <th class="text-center">Email</th>
	                    <th class="text-center">Phone</th>
	                    <th class="text-center">Group</th>
	                    <th class="text-center">Group Status</th>
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
    get_data_host();
});


function get_data_host(){

    fetch("{{ url('/') }}/api/get_data_host")
        .then(response => response.json())
        .then(result => {
        console.log(result);

        if(result){

        	let content_tbody = document.querySelector('#content_tbody');
                content_tbody.innerHTML = '';

        	for (let i = 0; i < result.length; i++) {

        		// photo 
                let html_img = ''
                if(result[i].photo){
                    html_img = `<img src="{{ url('storage')}}/`+result[i].photo+`" class="p-1" alt=""> 
                                <span class="d-none">{{ url('storage')}}/`+result[i].photo+`</span>`;
                }else{
                    html_img = `<img src="{{ url('/img/icon/profile.png') }}" class="p-1" alt=""> 
                                <span class="d-none">{{ url('/img/icon/profile.png') }}</span>`;
                }

	        	let html = `
	                <tr class="">
	                    <td>
	                        <center>
	                            <div id="product_img_account_111" class="product-img bg-transparent border">
	                                `+html_img+`
	                            </div>
	                        </center>
	                    </td>
	                    <td class="text-center">
	                        `+result[i].account+`
	                    </td>
	                    <td class="text-center">
	                        `+result[i].name+`
	                    </td>
	                    <td class="text-center">
	                        `+result[i].email+`
	                    </td>
	                    <td class="text-center">
	                        `+result[i].phone+`
	                    </td>

	                    <td class="text-center">
	                        `+result[i].group_id+`
	                    </td>
	                    <td class="text-center">
	                        `+result[i].group_status+`
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