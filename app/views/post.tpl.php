
<article>
    <h1>  <?= htmlentities($title)?></h1>
    <!--htmlentities converte string in html condsiderando caratteri speciali-->
    <?= htmlentities($message)?>
</article>


<!--
<article>
    <h1><?/*=$post->title*/?></h1>
    <p>
        <time datetime="<?/*=$post->datecreated*/?>"><?/*=$post->datecreated*/?></time>
        by <span><a href="mailto:<?/*=$post->email*/?>"><?/*=$post->email*/?></a></span>
    </p>
    <div><?/*=$post->message*/?></div>
</article>
-->