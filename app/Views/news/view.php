<section>

    <div class="view-header">
        <h2><?= esc($news['title']) ?></h2>
        <form action="/news/<?= esc($news['id']) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE"/>
            <button 
                type="submit" 
                class="btn btn-delete"
                onclick="return confirm('delete item (<?= esc($news['title']) ?>)?')"
                >DELETE</button>
        </form>
        <a class="btn btn-edit" href="edit/<?= esc($news['slug']) ?>">EDIT</a>
    </div>

    <p><?= esc($news['body']) ?></p>


</section>

<div class="further">

    <section>

        <h1><?= esc($title) ?></h1>
        <h2><a href="/news"> << News List</a></h2>

    </section>
</div>
