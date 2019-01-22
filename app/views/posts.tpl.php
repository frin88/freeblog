<?php foreach ($posts as $post): ?>
<article>
    <h1><a href="/post/<?=$post->id?>"><?= htmlentities($post->title) ?></a></h1>
    <p>
       <!-- <time datetime="<?/*=$post->datecreated*/?>"><?/*=$post->datecreated*/?></time>-->
        by <span><a href="mailto:<?=$post->email?>"><?=$post->email?></a></span>
    </p>
   <div > <?= htmlentities($post->message);?></div>
</article>
<div style="margin-top: 15px;"></div>
<?php endforeach; ?>
