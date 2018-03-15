<?php

 ?>
 <div class="my-info-wrapper">
   <div class="my-info-tabs">
     <?php
     foreach ($myinfo as $key => $value) :
     ?>
     <span class="mp-info-tab" data-info-key="<?php echo $key;?>"><?php echo ucfirst( str_replace( '_', ' ', $key ) );?></span>
     <?php
     endforeach;
     ?>
   </div>
   <div class="my-info-data">
     <div id="show-data">
     </div>
   </div>
   <div id="info-loader">
     <img src="<?php echo site_url('/wp-admin/images/spinner-2x.gif') ?>" alt="Loading..."/>
   </div>
 </div>


 <script type="text/html" id="tmpl-my_details">
   <div class="info-section my-details">
     <div class="my-photo">
       <img src="{{{data.photo}}}" alt="MyPhoto">
     </div>
     <h3>{{{data.name}}}</h3>
     <p><strong>Address</strong>: {{{data.address}}}</p>
     <p><strong>Email</strong>: {{{data.email}}}</p>
     <p><strong>Phone</strong>: {{{data.phone}}}</p>
   </div>
</script>

<script type="text/html" id="tmpl-about_me">
  <div class="info-section about-me">
    <h2>About Me</h2>
    <p>{{{data}}}</p>
  </div>
</script>

<script type="text/html" id="tmpl-skills">
  <div class="info-section skills">
    <h2>Skills</h2>
    <p>{{{data}}}</p>
  </div>
</script>

<script type="text/html" id="tmpl-experience">
  <div class="info-section experience">
    <h2>Experience</h2>
    <h3>{{{data.mplus.organization}}}</h3>
    <p><strong>Post</strong>: {{{data.mplus.post}}}</p>
    <p><strong>Location</strong>: {{{data.mplus.location}}}</p>
    <p><strong>Duration</strong>: {{{data.mplus.duration}}}</p>

    <h3>{{{data.mahdil.organization}}}</h3>
    <p><strong>Post</strong>: {{{data.mahdil.post}}}</p>
    <p><strong>Location</strong>: {{{data.mahdil.location}}}</p>
    <p><strong>Duration</strong>: {{{data.mahdil.duration}}}</p>
  </div>
</script>

<script type="text/html" id="tmpl-education">
  <div class="info-section education">
    <h2>Education</h2>
    <h3>{{{data.bachelor.degree}}}</h3>
    <p><strong>CGPA</strong>: {{{data.bachelor.cgpa}}}</p>
    <p><strong>Institute</strong>: {{{data.bachelor.institute}}}</p>
    <h3>{{{data.hsc.degree}}}</h3>
    <p><strong>CGPA</strong>: {{{data.hsc.cgpa}}}</p>
    <p><strong>Institute</strong>: {{{data.hsc.institute}}}</p>
    <h3>{{{data.ssc.degree}}}</h3>
    <p><strong>CGPA</strong>: {{{data.ssc.cgpa}}}</p>
    <p><strong>Institute</strong>: {{{data.ssc.institute}}}</p>
  </div>
</script>

<script type="text/html" id="tmpl-links">
  <div class="info-section links">
    <h2>Social Links</h2>
    <a href="{{{data.facebook}}}">Facebook</a>
    <a href="{{{data.linkedin}}}">Linkedin</a>
    <a href="{{{data.github}}}">Github</a>
  </div>
</script>
