<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; feature-policy 'self' 'share'">
</head>

<body>
  <script>
    const share = () => {
      navigator.share({
        text: 'test',
        url: 'http://localhost/Project_CP151_Git/Login/menu.html',
        title: 'GG'
      });
    };
  </script>
  <button onclick="share()">Share</button>
</body>

</html>
