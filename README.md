PHP Styled Google Calendar
==========================

When you embed a Google Calendar to your webpage, you're forced to use Google's default (ugly) stylesheet. With this simple PHP script, you can use your own.

[View an unstyled Google Calendar here](https://www.google.com/calendar/embed?src=envql02v2rijr5doiku8mulu3o%40group.calendar.google.com&ctz=America/New_York)

[View a live styled Google Calendar](http://jmeas.com/projects/git/calendar/calendar.php)

### Technical Details

To understand how this works, we'll need to know a little about what goes on when you embed a Google calendar.

To begin, the embed code that Google gives you places an iFrame on your page. In this iFrame, an HTML page loads that displays your calendar. At once, it might seem trivial to style it; just host your own CSS and overwrite Google's CSS, right? Unfortunately, we can't do that. Both the HTML and the CSS sheet are hosted on Google's servers. It'd be a security problem if we could put a Google page in an iFrame on our site and modify its appearance with CSS! So we can't do that simple solution to the problem.

The next idea, then, might be to just copy and paste the HTML onto your own webpage. Then you could link to Google's hosted CSS, but also to your own local CSS where you would overwrite or add your own styling. Again, it isn't this easy. This is because that HTML page is dynamic. Google runs a server-side script that generates the page, grabbing the events to put on the calendar. If you were to just copy and paste that HTML, you'd be grabbing a still picture of your calendar, and updates you make after the time of grabbing it wouldn't appear on your page.

Which is where this code comes in. What this script does is grab the calendar from the embed link each time the user goes to the page. This way, it always loads the most recent version of your calendar. Then it links to a local CSS stylesheet so that you can style the calendar yourself.

Even further, it allows you to modify the HTML of what you're embedding. This allows you to completely remove HTML elements that you don't want to appear (you can also add new ones). While this isn't too useful for a Google calendar, it could be useful for other Google docs. Take a spreadsheet, for instance. You could hide rows and columns of that spreadsheet so that only certain parts of it appear on a given page. With a login system, you could manage numerous accounts' information on 1 Google spreadsheet, but when an account logs in, it only shows their particular table row. But, of course, that Spreadsheet would need to be public in the first place for you to be able to embed it onto your page.