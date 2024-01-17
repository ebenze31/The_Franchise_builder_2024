@extends('layouts.theme_admin')

@section('content')

<div class="card">
	<div class="card-body">

		<div class="row">
			<div class="col-12">
				<button id="btn_export_excel" class="btn float-end btn-dark mx-3 d-none" onclick="createExcel()">
					Export Excel
				</button>
			</div>
		</div>

		<hr>
		
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

                let html_group_status ;
                if(result[i].group_status == "Team Ready" || result[i].group_status == "ยืนยันการสร้างบ้านแล้ว"){
                	html_group_status = `ทีมครบแล้ว`;
                }
                else if(result[i].group_status == "มีบ้านแล้ว"){
                	html_group_status = `กำลังรอสมาชิก`;
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
	                        `+html_group_status+`
	                    </td>
	                </tr>
	            `;

	            content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
	        }

            document.querySelector('#btn_export_excel').classList.remove('d-none');

        }
        
    });

}

</script>


<!-- เพิ่ม jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.bootcss.com/html2pdf.js/0.9.1/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js'></script>

<script>
	
function createExcel() {
    let table2excel = new Table2Excel();
    let currentDate = new Date();
    let formattedDate = currentDate.toISOString().replace(/[:.]/g, "_"); // สร้างรูปแบบของวันที่ในรูปแบบที่ไม่มีเครื่องหมาย : และ .

    // ตั้งชื่อไฟล์เป็น "รายชื่อสมาชิกทั้งหมด-2023-12-31T12_30_45.678Z.xlsx" (ตัวอย่าง)
    let fileName = `รายชื่อ Host-${formattedDate}.xlsx`;

    table2excel.export(document.querySelector("#content_table"), fileName);
};

</script>

@endsection