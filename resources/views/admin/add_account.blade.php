@extends('layouts.theme_admin')

@section('content')

<input type="file" id="excelInput" accept=".xlsx, .xls">
<button onclick="readExcel()">Read Excel</button>

<br>
<hr>
<br>

<input type="file" id="csvInput" accept=".csv">
<button onclick="readCSV()">Read CSV</button>

<script>
    // EXCEL
    function readExcel() {
        let input = document.getElementById('excelInput');
        let file = input.files[0];

        if (file) {
            let reader = new FileReader();

            reader.onload = function(e) {
                let data = e.target.result;
                let workbook = XLSX.read(data, { type: 'binary' });

                // เลือกชีทที่ต้องการ (0 คือชีทแรก)
                let sheetName = workbook.SheetNames[0];
                let sheet = workbook.Sheets[sheetName];

                // แปลงข้อมูลในชีทเป็น JSON
                let jsonData = XLSX.utils.sheet_to_json(sheet);

                // ตรวจสอบข้อมูลในคอนโซล
                console.log(jsonData);

                // เคลียร์ input
                clearFileInput('excel');
            };

            reader.readAsBinaryString(file);

        } else {
            alert('กรุณาเลือกไฟล์ Excel');
        }
    }

    // CSV
    function readCSV() {
        let input = document.getElementById('csvInput');
        let file = input.files[0];

        if (file) {
            let reader = new FileReader();

            reader.onload = function(e) {
                let csvData = e.target.result;
                
                // แปลงข้อมูล CSV เป็น JSON
                let jsonData = csvToJSON(csvData);

                // ตรวจสอบข้อมูลในคอนโซล
                console.log(jsonData);

                // เคลียร์ input
                clearFileInput('csv');
            };

            reader.readAsText(file);
        } else {
            alert('กรุณาเลือกไฟล์ CSV');
        }
    }

    function csvToJSON(csvData) {
        let lines = csvData.split("\n");
        let result = [];

        let headers = lines[0].split(",");
        for (let i = 1; i < lines.length; i++) {
            let obj = {};
            let currentline = lines[i].split(",");

            for (let j = 0; j < headers.length; j++) {
                obj[headers[j]] = currentline[j];
            }

            result.push(obj);
        }

        return result;
    }

    // เคลียไฟล์ออกจาก input หลัง reader เรียบร้อย
    function clearFileInput(type){
        let input = document.getElementById(type+'Input');
        
        // กำหนดค่า input ให้เป็น null หรือเปลี่ยนเป็นไฟล์ว่าง
        input.value = null; // หรือ input.value = '';

    }

</script>

<!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
@endsection
