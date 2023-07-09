<div class="content">
    <div class="text-center" >
        <p style="background: #c3c3c3; height:40px;line-height: 40px;">Đọc truyện online, đọc truyện chữ, truyện full, truyện hay. Tổng hợp đầy đủ và cập nhật liên tục.</p>
    </div>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">TRUYỆN HOT</h4>
            <div class="col-md-2 ml-auto">
                <div class="form-group" style="width:200px;">
                    <select class="form-control" onchange="window.location.href=this.value">
                        <option>Thể loại</option>
                        <?php foreach($data['category'] as $val_3) { ?>      
                            <option value="
                                <?php 
                                    echo APP_URL.'/category/category/'.$val_3['name_unsigned'];
                                ?>
                            " style="margin:10px 0px;"><?php echo $val_3['name_category'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="parent">
                    <?php foreach($data['storyHot'] as $val) { ?>
                        <a href="<?php echo APP_URL.'/home/story/'.$val['name_story_unsigned'] ?>">
                            <div class="story_hot">
                                <img src="<?php storage_patch($val['image']) ?>" alt="navbar brand"  >
                                <div class="title">
                                    <p style="margin:0px" itemprop="name"><?php echo $val['name_story'] ?></p>
                                </div>
                                <?php if($val['status'] == 3){ ?>
                                    <span class="full-label"><img src="<?php public_patch('img/full-label.png') ?>" alt="navbar brand"  ></span>
                                <?php } ?>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">TRUYỆN MỚI CẬP NHẬT</h4>
        </div>

        <div class="row row-demo-grid">
            <div class="col-12 col-md-8">
                <div class="card">
                    <table class="table-fill">
                        <tbody class="table-hover">
                            <?php foreach($data['storyNewUpdate'] as $val_1) { ?>
                                <tr>
                                    <td class="text-left"><a href="<?php echo APP_URL.'/home/story/'.$val_1['name_story_unsigned'] ?>">
                                    <i class="far fa-dot-circle" style="font-size:10px; transform: translate(0px, -1px);"></i>
                                        <?php 
                                           echo $val_1['name_story'];
                                        ?>
                                    </a></td>
                                    <td class="text-left"><?php getCategoryHome($val_1['id_story']) ?></td>
                                    <td class="text-left"><a href="
                                    <?php 
                                        $id_story = $val_1['id_story'];
                                        $number_chapter =  $val_1['chapter'];
                                        if(checkChapNext($id_story, $number_chapter) == true){
                                            echo APP_URL.'/home/read_story/'.$val_1['name_story_unsigned'].'/'.$number_chapter ;
                                        }else{
                                            echo '#';
                                        }                                                                               
                                    ?>">Chương <?php echo $val_1['chapter'] ?></a></td>
                                    <td class="text-left"><?php echo DateToTime($val['updated_at']) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-5 col-md-3" id="category__story">
                <div class="card">
                    <div class="text-center" style="padding: 10px 0px; border-bottom: 1px solid black;">
                        <h4 class="page-title" style="margin: 0px;">THỂ LOẠI TRUYỆN</h4>
                    </div>
                    <div class="row">
                        <?php foreach($data['category'] as $val_3) { ?> 
                            <div class="col-xl-6" id="category_story">
                                <a href="
                                    <?php 
                                        echo APP_URL.'/category/category/'.$val_3['name_unsigned'];
                                    ?>
                                "><?php echo $val_3['name_category'] ?></a>
                            </div>
                        <?php } ?>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <img src="img/banner/breadcrumb-bg.jpg" alt="">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">TRUYỆN ĐÃ HOÀN THÀNH</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="parent-1">
                    <?php foreach($data['storyFinish'] as $val_2) { ?>
                        <a href="<?php echo APP_URL.'/home/story/'.$val_2['name_story_unsigned'] ?>">
                            <div class="story_finish">
                                <img src="<?php storage_patch($val_2['image']) ?>" alt="navbar brand"  >
                                <div class="caption">
                                    <p>
                                        <?php 
                                            $chuoi = $val_2['name_story'];
                                            $do_dai = strlen($chuoi);
                                            if ($do_dai > 27) {
                                                $chuoi_cat = substr($chuoi, 0, 27) . "...";
                                            } else {
                                                $chuoi_cat = $chuoi;
                                            }
                                            echo $chuoi_cat;
                                        ?>
                                    </p> 
                                    <small class="btn-xs label-primary">Full - <?php echo $val_2['chapter'] ?> chương</small> 
                                </div>
                            </div> 
                        </a>                         
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <a href="
        <?php 
            echo APP_URL.'/category/full_story';
        ?>
    ">
        <button class="btn btn-default" style="float: right; margin-right: 30px;margin-bottom: 30px;margin-top: 80px;">
            Xem thêm
        </button>
    </a>
    
</div>