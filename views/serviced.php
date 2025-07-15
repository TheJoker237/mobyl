
        <!-- main-area -->
        <main>
            <!-- breadcrumb-area -->
            <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                  <?php 
                                    $serviced=Service::get($_REQUEST['id'])
                                  ?>
                                    <h2><?=$serviced->titre?></h2>    
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
			<!-- service-details-area -->
            <div class="about-area5 about-p p-relative">
                <div class="container pt-120 pb-90">
                    <div class="row">
                         <!-- #right side -->
                        <div class="col-sm-12 col-md-12 col-lg-4 order-2">
                           <aside class="sidebar services-sidebar">
                        
                        <!-- Category Widget -->
                        <div class="sidebar-widget categories">
                            <div class="widget-content">
                                <h2 class="widget-title"> Autres services </h2>
                                <!-- Services Category -->
                                <ul class="services-categories">
                                 <?php 
                                 foreach (Service::q()->where("id !=".$serviced->id)->execute() as $key => $value) {
                                  ?>
                                    <li><a href="services/<?=$value->id?>"><?=$value->titre?> </a></li>
                                    <?php
                }
                ?>
                                </ul>

                            </div>
                        </div>
                        
                       
                    </aside>
                        </div>
                        <!-- #right side end -->
                       
                        
					<div class="col-lg-8 col-md-12 col-sm-12 order-1">
                           <div class="service-detail">
                      

                        <div class="content-box">
                             <!-- Two Column -->
                            <div class="two-column">
                                <div class="row">
                                     <div class="image-column col-xl-12 col-lg-12 col-md-12">
                                        <figure class="image"><img src="img/service/<?=$serviced->image?>" alt=""></figure>
                                    </div>
                                </div>
                            </div>

                           <?=$serviced->description?>
    
                        </div>
                    </div>
                        </div>
                     
                    </div>
                </div>
            </div>
            <!-- service-details-area-end -->
       </main>
        <!-- main-area-end -->
