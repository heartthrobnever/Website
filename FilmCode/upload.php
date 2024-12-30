<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $target_dir = "uploads/";
  if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
  }

  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check file size
  if ($_FILES["file"]["size"] > 5000000) { // 5MB limit
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  $allowedTypes = ["jpg", "jpeg", "png", "gif", "mp4", "mov", "avi"];
  if (!in_array($fileType, $allowedTypes)) {
    echo "Sorry, only JPG, JPEG, PNG, GIF, MP4, MOV, and AVI files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
} else {
  echo "Invalid request. Please use the upload form.";
}

