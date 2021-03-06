<?php require_once("common.php"); ?>
<div class="row">

    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">

        </ol>

        <div class="page-header">

            <h1>Manage AC
                <small>Brand, Tonnage & Location</small>
            </h1>
        </div>

        <!-- end: PAGE TITLE & BREADCRUMB -->

    </div>

</div>
        <?php
        $qry = $DB->query("SELECT * FROM `" . TAB_AC_MAKE . "` ORDER BY `make`") or die($DB->error);
        $make = '';
        $num_rows_make = $qry->num_rows;
        if ($qry->num_rows > 0) {
            $i = $num_rows_make;
            while ($data = $qry->fetch_array()) {
                $b_id = $data['make_id'];
                $make .= "<li class='list-group-item make_list make_list_$i'>" . $data['make'] . "
                <span style='cursor:pointer' onclick='delete_brand(\"make\",{$b_id},\".make_list_$i\")' class='badge badge-danger'>X</span></li>";
                $i--;
            }
        } else {
            $make .= "<li class='not_found list-group-item list-group-item-info' style='text-align: center;font-style: italic'>
            No Brand Added Yet..</li>";
        }

        $qry = $DB->query("SELECT * FROM `" . TAB_AC_TONNAGE . "`  ORDER BY `tonnage`") or die($DB->error);
        $tonnage = '';
        $num_rows_tonnage = $qry->num_rows;
        if ($qry->num_rows > 0) {
            $i = $num_rows_tonnage;
            while ($info = $qry->fetch_array()) {
                $t_id = $info['tonnage_id'];
                $tonnage .= "<li class='list-group-item ton_list ton_list_$i'>" . $info['tonnage'] . "
                 <span style='cursor:pointer' onclick='delete_brand(\"ton\",{$t_id},\".ton_list_$i\")' class='badge badge-danger'>X</span></li>";
                $i--;
            }
        } else {
            $tonnage .= "<li class='not_found list-group-item list-group-item-info' style='text-align: center;font-style: italic'>
            No Tonnage Added Yet..</li>";
        }

        $qry = $DB->query("SELECT * FROM `" . TAB_AC_LOCATION . "`  ORDER BY `location`") or die($DB->error);
        $location = '';
        $num_rows_location = $qry->num_rows;
        if ($qry->num_rows > 0) {
            $i = $num_rows_location;
            while ($info = $qry->fetch_array()) {
                $l_id = $info['ac_location_id'];
                $location .= "<li class='list-group-item loc_list loc_list_$i'>" . $info['location'] . "
                 <span style='cursor:pointer' onclick='delete_brand(\"location\",{$l_id},\".loc_list_$i\")' class='badge badge-danger'>X</span></li>";
                $i--;
            }
        } else {
            $location .= "<li class='not_found list-group-item list-group-item-info' style='text-align: center;font-style: italic'>
            No Location Added Yet..</li>";
        }

        $qry = $DB->query("SELECT * FROM `" . TAB_REFERRED_BY . "` ORDER BY `name`") or die($DB->error);
        $reference = '';
        $num_rows_reference = $qry->num_rows;
        if ($qry->num_rows > 0) {
            $i = $num_rows_reference;
            while ($info = $qry->fetch_array()) {
                $r_id = $info['referred_id'];
                $reference .= "<li class='list-group-item ref_list ref_list_$i'>" . $info['name'] . "
                 <span style='cursor:pointer' onclick='delete_brand(\"reference\",{$r_id},\".ref_list_$i\")' class='badge badge-danger'>X</span></li>";
                $i--;
            }
        } else {
            $reference .= "<li class='not_found list-group-item list-group-item-info' style='text-align: center;font-style: italic'>
            No Reference Added Yet..</li>";
        }

        $qry = $DB->query("SELECT * FROM `" . TAB_AC_TYPE . "` ORDER BY `ac_type`") or die($DB->error);
        $ac_type = '';
        $num_rows_ac_type = $qry->num_rows;
        if ($qry->num_rows > 0) {
            $i = $num_rows_ac_type;
            while ($info1 = $qry->fetch_array()) {
                $ac_id = $info1['ac_type_id'];
                $ac_type .= "<li class='list-group-item actype_list actype_list_$i '>" . $info1['ac_type'] . "
                <span style='cursor:pointer' onclick='delete_brand(\"ac_type\",{$ac_id},\".actype_list_$i\")' class='badge badge-danger'>X</span></li>";
                $i--;
            }
        } else {
            $ac_type .= "<li class='not_found list-group-item list-group-item-info' style='text-align: center;font-style: italic'>
            No AC Type Added Yet..</li>";
        }
        
        $qry = $DB->query("SELECT * FROM `". TAB_PROBLEM_TYPE ."` ORDER BY `ac_problem_type`") or die($DB->error);
        $problem_type = '';
        $num_rows_problem_type = $qry->num_rows;
        if($qry->num_rows > 0){
            $i = $num_rows_problem_type;
            while($info2 = $qry->fetch_array()){
                $p_id = $info2['ac_problem_id'];
                $problem_type .= "<li class='list-group-item problem_type problem_type_list_$i '>" . $info2['ac_problem_type'] . "
                <span style='cursor:pointer' onclick='delete_brand(\"problem_type\",{$p_id},\".problem_type_list_$i\")' class='badge badge-danger'>X</span></li>";
                $i--;
            }
        } else {
            $problem_type .= "<li class='not_found list-group-item list-group-item-info' style='text-align: center;font-style: italic'>
            No Problem Type Added Yet..</li>";
        }
        
        $qry = $DB->query("SELECT * FROM `". TAB_BRANCH ."` ORDER BY `branch_name`") or die($DB->error);
        $branch = '';
        $num_rows_branch = $qry->num_rows;
        if($qry->num_rows > 0){
            $i = $num_rows_branch;
            while($info2 = $qry->fetch_array()){
                $b_id = $info2['branch_id'];
                $branch .= "<li class='list-group-item branch branch_list_$i '>" . $info2['branch_name'] . "
                <span style='cursor:pointer' onclick='delete_brand(\"branch\",{$p_id},\".branch_list_$i\")' class='badge badge-danger'>X</span></li>";
                $i--;
            }
        } else {
            $branch .= "<li class='not_found list-group-item list-group-item-info' style='text-align: center;font-style: italic'>
            No Branch Added Yet..</li>";
        }

        ?>


