<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />		

<link rel="shortcut icon" href="/images/favicon.ico">
<link rel="stylesheet" href="/css/main.css">

<title>Christhia Seva Mission - Chikkaballapur, India.</title>
	

</head>

<body class="<?php echo $bodyClass; ?>">
	
	<!-- header starts here -->
	<div id="header-wrap"><div id="header-content">	
		
		<h1 id="logo"><a href="/" title="">Christia<span class="orange">Seva</span>Mission</a></h1>	
		<h2 id="slogan">Sharing the hope of Jesus in Chikkaballapur, India</h2>
    <div id="header">
      <?php echo $header; ?>
    </div>
  </div></div>

  <div id="content-wrap"><div id="content">
    <div id="main">
      <?php echo $content; ?>
    </div>
    <div id="sidebar">
      <h1>Updates</h1>
      <ul class="sidemenu">
        <?php foreach($updates as $update) { ?>
          <li><a href="/update/<?php echo $update['path']; ?>"><?php echo $update['title']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div></div>

	<!-- footer starts here -->	
	<div id="footer-wrap"><div id="footer-content">
      <?php echo $footer; ?>
	</div></div>
  <script type="text/javascript" src="/js/jquery-1.6.2.min.js"></script>
  <script type="text/javascript" src="/js/main.js"></script>
  <script>csm.init();</script>
</body>
</html>
