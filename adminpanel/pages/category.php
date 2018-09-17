

<div class="box">
            <div class="box-header">
              <h3 class="box-title">مدیریت دسته بندی ها</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>شماره</th>
                  <th>عنوان </th>
                  <th>تاریخ </th>
                  <th>تصویر</th>
                  <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $s=$conn->prepare("SELECT * FROM `category` ");
                $s->execute();
                foreach($s as $row){

                ?>
                <tr>
                  <td><?php  echo $row["title"];   ?></td>
                  <td>Internet
                    Explorer 4.0</td>
                    <td>89/1/14</td>
                    <td><img src="../upload/<?php  echo $row["image"];?>" width="100px" height="100px"></td>
                  <td>
                  <a  href="index.php?pages=category_delete&id=<?php  echo $row["id"];?>" class="btn btn-block btn-info">حذف</a>
                  <a  href="index.php?pages=category_edit&id=<?php  echo $row["id"];?>" class="btn btn-block btn-danger">ویرایش</a>
                  </td>
                 <?php  
                }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>شماره</th>
                  <th>نام دسته</th>
                  <th>تصویر </th>
                  <th>عملیات</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


    