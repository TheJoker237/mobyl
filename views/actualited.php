<?php
    $golf = Actualite::get($cible);
?>
  <!-- ==== banner start ==== -->
  <section class="banner--inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="banner--inner__content">
            <h2><?=$golf->titre?></h2>
          </div>
        </div>
      
      </div>
    </div>
  </section>
  <!-- ==== / banner end ==== -->
  <style type="text/css">
    .facility__thumb {
      margin-bottom: 0px;
    }
    .facility__single h5{
      margin-bottom: 15px;
      margin-top: 15px;
      color: #0e7a31;
    }
    .facility__single h6{
      margin-bottom: 15px;
      font-weight: bolder;
      color: black;
    }
    .facility__single p{
      line-height: 2;
    }
    .facility__single ul{
      list-style: disc;
      padding-left: 35px;
    }
    .facility__single p i{
      display: block;
    }
    .sidebar .sidebar__single {
      padding: 0px 15px 15px;
    }
  </style>
  <!-- ==== details start ==== -->
  <section class="section details" style="padding-bottom: 0px;padding-top: 80px;">
    <div class="container">
      <div class="row section__row">
        <div class="col-12 col-xl-8 section__col">
          <div class="facility__details">
            <div class="facility__thumb">
              <img src="assets/images/actualite/<?=strlen($golf->image) == 0 ? 'default.png' : $golf->image?>" alt="Facility Details">
            </div>
            <style type="text/css">
              .facility__single p a{
                padding: 0px 7px;
                background: #0e7a31;
                color: white;
              }
              .facility__single p span{
                font-size: 15px;
                padding-left: 20px;
                color: #014f28;
                font-weight: 800;
              }
            </style>
            <div class="facility__single">
              <?=$golf->description?>
              <div class="row" style="<?=strlen($golf->other_img) == 0 ? 'display: none' : ''?>">
                <?php
                  $listelt = explode(',', $golf->other_img);
                  foreach ($listelt as $key => $value) {
                    ?>
                      <div class="col-md-4" style="margin-bottom: 15px">
                        <img src="assets/images/actualite/<?=$value?>">
                      </div>
                    <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4 section__col">
          <div class="sidebar wow fadeInUp" data-wow-duration="0.4s">
            <div class="sidebar__single">
              <h5 style="font-size: 20px;margin-bottom: 10px">Autres <?=$golf->is_side == 0 ? 'actualités' : ($golf->is_side == 1 ? 'découverte et promotion' : ($golf->is_side == 2 ? 'chronique du mois' : 'team Building golf'))?></h5>
              <?php
              foreach (Actualite::q()->where('is_side = '.$golf->is_side.' AND id != ?',$golf->id)->orderBy('faitle DESC')->limit(10)->execute() as $key => $value) {
                ?>
                <div class="row" style="padding-bottom: 10px;padding-top: 10px;border-bottom: 1px solid #eee;">
                  <div class="col-md-4" style="padding-right: 0px;display: flex;justify-content: center;align-items: center;">
                    <img src="assets/images/actualite/<?=strlen($value->image) == 0 ? 'default.png' : $value->image?>">
                  </div>
                  <div class="col-md-8">
                    <h6 style="font-size: 14px;line-height: 19px;margin-bottom: 8px;"><a href="actualite/<?=$value->id?>"><?=$value->titre?></a></h6>
                    <p style="font-size: 13px;line-height: 1.2;">Publié le <b><?=date('d-m-Y H:i',strtotime($value->faitle))?></b></p>
                    
                  </div>
                </div>
                <?php
              }
              ?>
              
            </div>

            <div class="sidebar__single">
              <div class="testimonial__slider--secondary">
                  <div class="testimonial__slider-card">
                      <img src="assets/images/GolfCameroun7.jpg">
                  </div>
                  <div class="testimonial__slider-card">                      
                      <img src="assets/images/pub.jpg">
                  </div>
              </div>
            </div>
            <div class="sidebar__single">
              <h5 style="margin-bottom: 15px">Carte de score</h5>
              <center><img src="assets/images/carte_de_score.png"></center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ==== / details end ==== -->
  <?php 
    include_once 'views/sponsor.php';
  ?>