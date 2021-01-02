<!DOCTYPE html>
<style>
body {
  font-family: Arial;
  background: #f1f1f1;
}

.header {
  width: 100%;
  top: 0;
  left: 0;
  position: fixed;
  background: rgb(110, 110, 110);
}
.header + .content {
  padding-top: 60px;
}

.column {
  float: left;
}

.post {
  background-color: white;
  align: center;
  padding: 20px;
  margin-left: 40px;
  margin-right: 40px;
  margin-top: 20px;
}

.content:after {
  content: "";
  display: table;
  clear: both;
}

.navbar {
  list-style-type: none;
  margin: 0;
  padding: 12px;
  overflow: hidden;
  background-color: #333333;
}

.navbar li {
  float: right;
}

.navbar li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

.navbar li a:hover {
  background-color: #111111;
}

.commandBar{
    margin-right: 40px;
    margin-left: 40px;
    height:35px;
}

.commandBar button{
    font-size: 16;
    padding: 8px;
    width: 80px;
    margin-right: 20px;
    background-color: #333333;
    color: #f1f1f1;
    float:left;
}

</style>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="header">
        <h2 style="padding-left: 20px; padding-right: 20px; float:left;">Blog Site</h2>
        <ul class="navbar">
            <li><a href=""">Register</a></li>   
            <li><a href="">Logout</a></li>
            <li><a href="">Login</a></li>
            <li><a href="/posts">Posts</a></li>
            <li><a href="">Home</a></li>
          </ul>
    </div>
    <div class="content">
        
        @include('message.errors')
        <hr>
        @yield('content')
    </div>

</body>
</html>