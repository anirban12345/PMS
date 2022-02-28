<!-- page content -->
<div class="right_col" role="main">
            <h4 class="x_title">Process</h4>
            <div class="row">
            <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-info  text-white">
                  <div class="icon text-white"><i class="fa fa-archive"></i></div>
                  <div class="count text-white"><?=$process[0]->noofrec?></div>
                  <h3 class="text-white">No Of Process</h3>                
                </div>
              </div>

              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-success  text-white">
                  <div class="icon text-white"><i class="fa fa-files-o"></i></div>
                  <div class="count text-white"><?=$process_image[0]->noofrec?></div>
                  <h3 class="text-white">Uploaded Files</h3>                
                </div>
              </div>
          </div>
          <h4 class="x_title">Requisition</h4>
          <div class="row">
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-info  text-white">
                  <div class="icon text-white"><i class="fa fa-cogs"></i></div>
                  <div class="count text-white"><?=$items[0]->noofrec?></div>
                  <h3 class="text-white">Total Items</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-success  text-white">
                  <div class="icon text-white"><i class="fa fa-files-o"></i></div>
                  <div class="count text-white"><?=$requisition_file[0]->noofrec?></div>
                  <h3 class="text-white">Uploaded Files</h3>                
                </div>
              </div>
          </div>
          <div class="row">
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-primary  text-white">
                  <div class="icon text-white"><i class="fa fa-paper-plane"></i></div>
                  <div class="count text-white"><?=$requisition[0]->noofrec?></div>
                  <h3 class="text-white">No Of Requisition</h3>                
                </div>
              </div>

              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-danger  text-white">
                  <div class="icon text-white"><i class="fa fa-archive"></i></div>
                  <div class="count text-white"><?=count($pending)?></div>
                  <h3 class="text-white">Pending</h3>                
                </div>
              </div>

              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-danger  text-white">
                  <div class="icon text-white"><i class="fa fa-archive"></i></div>
                  <div class="count text-white"><?=count($pending_rem)?></div>
                  <h3 class="text-white">Pending(Reminder)</h3>                
                </div>
              </div>

              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-info  text-white">
                  <div class="icon text-white"><i class="fa fa-outdent"></i></div>
                  <div class="count text-white"><?=count($received)?></div>
                  <h3 class="text-white">Received</h3>                
                </div>
              </div>

              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-success  text-white">
                  <div class="icon text-white"><i class="fa fa-check"></i></div>
                  <div class="count text-white"><?=count($partial)?></div>
                  <h3 class="text-white">Partly Received</h3>                
                </div>
              </div>

              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-warning  text-white">
                  <div class="icon text-white"><i class="fa fa-times"></i></div>
                  <div class="count text-white"><?=count($rejected)?></div>
                  <h3 class="text-white">Rejected</h3>                
                </div>
              </div>

              
            </div>


            <h4 class="x_title">Requisition 2018</h4>
            <div class="row">
            
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-primary  text-white">
                  <div class="icon text-white"><i class="fa fa-paper-plane"></i></div>
                  <div class="count text-white"><?=count($requ18)?></div>
                  <h3 class="text-white">Total</h3>                
                </div>
              </div>

              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-danger  text-white">
                  <div class="icon text-white"><i class="fa fa-archive"></i></div>
                  <div class="count text-white"><?=count($pending18)?></div>
                  <h3 class="text-white">Pending</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-danger  text-white">
                  <div class="icon text-white"><i class="fa fa-archive"></i></div>
                  <div class="count text-white"><?=count($pending_rem18)?></div>
                  <h3 class="text-white">Pending(Reminder)</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-info  text-white">
                  <div class="icon text-white"><i class="fa fa-outdent"></i></div>
                  <div class="count text-white"><?=count($received18)?></div>
                  <h3 class="text-white">Received</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-success  text-white">
                  <div class="icon text-white"><i class="fa fa-check"></i></div>
                  <div class="count text-white"><?=count($partial18)?></div>
                  <h3 class="text-white">Partly Received</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-warning  text-white">
                  <div class="icon text-white"><i class="fa fa-times"></i></div>
                  <div class="count text-white"><?=count($rejected18)?></div>
                  <h3 class="text-white">Rejected</h3>                
                </div>
              </div>

            </div>  

            <h4 class="x_title">Requisition 2019</h4>
            <div class="row">
            <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-primary  text-white">
                  <div class="icon text-white"><i class="fa fa-paper-plane"></i></div>
                  <div class="count text-white"><?=count($requ19)?></div>
                  <h3 class="text-white">Total</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-danger  text-white">
                  <div class="icon text-white"><i class="fa fa-archive"></i></div>
                  <div class="count text-white"><?=count($pending19)?></div>
                  <h3 class="text-white">Pending</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-danger  text-white">
                  <div class="icon text-white"><i class="fa fa-archive"></i></div>
                  <div class="count text-white"><?=count($pending_rem19)?></div>
                  <h3 class="text-white">Pending(Reminder)</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-info  text-white">
                  <div class="icon text-white"><i class="fa fa-outdent"></i></div>
                  <div class="count text-white"><?=count($received19)?></div>
                  <h3 class="text-white">Received</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-success  text-white">
                  <div class="icon text-white"><i class="fa fa-check"></i></div>
                  <div class="count text-white"><?=count($partial19)?></div>
                  <h3 class="text-white">Partly Received</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-warning  text-white">
                  <div class="icon text-white"><i class="fa fa-times"></i></div>
                  <div class="count text-white"><?=count($rejected19)?></div>
                  <h3 class="text-white">Rejected</h3>                
                </div>
              </div>
            </div>  
            <h4 class="x_title">Requisition 2020</h4>
            <div class="row">
            <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-primary  text-white">
                  <div class="icon text-white"><i class="fa fa-paper-plane"></i></div>
                  <div class="count text-white"><?=count($requ20)?></div>
                  <h3 class="text-white">Total</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-danger  text-white">
                  <div class="icon text-white"><i class="fa fa-archive"></i></div>
                  <div class="count text-white"><?=count($pending20)?></div>
                  <h3 class="text-white">Pending</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-danger  text-white">
                  <div class="icon text-white"><i class="fa fa-archive"></i></div>
                  <div class="count text-white"><?=count($pending_rem20)?></div>
                  <h3 class="text-white">Pending(Reminder)</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-info  text-white">
                  <div class="icon text-white"><i class="fa fa-outdent"></i></div>
                  <div class="count text-white"><?=count($received20)?></div>
                  <h3 class="text-white">Received</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-success  text-white">
                  <div class="icon text-white"><i class="fa fa-check"></i></div>
                  <div class="count text-white"><?=count($partial20)?></div>
                  <h3 class="text-white">Partly Received</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-warning  text-white">
                  <div class="icon text-white"><i class="fa fa-times"></i></div>
                  <div class="count text-white"><?=count($rejected20)?></div>
                  <h3 class="text-white">Rejected</h3>                
                </div>
              </div>

            </div>  

            <h4 class="x_title">Requisition 2021</h4>
            <div class="row">
            <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-primary  text-white">
                  <div class="icon text-white"><i class="fa fa-paper-plane"></i></div>
                  <div class="count text-white"><?=count($requ21)?></div>
                  <h3 class="text-white">Total</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-danger  text-white">
                  <div class="icon text-white"><i class="fa fa-archive"></i></div>
                  <div class="count text-white"><?=count($pending21)?></div>
                  <h3 class="text-white">Pending</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-danger  text-white">
                  <div class="icon text-white"><i class="fa fa-archive"></i></div>
                  <div class="count text-white"><?=count($pending_rem21)?></div>
                  <h3 class="text-white">Pending(Reminder)</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-info  text-white">
                  <div class="icon text-white"><i class="fa fa-outdent"></i></div>
                  <div class="count text-white"><?=count($received21)?></div>
                  <h3 class="text-white">Received</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-success  text-white">
                  <div class="icon text-white"><i class="fa fa-check"></i></div>
                  <div class="count text-white"><?=count($partial21)?></div>
                  <h3 class="text-white">Partly Received</h3>                
                </div>
              </div>
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-warning  text-white">
                  <div class="icon text-white"><i class="fa fa-times"></i></div>
                  <div class="count text-white"><?=count($rejected21)?></div>
                  <h3 class="text-white">Rejected</h3>                
                </div>
              </div>

            </div> 

            <?php if(in_array('createusers',$user_permission)){ ?>
            <h4 class="x_title">Users</h4>
            <div class="row">              
              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-warning  text-white">
                  <div class="icon text-white"><i class="fa fa-user"></i></div>
                  <div class="count text-white"><?=$user[0]->noofrec?></div>
                  <h3 class="text-white">No Of Users</h3>                
                </div>
              </div>

              <div class="animated col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats  bg-primary  text-white">
                  <div class="icon text-white"><i class="fa fa-users"></i></div>
                  <div class="count text-white"><?=$group[0]->noofrec?></div>
                  <h3 class="text-white">No Of Groups</h3>                
                </div>
              </div>             
        </div>
        <?php } ?> 
</div>