<form action="" method="post" role="form" data-toggle="validator">
  <div class="form-group">
    <div class="col-sm-6">
      <label for="pm-product-style">Product Style</label>
      <input type="text" class="form-control pm-form-input" id="pm-product-style" name="pm-product-style" value="<?php echo get_the_title(); ?>" readonly required>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-6">
      <label for="pm-product-finish">Product Finish*</label>
      <input type="text" class="form-control pm-form-input" id="pm-product-finish" name="pm-product-finish" readonly required>
      <div class="help-block with-errors"></div>
    </div>  
  </div>

  <div class="form-group">
    <div class="col-sm-6">
      <label for="pm-customer-name">Name*</label>
      <input type="text" class="form-control pm-form-input" id="pm-customer-name" name="pm-customer-name" required>
      <div class="help-block with-errors"></div>
    </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <label for="pm-customer-email">Email*</label>
        <input type="email" class="form-control pm-form-input" id="pm-customer-email" name="pm-customer-email" required>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <input class="btn btn-primary" type="submit" value="Submit" name="pm-submit-product" id="pm-submit-product"></input>
      </div>
    </div>
    <input type="hidden" value="" id="product_variation_id" name="product_variation_id">
</div>
</form>