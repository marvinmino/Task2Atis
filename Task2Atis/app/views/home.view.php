
    <?php require 'partials/head.php'; ?>

    <br>
    <!-- Page Content  -->
    <div id="content">

        <div class="float-md-none">
            <button style="width: 30%;align-self:center; margin-left:34.5%;margin-right:20%;" href="#" id='insForm' class="btn btn-outline-dark btn-lg btn-block">Add Album</button>
            </br>
            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']);
            } ?>
            <form action="home" method="post" class='form-popup form'>
                <div class="form-group">
                    <label for="albumName">Select Album Name:
                    </label>
                    <input class="form-control" type="text" placeholder="Album Name..." name="albumName" id="albName">
                </div>
                <input class="form-control" type="submit" value="Create Album" name='alb_frm'>
            </form>
        </div>


        <div>
            <table class="table table-secondary">
                <tr>
                    <?php $a = 0;
                    foreach ($albums as $alb) : ?>
                    
                        <?php if ($a % 3 == 0) : ?>
                </tr>
                <tr>
                <?php endif; ?>
                <td><img id="<?php echo $alb->id ?>" src="<?php echo $alb->thumbnail ?>" style="object-fit:COVER; height:220px;" class="oof img-fluid img-thumbnail" alt="fail">
                    <h4>
                        <p class="<?php echo $alb->id ?>" id="<?php echo $alb->id ?>t" style="align:center"><?php echo $alb->name ?></p>
                    </h4>
                    <?php $a = $a + 1 ?>
                </td>

            <?php endforeach; ?>
                </tr>
                </tr>
            </table>
            <p class='dummy'></p>
        </div>
    </div>

<script src="../../public/js/home.js" type="text/javascript"></script>
<?php require 'partials/footer.php'; ?>

