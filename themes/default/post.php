<h2><?php echo $post->title ?></h2>
<?php echo $post->content ?>

<?php if (isset($config['disqus_shortname'])): ?>
<div id="disqus_thread"></div>
<script type="text/javascript">
    var disqus_shortname = '<?php echo $config['disqus_shortname']?>'; 
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
<?php endif ?>
</section>
