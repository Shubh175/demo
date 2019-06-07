<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
  // echo "<pre>";
  // echo "<pre>";
 //  print_r($this->session->userdata());  
  // print_r($record);

   $dob=$this->session->userdata('dob');

     $new_dob =  explode("/",$dob);
     $age = date("Y") - $new_dob['2'];
  // print_r($this->session->userdata());  
  if(empty($record->Myself)){
      $name=$this->session->userdata('name');
      $image=base_url().'assets/img/default_prof.png';;
   } 
   if(empty($record->Myself->relations)){
      $myself_val=0;
   }else{
      $myself_val=1;
      foreach($record->Myself->relations as $a){
      $name=$a->patient_name;
      $image=$a->image;
      }
   }
   ?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Medicalwale.com">
      <title>Doctor</title>
      <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
      <link href="<?php echo base_url(); ?>assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>assets/fonts/elegant-fonts.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500,700" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" type="text/css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/zabuto_calendar.min.css" type="text/css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/trackpad-scroll-emulator.css" type="text/css">
      <link href="<?php echo base_url(); ?>assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" type="text/css">
   </head>
   <style type="text/css">
      .nav-tabs>li.active>a, .nav-tabs>li>a:hover {
    background: #049341 !important;
}
.scrolling {
    overflow-x: auto;
    white-space: nowrap;
    overflow-y: hidden;
}
.scrolling .scroll-card {
    width: auto;
    min-width: auto;
    text-align: center;
}
select.bs-select-hidden, select.selectpicker {
    display: block !important;
}

.total-amount{
    background: #aaabac;
    font-size: 20px;
    font-weight: 500;
    padding: inherit;
    text-align: center;
}


h4 {
    font-family: 'Rubik', sans-serif;
    color: #000000;
}
.my_self_div1 img {
    width: 80%;
    padding: 5px;
}

.organ_donor_active, .organ_donor_btn:hover {
       background-color: #049341 !important;
    border-radius: 7px;
    margin: auto;
   

    
}

.organ_donor_active h4{
    font-family: 'Rubik', sans-serif;
    color: #fff!important;
    
}

.scrolling .nav-tabs {
    border-bottom: 2px solid #ddd;
}
.main_div {
    margin-bottom: 30px;
    padding: 50px;
    text-align: center;
    background-color: #fff;
}

