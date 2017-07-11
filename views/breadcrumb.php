<ol class="breadcrumb">
    <?php foreach($items as $item) { ?>
        <li> <?php if(!$item['active']) { ?><a href="<?= $item['link'] ?>" <?php if($item['active']) { ?> class="active"<?php } ?>><?php } ?><?= $item['title'] ?><?php if(!$item['active']) { ?></a><?php } ?></li>
    <?php } ?>
</ol>
