<title>Add Category</title>
<div class="box round first grid">
    <h2>Add Category</h2>
    <div class="block copyblock"> 
     <form action="process_insert" method="POST">
        <table class="form">
            <span style="color: <?php if(isset($data['color'])) echo $data['color'] ?> ">
                <?php if(isset($data['alert'])) echo $data['alert'] ?>
            </span>
            <tr><td><input type="text" name="category_name" placeholder="Enter category name..." class="medium"/></td></tr>
            <tr><td><input type="submit" name="submit" Value="Save" /></td></tr>
        </table>
    </form>
</div>
</div>