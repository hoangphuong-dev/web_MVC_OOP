<?php 
require_once 'mvc/core/Process_link.php';
if(!empty($data['category'])) {
    $row = $data['category']->fetch_array();
}
?>
<title>Edit Category</title>
<div class="box round first grid">
    <h2>Edit Category</h2>
    <div class="block copyblock"> 
       <form action="<?= $link ?>Category/process_edit" method="POST">
        <table class="form">
            <span style="color: <?php if(isset($data['color'])) echo $data['color'] ?> ">
                <?php if(isset($data['alert'])) echo $data['alert'] ?>
            </span>
            <input type="hidden" name="category_id" value="
            <?php if(isset($data['category_id'])) echo $data['category_id'] ?>
            <?php if(isset($row['category_id'])) echo $row['category_id']?>">
            <tr><td><input type="text" 
                name="category_name" 
                placeholder="Enter category name..." 
                class="medium"
                value="<?php if(isset($row)) echo $row['category_name']?>"/></td></tr>
                <tr><td><input type="submit" name="submit" Value="Save" /></td></tr>
            </table>
        </form>
    </div>
</div>