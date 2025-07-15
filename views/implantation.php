        <!-- main-area -->
<main>
    
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-left">
                        <div class="breadcrumb-title">
                            <h2></h2>    
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    
    <!-- contact-area -->
    <section id="contact" class="contact-area after-none contact-bg pt-120 pb-120 p-relative fix">
        <div class="container">
            <h2 style="padding-bottom:100px;text-align:center;font-size:60px;">
                   Notre implantation
            </h2>
        <?php 
        foreach (Region::q()->where('id IN (SELECT id_region FROM station)')->execute() as $key => $value) {
        ?>
            <h3 style="color:#0066b2">
                  <?=$value->titre?> 
            </h3>
            <div class="row justify-content-center align-items-center">
               <div class="row align-items-center">
                <?php
                 foreach (Station::q()->where('id_region='.$value->id)->execute() as $key1 => $value1) {
                ?>                    
                   <div class="col-lg-4 col-md-4">                  
                        <div class="services-box-05">
                           
                           <div class="services-content-05">
                              <div class="icon">
                                 
                                 <h4> <?=$value1->titre?> </h4>
                              </div>
                              <p>Département :  <?=$value1->departement?> </p>
                              <p>Arrondissement :  <?=$value1->arrondissement?> </p>
                             
                           </div>
                        </div>
                    </div>               
                <?php
                }
                ?>
                </div>
            </div>
        <?php
        }
        ?> 
        </div>
    </section>
    <!-- contact-area-end -->
     
</main>
