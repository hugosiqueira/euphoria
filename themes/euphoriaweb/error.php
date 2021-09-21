<?php $v->layout("_theme"); ?>

<article class="not_found">
    <div class="container content">
        <header class="not_found_header">
            <p class="error error-number">&bull;<?= $error->code; ?>&bull;</p>
            <h1 class="mini-text"><?= $error->title; ?></h1>
            <p class="error-text mb-4 mt-1"><?= $error->message; ?></p>

            <?php if ($error->link): ?>
                <a class="btn btn-lg btn-primary"
                   title="<?= $error->linkTitle; ?>" href="<?= $error->link; ?>"><?= $error->linkTitle; ?></a>
            <?php endif; ?>
        </header>
    </div>
</article>