<?php

use FileStorage\Services\Uploader\Uploader;

/**
 * @var $files \Dez\ORM\Collection\ModelCollection
 * @var $file \FileStorage\Models\Files
 * @var $token \Dez\Authorizer\Models\Auth\TokenModel
*/

?>
<div class="row">
    <div class="grid-10">
        <h2>Files</h2>
        <div class="row">
            <div class="grid-10">
                <a class="button button-warning button-size-small" href="<?= $this->url->path('manager/files/latest'); ?>">latest</a>
                <a class="button button-pink button-size-small" href="<?= $this->url->path('manager/files/protected'); ?>">protected</a>
            </div>
        </div>
        <table class="table table-striped table-caption-upper table-hovered">
            <thead>
            <tr>
                <th class="hidden-smallest">name</th>
                <th>category</th>
                <th>size</th>
                <th class="hidden-smallest">mime-type</th>
                <th class="hidden-small hidden-smallest">file</th>
                <th>created at</th>
                <th></th>
            </tr>
            </thead>
            <?php if(isset($files) && $files->count() > 0): foreach ($files as $file): ?>
            <tr>
                <td class="hidden-smallest">
                    <?= $file->getName() ?>
                </td>
                <td>
                    <a class="button button-gray button-size-extra-small" href="<?= $this->url->path("manager/files/category", ['slug' => $file->category()->getSlug()]); ?>"><?= $file->category()->getName() ?></a>
                </td>
                <td><?= Uploader::humanizeSize((integer) $file->getSize()) ?></td>
                <td class="hidden-smallest"><code><?= $file->getMimeType() ?></code></td>
                <td class="hidden-small hidden-smallest"><code><?= $file->getHash() ?>.<?= $file->getExtension() ?></code></td>
                <td class="text-center"><?= date('d F, Y H:i:s', $file->getCreatedAt()) ?></td>
                <td>
                    <a target="_blank" class="button button-notice button-size-small" href="<?= $this->url->path("{$file->getHash()}/detailed"); ?>">detailed</a>
                    <a target="_blank" class="button button-pink button-size-small" href="<?= $this->url->path("{$file->getHash()}/raw"); ?>">raw</a>
                    <?php if($token->exists()): ?>
                        <a onclick="return confirm('You really wand delete file #<?= $file->id() ?>');" target="_blank" class="button button-danger button-size-small" href="<?= $this->url->path("{$file->getHash()}/remove", ['token' => $token->getToken()]); ?>">remove</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; endif; ?>
        </table>
    </div>
</div>