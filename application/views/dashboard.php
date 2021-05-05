<?php include_once('template/sidebar.php')?>
<body  >
    <div  class="container" >
      <div style=" text-align:center">
    <div class="container-fluid">
    <div class=" justify-content-md-center">
              <a class="navbar-brand" >Welcome, <?php echo $userData->firstname.' '.$userData->lastname;?></a>
          </div>
        <ul class="nav nav-tabs justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="#profile" data-toggle="tab">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#post" data-toggle="tab">Post</a>
  </li>
</ul>
     <div class="tab-content">
     <div class="tab-pane active" id="profile" role="tabpanel" role="tab">
        <div class="container bg-white">
            <div class="row">
                <div class="col-md-4 text-center">
                <img src="<?php echo ($userData->picture == '' ? base_url().'assets/img/no_image.png' : $userData->picture );?>" class="img-thumbnail bg-primary rounded-circle" height="200" width ="200">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="firstname">Firstname:</label>
                        <h4><?php echo $userData->firstname;?></h4>
                    </div>
                    <div class="form-group">
                       <label for="firstname">Lastname:</label>
                        <h4><?php echo $userData->lastname;?></h4>
                    </div>
                    <div class="form-group">
                        <label for="firstname">Username:</label>
                        <h4><?php echo $userData->username;?></h4>
                    </div>
                    <div class="form-group">
                       <label for="firstname">Email:</label>
                        <h4><?php echo $userData->email;?></h4>
                    </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                        <label for="firstname">Contact:</label>
                        <h4><?php echo ($userData->contact =='' ? 'Not mentioned':$userData->contact);?></h4>
                    </div>
                    <div class="form-group">
                       <label for="firstname">Gender:</label>
                        <h4><?php echo ($userData->gender =='' ? 'Not mentioned':$userData->gender);?></h4>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
         <div class="tab-pane" id="post" role="tabpanel" role="tab">
        <h1 class="jumbotron bg-secondary text-white">Hello, <?=$userData->username?>. Thank you for logging in :)</h1>
    </div>
        </div>
        
        </div>
    </div>

    </div>