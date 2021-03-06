<?php

?>
<div class="row">
    <div class="grid-10">
        <div class="row">
            <!-- for mobile -->
            <div class="grid-6 grid-small-10 grid-smallest-10">
                <h4 class="inline text-color-gray mr-10 hidden-smallest hidden-small">file storage manager</h4>
                <a class="button button-warning mr-10" href="<?= $url->path('manager/upload-file'); ?>">upload</a>
                <a class="button button-success mr-10" href="<?= $url->path('manager/files/latest'); ?>">files</a>
                <a class="button button-notice mr-10" href="<?= $url->path('manager/categories'); ?>">categories</a>
            </div>
            <!-- for desktop -->
            <div class="grid-4 hidden-small hidden-smallest">
                <a class="button button-danger pull-right ml-10" href="<?= $url->path('manager/close-session'); ?>">logout</a>
                <a class="button button-light-green pull-right ml-10" href="<?= $url->path('manager/users/index'); ?>">users</a>
                <a class="button button-gray pull-right" href="<?= $url->path('manager/server-info'); ?>">server info</a>
            </div>
        </div>
        <!-- for mobile -->
        <div class="row hidden display-block-small display-block-smallest">
            <div class="grid-4 grid-smallest-10">
                <a class="button button-gray mr-10" href="<?= $url->path('manager/server-info'); ?>">server info</a>
                <a class="button button-light-green mr-10" href="<?= $url->path('manager/users/index'); ?>">users</a>
                <a class="button button-danger" href="<?= $url->path('manager/close-session'); ?>">logout</a>
            </div>
        </div>
    </div>
</div>