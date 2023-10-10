<div class="page-header">
    <h1>MODIFICATION D'UNE CATÉGORIE</h1>
</div>
<form  action="categories/update" method="post">
    <div style="display:flex; flex-direction:column; margin:0px 5px 0px 5px;">
        <input type="hidden" name="id" value="<?= $category['id']?>"/>
        <label for="test">Name</label>
        <input type="text" id="name" value="<?= $category['name'] ?>" name="name" placeholder="Name" />
        <label>Description</label>
        <textarea name="description"  cols="30" rows="10"><?=$category['description']?></textarea>
    </div>
    <div>
        <input style="margin:5px;" type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>