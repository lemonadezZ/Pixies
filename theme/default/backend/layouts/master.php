<?php include(__DIR__.'/_page_header.php'); ?>
<?php include(__DIR__.'/_header.php'); ?>


<div class="clearfix"> </div>
        
        
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                    <?php @include(__DIR__.'./_page_menu.php'); ?>
            </div>
            <div class="page-content-wrapper">
                <div class="page-content">

                     <?= $this->content; ?>
                </div>
            </div>
        </div>


<?= @include('_footer.php'); ?>
<?= @include('_page_footer.php'); ?>
