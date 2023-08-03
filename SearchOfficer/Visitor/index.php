<div class="panel panel-default" id="">
    <div class="panel-heading" id="panel">
      <div class="media">
        <div class="media-left">
          <img src="/images/documents-icon.png" class="media-object" style="width:60px">
        </div>
        <div class="media-body">
          <h3>List of Visitor</h3>
        </div>
      </div>
    </div>

<div class="panel-body">
  <div class="row">
    <div class="col-sm-12">
          <div class="col-sm-2 pull-right">
            <a onclick="showAddVisitor()" name="btnsubmit" class="btn btn-primary btn-block" >
                <span class="glyphicon glyphicon-plus"></span>
                  Add
              </a>
          </div>
          
      </div>
  </div>
  <legend style="font-weight: 900; color: #5050FF">Search</legend>
  <div class="row">
    <div class="col-sm-12">
          <div class="col-sm-4">
          <div class="form-group">
              <label for="lname">Family Name:</label>
              <input type="text" class="form-control" id="lname" name="lname" >
            </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
              <label for="fname">First Name:</label>
              <input type="text" class="form-control" id="fname" name="fname"  >
            </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="mname">Middle Name:</label>
            <input type="text" class="form-control" id="mname" name="mname"  >
            </div>
        </div>
      </div>
      
      <div class="container-fluid text-center">
        <div class="form-group">
            <button type="submit" name="btnsubmit" class="btn btn-success btn-lg" style="width: 25%;">
              <span class="glyphicon glyphicon-search"></span>
                Search
            </button>
        </div>
      </div>
  </div>
</div>
</div>