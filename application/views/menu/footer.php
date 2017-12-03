</div> <!-- container close here -->
<div class="hidden-print well footer-well hidden-xs" style="margin-top:50px;">
  <div class="container-fluid">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <!-- <hr> -->
      <footer>
        <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <strong>Quick Links</strong><br><br>
          <ul type="square" style="margin-left:-1.5em">
            <li><a href="http://www.nitw.ac.in" target="_blank">College main website </a></li>
            <li><a href="http://mail.google.com/a/student.nitw.ac.in" target="_blank">Student Webmail</a></li>
            <li><a href="http://www.nitw.ac.in/nitw/index.php?option=com_content&view=article&id=554&amp;Itemid=60" target="_blank">Department Websites</a></li>
            <li><a href="http://www.nitw.ac.in/nitw/index.php/academics/rules" target="_blank">Rules and regulations</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <strong>Address</strong><br><br>
          <address>
            WSDC Office, <br>
            Level 1, Center for Innovation & Incubation <br>
            NIT Warangal, Telangana - 506004
          </address>
          Drop us an email on
          <a href="mailto:wsdc.nitw@gmail.com">  <span class="glyphicon glyphicon-envelope"></span>  wsdc.nitw@gmail.com</a>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <strong>Follow us on Facebook</strong><br><br>
          Stay in touch with WSDC, NIT Warangal</br>
          <div class="fb-like" data-href="https://www.facebook.com/wsdc.nitw" data-layout="button" data-action="like" data-show-faces="false" data-share="true">
          </div>
          <br><br>
          Read more at  <a href="http://wsdc.nitw.ac.in" target="_blank">wsdc.nitw.ac.in <span class="glyphicon glyphicon-new-window"></span></a>
          <br>
          <span class="glyphicon glyphicon-copyright-mark"></span> <a class="tips" title="Web & Software Development Cell, NIT Warangal" target="_blank" href="http://wsdc.nitw.ac.in/">WSDC, NIT Warangal </a>
        </div>
      </div>

    </footer>
  </div>
</div> <!-- footer container close here -->
</div> <!-- /row with hidden print closes -->

<script type="text/javascript" src="<?php echo base_url('assets/')."/js/jquery.min.js"; ?> "></script>
<script type="text/javascript" src="<?php echo base_url('assets/')."/js/bootstrap.min.js"; ?> "></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<!-- <script src="<?php //echo base_url('assets/')."js/intro.min.js"; ?> "></script> -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.28/angular.min.js" ></script> -->

<?php
if (isset($scripts)) {
  foreach ($scripts as $index => $script) {
    ?>
    <script type="text/javascript" src="<?php echo base_url('assets/')."/js/".$script; ?>"></script>
    <?php
  }
}
?>
