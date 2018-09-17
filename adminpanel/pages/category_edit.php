<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ویرایش دسته بندی جدید </h3>
            </div>
            <?php $id = $_GET["id"];
            $s=$conn->prepare("SELECT * FROM `category` WHERE `id` = '".$id."' ");
            $s->execute();
            $row=$s->fetch();
?>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="index.php?pages=category_edit_save" method="POST" enctype="multipart/form-data" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">نام دسته جدید</label>
                  <input type="text" class="form-control"  placeholder="نام دسته" name="title" value="<?php echo $row["title"];  ?>">
                </div>
                <img src="../upload/<?php echo $row["image"];?>" width="300">
                <div class="form-group">
                  <label for="exampleInputFile">انتخاب تصویر دسته </label>
                  <input type="file" id="exampleInputFile" name="image">
                </div>
                <input class="form-control"  placeholder="نام دسته" name="imageold" value="<?php echo $row["image"];  ?>" type="hiden">
                <input class="form-control"  placeholder="نام دسته" name="id" value="<?php echo $row["id"];  ?>" type="hiden">
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="ذخیره دسته بندی">
              </div>
            </form>
          </div>
          <!-- /.box -->

         