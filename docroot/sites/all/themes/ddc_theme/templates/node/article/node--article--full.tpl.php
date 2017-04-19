<?php
/**
 * @file
 * Template file for article full view.
 */

/*
 * Extract the author info from the related entity
 */
$author = false;
if ($node->field_author_type) {

    $is_user = $node->field_author_type[LANGUAGE_NONE][0]['value'] == 1;

    if ($is_user && $node->field_user) {
        $author = $node->field_user[LANGUAGE_NONE][0]['entity'];
    } else if (!$is_user && $node->field_author) {
        $author = $node->field_author[LANGUAGE_NONE][0]['entity'];
    }

    if ($author) {
        $author_image_src = image_style_url("author", $author->field_picture[LANGUAGE_NONE][0]['uri']);
        $author_name = $is_user ? $author->name : $author->title;
    }
}

?>
<article class="node-article-full <?php print $classes ?>" <?php print $attributes; ?>>

    <!-- Heading data -->
    <h1 class="title"><?php print $title; ?></h1>
    <h2 class="subtitle"><?php print render($content['field_subtitle']); ?></h2>
    <div class="published">
        Published: <?php echo format_date($created, 'medium'); ?>
    </div>

    <!-- Copy section  -->
    <section class="copy">

        <!-- Author info -->
        <?php if($author): ?>
            <div class="author col-md-6 pull-right ">
                <div class="panel panel-default">
                    <div class="name panel-heading">
                        Author: <b><?php echo $author_name; ?></b>
                    </div>

                    <div class="panel-body">
                        <?php if($author_image_src): ?>
                        <img class="image pull-left"
                             src="<?php echo $author_image_src; ?>">
                        <?php print substr($author->field_bio[LANGUAGE_NONE][0]['value'], 0,200); ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        <?php endif; ?>

        <!-- Image -->
        <div class="image pull-left img-thumbnail">
            <?php print render($content['field_image']); ?>
        </div>

        <!-- Copy text -->
        <?php print render($content['body']); ?>
    </section>

</article>