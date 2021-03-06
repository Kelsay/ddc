<?php
/**
 * @file
 * Template file for article teasers.
 */
?>
<div class="contextual-links-region">
    <?php print render($title_suffix); ?>
    <article>
        <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
            <div class="media">
                <div class="pull-left">
                    <?php print render($content['field_image']); ?>
                </div>
                <div class="media-body">
                    <h1 class="title"><?php print $linked_title; ?></h1>
                    <h2 class="subtitle"><?php print render($content['field_subtitle']); ?></h2>
                    <?php print render($content['body']); ?>
                </div>
            </div>
        </div>
    </article>
</div>