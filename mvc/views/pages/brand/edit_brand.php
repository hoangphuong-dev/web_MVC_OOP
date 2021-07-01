<?php 
require_once 'mvc/core/Process_link.php';
if(!empty($data['brand'])) {
    $row = $data['brand']->fetch_array();
}
?>
<title>Edit Brand</title>
<div class="box round first grid">
    <h2>Edit Brand</h2>
    <div class="block copyblock"> 
       <form action="<?= $link ?>Brand/process_edit" method="POST">
        <table class="form">
            <span style="color: <?php if(isset($data['color'])) echo $data['color'] ?> ">
                <?php if(isset($data['alert'])) echo $data['alert'] ?>
            </span>
            <input type="hidden" name="brand_id" 
            value="
            <?php if(isset($data['brand_id'])) echo $data['brand_id'] ?>
            <?php if(isset($row)) echo $row['brand_id']?>
            ">
            <tr><td><input type="text" 
                name="brand_name" 
                placeholder="Enter brand name..." 
                class="medium"
                value="<?php if(isset($row)) echo $row['brand_name']?>"/></td></tr>
                <tr><td><input type="submit" name="submit" Value="Save" /></td></tr>
            </table>
        </form>
    </div>
</div>