<?php
/**
 * @file
 * Template file for article full view.
 */

$article = new ArticleEntityWrapper($node);

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
        <?php if($article->hasAuthor()): ?>
            <div class="author col-md-6 pull-right ">
                <div class="panel panel-default">
                    <div class="name panel-heading">
                        Author: <b><?php echo $article->getAuthorName(); ?></b>
                    </div>

                    <div class="panel-body">
                        <?php if ($article->getAuthorPicture()): ?>
                            <img class="image pull-left" src="<?php echo $article->getAuthorPicture(); ?>">
                        <?php endif; ?>
                        <?php print $article->getAuthorBio(); ?>
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