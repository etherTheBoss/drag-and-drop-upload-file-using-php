<?php
/**
 * DRAG AND DROP FILE UPLOAD
 * Created by
 * Habibur Rahman
 * Sr. Software Engineer
 * Date: 07/03/2018
 * Time : 13:17:21
 */
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <style>
        body{
            background: lightsteelblue;
        }
        form{
            position: absolute;
            width: 100%;
            height: 600px;
        }

        form input{
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
        }

        img
        {
            width: 200px;
            height: 200px;
        }

    </style>
</head>
<body>

<?php
    include 'database/config.php';
    include 'database/database.php';
    $db= new Database();

    $query = "SELECT * FROM file ORDER BY id DESC";
    $files = $db->select($query);
?>

    <div class="row theDrop" id="theDrop">
        <div class="col-sm-12">
            <form id="dropSubmit" class="box" method="post" action="upload.php" enctype="multipart/form-data">

            <table class="table table-hover" style="border: 1px solid activecaption;">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>File Name</th>
                    <th>Display</th>
                </tr>
                </thead>
                <tbody>
                <input type="file" name="myFiles" id="myFiles" class="myFiles" value=""  />
                <?php if($files){ ?>
                    <?php while ($row = $files->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['file_name']?></td>
                            <td><?php if($row['file_type'] == 'image/jpeg'){ ?>
                                    <img src="upload/<?php echo $row['file_name']?>" alt="<?php echo $row['file_name']?>">
                                <?php }?>
                            </td>
                        </tr>
                    <?php } ?>

                <?php } else {?>
                    <p style="color: red;">Data is not available..</p>
                <?php }?>
                </tbody>
            </table>
            </form>
        </div>
    </div>

<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
</script>


<script>
    $(document).ready(function(){
        $('form input').change(function () {
            $('form p').text(this.files.length + " file(s) selected");
//            alert(this.files.)

            $("#myFiles").empty();
            var fp = $("#myFiles");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fragment = "";

            var theNames = '';
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    var fileName = items[i].name; // get file name
                    var fileSize = items[i].size; // get file size
                    var fileType = items[i].type; // get file type


                    // append li to UL tag to display File info
                    fragment += "<li>" + fileName + " (<b>" + fileSize + "</b> bytes) - Type :" + fileType + "</li>";
                    theNames += fileName+',';
                }
            }
                $("#dropSubmit").submit();
        });
    });
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
