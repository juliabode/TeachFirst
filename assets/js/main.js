// Accordion for FAQ template

jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
    def: 'easeInOutExpo',
    swing: function (x, t, b, c, d) {
        return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
    },
    easeInOutExpo: function (x, t, b, c, d) {
        if (t==0) return b;
        if (t==d) return b+c;
        if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
        return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
    },
});

(function( window, $, undefined ) {

    var $event = $.event, resizeTimeout;

    $event.special.smartresize  = {
        setup: function() {
            $(this).bind( "resize", $event.special.smartresize.handler );
        },
        teardown: function() {
            $(this).unbind( "resize", $event.special.smartresize.handler );
        },
        handler: function( event, execAsap ) {
            // Save the context
            var context = this,
                args    = arguments;

            // set correct event type
            event.type = "smartresize";

            if ( resizeTimeout ) { clearTimeout( resizeTimeout ); }
            resizeTimeout = setTimeout(function() {
                jQuery.event.handle.apply( context, args );
            }, execAsap === "execAsap"? 0 : 100 );
        }
    };

    $.fn.smartresize            = function( fn ) {
        return fn ? this.bind( "smartresize", fn ) : this.trigger( "smartresize", ["execAsap"] );
    };

    $.Accordion                 = function( options, element ) {

        this.$el            = $( element );
        // list items
        this.$items         = this.$el.children('ul').children('li');
        // total number of items
        this.itemsCount     = this.$items.length;

        // initialize accordion
        this._init( options );

    };

    $.Accordion.defaults        = {
        // index of opened item. -1 means all are closed by default.
        open            : -1,
        // if set to true, only one item can be opened. Once one item is opened, any other that is opened will be closed first
        oneOpenedItem   : true,
        // speed of the open / close item animation
        speed           : 600,
        // easing of the open / close item animation
        easing          : 'easeInOutExpo',
        // speed of the scroll to action animation
        scrollSpeed     : 900,
        // easing of the scroll to action animation
        scrollEasing    : 'easeInOutExpo'
    };

    $.Accordion.prototype       = {
        _init               : function( options ) {

            this.options        = $.extend( true, {}, $.Accordion.defaults, options );

            // validate options
            this._validate();

            // current is the index of the opened item
            this.current        = this.options.open;

            // hide the contents so we can fade it in afterwards
            this.$items.find('div.acc-content').hide();

            // save original height and top of each item
            this._saveDimValues();

            // if we want a default opened item...
            if( this.current != -1 )
                this._toggleItem( this.$items.eq( this.current ) );

            // initialize the events
            this._initEvents();

        },
        _saveDimValues      : function() {

            this.$items.each( function() {

                var $item       = $(this);

                $item.data({
                    originalHeight  : $item.find('a:first').height(),
                    offsetTop       : $item.offset().top - 40
                });

            });

        },
        // validate options
        _validate           : function() {

            // open must be between -1 and total number of items, otherwise we set it to -1
            if( this.options.open < -1 || this.options.open > this.itemsCount - 1 )
                this.options.open = -1;

        },
        _initEvents         : function() {

            var instance    = this;

            // open / close item
            this.$items.find('a:first').bind('click.accordion', function( event ) {

                var $item           = $(this).parents('li');

                // close any opened item if oneOpenedItem is true
                if( instance.options.oneOpenedItem && instance._isOpened() && instance.current!== $item.index() ) {

                    instance._toggleItem( instance.$items.eq( instance.current ) );

                }

                // open / close item
                instance._toggleItem( $item );

                return false;

            });

            $(window).bind('smartresize.accordion', function( event ) {

                // reset orinal item values
                instance._saveDimValues();

                // reset the content's height of any item that is currently opened
                instance.$el.find('li.acc-open').each( function() {

                    var $this   = $(this);
                    $this.css( 'height', $this.data( 'originalHeight' ) + $this.find('div.acc-content').outerHeight( true ) );

                });

                // scroll to current
                if( instance._isOpened() )
                instance._scroll();

            });

        },
        // checks if there is any opened item
        _isOpened           : function() {

            return ( this.$el.find('li.acc-open').length > 0 );

        },
        // open / close item
        _toggleItem         : function( $item ) {

            var $content = $item.find('div.acc-content');

            ( $item.hasClass( 'acc-open' ) )

                ? ( this.current = -1, $content.stop(true, true).fadeOut( this.options.speed ), $item.removeClass( 'acc-open' ).stop().animate({
                    height  : $item.data( 'originalHeight' )
                }, this.options.speed, this.options.easing ) )

                : ( this.current = $item.index(), $content.stop(true, true).fadeIn( this.options.speed ), $item.addClass( 'acc-open' ).stop().animate({
                    height  : $item.data( 'originalHeight' ) + $content.outerHeight( true )
                }, this.options.speed, this.options.easing ), this._scroll( this ) )

        },
        // scrolls to current item or last opened item if current is -1
        _scroll             : function( instance ) {

            var instance    = instance || this, current;

            ( instance.current !== -1 ) ? current = instance.current : current = instance.$el.find('li.acc-open:last').index();

            $('html, body').stop().animate({
                scrollTop   : ( instance.options.oneOpenedItem ) ? instance.$items.eq( current ).data( 'offsetTop' ) : instance.$items.eq( current ).offset().top
            }, instance.options.scrollSpeed, instance.options.scrollEasing );

        }
    };

    var logError                = function( message ) {

        if ( this.console ) {

            console.error( message );

        }

    };

    $.fn.accordion              = function( options ) {

        if ( typeof options === 'string' ) {

            var args = Array.prototype.slice.call( arguments, 1 );

            this.each(function() {

                var instance = $.data( this, 'accordion' );

                if ( !instance ) {
                    logError( "cannot call methods on accordion prior to initialization; " +
                    "attempted to call method '" + options + "'" );
                    return;
                }

                if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {
                    logError( "no such method '" + options + "' for accordion instance" );
                    return;
                }

                instance[ options ].apply( instance, args );

            });

        }
        else {

            this.each(function() {
                var instance = $.data( this, 'accordion' );
                if ( !instance ) {
                    $.data( this, 'accordion', new $.Accordion( options, this ) );
                }
            });

        }

        return this;

    };

})( window, jQuery );


