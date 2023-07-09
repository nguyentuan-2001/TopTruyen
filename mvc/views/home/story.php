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
                <a href=""><?php echo $data['story']['name_story'] ?></a>
            </li>
        </ul>
    </div>
    <div class="col-md-10 ml-auto mr-auto" style="margin-top: 30px; ">
        <h2 style="border-bottom: 1px solid rgba(0, 0, 0, 0.167);">THÔNG TIN TRUYỆN</h2>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-3" id="img-product">
                <img src="<?php storage_patch($data['story']['image']) ?>" width="215px" height="320px" alt="ảnh truyện" >	
                
                <div class="info">
                    <div>
                        <h3>Tác giả:</h3>
                        <a itemprop="author" href="" title="<?php echo $data['story']['author'] ?></b>"><?php echo $data['story']['author'] ?></a>
                    </div>
                    <div>
                        <h3>Thể loại:</h3>
                        <?php getCategoryHome($data['story']['id_story']) ?>
                    </div>
                    <div>
                        <h3>Nguồn:</h3>
                        <span class="source"><?php echo $data['story']['source'] ?> </span>
                    </div>
                    <div>
                        <h3>Trạng thái:</h3>
                        <?php if($data['story']['status'] ==1){ ?>
                            <span class="text-primary">Đang ra</span>
                        <?php }else if($data['story']['status'] ==2){ ?>
                            <span class="text-primary">Tạm dừng</span>
                        <?php }else{ ?>
                            <span class="text-primary">Hoàn thành</span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" >
                <div id="name-product">
                    <center><h2 style="border-bottom: 1px solid rgba(0, 0, 0, 0.167); text-transform: uppercase;"><b><?php echo $data['story']['name_story'] ?></b></h2></center>
                    <div class="rate">
                        <div class="rate-holder" data-score="4.6" style="cursor: pointer;"><img alt="1" src="//static.8cache.com/lib/raty/images/star-on.png" title="Không còn gì để nói...">&nbsp;<img alt="2" src="//static.8cache.com/lib/raty/images/star-on.png" title="WTF">&nbsp;<img alt="3" src="//static.8cache.com/lib/raty/images/star-on.png" title="Cái gì thế này ?!">&nbsp;<img alt="4" src="//static.8cache.com/lib/raty/images/star-on.png" title="Haizz">&nbsp;<img alt="5" src="//static.8cache.com/lib/raty/images/star-half.png" title="Tạm">&nbsp;<img alt="6" src="//static.8cache.com/lib/raty/images/star-off.png" title="Cũng được">&nbsp;<img alt="7" src="//static.8cache.com/lib/raty/images/star-off.png" title="Khá đấy">&nbsp;<img alt="8" src="//static.8cache.com/lib/raty/images/star-off.png" title="Được">&nbsp;<img alt="9" src="//static.8cache.com/lib/raty/images/star-off.png" title="Hay">&nbsp;<img alt="10" src="//static.8cache.com/lib/raty/images/star-off.png" title="Tuyệt đỉnh!"><input name="score" type="hidden" value="4.6"></div>
                        <em class="rate-text"></em>
                        <div class="small" itemprop="aggregateRating" itemscope="" itemtype="https://schema.org/AggregateRating"><em>Đánh giá: <strong><span itemprop="ratingValue"><?php echo $data['story']['evaluate'] ?></span></strong>/<span class="text-muted" itemprop="bestRating">10</span> từ <strong><span itemprop="ratingCount">25</span> lượt</strong></em></div>
                    </div>
                    <div id="myDiv">
                        <?php echo $data['story']['introduce'] ?>
                    </div>
                </div>
                <div id="l-chapters">
                    <p style="border-bottom: 1px solid rgba(0, 0, 0, 0.167);">CÁC CHƯƠNG MỚI NHẤT</p>
                    <ul class="l-chapters">
                        <?php foreach($data['chapterNew'] as $val) { ?> 
                            <li style="margin: 10px 0px;">
                                <a href="<?php 
                                    echo APP_URL.'/home/read_story/'.$data['story']['name_story_unsigned'].'/'.$val['number_chapter'];                                          
                                    ?>" title="<?php echo $val['name'] ?>">
                                    <span class="chapter-text"><?php echo $val['name'] ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3" id="same__author">
                <div class="card">
                    <table class="table-fill1">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    <div class="text-center" style="padding: 10px 0px; border-bottom: 1px solid black;">
                                        <h4 style="margin: 0px;">TRUYỆN CÙNG TÁC GIẢ</h4>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-hover">
                            <?php foreach($data['storyAuthor'] as $val) { ?> 
                                <tr>
                                    <td class="text-left"><i class="far fa-dot-circle" style="font-size:10px; transform: translate(0px, -1px);"></i>
                                        <a href="<?php echo APP_URL.'/home/story/'.$val['name_story_unsigned'] ?>" style="font-size:15px;">
                                            <?php 
                                            $chuoi = $val['name_story'];
                                            $do_dai = strlen($chuoi);
                                            if ($do_dai > 28) {
                                                $chuoi_cat = substr($chuoi, 0, 28) . "...";
                                            } else {
                                                $chuoi_cat = $chuoi;
                                            }
                                            echo $chuoi;
                                            ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        <h2 style="border-bottom: 1px solid rgba(0, 0, 0, 0.167);">DANH SÁCH CHƯƠNG</h2>
        <div class="row" style="margin: 10px 0px;">
            <?php foreach($data['chapter'] as $val) { ?> 
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <ul class="list-chapter">
                        <li><span class="glyphicon glyphicon-certificate"></span> <a href="<?php 
                            echo APP_URL.'/home/read_story/'.$data['story']['name_story_unsigned'].'/'.$val['number_chapter'];                                          
                            ?>" title="<?php echo $val['name'] ?>"><span class="chapter-text"><?php echo $val['name'] ?></span></a></li> 
                    </ul>
                </div>
            <?php } ?>
        </div>
        <br><h2 style="border-bottom: 1px solid rgba(0, 0, 0, 0.167);">BÌNH LUẬN TRUYỆN</h2>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0&appId=5372383886195743&autoLogAppEvents=1" nonce="glmvcJHq"></script>
        <div class="fb-comments" data-href="<?php echo $data['current_url'] ?>" data-width="900" data-numposts="5"></div>
    </div>
</div>

<style>
#myDiv {
   max-height: 200px;
   overflow: hidden;
   transition: max-height 0.3s ease-out;
}

#myDiv.expanded {
   max-height: none;
   overflow: visible;
}
</style>
<script>
const myDiv = document.getElementById('myDiv');
const contentHeight = myDiv.scrollHeight;

if (contentHeight > 200) {
   const readMoreBtn = document.createElement('button');
   readMoreBtn.innerHTML = 'Xem thêm';
   readMoreBtn.onclick = function() {
      myDiv.classList.add('expanded');
      readMoreBtn.style.display = 'none';
      readLessBtn.style.display = 'block';
   };
   myDiv.parentElement.appendChild(readMoreBtn);

   const readLessBtn = document.createElement('button');
   readLessBtn.innerHTML = 'Thu gọn';
   readLessBtn.onclick = function() {
      myDiv.classList.remove('expanded');
      readMoreBtn.style.display = 'block';
      readLessBtn.style.display = 'none';
      myDiv.scrollTop = 0;
   };
   readLessBtn.style.display = 'none';
   myDiv.parentElement.appendChild(readLessBtn);
}
</script>