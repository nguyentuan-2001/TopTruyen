<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="<?php echo handle_edit_chapter; ?>" method="POST">                 
                        <input type="hidden" name="id_chapter" id="id_edit" value="<?php echo $data['chapter']['id_chapter'] ?>">
                        
                        <input type="hidden" name="name_story_unsigned" value="<?php echo  $data['story']['name_story_unsigned'] ?>">
                        
                        <div class="form-group">
                            <label for="ten">Sửa tên chương(*)</label>
                            <input type="text" value="<?php echo $data['chapter']['name'] ?>" class="form-control" id="name_edit" name="name" placeholder="Tên thể loại..." required autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <label for="comment">Nội dung</label>
                            <textarea class="form-control" id="content_edit" rows="10" name="content">
                                <?php echo $data['chapter']['content'] ?>
                            </textarea>
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
