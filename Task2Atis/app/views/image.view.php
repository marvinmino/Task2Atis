
    <?php require 'partials/head.php'; ?>
    <?php if (!empty($images)) : ?>
        <!-- Slideshow container -->
        <div class="container">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
                    $i = 0;
                    foreach ($images as $img) : ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $i;
                                                                        $i++ ?>" class="active"></li>
                    <?php endforeach; ?>
                </ol>
                <!-- Wrapper for slides -->


                <?php $i = 0;
                foreach ($images as $img) : ?>

                    <?php if ($i == 0) {
                        echo '<div class="carousel-inner">';
                        echo '<div class="item active">';
                    } else
                        echo '<div class="item">';
                    $i++;
                    ?>

                    <form method="post" action="delImg?imageId=<?php echo $img->id; ?>">
                        <div style="color:black; float:right; padding-right:35%"><button class="btn btn-secondary" href="#" value="<?php echo $img->id ?>" name=" deleteThis">Delete image</button></div>
                    </form>
                    <div style="color:black; padding-left:35%"><button class="hoho btn btn-secondary" href="#" id="<?php echo $img->id_album ?>" name="<?php echo $img->url ?>">Set thumbnail</button></div>
                    <a href="<?php echo $img->url ?>" target="_blank"><img src="<?php echo $img->url ?>" style="width: 100%;object-fit:contain;height:400px" id="image"></a>
            </div>
        <?php endforeach; ?>
        </div>


        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        </div>
    <?php endif; ?>
    <div>
        <form action="delete?a_id=<?php echo $a_id; ?>" method="post">
            <input type="submit" style="float:right;" name="delAlbum" value="Delete Album &#x1F5D1;" class="">

        </form>
    </div>
    <?php
session_start();
            if (isset($_SESSION['error'])) {
            ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']);
            }  ?>
    <form action="images?a_id=<?php echo $a_id; ?>" method="post" enctype="multipart/form-data">

        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" multiple>
        <input class="form-control" type="submit" value="Upload Image" name="submit" id="insImg">
    </form>


</html>
<script src="../../public/js/imageinsert.js" type="text/javascript"></script>
<?php require 'partials/footer.php'; ?>

