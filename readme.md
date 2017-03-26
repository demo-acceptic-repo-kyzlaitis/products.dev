Web app takes advantage of SQLite database so you don't need to set up any connection.

Requirements php 5.6 <br>

Local deployment:<br/><br/>
1) Download project<br/>
2) Extract project from archive.<br/>
3) Navigate to project.<br/>
4) Run "php artisan serve --port=26032"<br/>
5) Copy this link "localhost:26032/products" and paste it into the browser address bar


<hr>

Solution for task 2

The error is on the server side so I can't fix it without access to the code. But the reason is that there is no file in resource/views directory called opusview.blade.php
The solutions is to add file with name opusview.blade.php to resource/views
I tried to guess file name but I failed.

