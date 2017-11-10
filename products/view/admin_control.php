<form action="../controller/basket.php?pageid=newproduct" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="primarykey" class="form-control" id="primarykey">
              <div class="form-group">
                      <label for="pname">Product name:</label>
                      <input type="text" name="pname" class="form-control" id="pname" placeholder="Product name">
              </div>
              <div class="form-group">
                      <label for="brand">Brand:</label>
                      <input type="text" name="brand" class="form-control" id="brand" placeholder="Brand">
              </div>
              <div class="form-group">
                      <label for="m_del">Model:</label>
                      <input type="text" name="m_del" class="form-control" id="m_del" placeholder="Model">
              </div>
              <div class="form-group">
                      <label for="m_del">Quantity:</label>
                      <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
              </div>
               <div class="form-group">
                      <label for="price">Price:</label>
                      <input type="text" name="price" class="form-control" id="price" placeholder="Price">
              </div>
              <div class="form-group">
                      <label for="price">Description:</label>
                      <input type="text" name="description" class="form-control" id="description" placeholder="Description">
              </div>
              <div class="form-group">
                      <label for="image">Image:</label>
                      <input type="file" name="filetoupload" id="filetoupload" accept="image/png, image/gif, image/jpeg"><br/>
              </div>
                      <p><input type="submit" name="updatedetails" value="Add Details" /></p>
                      
            </form>