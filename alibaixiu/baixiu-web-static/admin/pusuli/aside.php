<div class="aside">
    <div class="profile">
        <!-- <img class="avatar" src="../uploads/avatar.jpg"> -->
        <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
        <li class="<?php echo $current_page == "index" ? "active" : "" ?>">

            <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
        </li>
        <li>


            <?php
            // echo $current_page;
            $passArr = ["posts", "post-add", "categories"];
            $bool = in_array($current_page, $passArr);

            ?>


            <a href="#menu-posts" class="<?php echo $bool ? "" : "collapsed" ?>" data-toggle="collapse" aria-expanded="<?php echo $bool ? "true" : "false" ?> ">
                <i class=" fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
            </a>
            <ul id="menu-posts" class="collapse <?php echo $bool ? "in" : "" ?>" aria-expanded="<?php echo $bool ? "true" : "false" ?>">
                <li class="<?php echo $current_page == "posts" ? "active" : "" ?>"><a href=" posts.php">所有文章</a>
                </li>
                <li class="<?php echo $current_page == "post-add" ? "active" : "" ?>"><a href="post-add.php">写文章</a></li>
                <li class="<?php echo $current_page == "categories" ? "active" : "" ?>"><a href="categories.php">分类目录</a></li>
            </ul>
        </li>
        <li>
            <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
        </li>
        <li>
            <a href="users.php"><i class="fa fa-users"></i>用户</a>
        </li>
        <li>

            <?php
            // echo $current_page;
            $passArr = ["nav-menus", "slides", "settings"];
            $bool = in_array($current_page, $passArr);

            ?>
            <a href="#menu-settings" class="<?php echo $bool ? "" : "collapsed" ?>" data-toggle="collapse" aria-expanded="<?php echo $bool ? "true" : "false" ?> ">
                <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
            </a>
            <ul id="menu-settings" class="collapse <?php echo $bool ? "in" : "" ?>" aria-expanded="<?php echo $bool ? "true" : "false" ?>">
                <li class="<?php echo $current_page == "nav-menus" ? "active" : "" ?>"><a href="nav-menus.php">导航菜单</a></li>
                <li class="<?php echo $current_page == "slides" ? "active" : "" ?>"><a href="slides.php">图片轮播</a></li>
                <li class="<?php echo $current_page == "settings" ? "active" : "" ?>"><a href="settings.php">网站设置</a></li>
            </ul>
        </li>
    </ul>
</div>
<script src="../assets/vendors/jquery/jquery.min.js"></script>
<script>
    $(function() {
        // $.ajax({
        //     type: "post",
        //     url: "api/_userLogin.php",
        //     success: function(res) {
        //         console.log(res);

        //     }
        // })

        var avatar = localStorage.getItem("avatar");
        var nickname = localStorage.getItem("nickname");

        $(".profile img").attr("src", avatar);
        $(".profile h3").text(nickname);
    })
</script>