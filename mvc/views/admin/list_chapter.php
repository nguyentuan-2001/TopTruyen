<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?php echo $data['story']['name_story'] ?></div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên chương</th>
                                    <th scope="col">Cập nhật</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($data['chapter'] as $val) { ?>
                                    <input type="hidden" name="name_story_unsigned" value="<?php echo $data['story']['name_story_unsigned'] ?>">
                                    <input type="hidden" name="name_unsigned" value="<?php echo $val['name_unsigned'] ?>">
                                    <input type="hidden" name="id_story" value="<?php echo $data['story']['id_story'] ?>">
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $val['name'] ?></td>
                                        <td><?php echo DateToTime($val['updated_at']) ?></td>
                                        <td>
                                            <a href="<?php echo edit_chapter.'/'.$data['story']['name_story_unsigned'].'/'.$val['id_chapter']; ?>" style="padding:0 5px; border:0px; background:none; cursor: pointer;"><i class="fas fa-edit" ></i></a>
                                            <a href="<?php echo handle_delete_chapter.'/'.$data['story']['id_story'].'/'.$val['id_chapter']; ?>" onclick=" return confirm('Bạn chắc chắn muốn xóa chương [ <?php echo $val['name'] ?> ] ?')" style="padding:0 10px; border:0px;background:none;cursor: pointer;"><i class="fas fa-trash"></i></a>    
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thêm Chương</div>
                    </div>
                    <form action="<?php echo add_chapter; ?>" method="POST">
                    <input type="hidden" name="id_story" value="<?php echo $data['story']['id_story'] ?>">
                    <input type="hidden" name="name_story_unsigned" value="<?php echo $data['story']['name_story_unsigned'] ?>">
                    <input type="hidden" name="number_chapter" value="<?php echo $data['story']['chapter'] +1 ?>">

                        <div class="form-group">
                            <label for="ten">Tên chương (*)</label>
                            <input type="text" class="form-control" value="Chương <?php echo $data['story']['chapter'] +1 ?>: " id="name" name="name" placeholder="Tên chương..." required autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <label for="comment">Nội dung</label>
                            <textarea class="form-control" id="content" rows="10" name="content">
                                
                            </textarea>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu chương</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