<!---  --->

<div class="col-md-10">        
<div class="tabbable">
		<ul id="myTab4" class="nav nav-tabs tab-padding tab-space-3 tab-blue">
            <li class="active">
                <a href="#panel_tab_actype" data-toggle="tab">
                    <i class="pink fa fa-dashboard"></i> AC Type
                </a>
            </li>
            <li class="">
                <a href="#panel_tab_make" data-toggle="tab">
                    <i class="blue fa fa-user"></i> Make
                </a>
            </li>
            <li class="">
                <a href="#panel_tab_tonnage" data-toggle="tab">
                    <i class="fa fa-rocket"></i> Tonnage
                </a>
            </li>
            <li class="">
                <a href="#panel_tab_location" data-toggle="tab">
                    <i class="fa fa-rocket"></i> Location
                </a>
            </li>
            <li class="">
                <a href="#panel_tab_reference" data-toggle="tab">
                    <i class="fa fa-rocket"></i> Reference
                </a>
            </li>
            <li class="">
                <a href="#panel_tab_problemtype" data-toggle="tab">
                    <i class="fa fa-rocket"></i> Problem Type
                </a>
            </li>
            <li class="">
                <a href="#panel_tab_branch" data-toggle="tab">
                    <i class="fa fa-rocket"></i> Branch
                </a>
            </li>            
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="panel_tab_actype">
                <span class="text-danger ac_type_err"></span>
                    <form action="" id="ac_type" method="post">
                        <div class="col-md-5 pull-left" style="padding-bottom: 10px; padding-left: 0px;">
                            <input type="text" name="ac_type" placeholder="AC Type" class="form-control"/></div>
                        <div class="col-md-2 pull-left">
                            <input type="button" class="btn btn-primary" id="add_ac_type" value="ADD"
                                   name="submit"/> 
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <ul class="list-group ac_type_list">
                        <?php echo $ac_type; ?>
                    </ul>    
            </div>
			<div class="tab-pane" id="panel_tab_make">
                <span class="text-danger brand_err"></span>
                    <form action="" id="brand" method="post">
                        <div class="col-md-5 pull-left" style="padding-bottom: 10px; padding-left: 0px;">
                            <input type="text" name="make" placeholder="Make" class="form-control"/></div>
                        <div class="col-md-2 pull-left">
                            <input type="button" class="btn btn-primary" id="add_brand" value="ADD" name="submit"/>
                        </div>
                    </form> 
                    <div class="clearfix"></div>
                    <ul class="list-group brand_list">
                        <?php echo $make; ?>
                    </ul>
            </div>
			<div class="tab-pane" id="panel_tab_tonnage">
                <span class="text-danger tonnage_err"></span>
                <form action="" method="post">
                    <div class="col-md-5 pull-left" style="padding-bottom: 10px; padding-left: 0px;">
                        <input type="text" name="tonnage" placeholder="Tonnage" class="form-control"/>
                    </div>
                    <div class="col-md-2 pull-left">
                        <input type="button" name="submit_t" id="add_ton" value="ADD" class="btn btn-primary"/>
                    </div>
                </form>
                <div class="clearfix"></div>
                <ul class="list-group tonnage_list">
                    <?php echo $tonnage; ?>
                </ul>
            </div>
            
            <div class="tab-pane" id="panel_tab_location">
                <span class="text-danger location_err"></span>
                    <form action="" method="post">
                        <div class="col-md-5 pull-left" style="padding-bottom: 10px; padding-left: 0px;">
                            <input type="text" name="location" class="form-control"/>
                        </div>
                        <div class="col-md-2 pull-left">
                            <input type="button" name="submit_t" id="add_location" value="ADD" class="btn btn-primary"/>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <ul class="list-group location_list">
                        <?php echo $location; ?>
                    </ul>
            </div>
            
            <div class="tab-pane" id="panel_tab_reference">
                <span class="text-danger reference_err"></span>
                    <form action="" method="post">
                        <div class="col-md-5" style="padding-bottom: 10px; padding-left: 0px;">
                            <input type="text" name="reference" class="form-control"/>
                        </div>
                        <div class="col-md-2 pull-left">
                            <input type="button" name="submit_ref" id="add_reference" value="ADD" class="btn btn-primary"/>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <ul class="list-group reference_list">
                        <?php echo $reference; ?>
                    </ul>
            </div>
            <div class="tab-pane" id="panel_tab_problemtype">
                <span class="text-danger problem_type_err"></span>
                    <form action="" method="post">
                        <div class="col-md-5" style="padding-bottom: 10px; padding-left: 0px;">
                            <input type="text" name="problem_type" class="form-control"/>
                        </div>
                        <div class="col-md-2 pull-left">
                            <input type="button" name="problem_t" id="add_problem" value="ADD" class="btn btn-primary"/>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <ul class="list-group problem_type_list">
                        <?php echo $problem_type; ?>
                    </ul>
            </div>
            <div class="tab-pane" id="panel_tab_branch">
                <span class="text-danger branch_err"></span>
                    <form action="" method="post">
                        <div class="col-md-5" style="padding-bottom: 10px; padding-left: 0px;">
                            <input type="text" name="branch" placeholder="Add Branch" class="form-control"/>
                        </div>
                        <div class="col-md-2 pull-left">
                            <input type="button" name="branch_t" id="add_branch" value="ADD" class="btn btn-primary"/>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <ul class="list-group branch_list">
                        <?php echo $branch; ?>
                    </ul>
            </div>
        </div>
</div>
</div>

<!---  --->
<script type="text/javascript" src="assets/js/Brand.js"></script>