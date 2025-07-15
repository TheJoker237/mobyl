
   <body>
      <!-- header -->
      <header class="header-area header-three">
         
         <div class="header-mid d-none d-md-block pt-25 pb-25" >
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-2 col-md-12 d-none d-md-block">
                     <div class="logo">
                        <a href="home"><img src="img/logo/logo.png" alt="logo"></a>
                     </div>
                  </div>
                  <div class="col-lg-10 col-md-10 text-right d-none d-lg-block">
                     <div class="header-cta">
                        <ul>
                           
                          
                           <li>
                              <div class="header-social">
                                 <span>
                                 <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#" title="LinkedIn"><i class="fab fa-instagram"></i></a>               
                                 <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                 </span>                    
                                 <!--  /social media icon redux -->                               
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="header-sticky" class="menu-area">
            <div class="second-menu">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-lg-2 col-md-12  d-lg-none d-x-none">
                        <div class="logo">
                           <a href="index-2.html"><img src="img/logo/logo.png" alt="logo"></a>
                        </div>
                     </div>
                     <div class="col-xl-12 col-lg-12">
                        <div class="main-menu">
                           <nav id="mobile-menu">
                              <ul>
                                 <li class="has-sub">
                                    <a href="#">Votre station</a>
                                    <ul>
                                       <li><a href="about">Qui sommes-nous ?</a></li>
                                       <li><a href="vision">Notre vision</a></li>
                                       <li><a href="valeurs">Nos valeurs</a></li>
                                          <li><a href="ambition">Notre ambition</a></li>
                                    </ul>
                                 </li>
                                
                                 <li class="has-sub">
                                    <a href="services">Poduits & Services</a>
                                    <ul>
                                      <?php 
                                 foreach (Service::q()->execute() as $key => $value) {
                                  ?>
                                    <li><a href="services/<?=$value->id?>"><?=$value->titre?> </a></li>
                                    <?php
                                    }
                ?>
                                    </ul>
                                 </li>
                                 
                                 <li class="has-sub">
                                    <a href="implantation">Notre implantation</a>
                                    
                                 </li>
                                <li class="has-sub">
                                    <a href="#">Actualités</a>
                                    <ul>
                                       <li><a href="blog.html">Catalogues</a></li>                                       
                                       <li><a href="blog-details.html">Agendas</a></li>
                                         <li><a href="presse">Espace presse</a></li>
                                           <li><a href="photo">Photothèque</a></li>
                                    </ul>
                                 </li>
                                  <li class="has-sub">
                                    <a href="contact">Nous contacter</a>
                                    <ul style="display:none">
                                       <li><a href="client">Service client</a></li>                                       
                                       <li><a href="contact">Travailler avec nous</a></li>
                                        
                                    </ul>
                                 </li>
                                 <li class="has-sub">
                                    <a href="partner">Devenir partenaire</a>
                                    <ul style="display:none">
                                       <li><a href="professionnels">Professionnels</a></li>                                       
                                       <li><a href="particuliers">Particulier</a></li>
                                        
                                    </ul>
                                 </li>
                                
                              </ul>
                           </nav>
                        </div>
                     </div>
                     
                     <div class="col-12">
                        <div class="mobile-menu"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- header-end -->
      <!-- offcanvas-area -->
      <div class="offcanvas-menu">
         <span class="menu-close"><i class="fas fa-times"></i></span>
         <form role="search" method="get" id="searchform"   class="searchform" action="http://wordpress.zcube.in/xconsulta/">
            <input type="text" name="s" id="search" placeholder="Search"/>
            <button><i class="fa fa-search"></i></button>
         </form>
         <div id="cssmenu3" class="menu-one-page-menu-container">
            <ul  class="menu">
               <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="index-2.html">Home</a></li>
               <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="about.html">About Us</a></li>
               <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="services.html">Services</a></li>
               <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="pricing.html">Pricing </a></li>
               <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="team.html">Team </a></li>
               <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="projects.html">Cases Study</a></li>
               <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="blog.html">Blog</a></li>
               <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="contact.html">Contact</a></li>
            </ul>
         </div>
         <div id="cssmenu2" class="menu-one-page-menu-container">
            <ul id="menu-one-page-menu-12" class="menu">
               <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#home"><span>+8 12 3456897</span></a></li>
               <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#howitwork"><span>info@example.com</span></a></li>
            </ul>
         </div>
      </div>
      <div class="offcanvas-overly"></div>
      <!-- offcanvas-end -->