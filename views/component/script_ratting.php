<script>
  function rating(count){  
    document.getElementById('rating'+count).checked = true;
    for (let i = 1; i <= count; i++) {
      document.querySelector('#rating label:nth-child('+i+') img').src = '<?= base_url('asset/star.ico') ?>';
    }
    for (let i = count; i < 5; i++) {        
     document.querySelector('#rating label:nth-child('+(Number(i)+1)+') img').src = '<?= base_url('asset/star_b.ico') ?>'; 
    }
    document.getElementById('form_review').submit();
  }
</script>