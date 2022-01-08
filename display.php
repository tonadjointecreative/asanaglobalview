<?php

// Task display loop
function display( $task, $workspaces, $projects ){
    $workspace = array_search($task['workspace']['gid'],array_column($workspaces,'gid'));
    $project = array_search($task['projects'][0]['gid'],array_column($projects,'gid'));
    $project_color = $projects[$project]['color'];
    $name = $task['name'];
    $completed = "";
    if($name == ""){
        $name = "** empty title **";
    }
          
    if($project_color == ""){
        $project_color = "default-color";
    }
    if($task['completed']){
        $completed = " completed";
    }
    echo '<li data-id="'.$task['gid'].'" class="todo-item'.$completed.'">';

    
    if($task['projects'] == null) {
        echo '<a class="name" target="_blank" href="https://app.asana.com/0/'.idToURL($task['workspace']['gid']).'/'.$task['gid'].'">'.$name.'</a>';
    }else{
        echo '<a class="name" target="_blank" href="https://app.asana.com/0/'.$projects[$project]['gid'].'/'.$task['gid'].'">'.$name.'</a>';
    }

    if($task['projects'] == null){
        echo '<a class="project default-color" target="_blank" href="https://app.asana.com/0/'.idToURL($task['workspace']['gid']).'/list">No project</a>';
    }else{
        echo '<a class="'.$project_color.' project" target="_blank" href="https://app.asana.com/0/'.$projects[$project]['gid'].'/list">'.$projects[$project]['name'].'</a>';
    }
    echo '<a class="workspace" target="_blank" href="https://app.asana.com/0/'.idToURL($task['workspace']['gid']).'/list">'.$workspaces[$workspace]['name'].'</a>';
    if($task['due_on'] != ""){
        get_nice_date($task['due_on']);
    }


    $status = $task['assignee_status'];
    echo '<div><select class="mobileChange">';
    if($status == "today"){
        echo '  <option selected value="today">Today</option>
                <option value="upcoming">Upcoming</option>
                <option value="later">Later</option>
                <option value="inbox">Inbox</option>';
    }elseif($status == "upcoming"){
        echo '  <option value="today">Today</option>
                <option selected value="upcoming">Upcoming</option>
                <option value="later">Later</option>
                <option value="inbox">Inbox</option>';
    }elseif($status == "inbox"){
        echo '  <option value="today">Today</option>
                <option value="upcoming">Upcoming</option>
                <option value="later">Later</option>
                <option selected value="inbox">Inbox</option>';
    }elseif($status == "later"){
        echo '  <option selected value="today">Today</option>
                <option value="upcoming">Upcoming</option>
                <option selected value="later">Later</option>
                <option value="inbox">Inbox</option>';
    }
    echo '</select></div>'; 


    echo '<div class="icon" data-toggle="tooltip" data-placement="left" title="Click to complete task"><svg class="CheckIcon" title="CheckIcon" viewBox="0 0 32 32"><polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon></svg></div>'; 
    echo '</li>';
}

?>