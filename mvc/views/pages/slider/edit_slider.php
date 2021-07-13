<?php 
$row = $data['slider']->fetch_array();
$path = $link."public/upload/";
?>
<title>Edit Slider</title>
<div class="box round first grid">
    <h2>Edit Slider</h2>
    <div class="block copyblock"> 
        <form action="<?= $link?>Slider/process_edit" method="POST" enctype="multipart/form-data">
            <table class="form">
                <span style="color: <?php if(isset($data['color'])) echo $data['color'] ?> ">
                    <?php if(isset($data['alert'])) echo $data['alert'] ?>
                </span>
                <tr><td>
                    <input type="hidden" name="slider_id" value="<?= $row['slider_id'] ?> " class="medium" />
                    <input type="text" name="slider_name" value="<?= $row['slider_name'] ?> " class="medium" />
                </td></tr>
                <tr><td>
                    Image Old : <br>
                    <img width="300" height="150" src="<?= $path.$row['slider_image'] ?>" alt="">
                </td></tr>
                <tr><td>
                 Or choose Image another : <br>
                 <input type="file" name="product_image"/>
             </td></tr>
             <tr><td>
                <select name="slider_status">
                    <option <?php if($row['slider_status'] == 1) echo "selected" ?> value="1">On</option>
                    <option <?php if($row['slider_status'] == 0) echo "selected" ?> value="0">Off</option>
                </select>
            </td></tr>
            <tr><td><input type="submit" name="submit" Value="Save" /></td></tr>
        </table>
    </form>
</div>
</div>