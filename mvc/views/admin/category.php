<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Danh mục thể loại truyện</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Thể loại</th>
                                    <th scope="col">Thể loại không dấu</th>
                                    <th scope="col">Thời gian tạo</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($data['category'] as $val) { ?>
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $val['name_category'] ?></td>
                                        <td><?php echo $val['name_unsigned'] ?></td>
                                        <td><?php echo DateToTime($val['created_at']) ?></td>
                                        <td>
                                        <button onclick="edit('<?php echo $val['id_category'] ?>','<?php echo $val['name_category'] ?>')" style="padding:0 10px; border:0px; background:none; cursor: pointer;"><i class="fas fa-edit" ></i></button>
                                        <a href="<?php echo detete_category.'/'.$val['id_category']; ?>" onclick=" return confirm('Bạn chắc chắn muốn xóa thể loại [ <?php echo $val['name_category'] ?> ] ?')" style="padding:0 10px; border:0px;background:none;cursor: pointer;"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <form action="<?php echo add_category ?>" method="POST">
                        <div class="form-group">
                            <label for="ten">Tên thể loại(*)</label>
                            <input type="text" class="form-control" id="ten" name="name_category" placeholder="Tên thể loại..." required autocomplete="off" >
                            <small id="emailHelp2" class="form-text text-muted">Tên thể loại phải là duy nhất, không được trùng</small>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary test"><i class="fas fa-plus"></i> Thêm mới</button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form action="<?php echo edit_category ?>" method="POST">
                        <input type="hidden" name="id_category" id="id_edit">
                        <div class="form-group">
                            <label for="ten">Sửa tên thể loại(*)</label>
                            <input type="text" class="form-control" id="name_edit" name="name_category" placeholder="Tên thể loại..." required autocomplete="off" >
                            <small id="emailHelp2" class="form-text text-muted">Tên thể loại phải là duy nhất, không được trùng</small>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary test"><i class="fas fa-plus"></i> Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function edit(id, name){
        document.getElementById('id_edit').value = id;
        document.getElementById('name_edit').value = name;
    }
</script>


