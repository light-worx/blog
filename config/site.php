<?php

return [

    /*
    | When false, only logged-in users can see the public site.
    | Everyone else gets the placeholder page (resources/views/offline.blade.php).
    | Set SITE_PUBLIC=true in .env when you are ready to launch.
    */
    'public' => (bool) env('SITE_PUBLIC', true),

];
