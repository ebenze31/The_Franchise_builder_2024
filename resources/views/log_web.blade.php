
@extends('layouts.theme_admin')

@section('content')
<head>
  <meta charset="UTF-8">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- <a class="btn btn-success" style="float:left;margin-right:20px;" href="https://codepen.io/collection/XKgNLN/" target="_blank">Other examples on Codepen</a> -->
<style>
.card {
	position: relative;
	display: flex;
	flex-direction: column;
	min-width: 0;
	word-wrap: break-word;
	background-color: #fff;
	background-clip: border-box;
	border: 0px solid rgba(0, 0, 0, 0);
	border-radius: 0.25rem;
	margin-bottom:1.5rem;
	box-shadow: 0 0 2rem 0 rgb(136 152 170 / 15%);
    padding: 1rem;
}
</style>
<div class="card">
    <table id="content_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Order</th>
			<th>Description</th>
			<th>Deadline</th>
			<th>Status</th>
			<th>Amount</th>
		</tr>
	</thead>
	<tbody id="content_tbody">

	</tbody>
	<tfoot>
		<tr>
			<th>Order</th>
			<th>Description</th>
			<th>Deadline</th>
			<th>Status</th>
			<th>Amount</th>
		</tr>
	</tfoot>
</table>
</div>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js'></script><script  src="./script.js"></script>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        get_data_sos();
    });

    // สมาชิกในทีมของทุกทีม
    function get_data_sos() {

        let currentDate = new Date();
        let formattedDate = currentDate.toISOString().replace(/[:.]/g, "_"); // สร้างรูปแบบของวันที่ในรูปแบบที่ไม่มีเครื่องหมาย : และ .

        // ตั้งชื่อไฟล์เป็น "รายชื่อสมาชิกทั้งหมด-2023-12-31T12_30_45.678Z.xlsx" (ตัวอย่าง)
        document.title = `Log-web-${formattedDate}`;

        // Create search inputs in footer
        $("#content_table tfoot th").each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        var table = $("#content_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: false,
            autoWidth: true,
            lengthChange: false,
            bDestroy: true,
            buttons: [{
                extend: "excelHtml5",
                text: "Export Excel" // เปลี่ยนข้อความในปุ่มที่นี่
            }, ],
            
            initComplete: function(settings, json) {
                var footer = $("#content_table tfoot tr");
                $("#content_table thead").append(footer);
            }
        });

        // Apply the search
        $("#content_table thead").on("keyup", "input", function() {
            table.column($(this).parent().index())
                .search(this.value)
                .draw();
        });

        var content_table = $('#content_table').DataTable();

        fetch("{{ url('/') }}/api/get_data_log_web")
            .then(response => response.json())
            .then(result => {

                // console.log(result);

                for (let i = 0; i < result.length; i++) {
                    // console.log(result[i].id);

                    table.row.add([
                        result[i].account ? result[i].account : "--",
                        result[i].name ? result[i].name : "--",
                        result[i].log_create ? result[i].log_create : "--",
                        result[i].log_content ? result[i].log_content : "--",
                        result[i].role ? result[i].role : "--",
                    ]).draw(false);
                }
            });
    }
</script>
@endsection