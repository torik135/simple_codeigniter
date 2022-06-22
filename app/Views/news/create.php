<section>

    <h2><?= esc($title) ?></h2>

    <?= session()->getFlashData('error') ?>
    <?= service('validation')->listErrors() ?>

    <form action="/news/create" method="post">
        <?= csrf_field() ?>

        <div>
            <label for="title">Title</label>
            <input type="input" name="title"/><br/>
        </div>

        <div>
            <label for="body">Body</label>
            <textarea name="body" cols="45" rows="4"></textarea><br/>
        </div>
        
        <input type="submit" name="submit" value="Create">
        
    </form>

</section>

<div class="further">

    <section>

        <h1><?= esc($title) ?></h1>

    </section>
</div>
