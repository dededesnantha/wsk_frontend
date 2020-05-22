<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#f2f2f2" />
  <link rel="icon" type="image/png" href="<?= base_url('image/logo') ?>/logo.png">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('asset/template2/css/grid.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/template2/font/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/template2/css/main.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/template2/slider.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/template2/style.css') ?>">

  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
  </script>
</head>
<style>
.dropdown {
  position: absolute;
  bottom: 9px;
  z-index: 9999;
  margin-left: 30px;
}
.dropdown-content-pengumuman {
  display: none;
  right: 77px;
  background-color: rgba(0, 0, 0, 0);
  transition: 0.5s;
  margin: 0 auto;
  text-align: left;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.text-kelas{
  background-color: #fff;
  font-size: 12px !important;
  display: block;
  font-weight: 700;
  padding: 15px 40px;
  border-bottom: 2px solid #4c515421;
}
.text-kelas:hover{
  background-color:#e6e6e6;
}
.show {
  margin: 0 auto;
  display: block;
  position: absolute;
  z-index: 2;
  transition: 0.5s;
}
@media screen and (max-width : 1200px){ 
  .dropdown-content {
    right: 55px;
  }
}
@media screen and (max-width : 600px){ 
  .show {
    right: 150px !important;
  }
  .dropdown {
    position: relative;
    bottom: 0px;
  }
}

</style>
<body>
<header id="header" class="container-fluid p-0">
  <div class="container-fluit">
    <div style="background-color: #ffff;border-bottom: 2px solid #e4e4e4">
    <div class="row m-0">
      <div class="c-12 c-sm-12" >
        <a href="<?= base_url() ?>" title="">
        <div style="text-align: center;">
         <img src="<?= base_url('image/logo') ?>/logo.png" alt="logo" style="max-width: 100%;;padding: 10px 0 0 10px">
         <br>
         <span style="color: #374bfd;font-size: 30px;font-weight: bold;line-height: 46px;text-decoration: none;text-shadow: 1px 1px 1px #000;">
           SMK Werdhi Sila Kumara
         </span>
        </div>
        </a>
      </div>
    </div>
    </div>
  </div>
  <div class="c-12 c-sm-12 p-0">
  <div style="background-color: #3c6c84;text-align: center; margin: 0 auto;padding: 25px;">
      <span style="color: #fff;font-size: 25px">
        <?php if ($pengumuman == 'all'){
          echo "Pengumuman Sekolah";
          }
        ?>
      </span>
    <div class="row">
      <div class="c-10 c-sm-10"></div>
      <div class="c-2 c-sm-2 p-0" >
      <div class="dropdown">
          <div>
            <button href="#" class="dropbtn" title=""onclick="myFunction()">Pengumuman Kelas<i class="fa fa-angle-down" aria-hidden="true"></i></button>
          </div>
      </div>
    </div>
    </div>
  </div>
  <div class="dropdown-content-pengumuman" id="myDropdown" style="text-align: center">
    <?php foreach($kelas as $row): ?>
    <a href="<?= base_url('single_pengumuman').'/'.$row['name'] ?>" style="color: #333;">
      <div class="text-kelas">
        <span><?= $row['name'] ?></span>
      </div>
    </a>
    <?php endforeach ?>
    </div>
  </div>
</header>
