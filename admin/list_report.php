<?php
$menu = "report"
?>
<?php include("header.php"); ?>
<?php
$query_product = "SELECT * FROM tbl_report as p";
$rs_product = mysqli_query($condb, $query_product);
//echo $query_product;
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$('#blah').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
 
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h3 class="card-title">รายการ รายงานการปฏิบัติงาน</h3>
        <div align="right">
          
          
          
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูล การปฏิบัติงาน</button>
          
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-12">
            <table id="example1" class="table table-bordered  table-hover table-striped">
              <thead>
                <tr class="danger">
                  <th width="5%"><center>No.</center></th>
                  <th width="5%">ประเภท</th>
                  <th width="5%">อื่น ๆ</th>
                  <th width="10%">ตามบันทึกเลขที่</th>
                  <th width="20%">รายงานผล</th>
                  <th width="20%">อุปกรณ์ที่ซ่อมเปลี่ยน</th>
                  <th width="15%">ผู้ปฏิบัติงาน</th>
                  <th width="7%">edit</th>
                  <th width="7%">del</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs_report as $row_report) { ?>
                
                
                <tr>
                  <td><?php echo @$l+=1; ?></td>
                  
                  <td><?php echo $row_report['type_id']; ?></td>
                  
                  <td><?php echo $row_report['record_num']; ?></td>
                  <td><?php echo $row_report['perf_report']; ?></td>
                  
                  <td>
                    <p style="margin-bottom: 10px;">
                      <a href="report_edit.php?p_id=<?php echo $row_product['p_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> edit</a>
                    </p>
                    
                    <!-- <a href="level.php?ace=edit&l_id=<?php echo $row_product['l_id'];?>" class="btn btn-warning btn-xs"> edit</a> -->
                  </td>
                  <td><a href="report_db.php?p_id=<?php echo $row_product['p_id']; ?>" class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i> del</a></td>
                  
                </tr>
                <?php
                @$total+=$row_product['p_qty'];
                }
                
                //echo $total;
                ?>
              </tbody>
            </table>
            <?php if(isset($_GET['d'])){ ?>
            <div class="flash-data" data-flashdata="<?php echo $_GET['d'];?>"></div>
            <?php } ?>
            <script>
            $('.del-btn').on('click',function(e){
            e.preventDefault();
            const href = $(this).attr('href')
            Swal.fire({
            imageUrl: '../logo_fordev22_2.png',
            imageWidth: 250,
            //imageHeight: 100,
            title: 'Are you sure to delete?',
            text: "You won't be able to revert this!",
            // icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
            document.location.href = href;
            
            }
            })
            })
            const flashdata = $('.flash-data').data('flashdata')
            if(flashdata){
            swal.fire({
            type : 'success',
            title : 'Record Deleted',
            text : 'Record has been deleted',
            icon: 'success'
            })
            }
            </script>
            
            
            
          </div>
          
        </div>
      </div>
      <div class="card-footer">
        
      </div>
      
    </div>
    
    
    
    
  </section>
  <!-- /.content -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="report_db.php" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="product" value="add">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล รายงานการปฏิบัติงาน</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ประเภท </label>
              <div class="col-sm-10">
                <div class="col-sm-10">
                      <select class="form-control select2" name="type_id" id="type_id" required>
                        <option value="<?php echo $row['type_id'];?>">-- เลือกประเภท --</option>


                         
                          <option value="1">ติดตั้ง</option>
                          <option value="2">ย้าย</option>
                          <option value="2">พ่วง</option>
                          <option value="2">อื่น ๆ</option>
                          

                        </select>
                      
                    </div>
              </div>
            </div>
            
          </span>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">กรณีเลือกอื่น ๆ </label>
            <div class="col-sm-10">
              <input type="text" name="details" class="form-control" id="details" placeholder="" value="<?php echo $row['details'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ตามบันทึกเลขที่ </label>
            <div class="col-sm-10">
              <input type="text" name="record_num" class="form-control" id="record_num" placeholder="" value="<?php echo $row['record_num'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">รายงานผล </label>
            <div class="col-sm-10">
              <textarea name="details" rows="3" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">อุปกรณ์ที่ซ่อมเปลี่ยน </label>
            <div class="col-sm-10">
              <textarea name="details" rows="3" class="form-control"></textarea>
            </div>
          </div>
 
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ผู้ปฏิบัติงาน </label>
              <div class="col-sm-10">
                <div class="col-sm-10">
                      <select class="form-control select2" name="name_user" id="name_user" required>
                        

                          <option value="<?php echo $row['neme_user'];?>]">-- เลือกผู้ปฏิบัติงาน --</option>
                         
                          <option >นายวีระชัย ธีระมิตร</option>
                          <option >นายภูริทัต นิยมกูล</option>
                          <option >นายชยานันท์ เจริญศิริ</option>
                          <option >น.ส.วิลาวัณย์ ธรรมมา</option>
                          <option >นายธนาธิป มณีนาค</option>
                          <option >นายภูรินทร์ ก้อนทอง</option>

                        </select>
                      
                    </div>
              </div>
            </div>
              
              
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ยืนยัน</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include('footer.php'); ?>
<script>
$(function () {
$(".datatable").DataTable();
// $('#example2').DataTable({
//   "paging": true,
//   "lengthChange": false,
//   "searching": false,
//   "ordering": true,
//   "info": true,
//   "autoWidth": false,
// http://fordev22.com/
// });
});
</script>

</body>
</html>
<!-- http://fordev22.com/ -->