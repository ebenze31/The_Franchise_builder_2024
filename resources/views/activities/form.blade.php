
<div class="card mt-3">
    <div class="card-body">

        <!-- <h4 class="mb-0 text-uppercase">เพิ่มกิจกรรม</h4> -->
        <!-- <hr class="mt-3 mb-3"> -->

        <div class="row">
            <div class="col-12 col-md-6">
                <label for="name_Activities" class="form-label">
                    ชื่อกิจกรรม
                </label>
                <input class="form-control" name="name_Activities" type="text" id="name_Activities" value="{{ isset($activity->name_Activities) ? $activity->name_Activities : ''}}" >
            </div>

            <div class="col-12 col-md-6">
                <label for="icon" class="form-label">
                    Icon กิจกรรม <span class="text-danger">(ขนาด 1:1)</span>
                </label>
                <input class="form-control" name="icon" type="file" id="icon" value="{{ isset($activity->icon) ? $activity->icon : ''}}" >
            </div>

            <div class="col-12 col-md-6 mt-3">
                <label for="detail" class="form-label">
                    รายละเอียดกิจกรรม
                </label>
                <textarea class="form-control" id="detail" name="detail" rows="4" cols="50">{{ isset($activity->detail) ? $activity->detail : ''}}</textarea>
            </div>

            <div class="col-12 col-md-6 mt-3">
                <label for="for" class="form-label">
                    สำหรับ
                </label>
                <select name="for" id="for" class="form-select">
                    <option selected value="all">ทั้งหมด</option>
                    <option value="Team-Ready">ยืนยันการสร้างบ้านแล้ว</option>
                </select>
            </div>
            
            <div class="col-12">
                <div class="form-group" style="margin-top: 30px;float: right;">
                    <input class="btn btn-success px-5" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ยืนยัน' }}">
                </div>
            </div>
        </div>
        
    </div>
</div>
