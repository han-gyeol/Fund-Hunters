<?php
session_start();
require('dbconn.php');
if(isset($_POST['submit'])){
  $title = $_POST["title"];
  $description = $_POST["description"];
  $start_date = $_POST["start_date"];
  $end_date = $_POST["end_date"];
  $target_amount = $_POST["target_amount"];
  $current_amount = 0;
  $category = $_POST["category"];

  $query = "SELECT MAX(project_id) FROM projects";
  $result = pg_query($dbconn, $query);
  $project_id = pg_fetch_result($result, 0, 0) + 1;

  $max_size = 500 * 1024; // 500 KB
  $validextensions = array("jpeg", "jpg", "png");
  $destination_directory = "image/company/";

  if ( isset($_FILES["logo"]["type"]) )
  {
    $temporary = explode(".", $_FILES["logo"]["name"]);
    $file_extension = end($temporary);
    // We need to check for image format and size again, because client-side code can be altered
    if ( (($_FILES["logo"]["type"] == "image/png") ||
    ($_FILES["logo"]["type"] == "image/jpg") ||
    ($_FILES["logo"]["type"] == "image/jpeg")
    ) && in_array($file_extension, $validextensions))
    {
      if ( $_FILES["logo"]["size"] < ($max_size) )
      {
        if ( $_FILES["logo"]["error"] > 0 )
        {
          echo "<div class=\"alert alert-danger\" role=\"alert\">Error: <strong>" . $_FILES["logo"]["error"] . "</strong></div>";
        }
        else
        {
          if ( file_exists($destination_directory . $_FILES["logo"]["name"]) )
          {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Error: File <strong>" . $_FILES["logo"]["name"] . "</strong> already exists.</div>";
          }
          else
          {
            $sourcePath = $_FILES["logo"]["tmp_name"];
            if ($_FILES["logo"]["type"] == "image/png") {
              $targetPath = "image/company/$project_id.png";
            } else if ($_FILES["logo"]["type"] == "image/jpg") {
              $targetPath = "image/company/$project_id.jpg";
            } else if ($_FILES["logo"]["type"] == "image/jpeg") {
              $targetPath = "image/company/$project_id.jpeg";
            } else if ($_FILES["logo"]["type"] == "image/gif") {
              $targetPath = "image/company/$project_id.gif";
            }
            $logo_url = $targetPath;
            move_uploaded_file($sourcePath, $targetPath);
            echo "<div class=\"alert alert-success\" role=\"alert\">";
            echo "<p>Image uploaded successful</p>";
            echo "<p>File Name: <a href=\"". $targetPath . "\"><strong>" . $targetPath . "</strong></a></p>";
            echo "<p>Type: <strong>" . $_FILES["logo"]["type"] . "</strong></p>";
            echo "<p>Size: <strong>" . round($_FILES["logo"]["size"]/1024, 2) . " kB</strong></p>";
            echo "<p>Temp file: <strong>" . $_FILES["logo"]["tmp_name"] . "</strong></p>";
            echo "</div>";
          }
        }
      }
      else
      {
        echo "<div class=\"alert alert-danger\" role=\"alert\">The size of image you are attempting to upload is " . round($_FILES["logo"]["size"]/1024, 2) . " KB, maximum size allowed is " . round($max_size/1024, 2) . " KB</div>";
      }
    }
    else
    {
      echo "<div class=\"alert alert-danger\" role=\"alert\">Unvalid image format. Allowed formats: JPG, JPEG, PNG.</div>";
    }
  }

  if (!file_exists("image/project/$project_id")) {
    mkdir("image/project/$project_id", 0777, true);
  }
  $destination_directory = "image/project/$project_id/";

  if ( isset($_FILES["file1"]["type"]) )
  {
    $temporary = explode(".", $_FILES["file1"]["name"]);
    $file_extension = end($temporary);
    // We need to check for image format and size again, because client-side code can be altered
    if ( (($_FILES["file1"]["type"] == "image/png") ||
    ($_FILES["file1"]["type"] == "image/jpg") ||
    ($_FILES["file1"]["type"] == "image/jpeg")
    ) && in_array($file_extension, $validextensions))
    {
      if ( $_FILES["file1"]["size"] < ($max_size) )
      {
        if ( $_FILES["file1"]["error"] > 0 )
        {
          echo "<div class=\"alert alert-danger\" role=\"alert\">Error: <strong>" . $_FILES["file1"]["error"] . "</strong></div>";
        }
        else
        {
          if ( file_exists($destination_directory . $_FILES["file1"]["name"]) )
          {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Error: File <strong>" . $_FILES["file1"]["name"] . "</strong> already exists.</div>";
          }
          else
          {
            $sourcePath = $_FILES["file1"]["tmp_name"];
            if ($_FILES["logo"]["type"] == "image/png") {
              $targetPath = "image/project/$project_id/$project_id"."_1.png";
            } else if ($_FILES["logo"]["type"] == "image/jpg") {
              $targetPath = "image/project/$project_id/$project_id"."_1.jpg";
            } else if ($_FILES["logo"]["type"] == "image/jpeg") {
              $targetPath = "image/project/$project_id/$project_id"."_1.jpeg";
            } else if ($_FILES["logo"]["type"] == "image/gif") {
              $targetPath = "image/project/$project_id/$project_id"."_1.gif";
            }
            $picture_url_1 = $targetPath;
            move_uploaded_file($sourcePath, $targetPath);
            echo "<div class=\"alert alert-success\" role=\"alert\">";
            echo "<p>Image uploaded successful</p>";
            echo "<p>File Name: <a href=\"". $targetPath . "\"><strong>" . $targetPath . "</strong></a></p>";
            echo "<p>Type: <strong>" . $_FILES["file1"]["type"] . "</strong></p>";
            echo "<p>Size: <strong>" . round($_FILES["file1"]["size"]/1024, 2) . " kB</strong></p>";
            echo "<p>Temp file: <strong>" . $_FILES["file1"]["tmp_name"] . "</strong></p>";
            echo "</div>";
          }
        }
      }
      else
      {
        echo "<div class=\"alert alert-danger\" role=\"alert\">The size of image you are attempting to upload is " . round($_FILES["file1"]["size"]/1024, 2) . " KB, maximum size allowed is " . round($max_size/1024, 2) . " KB</div>";
      }
    }
    else
    {
      echo "<div class=\"alert alert-danger\" role=\"alert\">Unvalid image format. Allowed formats: JPG, JPEG, PNG.</div>";
    }
  }

  if ( isset($_FILES["file2"]["type"]) )
  {
    $temporary = explode(".", $_FILES["file2"]["name"]);
    $file_extension = end($temporary);
    // We need to check for image format and size again, because client-side code can be altered
    if ( (($_FILES["file2"]["type"] == "image/png") ||
    ($_FILES["file2"]["type"] == "image/jpg") ||
    ($_FILES["file2"]["type"] == "image/jpeg")
    ) && in_array($file_extension, $validextensions))
    {
      if ( $_FILES["file2"]["size"] < ($max_size) )
      {
        if ( $_FILES["file2"]["error"] > 0 )
        {
          echo "<div class=\"alert alert-danger\" role=\"alert\">Error: <strong>" . $_FILES["file2"]["error"] . "</strong></div>";
        }
        else
        {
          if ( file_exists($destination_directory . $_FILES["file2"]["name"]) )
          {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Error: File <strong>" . $_FILES["file2"]["name"] . "</strong> already exists.</div>";
          }
          else
          {
            $sourcePath = $_FILES["file2"]["tmp_name"];
            if ($_FILES["logo"]["type"] == "image/png") {
              $targetPath = "image/project/$project_id/$project_id"."_2.png";
            } else if ($_FILES["logo"]["type"] == "image/jpg") {
              $targetPath = "image/project/$project_id/$project_id"."_2.jpg";
            } else if ($_FILES["logo"]["type"] == "image/jpeg") {
              $targetPath = "image/project/$project_id/$project_id"."_2.jpeg";
            } else if ($_FILES["logo"]["type"] == "image/gif") {
              $targetPath = "image/project/$project_id/$project_id"."_2.gif";
            }
            $picture_url_2 = $targetPath;
            move_uploaded_file($sourcePath, $targetPath);
            echo "<div class=\"alert alert-success\" role=\"alert\">";
            echo "<p>Image uploaded successful</p>";
            echo "<p>File Name: <a href=\"". $targetPath . "\"><strong>" . $targetPath . "</strong></a></p>";
            echo "<p>Type: <strong>" . $_FILES["file2"]["type"] . "</strong></p>";
            echo "<p>Size: <strong>" . round($_FILES["file2"]["size"]/1024, 2) . " kB</strong></p>";
            echo "<p>Temp file: <strong>" . $_FILES["file2"]["tmp_name"] . "</strong></p>";
            echo "</div>";
          }
        }
      }
      else
      {
        echo "<div class=\"alert alert-danger\" role=\"alert\">The size of image you are attempting to upload is " . round($_FILES["file2"]["size"]/1024, 2) . " KB, maximum size allowed is " . round($max_size/1024, 2) . " KB</div>";
      }
    }
    else
    {
      echo "<div class=\"alert alert-danger\" role=\"alert\">Unvalid image format. Allowed formats: JPG, JPEG, PNG.</div>";
    }
  }

  if ( isset($_FILES["file3"]["type"]) )
  {
    $temporary = explode(".", $_FILES["file3"]["name"]);
    $file_extension = end($temporary);
    // We need to check for image format and size again, because client-side code can be altered
    if ( (($_FILES["file3"]["type"] == "image/png") ||
    ($_FILES["file3"]["type"] == "image/jpg") ||
    ($_FILES["file3"]["type"] == "image/jpeg")
    ) && in_array($file_extension, $validextensions))
    {
      if ( $_FILES["file3"]["size"] < ($max_size) )
      {
        if ( $_FILES["file3"]["error"] > 0 )
        {
          echo "<div class=\"alert alert-danger\" role=\"alert\">Error: <strong>" . $_FILES["file3"]["error"] . "</strong></div>";
        }
        else
        {
          if ( file_exists($destination_directory . $_FILES["file3"]["name"]) )
          {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Error: File <strong>" . $_FILES["file3"]["name"] . "</strong> already exists.</div>";
          }
          else
          {
            $sourcePath = $_FILES["file3"]["tmp_name"];
            if ($_FILES["logo"]["type"] == "image/png") {
              $targetPath = "image/project/$project_id/$project_id"."_3.png";
            } else if ($_FILES["logo"]["type"] == "image/jpg") {
              $targetPath = "image/project/$project_id/$project_id"."_3.jpg";
            } else if ($_FILES["logo"]["type"] == "image/jpeg") {
              $targetPath = "image/project/$project_id/$project_id"."_3.jpeg";
            } else if ($_FILES["logo"]["type"] == "image/gif") {
              $targetPath = "image/project/$project_id/$project_id"."_3.gif";
            }
            $picture_url_3 = $targetPath;
            move_uploaded_file($sourcePath, $targetPath);
            echo "<div class=\"alert alert-success\" role=\"alert\">";
            echo "<p>Image uploaded successful</p>";
            echo "<p>File Name: <a href=\"". $targetPath . "\"><strong>" . $targetPath . "</strong></a></p>";
            echo "<p>Type: <strong>" . $_FILES["file3"]["type"] . "</strong></p>";
            echo "<p>Size: <strong>" . round($_FILES["file3"]["size"]/1024, 2) . " kB</strong></p>";
            echo "<p>Temp file: <strong>" . $_FILES["file3"]["tmp_name"] . "</strong></p>";
            echo "</div>";
          }
        }
      }
      else
      {
        echo "<div class=\"alert alert-danger\" role=\"alert\">The size of image you are attempting to upload is " . round($_FILES["file3"]["size"]/1024, 2) . " KB, maximum size allowed is " . round($max_size/1024, 2) . " KB</div>";
      }
    }
    else
    {
      echo "<div class=\"alert alert-danger\" role=\"alert\">Unvalid image format. Allowed formats: JPG, JPEG, PNG.</div>";
    }
  }

  require('dbconn.php');

  $query = "INSERT INTO projects VALUES('$title', '$description', '$start_date', '$end_date', $project_id, $target_amount, $current_amount, '$category', '$logo_url')";
  $result = pg_query($dbconn, $query);
  echo pg_last_error($dbconn);

  $email = $_SESSION['username'];
  $query = "INSERT INTO ownership VALUES('$email', $project_id)";
  $result = pg_query($dbconn, $query);
  echo pg_last_error($dbconn);

  $query = "INSERT INTO contain VALUES($project_id, '$picture_url_1')";
  $result = pg_query($dbconn, $query);
  echo pg_last_error($dbconn);

  $query = "INSERT INTO contain VALUES($project_id, '$picture_url_2')";
  $result = pg_query($dbconn, $query);
  echo pg_last_error($dbconn);

  $query = "INSERT INTO contain VALUES($project_id, '$picture_url_3')";
  $result = pg_query($dbconn, $query);
  echo pg_last_error($dbconn);

  header("Location: ProjectProfile.php?id=$project_id");
  }

?>
