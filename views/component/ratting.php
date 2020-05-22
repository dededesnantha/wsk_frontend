<div class="w3-left-align" style="display: inline-flex;margin-left: 20px;">
<?php for ($i=0; $i < (int)$review_ratting; $i++) { ?>
    <span style="font-size: 16px;color: #504f4f;background: transparent;padding: 0 5px">
        <img src="<?= base_url('asset/star.ico') ?>" alt=" " style="width: 20px;">
    </span>
<?php } ?>
<span style="padding: 4px;font-size: 12.5px;font-weight: 500;letter-spacing: 0px;color: #525252;font-style: italic;top: 1px;position: relative;">
    <span><?= $review_ratting ?></span> / <span><?= $review_total ?></span> Reviews</span>
    </div>
    <?php if (@$single['view']): ?>
        <small class="w3-text-grey" style="float: right;position: inherit;padding-right: 10px;font-size: 14px;">
            <img src="<?= base_url('asset/eye.ico') ?>" alt=" " style="width: 23px;">
            <small><?= @$single['view'] ?> view</small>
        </small>
    <?php endif ?> 