.scrolling .gallery {
    font-size: 14px;
    padding: 0px;
}
.gallery {
    position: relative;
    width: auto !important;
    overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
    font-size: 0;
    margin: 0;
    padding: 20px 0px;
}
.scrolling {
    overflow-x: auto;
    white-space: nowrap;
    overflow-y: hidden;
}
.scroll-card {
    float: left;
    margin-bottom: -1px;
    position: relative;
    display: block;    padding: 0px;
}
.scroll-card a{
    border: none;
    color: #666;
    -moz-border-radius: 0;
    -webkit-border-radius: 0;
    border-radius: 0;
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
    position: relative;
    display: block;
    padding: 10px 15px;
}
.gallery .active a{
    background: #049341 !important;
    color: #ffffff !important;
}
.gallery a:hover {
    background: #049341 !important;
    color: #ffffff !important;
}


   </style>
   <body class="">
      <div class="page-wrapper">
         <?php $this->load->view('common_file/header'); ?>
         <!--end page-header-->
         <div id="page-content">
            <div class="container" style="margin-top: 80px;">
               <ol class="breadcrumb">
                  <li><a href="#">Book Doctor Appointment</a></li>
                  <li class="active"><i class="fa fa-map-marker"></i> </li>
                  <li class="active">Dr. Giselle Paes</li>
               </ol>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <section class="page-title" style="margin-bottom: 0px;">
                        <div class="pull-left">
                           <h1>Book Appointment</h1>
                        </div>
                     </section>
                     <div class="row">
                        <div class="col-sm-12 col-md-12">
                           <div class="wizard-container">
                              <div class="card wizard-card" data-color="green" id="wizardProfile">
                                 <form action="#" class="form inputs-underline" method="">
                                    <div class="wizard-navigation">
                                       <ul>
                                          <li><a href="#relative" data-toggle="tab">Is this for You or Relative?</a></li>
                                          <li><a href="#appointment" data-toggle="tab">Select Appointment Date</a></li>
                                          <li><a href="#confirmation" data-toggle="tab">Confirmation</a></li>
                                       </ul>
                                    </div>
                                   
                                      <section  id="tree" class="main_div" style="background: url('<?php echo base_url(); ?>assets/img/tree.png');background-position: center;background-repeat: no-repeat;background-size: contain;padding: 20px 20px;padding-bottom: 0px;">

                              

                                 

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    	<center>
                                    	<div class="my_self_div">
                                      <a href="javascript:void(0)" onclick="patient_detail('Myself','<?php echo $user_name=$this->session->userdata('name');?>','<?php echo $age;?>','<?php echo $gender=$this->session->userdata('gender');?>','<?php echo $dob;?>')">

                                        
                                         <div class="my_self_div_self organ_donor_active" style=" width: 15%;" id="Select<?php echo $user_id;?>">
                                       <img src="<?php  if($myself_val>0){ echo $image; }else{   echo $parh=base_url().'assets/img/default_prof.png'; }?>" style="width: 120px;border-radius: 50%;padding: 10px;">

                                       <h4><?php 

                                                        if($myself_val>0){
                                                        if (strlen($name)>15){
                                                           echo  $myname = substr($name, 0, 15).'...';
                                                        }
                                                        else{
                                                         echo  $name;
                                                        }
                                                      }  
                                     

                                       ?></h4>
                                     </div>
                                     </a>
                                 </div>
                                 </center>
                                    </div>


                                    
                              <div class="col-md-12 col-sm-12 col-xs-12 "  style="padding: 0px;">
               <div class="scrolling" style="    margin-bottom: 0px;">
            <div class="gallery">
                               <div  class="nav nav-tabs " role="tablist" >
                                 <? 
                                 $i=0;
                                 foreach($record->data as $val){?>
                                  <?
                                  $group_name=$val->cat_name;
                                  $cat_name = str_replace(' ', '_', $group_name);
                                  ?>

                                 <div role="presentation" class="<?if($val->cat_name=='Children'){echo 'active';}?> scroll-card card" href="#<? echo $cat_name; ?>" aria-controls="Spouse" role="tab" data-toggle="tab">
                                    <a><? $str= $val->cat_name; 
                                                        if (strlen($str)>15){
                                                           echo  $cname = substr($str, 0, 15).'...';
                                                        }
                                                        else{
                                                         echo  $str;
                                                        }
                                      ?>
                                    </a>
                                </div>
                                 <?}?> 
                              </div>
                            </div>
                              </div>
                    </div>
                

                              <div class="tab-content col-md-12 col-xs-12" style="    background: #fff0;">
                              
                                        <?
                                        foreach($record->data as $family)
                                        {
                                           $first_title ='Children';
                                           $group_name=$family->cat_name;
                                           $cat_name = str_replace(' ', '_', $group_name);                  
                                                if($family->cat_name==$first_title)
                                                  {
                                                    $active="active";
                                                  }else{
                                                    $active="";
                                                  }  
                                          ?>
                                      <div role="tabpanel" class="tab-pane <?php echo $active?>" id="<?php echo $cat_name;?>">  <div class="row ">        
                                      <?php  if ( $record->data[$i]->cat_name == $family->cat_name ) 
                                                      {
                                                        foreach($family->relations as $relation){
                                                      
                                        ?>
                                       
                                         
                                        <a href="javascript:void(0)" onclick="patient_detail('<?php echo $relation->relationship;?>','<?php echo $relation->patient_name;?>','<?php echo $relation->patient_age;?>','<?php echo $relation->gender;?>','<?php echo $relation->date_of_birth;?>')">
                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                             <div class="my_self_div1 " id="Select<?php echo $relation->id; ?>">
                                              <img src="<?php  echo base_url();?>assets/img/default_prof.png" >
                                              <? if(!empty($relation->patient_name)){?>
                                              <h4><?
                                              $str=  $relation->patient_name;
                                                   
                                                        if (strlen($str)>15){
                                                           echo  $cname = substr($str, 0, 15).'...';
                                                        }
                                                        else{
                                                         echo  $str;
                                                        }
                                              ?></h4>
                                              <?}else{?>
                                                <h4>Unknown</h4>
                                                <?}?>
                                             </div>
                                          </div>
                                        </a>
                                          <?}} ?>
                                       </div> 
                                 </div>
                                 <? $i++;}?>
                               </div>
                                <section>
                                      <div class="col-md-12 col-xs-12 baby_profile" style="padding:20px; ">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#select_option"><i class="fa fa-plus" style=" float: right; display: inline-block;border-radius: 60px;box-shadow: 0px 0px 2px #888;padding: 0.5em 0.6em; background-color: #049341 !important;color: white;margin-left: 15px; font-size: 30px !important;"aria-hidden="true"></i></a>
                                           <a href="javascript:void(0)" data-toggle="modal" data-target="#select_option" style=" margin-top: 13px !important;"class="arrow_box">Add New Family Member</a>
                                      </div>
                                     </section> 
                           
                        
                   </section>  
                                   
                                    <div class="tab-content">
                                       <div class="tab-pane" id="relative">
                                          <div id="jayesh">
                                             <div class="row">
                                                <div class="col-sm-12">
                                                  
                                                   <div class="col-sm-4">
                                                      <div class="form-group">
                                                         <label for="name">Name</label>
                                                         <input type="text" class="form-control" name="patient_name" id="patient_name" placeholder="Your Name" value="<?php echo $user_name;?>">
                                                      </div>
                                                   </div>
                                                   <div class="col-sm-4">
                                                      <div class="form-group">
                                                         <label for="name" style="width:100%;">Gender</label>                                                   
                                                          <input type="text" class="form-control" name="patient_name" id="patient_radio" placeholder="Your Name" value="<?php echo $gender;?>">
                                                      </div>
                                                   </div>
                                                   <div class="col-sm-4">
                                                      <div class="form-group">
                                                         <label for="dob">Date of Birth</label>
                                                         <input type="text" class="form-control date-picker" name="patient_dob" id="patient_dob" placeholder="" value="<?php echo $dob;?>">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-sm-12">
                                                   <div class="col-sm-4">
                                                      <div class="form-group">
                                                         <label for="name">Relationship</label>
                                                        
                                                          <input type="text" class="form-control" name="patient_dob" id="patient_relationship" placeholder="" value="<?php echo 'myself'; ?>"> 
                                                      </div>
                                                   </div>
                                                   <div class="col-sm-4">
                                                      <div class="form-group">
                                                         <label for="name">Medical Condition</label>
                                                         <select class="form-control selectpicker" name="patient_medical_condition" id="patient_medical_condition" >
                                                            <option value="">Select</option>
                                                            <?php
                                                               foreach ($MedicalConditionList->data as $medical) {
                                                                     	 
                                                               foreach($medical as $a){
                                                               
                                                               if($a->que_id == '2')
                                                                       foreach ($a->sub_que as $Med) {
                                                                        ?>
                                                            <option <?php echo $Med->que_id ?> ><?php echo $Med->question ?></option>
                                                            <?php
                                                               }
                                                               }
                                                                                                 
                                                                                                         }
                                                                                                      ?>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-sm-4">
                                                      <div class="form-group">
                                                         <label for="name">Allergy</label>
                                                         <select class="form-control selectpicker" name="patient_allergy" id="patient_allergy" >
                                                            <option value="">Select</option>
                                                            <?php 
                                                               foreach ($MedicalConditionList->data as $medical) {
                                                                 foreach($medical as $a){
                                                                  if($a->que_id == '81')
                                                                  foreach ($a->sub_que as $Med) {
                                                                   ?>
                                                            <option <?php echo $Med->que_id ?> ><?php echo $Med->question ?></option>
                                                            <?php
                                                               }
                                                               }
                                                               }
                                                               ?>
                                                         </select>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-sm-12">
                                                   <div class="col-sm-4">
                                                      <div class="form-group">
                                                         <label for="name">Hereditary Problems</label>
                                                         <select class="form-control selectpicker" name="patient_hereditary" id="patient_hereditary" >
                                                            <option value="">Select</option>
                                                            <?php 
                                                               foreach ($MedicalConditionList->data as $medical) {
                                                              //  print_r($medical);
                                                                 // foreach($medical as $a){
                                                               if($medical[3]->que_id == '113')
                                                               foreach ($a->sub_que as $Med) { 
                                                                   ?>
                                                            <option <?php echo $Med->que_id ?> ><?php echo $Med->question ?></option>
                                                            <?php
                                                               }
                                                              // }
                                                               }
                                                               ?>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-sm-4">
                                                      <div class="form-group">
                                                         <label for="name">What is Purpose of Appointment?</label>
                                                         <input type="text" class="form-control" name="purpose_of_appointment" id="purpose_of_appointment" placeholder="Purpose of appointment">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane" id="appointment">
                                          <div id="grid_hd" style="overflow-x: scroll;">
                                             <div class="srhd_rt" id="date_divs" style="width: 100%;margin-top: 0px;">
                                                <?php
                                                   /* foreach ($timeSlots->data as $Dta) {
                                                      ?>
                                                <div class="grid_srhd col-md-1 col-xs-1 ">
                                                   <small><?php echo $Dta->day; ?></small>
                                                   <label class="em btns" for="btn_<?php echo $Dta->day; ?>"><?php echo $Dta->day; ?></label>
                                                   <input name="date" value="<?php echo $Dta->day; ?>" type="radio" id="btn_<?php echo $Dta->day; ?>" style="display:none;">
                                                   <strong><?php echo $Dta->day; ?></strong>
                                                </div>
                                                <?php
                                                   }*/
                                                   // echo $timeSlots->data[0]->date;
                                                   
                                                   $n = 1;
                                                   $active='actives';
                                                   $is_tom='Tomorrow';
                                                   while ($n <= 7) {
                                                      $d = '+' . $n . ' day';
                                                      $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
                                                      $c1 = date('M', strtotime($date . $d));
                                                      $c2 = date('d', strtotime($date . $d));
                                                      $c3 = date('D', strtotime($date . $d));
                                                      $c4 = date('Y', strtotime($date . $d));
                                                      ?>
                                                <div class="grid_srhd col-md-1 col-xs-1 ">
                                                   <small><?php if($is_tom!=''){ echo $is_tom; }else{ echo $c1; } ?></small>
                                                   <label class="em btns <?php echo $active;?>" for="btn_<?php echo $n; ?>"><?php echo $c2; ?></label>
                                                   <input name="date" value="<?php echo $timeSlots->data[$n-1]->date ?>" type="radio" onclick="timing(<?php echo $n; ?>)"id="btn_<?php echo $n; ?>" style="display:none;">
                                                   <strong><?php echo $c3; ?></strong>
                                                </div>
                                                <?php $n++;$is_tom='';$active='';
                                                   } ?>
                                             </div>
                                          </div>
                                          <input name="final_date" value="" type="hidden" id="final_date" >										 
                                          <input name="final_time" value="" type="text" id="final_time" style="visibility: hidden;"> 
                                          <span id="time_error" style="color: red;"></span>
                                          <div id="time_divs">
                                             <?php //print_r($timeSlots); ?>
                                             <input type="hidden" id="doc_id" name="doc_id" value="<?php echo $this->uri->segment(3); ?>">
                                             <input type="hidden" id="doc_clicnic_id" name="doc_clicnic_id" value="<?php echo $this->uri->segment(4); ?>">
                                             <div class="panel-group" id="morning" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                   <div class="panel-heading" role="tab" id="accordion-heading-1">
                                                      <h4 class="panel-title">
                                                         <a role="button" data-toggle="collapse" data-parent="#morning" href="#accordion-collapse-1" aria-expanded="false" aria-controls="accordion-collapse-1">
                                                         <i class="fa fa-clock-o"></i>Morning
                                                         </a>
                                                      </h4>
                                                   </div>
                                                   <div id="accordion-collapse-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="accordion-heading-1">
                                                      <div class="panel-body">
                                                         <div class="row" id="morning_tme">
                                                            <div  class="col-md-2 col-sm-4 col-xs-6 " style=" text-align: center;" >
                                                               <label >Please Select Date</label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="panel-group" id="afternoon" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                   <div class="panel-heading" role="tab" id="accordion-heading-1">
                                                      <h4 class="panel-title">
                                                         <a role="button" data-toggle="collapse" data-parent="#afternoon" href="#accordion-collapse-2" aria-expanded="false" aria-controls="accordion-collapse-1">
                                                         <i class="fa fa-clock-o"></i>Afternoon
                                                         </a>
                                                      </h4>
                                                   </div>
                                                   <div id="accordion-collapse-2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="accordion-heading-1">
                                                      <div class="panel-body">
                                                         <div class="row" id="afternoon_tme">
                                                            <div  class="col-md-2 col-sm-4 col-xs-6 " style=" text-align: center;" >
                                                               <label >Please Select Date</label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="panel-group" id="evening" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                   <div class="panel-heading" role="tab" id="accordion-heading-1">
                                                      <h4 class="panel-title">
                                                         <a role="button" data-toggle="collapse" data-parent="#evening" href="#accordion-collapse-3" aria-expanded="false" aria-controls="accordion-collapse-1">
                                                         <i class="fa fa-clock-o"></i>Evening
                                                         </a>
                                                      </h4>
                                                   </div>
                                                   <div id="accordion-collapse-3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="accordion-heading-1">
                                                      <div class="panel-body">
                                                         <div class="row" id="evening_tme">
                                                            <div  class="col-md-2 col-sm-4 col-xs-6 " style=" text-align: center;" >
                                                               <label >Please Select Date</label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="panel-group" id="night" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                   <div class="panel-heading" role="tab" id="accordion-heading-1">
                                                      <h4 class="panel-title">
                                                         <a role="button" data-toggle="collapse" data-parent="#night" href="#accordion-collapse-4" aria-expanded="false" aria-controls="accordion-collapse-1">
                                                         <i class="fa fa-clock-o"></i>Night
                                                         </a>
                                                      </h4>
                                                   </div>
                                                   <div id="accordion-collapse-4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="accordion-heading-1">
                                                      <div class="panel-body">
                                                         <div class="row" id="nigth_tme">
                                                            <div  class="col-md-2 col-sm-4 col-xs-6 " style=" text-align: center;" >
                                                               <label >Please Select Date</label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane" id="confirmation" style="text-align:center;padding: 60px 0px;font-size: 17px !important;">
                                         <div id="booking_final">
                                          <p style="text-align:center;">You Appointment is scheduled and awaiting confirmation from the doctor</p>
                                          <strong id="confirm_time"></strong><br/>
                                          <strong id="confirm_day"></strong><br/><br/>
                                          We will notify you when the doctor confirms the appointment
                                       </div>
                                       </div>
                                    </div>
                                    <div class="wizard-footer">
                                       <div class="pull-right">
                                          <input type='button' class='btn btn-next  btn-fill btn-success btn-wd' onclick="validation()" name='next' value='Next' />
                                          <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' onclick="checked1()" name='finish' value='Book' />
                                       </div>
                                       <div class="pull-left" >
                                          <input type='button' id="previous" class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                       </div>
                                       <div class="clearfix"></div>
                                    </div>
                                    <label class="timing_btn time_active" style="display:none;"></label>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php $this->load->view('common_file/footer'); ?>
      </div>
      <script>
         var header = document.getElementById("date_divs");
         var btns = header.getElementsByClassName("btns");
         for (var i = 0; i < btns.length; i++) {
           btns[i].addEventListener("click", function() {
             var current = document.getElementsByClassName("actives");
             current[0].className = current[0].className.replace(" actives", "");
             this.className += " actives";
           });
         }
         var header = document.getElementById("time_divs");
         var btns = header.getElementsByClassName("timing_btn");
         for (var i = 0; i < btns.length; i++) {
           btns[i].addEventListener("click", function() {
             var current = document.getElementsByClassName("time_active");
             current[0].className = current[0].className.replace(" time_active", "");
             this.className += " time_active";
           });
         }
         var profile = document.getElementById("profile_list");
         var btns = profile.getElementsByClassName("select_profile");
         for (var i = 0; i < btns.length; i++) {
           btns[i].addEventListener("click", function() {
             var current = document.getElementsByClassName("select_profile_active");
             current[0].className = current[0].className.replace(" select_profile_active", "");
             this.className += " select_profile_active";
           });
         }
      </script>
      <!--end page-wrapper-->
      <div id="select_option" class="modal fade" role="dialog">
         <div class="modal-dialog width-400px" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="section-title">
                     <h2>Add Member Details</h2>
                  </div>
               </div>
               <div class="modal-body">
                  <form class="form inputs-underline" action=""  method="POST">
                      <p class="alert alert-danger" id="demo" style="display:none;"></p>
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="pname" placeholder="" required="required">
                     </div>

                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="pemail" placeholder="" >
                     </div>

                     <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="pphone" placeholder="" required="required">
                     </div>
                     <div class="form-group">
                        <label for="relationship">Relationship</label>
                        <select class="form-control selectpicker" name="relationship" id="prelationship" required="required">
                           <option value="">Select</option>
                           <?  if($myself_val=='0'){?>
                           <option value="Myself">Myself</option>
                           <?}?>
                           <option value="Father">Father</option>
                           <option value="Mother">Mother</option>
                           <option value="Son">Son</option>
                           <option value="Daughter">Daughter</option>
                           <option value="Brother">Brother</option>
                           <option value="Sister">Sister</option>
                           <option value="Uncle">Uncle</option>
                           <option value="Aunty">Aunty</option>
                           <option value="Wife">Wife</option>
                           <option value="Husband">Husband</option>
                           <option value="Grand Father">Grand Father</option>
                           <option value="Grand Mother">Grand Mother</option>
                           <option value="Friend">Friend</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="text" class="form-control date-picker" name="dob" id="pdob" placeholder="" required="required" autocomplete="off">
                     </div>
                     <div class="form-group">
                        <label for="name" style="width:100%;">Gender</label>                                                   
                        <label class="radio_container">Male
                        <input type="radio" checked="checked" id="pgender" value='Male' name="gender" required="required">
                        <span class="checkmark"></span>
                        </label>                                                                                        
                        <label class="radio_container">Female
                        <input type="radio"  id="pgender" value='Female' name="gender" required="required">
                        <span class="checkmark"></span>
                        </label>
                     </div>
                     <div class="form-group center">
                        <button type="button" onclick="add_family_member()"  class="btn btn-primary width-100">Save</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <a href="#" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.1.min.js"></script> 
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/function.js"></script>
      <script src="<?php echo base_url(); ?>assets/wizard/jquery-2.2.4.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/wizard/bootstrap.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/wizard/jquery.bootstrap.js" type="text/javascript"></script>
      <script type="text/javascript" src="https://medicalwale.com/assets/js/moment.js"></script>
      <script type="text/javascript" src="https://medicalwale.com/assets/js/bootstrap-datetimepicker.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/wizard/demo.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/wizard/doctor_form.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/wizard/jquery.validate.min.js" type="text/javascript"></script>
      <script type="text/javascript">


