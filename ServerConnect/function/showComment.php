<?php session_start();?>
<?php include('../server.php'); ?>

<?php
// ตรวจสอบสถานะการเรียงลำดับ
if (isset($_GET['sortOrder'])) {
    $sortOrder = $_GET['sortOrder'];
} else {
    $sortOrder = 'asc'; // สถานะเริ่มต้นคือ ASC
}

$sql = "SELECT * FROM " . $_SESSION['commentTable'] . " INNER JOIN user ON " . $_SESSION['commentTable'] . ".idUser = user.id ORDER BY dateandtime $sortOrder;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $date =date('M d, yy', strtotime($row['dateandtime']));;
    $time =date('H:i a', strtotime($row['dateandtime']));;
    $dateFormat = $date.' at '.$time;
    echo 
    "<div class='container-fluid' id='comment_person'>
        <div class='row' id='inBox'>
            <div class='col-3 text-center'>
                <img src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."' class='profile_pic'/>
            </div>
            <div class='col'>
                <div class='row p-2'>
                    <div class='col-7'><b>".$row['username']."</b></div>
                    <div class='col' id='timeLabel'>".$dateFormat."</div>
                    <div class='col-1' class='dropdown'>
                    <button type='button' class='btn btn-sm rounded-circle btnDropDown' id='btnDropDown' data-bs-toggle='dropdown' style='background-color: white; color:#000000;font-weight: bold;'>&#8942;</button>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <h5 class='dropdown-header'>Comment</h5>
                                    </li>
                                    <li><a class='dropdown-item' href='../ServerConnect/function/deleteData.php?IdComment=".$row['idComment']."' onclick='return confirm(\"&#10071; Are you sure you want to delete this comment?\")'>	&#128465; Delete</a></li>
                                    <li><a class='dropdown-item' type='button' data-bs-toggle='offcanvas' data-bs-target='#id".$row['idComment']."'>&#9999;&#65039; Edit</a></li>
                                </ul>
                    </div>
                </div>
                <div class='row p-2' id='comment_box'>
                    <div class='col' id='commentShow'>".$row['comment']."</div>
                </div>
            </div>
        </div>
    </div>";
    
    //ส่วนกล่องแก้ไข
    echo" 
    <div class='offcanvas offcanvas-bottom' id='id".$row['idComment']."' style='height:50%'>
    <div class='offcanvas-header'>
        <h1 class='offcanvas-title'>Edit Comment</h1>
        <button type='button' class='btn-close' data-bs-dismiss='offcanvas'></button>
    </div>
      <div class='offcanvas-body'>
          <form action='../ServerConnect/function/updateComment.php' method='post'>
              <div class='comment_persons' id='input_comment'>
                  <fieldset disabled>
                      <div class='input-group flex-nowrap' style='margin:5px 0px;'>
                          <span class='input-group-text' id='addon-wrapping'>&#128100;</span>
                          <input type='text' class='form-control' aria-describedby='addon-wrapping' value='".$row['username']."'>
                      </div>
                  </fieldset>
                  <div class='form-floating'>
                      <textarea class='form-control' name='commentTxt' placeholder='Leave a comment here' id='floatingTextarea2' style='height: 150px'>".$row['comment']."</textarea>
                      <label for='floatingTextarea2'>Edit Comments</label>
                  </div>
                  <input type='hidden' name='idComment' value='".$row['idComment']."'>
                  <div class='d-grid gap-2 d-md-flex justify-content-md-end m-2'>
                      <!-- Btn -->
                      <input class='btnform btn' type='submit' value='Edit'></input>
                  </div>
              </div>
          </form>
      </div>
    </div>";
  }
} else {
  echo "
  <div class='container-fluid' id='comment_person'>
    <div class='row' id='inBox'>No comments found.</div>
  </div>";
}

mysqli_close($conn);
?>