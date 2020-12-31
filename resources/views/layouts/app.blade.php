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
  font-size: 40px;
  text-align: center;
  position: fixed;
  background: rgb(110, 110, 110);
}
.header + .content {
  padding-top: 180px;
}

.column {
  float: left;
  width: 75%;
}

.post {
  background-color: white;
  align: center;
  padding: 20px;
  margin-right: 40px;
  margin-top: 20px;
}

.content:after {
  content: "";
  display: table;
  clear: both;
}

</style>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="header">
        <h2>Blog Site</h2>
    </div>
    <div class="content">
        @yield('content')
    </div>

</body>
</html>