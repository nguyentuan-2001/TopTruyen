<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Sửa truyện</div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo handle_edit_story ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $data['story']['id_story'] ?>" id="id_story" name="id_story">
                        <input type="hidden" value="<?php echo $data['story']['image'] ?>" id="image" name="image">
                            <div class="form-group">
                                <label for="email2">Tên truyện(*)</label>
                                <input type="text" class="form-control" value="<?php echo $data['story']['name_story'] ?>" id="email2" placeholder="Tên truyện" name="name_story">
                                <small id="emailHelp2" class="form-text text-muted">Tên truyện phải là duy nhất và không vượt quá 180 kí tự</small>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh truyện</label>
                                <!-- <img src="<?php echo $storage_patch['story']['image'] ?>" height="100px" width="150px"> -->
                                <input type="file" name='image' class="form-control" id="inputEmail3" placeholder="" value="">
                            </div>
                            <div class="form-group">
                                <label for="email2">Tác giả</label>
                                <input type="text" class="form-control" value="<?php echo $data['story']['author'] ?>" id="email2" placeholder="Tác giả" name="author">
                            </div>
                            <div class="form-group">
                                <label for="email2">Nguồn</label>
                                <input type="text" class="form-control" id="email2" placeholder="Nguồn" value="<?php echo $data['story']['source'] ?>" name="source">
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Trạng thái</label>
                                <select class="form-control form-control" id="defaultSelect" name="status">
                                    <option value="1" <?php if($data['story']['status'] == 1) echo 'selected';?> >Đang cập nhật</option>
                                    <option value="2" <?php if($data['story']['status'] == 2) echo 'selected';?>>Tạm ngừng</option>
                                    <option value="3" <?php if($data['story']['status'] == 3) echo 'selected';?>>Hoàn thành</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Thể loại (*)</label>
                                <select class="simple-select2 w-100" multiple name="category[]" required>
                                    <optgroup label="--Chọn thể loại--">
                                        <?php foreach ($data['category'] as $val) { ?>
                                        <?php if(count($data['story_category']) > 0) { ?>
                                        <?php foreach ($data['story_category'] as $val_2) { ?>
                                            <option value="<?php echo $val['name_category'] ?>" <?php if($val['name_category'] == $val_2['name']){ echo 'selected'; } ?> ><?php echo $val['name_category'] ?></option>
                                        <?php } ?>
                                        <?php }else{ ?>
                                            <option value="<?php echo $val['name_category'] ?>"><?php echo $val['name_category'] ?></option>
                                        <?php }} ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment">Giới thiệu</label>
                                <textarea class="form-control" id="introduce" rows="3" name="introduce">
                                    <?php echo $data['story']['introduce'] ?>
                                </textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary">
                                    <span class="btn-label">
                                    <i class="fas fa-redo-alt"></i>
                                    </span>
                                    Cập nhật
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



