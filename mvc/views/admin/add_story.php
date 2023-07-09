<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Truyện</div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo handle_story ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="email2">Tên truyện(*)</label>
                                <input type="text" class="form-control" id="email2" placeholder="Tên truyện" name="name_story">
                                <small id="emailHelp2" class="form-text text-muted">Tên truyện phải là duy nhất và không vượt quá 180 kí tự</small>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh truyện</label>
                                <input type="file" name='image' class="form-control" id="inputEmail3" placeholder="" value="">
                            </div>
                            <div class="form-group">
                                <label for="email2">Tác giả</label>
                                <input type="text" class="form-control" id="email2" placeholder="Tác giả" name="author">
                            </div>
                            <div class="form-group">
                                <label for="email2">Nguồn</label>
                                <input type="text" class="form-control" id="email2" placeholder="Nguồn" value="toptruyen.com" name="source">
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Trạng thái</label>
                                <select class="form-control form-control" id="defaultSelect" name="status">
                                    <option value="1">Đang cập nhật</option>
                                    <option value="2">Tạm ngừng</option>
                                    <option value="3">Hoàn thành</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Thể loại (*)</label>
                                <select class="simple-select2 w-100" multiple name="category[]" required>
                                    <optgroup label="--Chọn thể loại--">
                                        <?php foreach($data['category'] as $val){ ?>
                                            <option value="<?php echo $val['name_category'] ?>"><?php echo $val['name_category'] ?></option>
                                        <?php } ?>
                                    </optgroup>
                                </select>
                            </div>
                            <!-- <input type="text" value="22" name="category"> -->
                            <div class="form-group">
                                <label for="comment">Giới thiệu</label>
                                <textarea class="form-control" id="introduce" rows="3" name="introduce">

                                </textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary">
                                    <span class="btn-label">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    Lưu
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



