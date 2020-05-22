<section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;">
  <form action="<?= base_url('give_review/'.$param) ?>" method="POST" accept-charset="utf-8" id="form_review" style="text-align: center;">
    <span><?= $main['label']['Give Review'] ?> :</span>
    <div id="rating" style="display: inline-flex;">
      <label for="rating1" style="font-size: 25px;color: #504f4f;background: transparent;padding: 0 5px" onclick="rating(1)">
        <img src="<?= base_url('asset/star_b.ico') ?>" alt=" " style="width: 25px;">
      </label>
      <label for="rating2" style="font-size: 25px;color: #504f4f;background: transparent;padding: 0 5px" onclick="rating(2)">
        <img src="<?= base_url('asset/star_b.ico') ?>" alt=" " style="width: 25px;">
      </label>
      <label for="rating3" style="font-size: 25px;color: #504f4f;background: transparent;padding: 0 5px" onclick="rating(3)">
        <img src="<?= base_url('asset/star_b.ico') ?>" alt=" " style="width: 25px;">
      </label>
      <label for="rating4" style="font-size: 25px;color: #504f4f;background: transparent;padding: 0 5px" onclick="rating(4)">
        <img src="<?= base_url('asset/star_b.ico') ?>" alt=" " style="width: 25px;">
      </label>
      <label for="rating5" style="font-size: 25px;color: #504f4f;background: transparent;padding: 0 5px" onclick="rating(5)">
        <img src="<?= base_url('asset/star_b.ico') ?>" alt=" " style="width: 25px;">
      </label>
    </div>
    <input type="hidden" name="slug" value="<?= $single['slug'] ?>" >
    <input type="radio" name="rating" value="1" id="rating1"  hidden>
    <input type="radio" name="rating" value="2" id="rating2"  hidden>
    <input type="radio" name="rating" value="3" id="rating3"  hidden>
    <input type="radio" name="rating" value="4" id="rating4"  hidden>
    <input type="radio" name="rating" value="5" id="rating5"  hidden>
  </form>
</section>
