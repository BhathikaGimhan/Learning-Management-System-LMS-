<!--footer-->
<div class="footer">
    <!-- container -->
    <div class="container">
      <div class="col-md-6 footer-left">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="visitors.php">Contact Us</a></li>
          <li><a href="admin/login.php">Admin</a></li>
          <li><a href="user/login.php">User</a></li>
        </ul>
       
      </div>
      <div class="col-md-3 footer-middle">
        <?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
        <h3>Address</h3>
        <div class="address">
          <p><?php  echo htmlentities($row->PageDescription);?>
          </p>
        </div>
        <div class="phone">
          <p><?php  echo htmlentities($row->MobileNumber);?></p>
        </div>
        <div class="email">
          <p><?php  echo htmlentities($row->EmailAddress);?></p>
        </div>
      <?php $cnt=$cnt+1;}} ?></div>
      <div class="col-md-3 footer-right">
        <h3>Skill Hub  Trincomalee Campus <br> Eastern University Sri Lanka</h3>
        <p>WE Need To Accept That We Won't Always Make The Right Decisions, That We'll Screw Up Royally Sometimes understanding That Failure Is Not the opposite Of Success, It's Part Of Success.</p>
      </div>
      <div class="clearfix"> </div> 
    </div>
    <!-- //container -->
  </div>
<!--/footer-->
<!--copy-rights-->
<div class="copyright">
    <!-- container -->
    <div class="container">
      <div class="copyright-left">
      <p> Skill Hub||Digital Collaboration System||Trincomalee Campus||Eastern University||Sri Lanka</p>
      </div>
     <!-- <div class="copyright-right">
        <ul>
          <li><a href="#" class="twitter"> </a></li>
          <li><a href="#" class="twitter facebook"> </a></li>
          <li><a href="#" class="twitter chrome"> </a></li>
          <li><a href="#" class="twitter pinterest"> </a></li>
          <li><a href="#" class="twitter linkedin"> </a></li>
          <li><a href="#" class="twitter dribbble"> </a></li>
        </ul>
      </div>-->
      <div class="clearfix"> </div>
      
    </div>
    <!-- //container -->
    <!---->
<script type="text/javascript">
    $(document).ready(function() {
        /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
        */
    $().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!----> 
  </div>