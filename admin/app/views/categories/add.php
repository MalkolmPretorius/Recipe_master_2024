<div class="page-header">
    <h1>AJOUT D'UNE CATÉGORIE</h1>
</div>
<form action="categories/create" method="post">
    <div style="display:flex; flex-direction:column; margin:0px 5px 0px 5px;">
        <label for="test">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" />
        <label>Description</label>
        <textarea name="description"  cols="30" rows="10"></textarea>
    </div>
    <div  style="margin:5px;">
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>