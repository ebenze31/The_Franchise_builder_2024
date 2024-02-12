
<table id="table1">
    <thead>
      <tr>
        <th>Header1</th>
        <th>Header2</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>2</td>
      </tr>
      <tr>
        <td>3</td>
        <td>4</td>
      </tr>
    </tbody>
  </table>

  <br>

  <table id="table2">
    <thead>
      <tr>
        <th>Header3</th>
        <th>Header4</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>5</td>
        <td>6</td>
      </tr>
      <tr>
        <td>7</td>
        <td>8</td>
      </tr>
    </tbody>
  </table>
  <table id="table3">
    <thead>
      <tr>
        <th>Header5</th>
        <th>Header6</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>9</td>
        <td>10</td>
      </tr>
      <tr>
        <td>11</td>
        <td>12</td>
      </tr>
    </tbody>
  </table>
  <button id="exportBtn">Export to Excel</button>

  <!-- Load exceljs library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.4.0/exceljs.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

  <script>
    // รองรับการทำงานของปุ่มเมื่อหน้าเว็บได้โหลดเสร็จ
    document.addEventListener('DOMContentLoaded', function () {
      const exportBtn = document.getElementById('exportBtn');
      
      exportBtn.addEventListener('click', function () {
        exportToExcel();
      });
    });

    function exportToExcel() {
  // สร้าง workbook
  const workbook = new ExcelJS.Workbook();

  // สร้าง worksheet
  const worksheet1 = workbook.addWorksheet('Sheet1');
  const worksheet2 = workbook.addWorksheet('Sheet2');
  const worksheet3 = workbook.addWorksheet('Sheet3');

  // ดึงข้อมูลจากตารางแรก
  const table1Rows = document.querySelectorAll('#table1 tbody tr');
  const table1Header = document.querySelectorAll('#table1 thead tr th');

  // เพิ่ม thead ลงใน worksheet
  const header1Data = [];
  table1Header.forEach(cell => {
    header1Data.push(cell.textContent);
  });
  worksheet1.addRow(header1Data);

  // เพิ่มข้อมูลจาก tbody ลงใน worksheet
  table1Rows.forEach(row => {
    const rowData = [];
    row.querySelectorAll('td').forEach(cell => {
      rowData.push(cell.textContent);
    });
    worksheet1.addRow(rowData);
  });

  // ดึงข้อมูลจากตารางที่สอง
  const table2Rows = document.querySelectorAll('#table2 tbody tr');
  const table2Header = document.querySelectorAll('#table2 thead tr th');

  // เพิ่ม thead ลงใน worksheet
  const header2Data = [];
  table2Header.forEach(cell => {
    header2Data.push(cell.textContent);
  });
  worksheet2.addRow(header2Data);

  // เพิ่มข้อมูลจาก tbody ลงใน worksheet
  table2Rows.forEach(row => {
    const rowData = [];
    row.querySelectorAll('td').forEach(cell => {
      rowData.push(cell.textContent);
    });
    worksheet2.addRow(rowData);
  });
// ดึงข้อมูลจากตารางที่สอง
const table3Rows = document.querySelectorAll('#table3 tbody tr');
  const table3Header = document.querySelectorAll('#table3 thead tr th');

  // เพิ่ม thead ลงใน worksheet
  const header3Data = [];
  table3Header.forEach(cell => {
    header3Data.push(cell.textContent);
  });
  worksheet3.addRow(header3Data);

  // เพิ่มข้อมูลจาก tbody ลงใน worksheet
  table3Rows.forEach(row => {
    const rowData = [];
    row.querySelectorAll('td').forEach(cell => {
      rowData.push(cell.textContent);
    });
    worksheet3.addRow(rowData);
  });

  // บันทึกไฟล์ Excel
  workbook.xlsx.writeBuffer()
    .then(buffer => {
      const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
      saveAs(blob, 'output.xlsx');
    })
    .catch(error => {
      console.log('Error writing Excel file:', error);
    });
}

  </script>

</body>
</html>
