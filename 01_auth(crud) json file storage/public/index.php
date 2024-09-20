<?php
include_once  __DIR__ . '/../src/bootstrap.php';
auth();
view('header', ['title' => 'Home']);


?>
<?php
if (is_admin()):
?>
<h1>hello in index go to <a href="products_index.php">products</a></h1>
    <?php
endif;
    ?>
    <form action="logout.php" >
        <button class="btn btn-danger">Logout</button>
    </form>

<?php
view('footer');
