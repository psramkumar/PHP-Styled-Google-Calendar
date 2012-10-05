Stylized-Google-Calendar
========================

When you embed a Google Calendar to your webpage, you're forced to use Google's default (ugly) stylesheet. With this simple PHP script, you can use your own.

To understand how this works, we'll need to know a little about what goes on when you embed a Google calendar.

Firstly, the code Google gives you puts an iFrame on your page that loads a webpage with your calendar. At first, it might seem trivial to see how to style it. Just host your own CSS and overwrite Google's CSS, right? Not so easy. As it happens, both the HTML and the CSS sheet are hosted on Google's servers. It'd be a security problem if you were able to put someone's site on your site through an iFrame, and modify the CSS. So we can't do that.

The next idea, then, would be to just copy and paste the HTML onto your own webpage. Then you could reference Google's hosted CSS, but also your own local CSS to overwrite any properties you didn't like. Unfortunately, it isn't this easy. The calendar HTML page that loads each time you go to the embed link is different. A server-side script on Google's server generates the HTML, grabbing events from the calendar and so on. If you just copy and paste that HTML, you'd be grabbing a still frame of the life of your calendar, and updates wouldn't be visible on your site.

Which is where this code comes in. What this code does is, using PHP, grab the calendar from the embed link. This way, each time a user goes to your page, it generates new HTML, with whatever updates have been made to your calendar. Then it references local CSS stylesheets, so that you can style the calendar yourself!

Even further, it allows you to modify the HTML of what you're embedding. This allows you to completely remove elements, if you don't want a user to be see them. While it isn't too useful for a Google calendar, it could allow you to hide rows or columns from a Google spreadsheet. Though, of course, that Spreadsheet would need to be public in the first place for you to be able to embed it onto your page.