<div class="box round first grid">
    <h2>Add New Product</h2>
    <div class="block">               
       <form action="" method="post" enctype="multipart/form-data">
        <table class="form">
            <tr>
                <td>
                    <label>Name</label>
                </td>
                <td>
                    <input type="text" placeholder="Enter Product Name..." class="medium" />
                </td>
            </tr>
            <tr>
                <td><label>Category</label></td>
                <td>
                    <select id="select" name="select">
                        <option>Select Category</option>
                        <?php foreach ($data['category'] as $row) { ?> 
                            <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Brand</label></td>
                <td>
                    <select id="select" name="select">
                        <option>Select Brand</option>
                         <?php foreach ($data['brand'] as $row) { ?> 
                            <option value="<?= $row['brand_id'] ?>"><?= $row['brand_name'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top; padding-top: 9px;">
                    <label>Description</label>
                </td>
                <td>
                    <textarea class="tinymce"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Price</label>
                </td>
                <td>
                    <input type="text" placeholder="Enter Price..." class="medium" />
                </td>
            </tr>
            
            <tr>
                <td>
                    <label>Upload Image</label>
                </td>
                <td>
                    <input type="file" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>Product Type</label>
                </td>
                <td>
                    <select id="select" name="select">
                        <option>Select Type</option>
                        <option value="1">Featured</option>
                        <option value="2">Non-Featured</option>
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

