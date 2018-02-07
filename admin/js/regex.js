(function($){
    $.fn.regex = function(pattern, fn, fn_a){
        var fn = fn || $.fn.text;
        return this.filter(function() {
            return pattern.test(fn.apply($(this), fn_a));
        });
    };
})(jQuery);