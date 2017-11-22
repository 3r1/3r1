<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>api-20r431</title>

<style>

  .logo {
    background-size: cover;
    height: 58px;
    width: 180px;
    margin-top: 6px;
    background-image: url("./logo.png");
  }
.logo a {
  display: block;
  width: 100%;
  height: 100%;
}
*, *:before, *:after {
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
aside,
footer,
header,
hgroup,
section{
  display: block;
}
body {
  color: #404040;
  font-family: "Helvetica Neue",Helvetica,"Liberation Sans",Arial,sans-serif;
  font-size: 14px;
  line-height: 1.4;
}

html {
  font-family: sans-serif;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}
ul {
    margin-top: 0;
}
.container {
  margin-right: auto;
  margin-left: auto;
  padding-left: 15px;
  padding-right: 15px;
}
.container:before,
.container:after {
  content: " ";
  /* 1 */

  display: table;
  /* 2 */

}
.container:after {
  clear: both;
}
.row {
  margin-left: -15px;
  margin-right: -15px;
}
.row:before,
.row:after {
  content: " ";
  /* 1 */

  display: table;
  /* 2 */

}
.row:after {
  clear: both;
}
.col-sm-6, .col-md-6, .col-xs-12 {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
.col-xs-12 {
  width: 100%;
}

@media (min-width: 768px) {
  .container {
    width: 750px;
  }
  .col-sm-6 {
    float: left;
  }
  .col-sm-6 {
    width: 50%;
  }
}

@media (min-width: 992px) {
  .container {
    width: 970px;
  }
  .col-md-6 {
    float: left;
  }
  .col-md-6 {
    width: 50%;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 1170px;
  }
}

a {
  color: #069;
  text-decoration: none;
}
a:hover {
  color: #EA0011;
  text-decoration: underline;
}
hgroup {
  margin-top: 50px;
}
footer {
    margin: 50px 0 25px;
}
h1, h2, h3 {
  color: #000;
  line-height: 1.38em;
  margin: 1.5em 0 .3em;
}
h1 {
  font-size: 25px;
  font-weight: 300;
  border-bottom: 1px solid #fff;
  margin-bottom: .5em;
}
h1:after {
  content: "";
  display: block;
  width: 100%;
  height: 1px;
  background-color: #ddd;
}
h2 {
  font-size: 19px;
  font-weight: 400;
}
h3 {
  font-size: 15px;
  font-weight: 400;
  margin: 0 0 .3em;
}
p {
  margin: 0 0 2em;
}
p + h2 {
  margin-top: 2em;
}
html {
  background: #f5f5f5;
  height: 100%;
}
code {
  background-color: white;
  border: 1px solid #ccc;
  padding: 1px 5px;
  color: #888;
}
pre {
  display: block;
  padding: 13.333px 20px;
  margin: 0 0 20px;
  font-size: 13px;
line-height: 1.4;
  background-color: #fff;
  border-left: 2px solid rgba(120,120,120,0.35);
  white-space: pre;
  white-space: pre-wrap;
  word-break: normal;
  word-wrap: break-word;
  overflow: auto;
  font-family: Menlo,Monaco,"Liberation Mono",Consolas,monospace !important;
}

</style>

</head>
<body>

<section class='container'>
  <hgroup>
    <h1>api-20r431</h1>
  </hgroup>

  <div class="row">
    <section class='col-xs-12 col-sm-6 col-md-6'>
      <section>
        <h2>Current Pages</h2>
          <ul>
            <li><a href="./streaminfo/?channel=CHANNELNAME">streaminfo</a> (displays uptime with viewers and game or displays an offline message)</li>
            <li><a href="./twitch/following.php?channel=CHANNELNAME&user=USERNAME">followtime</a> (displays followtime of user in a channel)</li>
            <li><a href="./almanax/getalma.php?DAYS=3">almanax tracker</a> (displays almanax bonus and quest item for <a href="https://dofus.com/en/">dofus)</a></li>
            <li><a href="./almanax/getalmaFR.php?DAYS=3">almanax tracker</a> (récupère le bonus almanax et l'objet de quête pour <a href="https://dofus.com/fr/">dofus)</a></li>
          </ul>
        <h2>Future Pages</h2>
        <h3>Not a complete list:</h3>
          <ul>
            <li>subscriber count</li>
            <li>list last 'n' number of followers</li>
            <li>list last 'n' number of subscribers</li>
            <li>more php, ruby, database stuff</li>
            <li>to be continued...</li>
          </ul>
<!--        <h2>A random text box?</h2>
<pre>
Welcome to me testing a random box
This sort of thing could be used for all sorts of important things
Like what you might ask?
Well, code examples and quotes of course!
Why is this typed out like this?
Because I am trying to make you cringe a little bit. ( ͡° ͜ʖ ͡°)
</pre>
<p
>Wait a minute...<br>
Yes?<br>
Wouldn't you just put code in a simple <code>code box like this</code>?<br>
Sssshhhhhhh!
</p>-->
      </section>
    </section>
    <section class="col-xs-12 col-sm-6 col-md-6">
      <h2>About</h2>
      <h3>What is this?</h3>
      <p>This is a private api currently used for pulling information from the twitch api and parsing it in realtime for a twitchbot to use as a command output. Slowly expanding this to be the frontpage for my projects.</p>
      <h2>What else do you do here</h2>
      <h3>I test important things such as:</h3>
        <ul>
          <li>projects</li>
          <li>projects</li>
          <li>projects</li>
          <li>projects</li>
          <li>random projects</li>
          <li>some of these things broke because they need private clientids..sorry</li>
        </ul>

    </section>
  </div>
  
  <footer>
    <div class="logo"><a href="./index.php"></a></div>
    2016-2017
  </footer>
</section>

</body>
</html>
