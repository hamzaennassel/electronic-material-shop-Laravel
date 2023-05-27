<h1>Create new produit</h1>
<form action="{{route('produit.store')}}" method="Post" enctype="multipart/form-data">
    @csrf
<input type="text" name="ref" required placeholder="entrer ref"><br><br>
<label for="category-select">Choisir une catégorie :</label><br><br>
<select id="category-select" name="categorie">
  <option value="laptops">Laptops</option>
  <option value="smartphones">Smartphones</option>
  <option value="accessories">Accessoires</option>
  <option value="cameras">Caméras</option>
</select><br><br>
<input type="text" name="titre" required placeholder="entrer nom"><br><br>
<textarea name="description" required placeholder="entrer description"></textarea><br><br>
<input type="file" name="photo" required><br><br>
<input type="text" name="prix" required  placeholder="entrer prix"><br><br>
<input type="text" name="stock" required placeholder="entrer stock"><br><br>
<input type="submit" value="create produit">

</form>
