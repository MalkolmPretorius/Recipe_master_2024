<div class="page-header">
    <h1>AJOUT D'UN USERS</h1>
</div>
<form action="users/create"  enctype="multipart/form-data" method="post">
    <div style="display:flex; flex-direction:column; margin:0px 5px 0px 5px;">
    <input type="hidden" name="id" />
        <label for="test">Picture</label>
        <input type="file" id="name"  name="picture" placeholder="Picture" />
        <label for="test">Name</label>
        <input type="text" id="name"  name="name" placeholder="Name" />
        <label for="test">Password</label>
        <input type="password" id="name"  name="password" placeholder="password" />
        <label for="test">Email</label>
        <input type="text" id="name "  name="email" placeholder="Email" />
        <label>Biography</label>
        <textarea name="biography"  cols="30" rows="10"></textarea>
    </div>
    <div style="margin:5px;">
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>