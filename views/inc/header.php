<!DOCTYPE html>
<html lang="<?= $main['label']['en'] ?>">
<head>
<?php if (trim($main['profile']['google_webmaster']) != ''): ?>
  <?= $main['profile']['google_webmaster']; ?>          
<?php endif ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="<?= $main['color']['code_color'] ?>" />
  <meta name="apple-mobile-web-app-status-bar-style" content="<?= $main['color']['code_color'] ?>">
<?php foreach ($seo as $value): ?>
  <?= $value ?> 
<?php endforeach ?>
  <link rel="icon" type="image/png" href="<?= base_url('image').'/'.$main['profile']['logo'] ?>">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('asset/template2/css/nav.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/template2/css/grid.css?v='.$main['v']) ?>">
  <link rel="stylesheet" href="<?= base_url('asset/template2/font/style.css?v='.$main['v']) ?>">
  <link rel="stylesheet" href="<?= base_url('asset/template2/css/main.css?v='.$main['v']) ?>">
  <link rel="stylesheet" href="<?= base_url('asset/template2/slider.css?v='.$main['v']) ?>">
  <link rel="stylesheet" href="<?= base_url('asset/template2/style.css?v='.$main['v']) ?>">
 <style>.bg-primary{background: #11A0E9;}
  #nav_bg{background: rgba(0,0,0,0.8);}
    #nav_bg{z-index: 9999;}
  .color-primary{color: #333; }
  .btn{padding: 0px 20px !important;margin: 10px 0px; background: #F2F3F5}
  .btn:focus, .btn-focus {border-color: #11A0E9;}
  .btn:hover a{border-color: #b5b5b5;color: #11A0E9;}
  .breadcrumb-item a {color: #11A0E9;}
  .pagination > li > a:hover, .pagination > li > span:hover {color: #11A0E9;}
  .pagination > li > a, .pagination > li > span {color: #11A0E9;}
  .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {background-color: #11A0E9;border-color: #11A0E9;}
  .badge-primary {background-color: #11A0E9; }
  .tab>label {background: #11A0E9; }
  .tab-content {color: #11A0E9;border:2px solid #11A0E9; }
  .checkmark {border: 3px solid #11A0E9; }
  .checkbox input:checked ~ .checkmark {background-color: #11A0E9;   }
  li.nav ul.nav li.nav a {background: rgba(0,0,0,0.8);}
  .button-primary{border:2px solid #11A0E9; }
  .button-primary:hover{color:#11A0E9;border:2px solid #11A0E9; }
  .slider div {background-color: #11A0E9;border-bottom: 1.5px solid #11A0E9; }
  .review .block .rating .fill{color: #11A0E9;}
  .rating small{color: #11A0E9;}
  .rating a{
    color: #11A0E9;
  }
  footer {
    background: #1e272e;
  }
  footer ul li{
    border-bottom-color: #fff  !important;
  
  }
  footer a,footer span,footer p{
    color: #dfe6e9  !important;
  }
  footer h3{
    color: #fff  !important;
  }
  .sub-footer a{
    color: #ffffff !important;
  }
  .sub-footer{background: #11A0E9;}
  .btn a {
    font-family: 'Roboto', sans-serif;
    color: #3e3e3e;
  }
  header.bg-nav{
    background: rgba(0,0,0,0.8);
    backdrop-filter: saturate(180%) blur(20px)
  }
  nav.bg-nav{
    background: rgba(0,0,0,0.8);
    backdrop-filter: saturate(180%) blur(20px)
  }
  .slider div{
    background: #11A0E9
  }
  .card-1 > div > a > h2{
    background: #11A0E9
  }
  .card-2 > .card-2-content > div > a{
    background: #11A0E9;    
  }
  .slider div span{
    color: #ffffff
  }
  .card-1 > div > a > h2{
    color: #ffffff
  }
  li.nav a{
    color: #bdc3c7;
  }
  .card-2 > .card-2-content > div > a{
    color: #ffffff;
  }
  article{
    font-family: 'Lato', sans-serif;
    text-align: justify; 
  }
  aside{
    padding: 0px 20px;
  }
  iframe{
    width: 100%;
  }
</style>
  <?php if (trim($main['profile']['google_analytics']) != ''): ?>    
    <?= $main['profile']['google_analytics']; ?>  
  <?php endif ?>
  <?php if (trim($main['profile']['facebook_pixel']) != ''): ?>
    <?= $main['profile']['facebook_pixel']; ?>  
  <?php endif ?>
  <?php if (trim($main['profile']['tawk']) != ''): ?>
    <?= $main['profile']['tawk']; ?>  
  <?php endif ?>
  <?php if (!empty($optiomation)): ?>
   <script type="application/ld+json">    
    {
      "@context": "http://schema.org/",
      "@type": "WebSite",              
      "name": "<?= strtoupper(explode('.',str_replace('https://www.','', base_url('')))[0])  ?>",
      "url": "<?= base_url('') ?>",
      "potentialAction": {
      "@type": "SearchAction",
      "target": "<?= base_url('search') ?>?search={search_term_string}",
      "query-input": "required name=search_term_string"
    } 
  }  
</script>
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "PostalAddress",
    "streetAddress": "<?= $main['profile']['alamat'] ?>"
  }
</script>
<?php endif ?>    
<script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
</script>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('scroll', myFunctionForSticky);
    var navbar = document.getElementById("nav_bg");
    var fixed = navbar.offsetTop;
    function myFunctionForSticky() {
      if (window.pageYOffset >= fixed) {
        console.log("window.pageYOffset >= fixed");
      } else {
        console.log("Not window.pageYOffset >= fixed");
      }
      if (window.pageYOffset >= fixed) {
        navbar.classList.add("fixed");
      } else {
        navbar.classList.remove("fixed");
      }
    }
    function myFunctionForResponsive() {
      navbar.classList.toggle('responsive');
    }
  })
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v5.0"></script>
<?php require_once('views/inc/schema.php') ?>
<?php require_once('views/inc/script.php') ?>
</head>
<body>
    <header id="header" class="container-fluid p-0">
    <div class="container">
      <div class="row">
        <div class="c-12">
          <div class="c-12 text-center p-4">
            <a href="<?= base_url('') ?>" style="height: 100%;display: grid;">
              <img src="<?= base_url('image').'/'.$main['profile']['logo'] ?>" alt="logo" style="max-height: 80px" class="p-1 m-auto"></a>
            </div>
          </div>
        </div>
      </div>  
    <nav class="container-fluid" id="nav_bg"style="border: 1px solid rgba(0,0,0,0.8);border-radius: 3px;text-align: center;">
          <div class="row"> 
            <label for="show-menu" class="show-menu color-white" style="line-height:50px;top: 7px;"><img src=" <?= base_url('img/menu.svg')?>" style="max-width: 30px" alt=""></label>  
            <input type="checkbox" id="show-menu" role="button">
            <div class="c-12 row navigasi">
              <ul id="menu" class="p-0 nav" style="width: 100%;height: auto;position: relative;margin: auto;">
        <?php foreach ($main['menu'] as $row): ?>
          <li class="nav hiden-nav">
        <?php if ($row['link'] == 'kategori'): ?>
          <a href="#" title="<?= $row['judul'] ?>">
            <?= $row['judul'] ?><label for="show-menu-2" class="show-menu" style="float: right;bottom: 11px;"><img src="<?= base_url('img/up-angle.svg')?>" style="max-width: 12px;" alt="">
            </label></a>
            <input type="checkbox" id="show-menu-2" role="button">
        <?php else: ?>
          <a href="<?= $row['link'] ?>" title="<?= $row['judul'] ?>"><?= $row['judul']?></a>
        <?php endif ?>
        <?php if ($row['link'] == 'kategori'): ?>
          <div class="navigasi">
            <ul class="hidden nav" id="menu-2">
              <li class="nav">
              <?php foreach ($main['parent'][$row['id_parent']] as $key): ?>
                <a href="<?= base_url('link').'/'.$key['slug'] ?>" title="<?= $key['judul'] ?>"><?= $key['judul'] ?></a>
                <?php endforeach ?>
              </li>
            </ul>
            </div>
        <?php endif ?>
          </li>
          <?php endforeach ?>
          <li class="nav">
            <form method="get" action="<?= base_url('search')?>" autocomplete="on">
              <input id="search" name="search" type="search" placeholder="<?= $main['label']['Search'] ?>" value="<?= $this->input->get('search'); ?>">
              <button type="submit" id="search_submit" style="color:#fff;background: #333;font-size: 20px;font-weight: 300;height: 45px;padding: 9px 10px;margin: 0px 2px;padding-top: 5px;"><img src="<?= base_url('img/search.svg')?>" style="max-width: 20px" alt=""></button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<main>
<?php if ($main['wa'] != ''): ?>
  <a class="share_button" href="<?= $main['wa'] ?>" title="whatsapp" style="position: fixed;bottom: 25px;left: 20px;z-index: 99;" target="_blank">
    <img src="<?= base_url('img/wa2.png') ?>" alt="whatsapp" style="border-radius: 100%;width: 50px;box-shadow: 1px 1px 16px -2px rgba(0,0,0,.3);position:relative;z-index: 1;">
    <span class="s_tampil">WhatsApp</span></a>
  <?php endif ?>
</main>
</body>
</html>
