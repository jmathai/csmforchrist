<?php
  $size = '150x150xCR';
  $ch = curl_init("http://csmforchrist.openphoto.me/photos/list.json?pageSize=0&tags=Motorcycles,July,2012&returnSizes={$size},800x800");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $response = json_decode(curl_exec($ch), 1);
  curl_close($ch);
  $photos = $response['result'];
?>
<h1>Motorcycles, July 2012</h1>
<p>
  <?php foreach($photos as $photo) { ?>
    <a href="<?php echo $photo["path800x800"]; ?>" class="lightbox"><img src="<?php echo $photo["path{$size}"]; ?>"></a>
  <?php } ?>
</p>
