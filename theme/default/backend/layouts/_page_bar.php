 <h3 class="page-title"><?= @$this->page->nav[0]['name'] ?></h3>


                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?= $this->page->home_url ?>"><?= _('主页') ?></a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <?php $len=count($this->page->nav)-1;?>
                            <?php foreach($this->page->nav as $key=>$nav): ?>
                                <li>
                                    <a href="<?php  if($len!=$key){
                                       echo @$nav['href']; 
                                    }else{
                                        echo "#";
                                    }
                                     ?>"><?= $nav['name']; ?></a>
                                    <?php 
                                    if($len!=$key): ?>
                                    <i class="fa fa-angle-right"></i>
                                    <?php endif ?>
                                </li>
                            <?php endforeach ?>
                         
                        </ul>
                    </div>