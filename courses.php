<?php
  include('./dbConnection.php');
  // Header Include from mainInclude 
  include('./mainInclude/header.php'); 
?>
<div class="container-fluid bg-dark">
    <!-- Start Course Page Banner -->
    <div class="row">
        <img src="./image/coursebanner.jpg" alt="courses"
            style="height:500px; width:100%; object-fit:cover; box-shadow:10px;" />
    </div>
</div> <!-- End Course Page Banner -->
<div class="mt-3 mx-auto">
    <form action="index.php" method="POST">
        <li class="nav-item d-inline-flex align-items-center justify-content-between mb-lg-0 mb-3">
            <div class="pl-2"><input class="form-control" onkeyup="myFunction()" id="myFilter" type="text" name="search"
                    placeholder="Search any courses"></div>
            <button type="submit" class="btn btn-outline-secondary form-check-label active btn-secondary"
                name="searchh">Search</button>
        </li>
    </form>
</div>


<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-3 ml-5">
            <h6 class="text-info">SELECT CATEGORIES</h6>
            <ul class="list-group">
                <?php
                $sql="SELECT DISTINCT cName FROM category ORDER BY cName";
                $result=$conn->query($sql);
                while($row=$result->fetch_assoc()){
                ?>
                <li class="list-group-item">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input course_check" value="<?= $row['cName']?>"
                                id="course"><?=$row['cName'];?>
                        </label>
                    </div>
                </li>
                <?php }  ?>
            </ul>
        </div>
        <div class="col-md-8">
            <h5 class="text-center" id="textChange">All Courses</h5>
            <div class="row" id="results">
                <?php
                    $sql = "SELECT * FROM course";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){ 
                      while($row = $result->fetch_assoc()){
                          $course_id = $row['course_id'];
                            echo ' 
                                <div class="col-sm-4 mb-4">
                                    <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px;"><div class="card">
                                      <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar" />
                                      <div class="card-body">
                                        <h5 class="card-title">'.$row['course_name'].'</h5>
                                        <p class="card-text">'.$row['course_desc'].'</p>
                                      </div>
                                      <div class="card-footer">
                                        <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">&#8377 '.$row['course_price'].'<span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                                      </div>
                                    </div> </a>
                                </div>
                                ';
                              }
                            }
                ?>
            </div>
        </div>
    </div>
</div>

<?php 
  // Contact Us
  include('./contact.php'); 
?>

<?php 
  // Footer Include from mainInclude 
  include('./mainInclude/footer.php'); 
?>