// Content tabs on 5 tabs template

(function($) {

    $.organicTabs = function(el, options) {

        var base = this;
        base.$el = $(el);
        base.$nav = base.$el.find(".tab-nav");

        base.init = function() {

            base.options = $.extend({},$.organicTabs.defaultOptions, options);

            base.$nav.delegate("a.tab-header", "click", function() {

                // Figure out current list via CSS class
                var curList = base.$el.find("a.current").attr("href").substring(1),

                // List moving to
                    $newList = $(this),

                // Figure out ID of new list
                    listID = $newList.attr("href").substring(1),

                // Set outer wrapper height to (static) height of current inner list
                    $allListWrap = base.$el.find(".tab-content-wrap"),
                    curListHeight = $allListWrap.height();
                $allListWrap.height(curListHeight);

                if ((listID != curList) && ( base.$el.find(":animated").length == 0)) {

                    // Fade out current list
                    base.$el.find("#"+curList).fadeOut(base.options.speed, function() {

                        // Fade in new list on callback
                        base.$el.find("#"+listID).fadeIn(base.options.speed);

                        // Adjust outer wrapper to fit new list snuggly
                        var newHeight = base.$el.find("#"+listID).height() + 24;
                        $allListWrap.animate({
                            height: newHeight
                            });

                        // Remove highlighting - Add to just-clicked tab
                        base.$el.find(".tab-nav a").removeClass("current");
                        $newList.addClass("current");

                    });

                }

                // Don't behave like a regular link
                // Stop propegation and bubbling
                return false;
            });

        };
        base.init();
    };

    $.organicTabs.defaultOptions = {
        "speed": 300
    };

    $.fn.organicTabs = function(options) {
        return this.each(function() {
            (new $.organicTabs(this, options));
        });
    };

})(jQuery);