$(document).ready(function() {
$(".scroll-card").click(function () {
    $(".scroll-card").removeClass("active");

    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).addClass("active");   
});
});

$(document).ready(function() {
$(".my_self_div1").click(function () {
    $(".my_self_div1").removeClass("organ_donor_active");
    $(".my_self_div_self").removeClass("organ_donor_active");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).addClass("organ_donor_active");   
});

$(".my_self_div_self").click(function () {
    $(".my_self_div_self").removeClass("organ_donor_active");
    $(".my_self_div_self").removeClass("organ_donor_active");
     $(".my_self_div1").removeClass("organ_donor_active");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).addClass("organ_donor_active");   
});

});

         function add_health_records(){
         
         var user_id = $('#user_id').val();
         var name = $('#pname').val();
         var relationship = $('#prelationship').val();
         var dob = $('#pdob').val();
         var gender = $('#pradio').val();
         var vendor_type = $('#vendor_type').val();
         //alert(user_id+"-"+name+"-"+relationship+"-"+dob+"-"+gender+"-"+vendor_type);
         
         $.ajax({
            url: 'https://live.medicalwale.com/v46/health_record/add_patient.php',
            type: 'post',
            async: false,
            dataType: 'json',
            data: {'user_id':user_id,'patient_name':name,'relationship':relationship,'date_of_birth':dob,'gender':gender,'vendor_type':vendor_type},
            success: function(data) {
         
$('#select_option').modal('hide');
         patient_detail()
         
         
                //if(data.status == "200"){	
                 // window.location.reload(true);
               
                
            }
         });
         }
         
         function patient_detail(){
         
var user_id=$('#user_id').val();

         $.ajax({
            url: '<?php echo base_url() ?>Doctor/patient_detail',
            type: 'post',
            dataType: 'html',
            data : { },
           success: function(data) {
         
         $('#profile_list_data').empty();
           $.each(JSON.parse(data), function( key, value) {
         
         if (key=="data"){
         var attr=JSON.stringify(value);   
         
         $.each(JSON.parse(attr), function( i,value1) {
         
         var html='<div class="col-md-2 col-sm-2 col-xs-3" id="patient_avatar">'+
                                                     '<a href="javascript:void(0)">'+
                                                      '<label for="patient_id_'+value1.id+'">'+
                                                       
                                                          '<img class="select_profile" src="<?php echo base_url(); ?>assets/img/user_default2.png">'+
         				   
                                                       '</label><br/>'+
                                                       '<input type="radio" name="patient_id" id="patient_id_'+value1.id+'" onclick="getPatientData('+user_id+','+value1.id+');" value="'+value1.id+'" style="display: none;">'+
                                                       ''+value1.patient_name+''+
                                                     '</a>'+
                                                   '</div>' ;
         
         
         $('#profile_list_data').append(html);
         
         });	 
         }
         
         });
         
            }
         });
         
         }
         
         function getPatientData(user_id,pid){
         
         $.ajax({
            url: '<?php echo base_url() ?>Doctor/patient_list',
            type: 'post',
            dataType: 'html',
            data : {"user_id":user_id , "patient_id":pid },
            beforeSend: function(){
             $("#jayesh").html('<center> <img  src="<?php echo base_url(); ?>assets/apple_loader.gif" style="height: 150px;"/></center>');
           },success: function(data) {
         
                 $("#jayesh").empty(); 
                // alert(data);
                 $("#jayesh").append(data);
                
            }
         });
         
         }
         
         
         function validation(){
         
         var patient_allergy=$("#patient_allergy").val();
         var user_gender=$("#patient_radio").val();
         var health_condition=$("#patient_medical_condition").val();
         var heradiatry_problem=$("#patient_hereditary").val();
         var relationship=$("#patient_relationship").val();
         var patient_name=$("#patient_name").val();
         var patient_id_hidd=$("#patient_id_hidd").val();
         var final_date=$("#final_date").val();
         var final_time=$("#final_time").val();
         var patient_dob=$("#patient_dob").val();
         
         $("#tree").hide();
         // if(patient_allergy == ""){
         // $('#patient_allergy').next(".red").remove();
         // $("#tree").show();
         // $('#patient_allergy').after('<div class="red" style="color: red;">Allergy is Required</div>');
         // }
         // else {
         // $('#patient_allergy').next(".red").remove(); 

         // return true;
         // }
         
         // if(health_condition == ""){
         // $('#patient_medical_condition').next(".red").remove();
         // $("#tree").show();
         // $('#patient_medical_condition').after('<div class="red" style="color: red;">Medical condition is Required</div>');
         // }
         // else {
         // $('#patient_medical_condition').next(".red").remove(); 
         // return true;
         // }
         
         // if(heradiatry_problem == ""){
         // $('#patient_hereditary').next(".red").remove();
         // $("#tree").show();
         // $('#patient_hereditary').after('<div class="red" style="color: red;">Heradiatry is Required</div>');
         // }
         // else {
         // $('#patient_hereditary').next(".red").remove(); 
         // return true;
         // }
         
         if(patient_name==""){
         $('#patient_name').next(".red").remove();
         $("#tree").show();
         $('#patient_name').after('<div class="red" style="color: red;">Name is Required</div>');
         }
         else {
         $('#patient_name').next(".red").remove(); 

         return true;
         }
         
         
         
         
         }
         
         
         
         
         
         
         function timing(id){
         
         var date=$("#btn_"+id).val();
         $("#final_date").val(date);
         
         
         var DocId = <?echo $this->uri->segment(3)?>;
         var DocClicnicId = <?echo $this->uri->segment(4)?>;
         $.ajax({
            url: '<?php echo base_url() ?>Doctor/timeSlots',
            type: 'post',
            dataType: 'json',
            data : { "DocId":DocId , "DocClicnicId":DocClicnicId,"date":date},
          success: function(data) {
         $('#morning_tme').empty();
         $('#afternoon_tme').empty();
         $('#evening_tme').empty();
         $('#nigth_tme').empty();
         var date= data.date;
         var d=new Date(date.split("/").reverse().join("-"));
         var dd=d.getDate();
         var mm=d.getMonth()+1;
         var yy=d.getFullYear();
         var newdate=dd+"/"+mm+"/"+yy;		
         
         $("#confirm_day").text("ON "+data.day+", "+newdate+"");
          
         $.each(data.timings, function (key, val) {
        var i=1;
        var j=10;
        var k=100;
        var l=1000;
         
         if(key==0){
         var Morning=JSON.stringify(val.Morning);
         if(Morning!="[]"){
         $.each(JSON.parse(Morning), function (key, val3) {
         
         
         $('#morning_tme').append('<div  class="col-md-2 col-sm-4 col-xs-6 ">'+
         								'<label class="timing_btn"  for="time" onclick="checked_data('+i+')" >'+val3.from_time+'-'+val3.to_time+'</label>'+
         								'<input name="time" type="radio" id="time'+i+'"  value="'+val3.from_time+'-'+val3.to_time+'" style="display:none;">'+
         		'</div>');
         		
         
         i++;
         });
         }else{
         
         $('#morning_tme').append('<div  class="col-md-2 col-sm-4 col-xs-6 " style=" text-align: center;" >'+
         								'<label >No time slot Available</label>'+
         								
         		'</div>');
         }
         }else if(key==1){
         var Afternoon=JSON.stringify(val.Afternoon);
         if(Afternoon!="[]"){
         $.each(JSON.parse(Afternoon), function (key, val4) {
         
         $('#afternoon_tme').append('<div class="col-md-2 col-sm-4 col-xs-6">'+
         								'<label class="timing_btn" for="time'+j+'" onclick="checked_data('+j+')"  >'+val4.from_time+'-'+val4.to_time+'</label>'+
         								'<input name="time" type="radio" id="time'+j+'"  value="'+val4.from_time+'-'+val4.to_time+'" style="display:none;">'+
         								'</div>');
         j++;
         });
         }else{
         
         $('#afternoon_tme').append('<div  class="col-md-2 col-sm-4 col-xs-6 " style=" text-align: center;" >'+
         								'<label >No time slot Available</label>'+
         								
         		'</div>');
         }
         
         }else if(key==2){
         var Evening=JSON.stringify(val.Evening);
         if(Evening!="[]"){
         $.each(JSON.parse(Evening), function (key, val5) {
         
         $('#evening_tme').append('<div class="col-md-2 col-sm-4 col-xs-6">'+
         								'<label class="timing_btn" for="time'+k+'" onclick="checked_data('+k+') ">'+val5.from_time+'-'+val5.to_time+'</label>'+
         								'<input name="time" type="radio" id="time'+k+'"  value="'+val5.from_time+'-'+val5.to_time+'" style="display:none;">'+
         								'</div>');
         								
         								
         k++;
         });
         }else{
         
         $('#evening_tme').append('<div  class="col-md-2 col-sm-4 col-xs-6 " style=" text-align: center;" >'+
         								'<label >No time slot Available</label>'+
         								
         		'</div>');
         }
         
         }else if(key==3){
         var Night=JSON.stringify(val.Night);
         if(Night!="[]"){
         $.each(JSON.parse(Night), function (key, val6) {
         
         $('#nigth_tme').append('<div class="col-md-2 col-sm-4 col-xs-6">'+
         								'<label class="timing_btn" for="time'+l+'" onclick="checked_data('+l+')">'+val6.from_time+'-'+val6.to_time+'</label>'+
         								'<input name="time" type="radio" id="time'+l+'"    value="'+val6.from_time+'-'+val6.to_time+'" style="display:none;">'+
         								'</div>');
         l++;
         });
         }else{
         
         $('#nigth_tme').append('<div  class="col-md-2 col-sm-4 col-xs-6 " style=" text-align: center;" >'+
         								'<label >No time slot Available</label>'+
         								
         		'</div>');
         }
         
         }
         
         
         
         });
         
         var header = document.getElementById("time_divs");
         var btns = header.getElementsByClassName("timing_btn");
         for (var i = 0; i < btns.length; i++) {
           btns[i].addEventListener("click", function() {
             var current = document.getElementsByClassName("time_active");
             current[0].className = current[0].className.replace(" time_active", "");
             this.className += " time_active";
           });
         }		
         }
         });
         
         }
         function checked_data(id){
         var time=$("#time"+id).val();
         $("#final_time").val(time);
         $("#confirm_time").empty();
         $("#confirm_time").text(time);
         } 
         
         
         function checked1(){
         
          $("#booking_final").html('<center> <img  src="<?php echo base_url(); ?>assets/apple_loader.gif" style="height: 150px;"/></center>');
         var doc_id=$("#doc_id").val();
         var doc_clicnic_id=$("#doc_clicnic_id").val();
         var patient_allergy=$("#patient_allergy").val();
         var user_gender=$("#patient_radio").val();
         var health_condition=$("#patient_medical_condition").val();
         var heradiatry_problem=$("#patient_hereditary").val();
         var relationship=$("#patient_relationship").val();
         var patient_name=$("#patient_name").val();
         var patient_id_hidd=$("#patient_id_hidd").val();
         var final_date=$("#final_date").val();
         var final_time=$("#final_time").val();
         var patient_dob=$("#patient_dob").val();
         //var allergies=$("#patient_allergy").val();
         var user_id=$('#user_id').val();
         
         $.ajax({
            url: '<?php echo base_url() ?>Doctor/add_appointment',
            type: 'post',
         async: false,
            dataType: 'json',
            data : {"patient_allergy":patient_allergy , "patient_radio":user_gender,"health_condition":health_condition , "heradiatry_problem":heradiatry_problem
         ,"relationship":relationship , "patient_name":patient_name,"patient_id_hidd":patient_id_hidd,"final_date":final_date,"final_time":final_time,"patient_dob":patient_dob,"doc_id":doc_id,"user_id":user_id,
         "doc_clicnic_id":doc_clicnic_id},
             
			success: function(data) {
         
             alert("Your booking ID is "+data.booking_id);  
                window.location.replace("https://medicalwale.com/doctor/doctor_detail/"+doc_id+"/1");
            }
           
            
            
         });
         
         }    

        function patient_detail(relationship,name,age,gender,dob){
   $('#patient_name').val(name);
   $('#patient_radio').val(gender);
   $('#patient_dob').val(dob);
   $('#patient_relationship').val(relationship);
   }     


   function add_family_member()
{
  var name = $("#pname").val();
  var email =$("#pemail").val();
  var phone =$("#pphone").val();
  var gender =$("#pgender").val();
  var relationship=$("#prelationship").val();
  var dob=$("#pdob").val();
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (name == "" || name == null)  {

       $("#demo").show()
        var x1 = "Please Enter Name";
       document.getElementById("demo").innerHTML = x1;
       return false;
 }
  else  if(dob=="" || dob == null){
  
   $("#demo").show()
    var x1 = "Please Select Date...";
       document.getElementById("demo").innerHTML = x1;
       return false;
     }

    else  if(relationship=="" || relationship == null){
  
   $("#demo").show()
    var x1 = "Please Select relationship...";
       document.getElementById("demo").innerHTML = x1;
       return false;
     }
     else  if(gender=="" || gender == null){
  
   $("#demo").show()
    var x1 = "Please Select gender...";
       document.getElementById("demo").innerHTML = x1;
       return false;
     } 

     else  if(email=="" || email == null ){
     $("#demo").show()
    var x1 = "Please Enter email...";
       document.getElementById("demo").innerHTML = x1;
       return false;
     } 

     else  if(!($("#pemail").val().match(mailformat))) {
     $("#demo").show()
    var x1 = "Eamil is not in proper format";
       document.getElementById("demo").innerHTML = x1;
       return false;
     } 
      
  
  $.ajax({
url : "<?php echo base_url();?>Savemedicalreports/add_family_member/",
                    method : "POST",
                    data : {name:name,email:email,phone:phone,gender:gender,relationship:relationship,dob:dob},
                    beforeSend: function()
                    {
                        
                    },
                    success:function(data) 
                    {
                      location.reload();
                    }
  });

} 

$("#previous").click(function(){
$("#tree").show();
  });

      </script>
   </body>
</html>