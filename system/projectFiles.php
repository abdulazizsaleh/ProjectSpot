<?php
if (isset($_POST["action"]) && isset($_POST["project"])) {
  $project = $_POST["project"];

  if($_POST["action"] == "fetch"){
    $folder = array_filter(glob('projects folders/'.$project.'/*'), 'is_dir');
    $output = '<table class="table text-center">
      <tr class="center-th">
        <th>#</th>
        <th>Folder Name</th>
        <th>Number Of Files</th>
        <th>Update</th>
        <th>Delete</th>
        <th>Upload File</th>
        <th>View File</th>
      </tr>';
      if(count($folder) > 0){

        foreach ($folder as $name) {
          $arr = explode('/', $name);
          $shortName = end($arr);
          $output .= '
          <tr>
            <td><span class="glyphicon glyphicon-folder-open"></td>
            <td>'.$shortName.'</td>
            <td>'.(count(scandir($name)) - 2).'</td>
            <td>
              <button type="button" class="update btn btn-default" name="update" data-name="'.$shortName.'">
                <span class="glyphicon glyphicon glyphicon-pencil"></span>
              </button>
            </td>
            <td>
              <button type="button" class="delete btn btn-default" name="delete" data-name="'.$shortName.'">
                <span class="glyphicon glyphicon-trash"></span>
              </button>
            </td>
            <td>
              <button type="button" class="upload btn btn-default" name="upload" data-name="'.$shortName.'">
                <span class="glyphicon glyphicon-floppy-open"></span>
              </button>
            </td>
            <td>
              <button type="button" class="view_files btn btn-default" name="view_files" data-name="'.$shortName.'">
                <span class="glyphicon glyphicon-eye-open"></span>
              </button>
            </td>
          </tr>
          ';
        }
      }else{
        $output .= '
        <tr><td colspan="7"> empty </td></tr>
        ';
      }
      $output .= '</table>';
      echo $output;
  }

  if($_POST["action"] == "create"){
    if (isset($_POST["folder_name"]) && isset($_POST["project"])) {
      $folderName = "projects folders/".$_POST["project"]."/".$_POST["folder_name"];
      if (!file_exists($folderName)) {
        mkdir($folderName , 0777 , true);
        echo "Folder Created";
      } else {
        echo "Folder Already exists";
      }
    } else {
      echo "folder name does not reach to here";
    }
  }

  if($_POST["action"] == "change"){
    if (isset($_POST["folder_name"]) && isset($_POST["project"]) && isset($_POST["old_name"])) {
      $folderName = "projects folders/".$_POST["project"]."/".$_POST["folder_name"];
      $oldName = "projects folders/".$_POST["project"]."/".$_POST["old_name"];
      if (!file_exists($folderName)) {
        rename($oldName,$folderName);
        echo "Folder Name Changed";
      } else {
        echo "Folder Already exists";
      }
    } else {
      echo "folder name does not reach to here";
    }
  }

  if ($_POST["action"] == "fetchfiles") {
      if (isset($_POST["folder_name"]) && isset($_POST["project"])){
        $folderName = "projects folders/".$_POST["project"]."/".$_POST["folder_name"];
        $files = scandir($folderName);
        $output = '<table class="table text-center">
          <tr class="center-th">
            <th>#</th>
            <th>File Name</th>
            <th>Delete</th>
          </tr>';
          foreach ($files as $file ) {
            if ($file === '.' || $file === '..') {
              continue;
            } else {
              $path = $folderName.'/'.$file;
              $output .= '
              <tr>
                <td></td>
                <td>'.$file.'</td>
                <td><button type="button" class="remove btn btn-default" name="remove" id="'.$path.'">
                  <span class="glyphicon glyphicon-trash"></span>
                </button></td>
              </tr>';
            }
          }
          $output .= '</table>';
          echo $output;
      }else{
        echo 'isset($_POST["folder_name"]) && isset($_POST["project"])';
      }
  }

}
?>
