<section>

    <h2>
        <a href="/news/create">Create News</a>
    </h2>
    <h2><?= esc($title) ?></h2>


    <?php if (! empty($news) && is_array($news)): ?>
    
    <?php foreach ($news as $news_item): ?>
        <h3><?= esc($news_item['title']) ?></h3>

        <div class="main">
            <?= esc($news_item['body']) ?>
        </div>
        <p>
            <a href="/news/<?= esc($news_item['slug'], 'url') ?>">
                View Article
            </a>
        </p>
        <hr/>
    <?php endforeach ?>

    <?php else: ?>
        <h3>No News</h3>
        <p>Unable to find any news for you.</p>
    <?php endif ?>

    
    <div class="pagination-div">
        <?= $pager->links() ?>    
    </div>
    
    
    

</section>

<div class="further">

    <section>

        <h1><?= esc($title) ?></h1>

    </section>
</div>
