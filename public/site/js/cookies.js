(function ($) {
  "use strict";

  window.addEventListener("load", function(){
    window.cookieconsent.initialise({
      content: {
        header: 'On utilise les cookies sur ce site!',
        message: 'We are using cookies to personalize content and ads to make our site easier for you to use.',
        dismiss: 'Confirm',
        allow: 'Allow cookies',
        deny: 'Decline',
        link: 'Learn more',
        href: 'http://cookiesandyou.com',
        close: '&#x274c;',
      },
      cookie: {
        expiryDays: 365
      },
      position: 'bottom'
    });
    $(".cc-banner").wrapInner("<div class='cc-container container'></div>");
  });

})(jQuery);