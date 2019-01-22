<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
   <form action="{{route('mail.send')}}" method="post">
         {{ csrf_field() }}
      <input type="email" name="kirim" id="" placeholder="To">
      <br>
      <br>
      <textarea name="message" cols="30" rows="10" placeholder="Message"></textarea>
      <br>
      <input type="submit" value="Kirim">
   </form>
</body>
</html>