<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">THỂ LOẠI</h4>
        </div>

        <?php  if(count($data['story']) >0){ ?>
            <div class="row row-demo-grid">
                <div class="col-12 col-md-8">
                    <?php foreach($data['story'] as $val) { ?>
                        <div class="row" style="margin: 10px 0px;">
                            <div class="col-5">
                            <img src="<?php storage_patch($val['image']) ?>" alt="navbar brand" style="width:180px; height:130px;">
                            </div>
                            <div class="col-5">
                                <div style="text-align:left; font-weight:bold">
                                    <i class="fas fa-book"></i>  
                                    <a href="<?php echo APP_URL.'/home/story/'.$val['name_story_unsigned'] ?>">
                                        <?php 
                                            echo $val['name_story'];
                                        ?>
                                    </a>
                                    <p><i class="fas fa-pen-alt"></i>  <?php echo $val['author'] ?></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div style="font-weight:bold">
                                    <a href="
                                        <?php 
                                        $id_story = $val['id_story'];
                                        $number_chapter =  $val['chapter'];
                                        if(checkChapNext($id_story, $number_chapter) == true){
                                            echo APP_URL.'/home/read_story/'.$val['name_story_unsigned'].'/'.$number_chapter ;
                                        }else{
                                            echo '#';
                                        }                                        
                                        ?>"   
                                    title="<?php echo $val['chapter'] ?>"><span class="chapter-text"><span>Chương </span></span><?php echo $val['chapter'] ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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
        <?php } else {echo '.<h4 class="page-title">Không có truyện phù hợp</h4>.';}?>
    </div>
</div>