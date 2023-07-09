<div class="content">
    <div class="container breadcrumb-container">
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?php echo APP_URL ?>">Truyện</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?php echo APP_URL.'/home/story/'.$data['story']['name_story_unsigned'] ?>"><?php echo $data['story']['name_story'] ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href=""><?php echo $data['chapter']['name'] ?></a>
            </li>
        </ul>
    </div>
    <center><a id="name_story" href="<?php echo APP_URL.'/home/story/'.$data['story']['name_story_unsigned'] ?>"><h1 id="name__story"><?php echo $data['story']['name_story'] ?></h1></a></center>
    <center><p><?php echo $data['chapter']['name'] ?></p></center>
    <div class="nav-button">
        <a href="<?php
            $id_story = $data['story']['id_story'];
            $number_chapter =  $data['chapter']['number_chapter'] - 1;
            if(checkChapNext($id_story, $number_chapter) == true){
                echo APP_URL.'/home/read_story/'.$data['story']['name_story_unsigned'].'/'.$number_chapter ;
            }else{
                echo '#';
            }
        ?>">Chương trước</a>
        <div class="form-group" id="chapter_select">
            <select class="form-control form-control" id="defaultSelect" onchange="window.location.href=this.value">
                <option>Chương</option>
                <?php foreach($data['allChapter'] as $val) { ?>
                    <option value="
                        <?php 
                            echo APP_URL.'/home/read_story/'.$data['story']['name_story_unsigned'].'/'.$val['number_chapter'];                                          
                        ?>
                    "><?php echo getNameChapter($val['name']) ?></option>
                    
                <?php } ?>
            </select>
        </div>
        <a href="<?php 
            $id_story = $data['story']['id_story'];
            $number_chapter =  $data['chapter']['number_chapter'] + 1;
            if(checkChapNext($id_story, $number_chapter) == true){
                echo APP_URL.'/home/read_story/'.$data['story']['name_story_unsigned'].'/'.$number_chapter ;
            }else{
                echo '#';
            }
        ?>">Chương sau</a>
    </div>
    <div class="col-md-10 ml-auto mr-auto" id="content-story">
        <p>
            <?php echo $data['chapter']['content'] ?>
        </p>
    </div>
    <div class="nav-button">
        <a href="<?php
            $id_story = $data['story']['id_story'];
            $number_chapter =  $data['chapter']['number_chapter'] - 1;
            if(checkChapNext($id_story, $number_chapter) == true){
                echo APP_URL.'/home/read_story/'.$data['story']['name_story_unsigned'].'/'.$number_chapter ;
            }else{
                echo '#';
            }
        ?>">Chương trước</a>
        <div class="form-group" id="chapter_select">
            <select class="form-control form-control" id="defaultSelect" onchange="window.location.href=this.value">
                <option>Chương</option>
                <?php foreach($data['allChapter'] as $val) { ?>
                    <option value="
                        <?php 
                            echo APP_URL.'/home/read_story/'.$data['story']['name_story_unsigned'].'/'.$val['number_chapter'];                                          
                        ?>
                    "><?php echo getNameChapter($val['name']) ?></option>
                    
                <?php } ?>
            </select>
        </div>
        <a href="<?php 
            $id_story = $data['story']['id_story'];
            $number_chapter =  $data['chapter']['number_chapter'] + 1;
            if(checkChapNext($id_story, $number_chapter) == true){
                echo APP_URL.'/home/read_story/'.$data['story']['name_story_unsigned'].'/'.$number_chapter ;
            }else{
                echo '#';
            }
        ?>">Chương sau</a>
    </div>
    <!-- Top content -->
    <div class="top-content">
        <h2 style="border-bottom: 1px solid rgba(0, 0, 0, 0.167);">TRUYỆN HOT</h2>
        <div class="container-fluid">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <?php $i=1; foreach($data['storyHot'] as $val) { ?> 
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 <?php if($i ==1) echo"active" ?>">
                        <a href="<?php echo APP_URL.'/home/story/'.$val['name_story_unsigned'] ?>">
                            <img src="<?php storage_patch($val['image']) ?>" class="img-fluid mx-auto d-block" alt="img1" style="height: 250px;">
                            <h4 style="margin-top:15px"><center><?php 
                                $chuoi = $val['name_story'];
                                $do_dai = strlen($chuoi);
                                if ($do_dai > 50) {
                                    $chuoi_cat = substr($chuoi, 0, 50) . "...";
                                } else {
                                    $chuoi_cat = $chuoi;
                                }
                                echo $chuoi_cat;
                            ?></center></h4>
                        </a>
                    </div>
                <?php $i++; }?>
            </div>
                <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>