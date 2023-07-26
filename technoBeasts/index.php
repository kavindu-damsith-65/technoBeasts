<?php require 'header.php';?>
<div class="page-content">
    <div class="container">
        <div class="row ">
            <div class=" col-sm-12 col-md-6 card boxShadosWithMArgins">
                <div class="text-center">
                    <h3>Add Conpanent <span class="las la-plus"></span></h3>

                </div>
                <div class="card-progress">
                    <div class="card-body">
                        <form id="addComponentForm" method="POST" action="php/addComponent.php">
                            <div class="form-group">
                                <label for="username">Component Id:</label>
                                <input type="text" class="form-control" id="username" name="compid" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Component Name:</label>
                                <input type="text" class="form-control" id="username" name="compname" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add Component</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="analytics" id="loadComps">

    </div>




</div>

</main>

</div>
<?php require 'footer.php';?>
<script>
$(document).ready(function() {
    loadData();
    $('.checkbox').change(function() {
      var checkedCheckboxes = $('input.checkbox:checked');
      var values = [];
  
      checkedCheckboxes.each(function() {
        values.push($(this).val());
      });
  
      console.log('Changed checkboxes:');
      checkedCheckboxes.each(function() {
        console.log($(this).attr('id'));
      });
  
      console.log('Changed checkbox values:', values);
    });

})
</script>