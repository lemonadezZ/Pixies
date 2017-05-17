<?php @include('_page_header.php'); ?>
<?php @include('_header.php'); ?>


<div class="clearfix"> </div>
        
        
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                    <?php @include('_page_menu.php'); ?>
            </div>
            <div class="page-content-wrapper">
                <div class="page-content" id="pjax-container">
                     <?= $this->content; ?>
                </div>
            </div>
        </div>


<?php @include('_footer.php'); ?>
<?php @include('_page_footer.php'); ?>
