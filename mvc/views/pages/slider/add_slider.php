<title>Add Slider</title>
<div class="box round first grid">
    <h2>Add Slider</h2>
    <div class="block copyblock"> 
        <form action="process_insert" method="POST" enctype="multipart/form-data">
            <table class="form">
                <span style="color: <?php if(isset($data['color'])) echo $data['color'] ?> ">
                    <?php if(isset($data['alert'])) echo $data['alert'] ?>
                </span>
                <tr><td><input type="text" name="slider_name" placeholder="Enter slider name..." class="medium" /></td></tr>
                <tr><td><input type="file" name="product_image"/></td></tr>
                <tr><td>
                    <select name="slider_status">
                        <option value="1">On</option>
                        <option value="0">Off</option>
                    </select>
                </td></tr>
                <tr><td><input type="submit" name="submit" Value="Save" /></td></tr>
            </table>
        </form>
    </div>
</div>