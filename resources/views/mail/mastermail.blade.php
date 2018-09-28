<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      body{
        font-size: 18px;
        font-family: sans-serif;
        max-width:500px;
        background-color:#fff;
        color: rgb(1, 37, 106);
        margin:20px auto;
        padding: 20px 50px;
        border-radius: 10px;
        border: 1px solid #222;
      }
      h1{
        font-size: 28px;
        margin-bottom: 20px;
      }
      p{
        margin: 10px;
      }
      .link{
        background-color: rgb(1, 37, 106);
        color: rgb(255, 255, 255);
        padding: 20px;
        display: block;
        margin: 20px 0;
        text-align: center;
      }
      .link > *{
        font-weight: bold;
        color: rgb(255, 255, 255);
      }
    </style>
  </head>
  <body>
    @yield('body')
  </body>
</html>
