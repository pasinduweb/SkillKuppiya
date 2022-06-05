<?php
  include('./dbConnection.php');
  // Header Include from mainInclude 
  include('./mainInclude/header.php'); 
?>  
    <!-- Start Video Background-->
    <div class="container-fluid remove-vid-marg">
      <div class="vid-parent">
        <video playsinline autoplay muted loop>
          <source src="video/banvid.mp4" />
        </video>
        <div class="vid-overlay"></div>
      </div>
      <div class="vid-content" >
        <h1 class="my-content">BOOST YOUR SKILL TODAY!</h1>
        <h3 class="my-content">We help to kickstart your Techie Journey.</h3><br />
        <?php    
              if(!isset($_SESSION['is_login'])){
                echo '<a class="btn-get-start" href="#" data-toggle="modal" data-target="#stuRegModalCenter">Get Started</a>';
              } else {
                echo '<a class="btn btn-primary mt-3" href="student/studentProfile.php">My Profile</a>';
              }
          ?> 
       
      </div>
    </div> <!-- End Video Background -->

    <div class="container-fluid bg-link txt-banner" id="red-banner"> <!-- Start Text Banner -->
        <div class="row bottom-banner">
          <div class="col-sm">
            <h5> <i class="fa fa-laptop"></i> Beginner Friendly</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fa fa-code"></i> Trending Lessons</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fa fa-database"></i> Lifetime Access</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fa fa-cloud"></i> Learn Anywhere, Anytime</h5>
          </div>
        </div>
    </div> <!-- End Text Banner -->
    
    <div class="container mt-5"> <!-- Start Most Top-selling Courses -->
      <h1 class="text-center">Top-selling Courses</h1>
      <div class="card-deck mt-4"> <!-- Start Most Top-selling Courses 1st Card Deck -->
        <?php
        $sql = "SELECT * FROM course LIMIT 3";
        $result = $conn->query($sql);
        if($result->num_rows > 0){ 
          while($row = $result->fetch_assoc()){
            $course_id = $row['course_id'];
            echo '
            <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
              <div class="card">
                <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar" />
                <div class="card-body">
                  <h5 class="card-title">'.$row['course_name'].'</h5>
                  <p class="card-text">'.$row['course_desc'].'</p>
                </div>
                <div class="card-footer">
                  <p class="card-text d-inline">Price: <small><del>LKR '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">LKR '.$row['course_price'].'<span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                </div>
              </div>
            </a>  ';
          }
        }
        ?>   
      </div>  <!-- End Most Top-selling Courses 1st Card Deck -->   
      <div class="card-deck mt-4"> <!-- Start Most Top-selling Courses 2nd Card Deck -->
        <?php
          $sql = "SELECT * FROM course LIMIT 3,3";
          $result = $conn->query($sql);
          if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
              $course_id = $row['course_id'];
              echo '
                <a href="coursedetails.php?course_id='.$course_id.'"  class="btn" style="text-align: left; padding:0px;">
                  <div class="card">
                    <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar" />
                    <div class="card-body">
                      <h5 class="card-title">'.$row['course_name'].'</h5>
                      <p class="card-text">'.$row['course_desc'].'</p>
                    </div>
                    <div class="card-footer">
                      <p class="card-text d-inline">Price: <small><del>LKR '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">LKR '.$row['course_price'].'<span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                  </div>
                </a>  ';
            }
          }
        ?>
      </div>   <!-- End Most Top-selling Courses 2nd Card Deck --> 
      <div class="text-center m-2">
        <br>
        <a class="btn btn-light btn-sm" href="courses.php" style="font-size: 20px;">View all Courses</a>
      </div>
    </div>  <!-- End Most Top-selling Courses -->

    <?php 
    // Contact Us
    include('./contact.php'); 
    ?>  

     <!-- Start Students Testimonial -->
      <div class="container-fluid mt-5" style="background-color: #4B7289" id="Feedback">
        <h1 class="text-center testyheading p-4"> Students' Feedback </h1>
        <div class="row">
          <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
            <?php 
              $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                  $s_img = $row['stu_img'];
                  $n_img = str_replace('../','',$s_img)
            ?>
              <div class="testimonial">
                <p class="description">
                <?php echo $row['f_content'];?>  
                </p>
                <div class="pic">
                  <img src="<?php echo $n_img; ?>" alt=""/>
                </div>
                <div class="testimonial-prof">
                  <h4><?php echo $row['stu_name']; ?></h4>
                  <small><?php echo $row['stu_occ']; ?></small>
                </div>
              </div>
              <?php }} ?>
            </div>
          </div>
        </div>
    </div>  <!-- End Students Testimonial -->

    <!-- Start About Section -->
    <div class="container-fluid p-4" style="background-color:#E9ECEF">
      <div class="container" style="background-color:#E9ECEF">
        <div class="row text-center">
          <div class="col-sm">
            <h5>About Us</h5>
              <p>SkillKuppiya provides universal access to the world’s best education, partnering with top universities and organizations to offer courses online.</p>
          </div>
          <div class="col-sm">
            <h5>Categories</h5>
            <a class="text-dark" href="#">Web Development</a><br />
            <a class="text-dark" href="#">Web Designing</a><br />
            <a class="text-dark" href="#">Android App Dev</a><br />
            <a class="text-dark" href="#">iOS Development</a><br />
            <a class="text-dark" href="#">Data Analysis</a><br />
          </div>
          <div class="col-sm">
            <h5>Contact Us</h5>
            <p>SkillKuppiya Pvt Ltd <br> Near Police Camp II <br> Bokaro, Jharkhand <br> Ph. 000000000 </p>
          </div>
        </div>
      </div>
    </div> <!-- End About Section -->

  <?php 
    // Footer Include from mainInclude 
    include('./mainInclude/footer.php'); 
    
  ?>  
