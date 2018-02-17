<?php
include 'imports/head.php';
include 'imports/navigation1.php';
 ?>

 <div class="container">
   <form class="" action="" method="post">
     <div class="form-row">
       <div class="form-group col-md-6">
         <label for="inputFirstname">first name</label>
         <input type="text" name="Firstname" class="form-control" placeholder="first name">
       </div>
       <div class="form-group col-md-6">
         <label for="inputLastname">first name</label>
         <input type="text" name="Lastname" class="form-control" placeholder="Last name">
       </div>
     </div>

     <div class="form-group col-md-12">
       <label for="inputEmail" >Email</label>
       <input type="email" class="form-control" placeholder="Email">
     </div>
     <div class="form-group col-md-12">
       <label for="inputPhone">phone number</label>
       <input type="tel" class="form-control" placeholder="phone number">
     </div>

     <fieldset class="form-group col-md-12">
       <legend>Are you ?</legend>
       <div class="form-check col-md-10">
        <input class="form-check-input" type="radio" name="type" value="option1" checked>
        <label class="form-check-label" for="student">student</label>
       </div>
       <div class="form-check col-md-10">
        <input class="form-check-input" type="radio" name="type" value="option2">
        <label class="form-check-label" for="professor">professor</label>
       </div>
       <div class="form-check col-md-10">
        <input class="form-check-input" type="radio" name="type" value="option3">
        <label class="form-check-label" for="other">other</label>
       </div>
     </fieldset>

     <div class="form-row">
       <div class="form-group col-md-4">
         <input list="universities" name="university" placeholder="university" class="form-control">
         <datalist id="universities">
           <option value="KAU">
         </datalist>
       </div>
       <div class="form-group col-md-4">
         <input list="faculties" name="faculty" placeholder="faculty" class="form-control">
         <datalist id="faculties">
           <option value="FCIT">
         </datalist>
       </div>
       <div class="form-group col-md-4">
         <input list="departments" name="department" placeholder="department" class="form-control">
         <datalist id="departments">
           <option value="IT">
           <option value="CS">
           <option value="IS">
         </datalist>
       </div>
     </div>

     <div class="form-group col-md-12">
       <label for="inputID">university ID</label>
       <input type="number" class="form-control" placeholder="university ID">
     </div>
     <div class="form-group col-md-12 text-right">
       <button type="submit" class="btn btn-primary btn-lg">next</button>
     </div>
   </form>
 </div>
 <div style="padding-bottom:10px"></div>
 <?php
 include 'imports/footer.php';
 ?>
