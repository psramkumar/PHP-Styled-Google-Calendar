Stylized-Google-Calendar
========================

When you embed a Google Calendar to your webpage, you're forced to use Google's default (ugly) stylesheet. With this simple PHP script, you can use your own.

### Technical Details

To understand how this works, we'll need to know a little about what goes on when you embed a Google calendar.

To begin, the embed code that Google gives you places an iFrame on your page that loads a webpage with your calendar. At once, it might seem trivial to see how to style it; just host your own CSS and overwrite Google's CSS, right? Unfortunately, we can't do that. Both the HTML and the CSS sheet are hosted on Google's servers. It'd be a security problem if you were able to put another webpage onto your site with an iFrame, then modify its appearance with CSS. So we can't do simple solution to the problem.

The next idea, then, might be to just copy and paste the HTML onto your own webpage. Then you could link to Google's hosted CSS, but also to your own local CSS where you would overwrite or add your own styling. Again, it isn't this easy. Each time you go to the calendar HTML page, it's different. Google runs a server-side script that generates the page's HTML, grabbing events to put on the calendar. If you just copy and paste that HTML, you'd be grabbing a still picture of your calendar, and updates wouldn't appear on it.

Which is where this code comes in. What this code does is, using PHP, grab the calendar from the embed link. This way, each time a user goes to your page, it generates new HTML with the most recent version of your calendar. Then it links to local CSS stylesheets so that you can style the calendar yourself.

Even further, it allows you to modify the HTML of what you're embedding. This allows you to completely remove HTML elements that you don't want to appear (you can also add new ones). While this isn't too useful for a Google calendar, it could be useful for other Google docs. Take a spreadsheet, for instance. You could hide rows and columns of that spreadsheet so that only certain parts of it appear on a given page. With a login system, you could manage numerous accounts' information on 1 Google spreadsheet, but when an account logs in, it only shows their particular table row. But, of course, that Spreadsheet would need to be public in the first place for you to be able to embed it onto your page.