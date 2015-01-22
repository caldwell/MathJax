jQuery(function($) {

    MathJax.Hub.Config({
      showProcessingMessages: false,
      jax: ["input/TeX", "output/HTML-CSS"],
    });

    $(document).on('CommentAdded PreviewLoaded', function() {
        MathJax.Hub.queue.Push(['Typeset', MathJax.Hub]);
        window.setTimeout(function(){
            MathJax.Hub.queue.Push(['Typeset', MathJax.Hub]);
        }, 100);
    });

});
