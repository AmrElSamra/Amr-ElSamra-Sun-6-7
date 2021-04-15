<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <!-- <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css"> -->
</head>

<body>
  <div class="container mt-5">
      <form  method="post" enctype="multipart/form-data" class="form-group">
        <input type="file" name="img" class="form-control">
        <div class="text-center">
            <input type="submit" value="Upload" name="submit" class="btn btn-primary btn-lg my-4">
        </div>
      </form>
  </div>




<?php

    if(isset($_POST['submit'])){
        class Img{
            public $img, $imgName, $imgExt, $imgError, $randomStr, $imgNewName, $imgTmpName;
            public function __construct()
            {
                $this->img = $_FILES['img'];
            }
            public function validate(){
                $this->imgName = $this->img['name'];
                $this->imgExt = pathinfo($this->imgName, PATHINFO_EXTENSION);
                $this->imgError = $this->img['error'];
                if( $this->imgError==0 and in_array($this->imgExt, ['png', 'jpg', 'jpeg', 'gif'])){
                    return true;
                }
                else{
                    return false;
                }
            }
            public function rename(){
                $this->randomStr = uniqid();
                $this->imgNewName = "$this->randomStr.$this->imgExt";
                return $this;
            }
            public function upload(){
                $this->imgTmpName = $this->img['tmp_name'];
                move_uploaded_file($this->imgTmpName, "uploads/$this->imgNewName");
            }
        }
        $test = new Img;
        if($test->validate()){
            $test->rename()->upload();
        }
        // $test->validate();
        // $test->rename();
        // $test->upload();
        }
?>
<?php if(isset($_FILES['img']) and isset($_POST['submit'])){?>
    <img src="uploads/<?php echo $test->imgNewName ; } else{return;}?>" alt="">







</body>

</html>