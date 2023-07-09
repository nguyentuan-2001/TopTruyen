<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Truyện</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên truyện</th>
                                    <th scope="col">Thể loại</th>
                                    <th scope="col">Tác giả</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Số chương</th>
                                    <th scope="col">Đánh giá</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col" style="width:150px">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($data['story'] as $val) { ?>
                                    <!-- <input type="hidden" name="id_story" value="<?php echo $id_story ?>"> -->
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><img src="<?php storage_patch($val['image']) ?>" alt="" width="50px" height="50px"></td>
                                        <td><?php echo $val['name_story'] ?></td>
                                        <td><?php getCategory($val['id_story']) ?></td>
                                        <td><?php echo $val['author'] ?></td>
                                        <td>
                                            <?php 
                                                if($val['status']==1){
                                                    echo 'Đang cập nhật';
                                                }else if($val['status']==2){
                                                    echo 'Tạm ngừng';
                                                }else{
                                                    echo 'Hoàn thành';
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $val['chapter'] ?></td>
                                        <td><?php echo $val['evaluate'] ?></td>
                                        <td><?php echo DateToTime($val['created_at']) ?></td>
                                        <td>
                                        <a href="<?php echo list_chapter.'/'.$val['name_story_unsigned']; ?>" style="padding:0 5px; border:0px; background:none; cursor: pointer;"><i class="fas fa-list" ></i></a>
                                        <a href="<?php echo edit_story.'/'.$val['name_story_unsigned']; ?>" style="padding:0 5px; border:0px; background:none; cursor: pointer;"><i class="fas fa-edit" ></i></a>
                                        <a href="<?php echo delete_story.'/'.$val['id_story']; ?>" onclick=" return confirm('Bạn chắc chắn muốn xóa truyện [ <?php echo $val['name_story'] ?> ] ?')" style="padding:0 5px; border:0px;background:none;cursor: pointer;"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


