<?php
require_once("../includes/initialize.php");

// the current page number //
$page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;

// records per page //
$per_page = 3;

// total record count //
$total_count = Photograph::count_all();

// find all photos
// use pagination instead
$pagination = new Pagination($page, $per_page, $total_count);

// instead of finding all records, just find the records for this page//
$sql = "SELECT * FROM photographs ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$photos = Photograph::find_by_sql($sql);

// need to add ?page=$page to all links to
// maintain the current page
?>
<?php include_layout_template('header.php'); ?>

<?php foreach ($photos as $photo): ?>
    <div style="float: left; margin-left: 20px;">
        <a href="photo.php?id=<?php echo $photo->id; ?>">
            <img src="<?php echo $photo->image_path(); ?>" width="200" alt="image" />
        </a>
        <p><?php echo $photo->caption; ?></p>
    </div>
<?php endforeach; ?>

<div id="pagination" style="clear: both;">
    <?php
    if ($pagination->total_pages() > 1) {

        if ($pagination->has_previous_page()) {
            echo "<a href=\"index.php?page=";
            echo $pagination->previous_page();
            echo "\">&laquo; Previous</a> ";
        }

        for ($i = 1; $i <= $pagination->total_pages(); $i++) {
            if ($i == $page) {
                echo " <span class=\"selected\">{$i}</span> ";
            } else {
                echo " <a href=\"index.php?page={$i}\">{$i}</a> ";
            }
        }

        if ($pagination->has_next_page()) {
            echo " <a href=\"index.php?page=";
            echo $pagination->next_page();
            echo "\">Next &raquo;</a>";
        }
    }
    ?>
</div>
<?php include_layout_template('footer.php'); ?>