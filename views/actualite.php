
  <!-- ==== banner start ==== -->
  <section class="banner--inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="banner--inner__content">
            <h2>Actualités</h2>
          </div>
        </div>      
      </div>
    </div>
  </section>
  <!-- ==== / banner end ==== -->

<!-- ==== pricing section start ==== -->
<section class="section pricing pricing--secondary wow fadeInUp" data-wow-duration="0.4s" style="padding-top: 25px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="plan-table blog blog-grid" id="plan-douala">
                    <div class="row justify-content-center section__row">
                        <div class="col-md-12">
                          <div class="blog__wrapper">
                            <div class="row justify-content-center section__row">
                            <?php
                            foreach (Actualite::q()->where('is_side=0')->orderBy('faitle DESC')->execute() as $key => $value) {
                              ?>
                              <div class="col-sm-10 col-md-4 section__col">
                                <div class="blog-single">
                                  <div class="blog__thumb">
                                    <a href="actualite/<?=$value->id?>" title="Read More" style="height: 216px;display: flex;justify-content: center;align-items: center;">
                                      <img src="assets/images/actualite/<?=strlen($value->image) == 0 ? 'default.png' : $value->image?>" alt="Blog" style="max-height: 216px;max-width: 100%;width: auto;">
                                    </a>
                                  </div>
                                  <div class="blog__content">
                                    <h5 style="height: 87px">
                                      <a href="actualite/<?=$value->id?>" title="Read More"><?=substr($value->titre,0,44)?> <?=strlen($value->titre) < 44 ? '' : '...'?></a>
                                    </h5>
                                    <div class="blog__content-meta">
                                      <!-- <p><i class="golftio-user"></i> Admin</p> -->
                                      <p><i class="fa-solid fa-calendar-week"></i><?=date('d-m-Y H:i',strtotime($value->faitle))?></p>
                                    </div>
                                    <p class="secondary-text"><?=substr(strip_tags($value->description),0,200)?> ...</p>
                                    <a href="actualite/<?=$value->id?>" title="Read More" class="cmn-button cmn-button--secondary">Lire plus</a>
                                  </div>
                                </div>
                              </div>
                              <?php
                            }
                            ?>                              
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==== / pricing section end ==== -->