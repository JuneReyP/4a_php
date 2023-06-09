<?php
$blog_page = true;
include 'conn.php';
include 'navbar.php';

if(!isset($_SESSION['logged_in'])){
    header('Location: index.php');
}

//insert to database
if (isset($_POST['post'])) {
    //get the data to the form
    $user = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    //inserting data to your table postings
    $insert = $conn->prepare("INSERT INTO postings(post_title, post_content, u_id) VALUES (?, ?, ?)");
    //data binding
    $insert->execute([$title, $content, $user]);

    echo "<script>alert('Posting Success!')</script>";
}

//update the data
if (isset($_POST['update_post'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    //updating the Table
    $update = $conn->prepare("UPDATE postings set post_title = ?, post_content = ? WHERE post_id = ?");
    // data binding
    $update->execute([
        $title,
        $content,
        $id
    ]);

    echo "<script>alert('Posting Successfully Updated!')</script>";
}


//delete data
if (isset($_GET['delete'])) {
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM postings WHERE post_id = ?");
    //bind
    $delete->execute([$id]);

    echo "<script>alert('Posting Deleted!')</script>";
}
//var_dump($_SESSION['user_id']);
?>
<div class="container">
    <div class="row">
        <?php
        if (isset($_GET['update'])) { ?>
            <!-- update form start -->
            <div class="col-3 shadow p-4 mt-3">
                <?php
                $id = $_GET['id'];

                $fetch = $conn->prepare("SELECT * FROM postings WHERE post_id = ?");
                $fetch->execute([$id]);
                foreach ($fetch as $data) { ?>
                    <form method="POST" action="blogs.php" class="row g-3 needs-validation">
                        <input type="hidden" name="id" value="<?= $data['post_id']; ?>">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Post Title</label>
                            <input type="text" class="form-control" id="validationCustom01" name="title" value="<?= $data['post_title']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="validationCustom02"><?= $data['post_content']; ?></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-warning" name="update_post">Update Posting</button>
                            <a href="blogs.php" class="btn btn-danger text-decoration-none">Cancel</a>
                        </div>
                    </form>
                <?php  } ?>
            </div>
            <!-- update form end -->
        <?php  } else { ?>
            <!-- insert form start -->
            <div class="col-3 p-4 mt-3">
                <form method="POST" action="blogs.php" class="row g-3 needs-validation shadow p-4">
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>">
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Post Title</label>
                        <input type="text" class="form-control" id="validationCustom01" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Content</label>
                        <textarea class="form-control" name="content" id="validationCustom02" required></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" name="post">Create Posting</button>
                    </div>
                </form>
            </div>
            <!-- insert form end -->
        <?php    } ?>

        <!-- table for viewing start -->
        <div class="col mt-3 shadow ms-4">
            <table class="table">
                <tr>
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </thead>
                </tr>
                <tbody>
                    <?php
                    $count = 1;
                    $id = $_SESSION['user_id'];
                    $rows = $conn->prepare("SELECT * FROM postings WHERE u_id = ?");
                    $rows->execute([$id]);
                    foreach ($rows as $row) { ?>
                        <tr>
                            <td><?= $count++; ?></td>
                            <td><?php echo $row['post_title']; ?></td>
                            <td><?php echo $row['post_content']; ?></td>
                            <td>
                                <a href="blogs.php?update&id=<?= $row['post_id']; ?>" class="text-decoration-none">✏</a>
                                <a href="blogs.php?delete&id=<?= $row['post_id']; ?>" class="text-decoration-none">❌</a>
                            </td>
                        </tr>
                    <?php   } ?>
                </tbody>

            </table>
        </div>
        <!-- table for viewing end -->
    </div>
</div>
</body>

</html>