
      <!-- offcanvas-end -->
        <main>
            <!-- breadcrumb-area -->
            <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2></h2>    
                                    <div class="breadcrumb-wrap">
                              
                              
                            </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
             <!-- services-five-area -->
         <section id="services-05" class="services-05 pt-120 pb-100 p-relative fix">
            <div class="container">
                <h2 style="padding-bottom:100px;text-align:center;font-size:60px;">
                           Produits & Services
                        </h2>

<div class="row align-items-center">
        <?php 
        foreach (Service::q()->execute() as $key => $value) {
        ?>

               
                   <div class="col-lg-4 col-md-4">                  
                        <div class="services-box-05">
                           <div class="services-icon-05">
                              <img src="img/service/<?=$value->image?>" alt="mobyl">
                           </div>
                           <div class="services-content-05">
                              <div class="icon">
                                 
                                 <h4><?=$value->titre?></h4>
                              </div>
                              <p><?=substr(strip_tags($value->description),0,90)?> <?=strlen(strip_tags($value->description)) < 90 ? '' : '...'?></p>
                              <a href="services/<?=$value->id?>">Lire plus <i class="fal fa-long-arrow-right"></i></a>
                           </div>

                        </div>
                        </div>
                         <?php
                }
                ?>
                      
               </div>

                
            </div>
         </section>
         <!-- services-three-area -->
			 
        </main>
        <!-- main-area-end -->
  