jQuery(function() {
  jQuery('#accordion').accordion();

  jQuery("#5-tabs-wrapper").organicTabs();
});

jQuery.fn.log = function() {
    if (window.console && console.log) {
        console.log(this);
    }
    return this;
}

var BrowserDetect =
{
    init: function ()
    {
        this.browser = this.searchString(this.dataBrowser) || "Other";
        this.version = this.searchVersion(navigator.userAgent) ||       this.searchVersion(navigator.appVersion) || "Unknown";
    },

    searchString: function (data)
    {
        for (var i=0 ; i < data.length ; i++)
        {
            var dataString = data[i].string;
            this.versionSearchString = data[i].subString;

            if (dataString.indexOf(data[i].subString) != -1)
            {
                return data[i].identity;
            }
        }
    },

    searchVersion: function (dataString)
    {
        var index = dataString.indexOf(this.versionSearchString);
        if (index == -1) return;
        return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
    },

    dataBrowser:
    [
        { string: navigator.userAgent, subString: "Chrome",  identity: "Chrome" },
        { string: navigator.userAgent, subString: "MSIE",    identity: "Explorer" },
        { string: navigator.userAgent, subString: "Firefox", identity: "Firefox" },
        { string: navigator.userAgent, subString: "Safari",  identity: "Safari" },
        { string: navigator.userAgent, subString: "Opera",   identity: "Opera" }
    ]

};
BrowserDetect.init();

var detectViewPort = function(scrollBarWidth) {
    var scrollBarWidth = scrollBarWidth || 0;
    var viewPortWidth = jQuery(window).width();

    if (viewPortWidth+scrollBarWidth > 979) {
        jQuery('#menu-hauptnavigation > li').hover(function() {
            jQuery(this).siblings('.active').find('ul').hide();
        }, function(){
            jQuery(this).siblings('.active').find('ul').show();
        });
    } else {
        jQuery( "#menu-hauptnavigation > li" ).off( "mouseenter mouseleave" );
    }
}

var scrollbarWidth = function() {
    if(jQuery(document).height() > jQuery(window).height()){
        jQuery('body').append('<div id="fakescrollbar" style="width:50px;height:50px;overflow:hidden;position:absolute;top:-200px;left:-200px;"></div>');
        fakeScrollBar = jQuery('#fakescrollbar');
        fakeScrollBar.append('<div style="height:100px;">&nbsp;</div>');
        var w1 = fakeScrollBar.find('div').innerWidth();
        fakeScrollBar.css('overflow-y', 'scroll');
        var w2 = jQuery('#fakescrollbar').find('div').html('html is required to init new width.').innerWidth();
        fakeScrollBar.remove();
        return (w1-w2);
    }
    return 0;
}

jQuery(document).ready(function() {

    var isIE11 = !!window.MSStream;

    if (BrowserDetect.browser == 'Explorer') {
        jQuery('body').addClass('ie');
    }
    if (isIE11) {
        jQuery('body').addClass('ie11');
    }

    detectViewPort(scrollbarWidth());

    jQuery(".flexslider .slides a:empty").css('padding', '0');

    jQuery('body.single-tf_members').find('.navMain ul.dropdown-menu li.active').first().parent().parent().addClass('active');
    jQuery('body.single-tf_members').find('.navMain ul.dropdown-menu li.active').slice(1).removeClass('active');

    jQuery('body.single-post').find('.navMain ul.dropdown-menu li.active').first().parent().parent().addClass('active');
    jQuery('body.single-post').find('.navMain ul.dropdown-menu li.active').slice(1).removeClass('active');

    jQuery('#5-tabs-wrapper a.tab-header:first-child').addClass('current');

    jQuery('.slides h2.slide-title').wrap('<div class="slide-title-wrapper"></div>');

});

jQuery(window).resize(function () {
    detectViewPort(scrollbarWidth());
});