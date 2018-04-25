<?php
include 'imports/head.php';
include 'imports/navigation1.php';
 ?>
 <div class="container">

   <div id="failed" class="alert alert-danger alert-dismissible fade in" hidden>
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>Invalid Input!</strong> make sure to fill every field.
   </div>

   <form class="" action="system/verifyProcess.php" method="post">
     <div class="form-row">
       <div class="form-group col-md-6">
         <label for="inputFirstname">first name</label>
         <input type="text" name="Firstname" class="form-control" placeholder="first name" required>
       </div>
       <div class="form-group col-md-6">
         <label for="inputLastname">Last name</label>
         <input type="text" name="Lastname" class="form-control" placeholder="Last name" required>
       </div>
     </div>

     <div class="form-group col-md-12">
       <label for="inputEmail" >Email</label>
       <input type="email" name="email" class="form-control" placeholder="Email" required>
     </div>
     <div class="form-group col-md-12">
       <label for="inputPhone">phone number</label>
       <input type="tel"  name="phone" class="form-control" placeholder="phone number" required>
     </div>

     <fieldset class="form-group col-md-12">
       <legend>Are you ?</legend>
       <div class="form-check col-md-10">
        <input class="form-check-input" type="radio" name="type" value="student" checked>
        <label class="form-check-label" for="student">student</label>
       </div>
       <div class="form-check col-md-10">
        <input class="form-check-input" type="radio" name="type" value="professor">
        <label class="form-check-label" for="professor">professor</label>
       </div>
       <div class="form-check col-md-10">
        <input class="form-check-input" type="radio" name="type" value="other">
        <label class="form-check-label" for="other">other</label>
       </div>
     </fieldset>

     <div class="form-row">
       <div class="form-group col-md-4">
         <input list="universities" name="university" placeholder="university" class="form-control" required>
         <datalist id="universities">
           <option value="KAU">
         </datalist>
       </div>
       <div class="form-group col-md-4">
         <input list="faculties" name="faculty" placeholder="faculty" class="form-control" required>
         <datalist id="faculties">
           <option value="FCIT">
         </datalist>
       </div>
       <div class="form-group col-md-4">
         <input list="departments" name="department" placeholder="department" class="form-control" required>
         <datalist id="departments">
           <option value="IT">
           <option value="CS">
           <option value="IS">
         </datalist>
       </div>
     </div>

     <div class="form-group col-md-12">
       <label for="inputID">university ID</label>
       <input type="number" name="ID" class="form-control" placeholder="university ID" required>
     </div>
     <div class="form-group col-md-12 text-right">
       <button type="submit" class="btn btn-primary btn-lg">next</button>
     </div>
   </form>
 </div>
 <?php
 if(isset($_GET['invalid'])){
   echo '<script type="text/javascript"> document.getElementById("failed").hidden = false; </script>';
 }
 include 'imports/footer.php';
 ?>
