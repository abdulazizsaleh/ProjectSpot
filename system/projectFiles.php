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
          $output .= '
          <tr>
            <td><span class="glyphicon glyphicon-folder-open"></td>
            <td>'.$name.'</td>
            <td>'.(count(scandir($name)) - 2).'</td>
            <td>
              <button type="button" class="btn btn-default" name="update" data-name="'.$name.'">
                <span class="update glyphicon glyphicon-refresh"></span>
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-default" name="delete" data-name="'.$name.'">
                <span class="delete glyphicon glyphicon-trash"></span>
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-default" name="upload" data-name="'.$name.'">
                <span class="upload glyphicon glyphicon-floppy-open"></span>
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-default" name="view_files" data-name="'.$name.'">
                <span class="view_files glyphicon glyphicon-eye-open"></span>
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
    if (isset($_POST["folder_name"])) {
      if (!file_exists($_POST["folder_name"])) {
        mkdir("projects folders/".$_POST["folder_name"] , 0777 , true);
        echo "Folder Created";
      } else {
        echo "Folder Already exists";
      }
    } else {
      echo "folder name does not reach to here";
    }



  }
}
?>
