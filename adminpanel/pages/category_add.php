<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">دسته بندی جدید </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="index.php?pages=category_add_save" method="POST" enctype="multipart/form-data" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">نام دسته جدید</label>
                  <input type="text" class="form-control"  placeholder="نام دسته" name="title">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">انتخاب تصویر دسته </label>
                  <input type="file" id="exampleInputFile" name="image">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="ذخیره دسته بندی">
              </div>
            </form>
          </div>
          <!-- /.box -->

         