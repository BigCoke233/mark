        $(function(){
            //锚点跳转滑动效果
            $('a[href*=#],area[href*=#]').click(function() {
                console.log(this.pathname)
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var $target = $(this.hash);
                    $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
                    if ($target.length) {
                        var targetOffset = $target.offset().top;
                        $('html,body').animate({
                                    scrollTop: targetOffset
                                },
                                1000);
                        return false;
                    }
                }
            });
        })
