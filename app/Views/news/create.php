<section>

    <h2><?= esc($title) ?></h2>

    <?= session()->getFlashData('error') ?>
    <?= service('validation')->listErrors() ?>

    <form action="/news/create" method="post">
        <?= csrf_field() ?>

        <div class="input-label">
            <label for="title">Title</label>
        </div>
        <div class="input-text">
            <input type="input" name="title"/>
        </div>
        <br/>

        <div class="input-label">
            <label for="body">Body</label>
        </div>
        <div class="input-text">
            <textarea name="body" cols="45" rows="4"></textarea>
        </div>
        <br/>

        <div>
            <input class="btn-submit" type="submit" name="submit" value="Create">
        </div>

    </form>

</section>

<div class="further">

    <section>

        <h1><?= esc($title) ?></h1>

    </section>
</div>
