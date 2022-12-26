<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0"/>
  <link rel="icon" href="{{App::getFavicon()}}" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="{{App::getAppleIcon()}}">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com" rel="dns-prefetch" crossorigin>
  <link href="https://fonts.googleapis.com" rel="preconnect" crossorigin>
  <link href="https://cdnjs.cloudflare.com" rel="dns-prefetch" crossorigin>
  <link href="https://cdnjs.cloudflare.com" rel="preconnect" crossorigin>
  <link rel="preload" href='@asset("styles/app.css")' as="style">
  <link href="./css/tailwind.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" rel="preload" as="script">
  <link href='@asset("scripts/app-mobile.js")' media="(max-width: 991px)" rel="preload" as="script">
  <link href='@asset("scripts/app-desktop.js")' media="(min-width: 992px)" rel="preload" as="script">
  @php wp_head() @endphp
  <link rel="stylesheet" id="sage/font-css" onload="if(media!='screen')media='screen'" href="{{S3_FONT}}" type="text/css" media="print" />
  {!! App::getTrackingCode('in_head') !!}
</head>
