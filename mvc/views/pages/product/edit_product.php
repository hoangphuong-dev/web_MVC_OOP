<?php 
require_once 'mvc/core/Process_link.php';
if(!empty($data['product'])) {
    $row = $data['product']->fetch_array();
}
?>
<title>Edit Product</title>
<div class="box round first grid">
    <h2>Edit Product</h2>
    <div class="block">               
     <form action="<?= $link ?>Product/process_edit" method="post" enctype="multipart/form-data">
        <table class="form">
          <span style="color: <?php if(isset($data['color'])) echo $data['color'] ?> ">
            <?php if(isset($data['alert'])) echo $data['alert'] ?>
        </span>
        <tr>
            <td><label>Name</label></td>
            <td>
                <input value="<?= $row['product_name']?>" name="product_name" type="text" placeholder="Enter Product Name..." class="medium" />
                <input value="<?= $row['product_id']?>" name="product_id" type="text" />
            </td>
        </tr>
        <tr>
            <td><label>Category</label></td>
            <td>
                <select id="select" name="category_id">
                    <option value="9">Select Category</option>
                    
                    <?php foreach ($data['category'] as $each) { ?> 
                        <option <?php if($row['category_id'] == $each['category_id']) echo "selected" ?> value="<?= $each['category_id'] ?>">
                            <?= $each['category_name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Brand</label></td>
            <td>
                <select id="select" name="brand_id">
                    <option>Select Brand</option>
                    <?php foreach ($data['brand'] as $each) { ?> 
                        <option <?php if($row['brand_id'] == $each['brand_id']) echo "selected" ?> value="<?= $each['brand_id'] ?>">
                            <?= $each['brand_name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td style="vertical-align: top; padding-top: 9px;">
                <label>Description</label>
            </td>
            <td>
                <textarea name="product_desc" class="tinymce"><?= $row['product_desc']?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label>Price</label>
            </td>
            <td>
                <input value="<?= $row['product_price']?>" name="product_price" type="text" placeholder="Enter Price..." class="medium" />
            </td>
        </tr>
        
        <tr>
            <td>
                <label>Old Image</label>
            </td>
            <td>
                <img height="100px" src="<?= $link?>public/upload/<?=$row['product_image'] ?>"> 
            </td>
        </tr>
        <tr>
            <td>
                <label>Or Upload Image</label>
            </td>
            <td>
                <input type="file" name="product_image" />
            </td>
        </tr>

        <tr>
            <td>
                <label>Product Type</label>
            </td>
            <td>
                <select id="select" name="product_type">
                    <option>Select Type</option>
                    <option selected value="4">Featured</option>
                    <option value="5">Non-Featured</option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Save" />
            </td>
        </tr>
    </table>
</form>
</div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->

