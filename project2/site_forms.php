<?
	
/* -----------------------------------------------------------------------------
Returns the HTML of a labeled input text element with Bootstrap class names

Input: 
  Name of element (string)
  Text label of element (string)
  Value of element (string)
  Is the element required (boolean)
  

Output: HTML text (string)	
----------------------------------------------------------------------------- */
	
function return_input_text($name, $label, $value='', $required=false) {
	if ($required) $req = 'required';
	else $req = '';
	return '
		<div class="form-group">
			<label for="'.$name.'">'.$label.'</label>
			<input type="text" class="form-control" name="'.$name.'" id="'.$name.'" value="'.$value.'" '.$req.'>
		</div>';
}
/* -----------------------------------------------------------------------------
Echos return_input_text
----------------------------------------------------------------------------- */
function echo_input_text($name, $label, $value) {
	echo return_input_text($name, $label, $value);
}

/* -----------------------------------------------------------------------------
Returns the HTML of a form for inserting rows into the pages table

Input:  Previously submitted values (associative array)
Output: HTML text (string)	
----------------------------------------------------------------------------- */
function return_page_form($values) {
	return '
		<form action="?action=insert" method="post">'.
			return_input_text('pageid','Page ID',$values['pageid'],true).
			return_input_text('title','Page Title',$values['title'],true).
			return_textarea('content','Page Content',$values['content']). 	
			return_input_text('parent','Parent Page',$values['parent']).'
			<input type="submit" class="btn btn-primary" value="Submit">
            <a href="?" class="btn btn-warning">Clear</a>
			<a href="control_panel.php" class="btn btn-secondary">Back</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_page_form
----------------------------------------------------------------------------- */
function echo_page_form($values) {
	echo return_page_form($values);
}

/* -----------------------------------------------------------------------------
Inserts a new row into the pages table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_page($values) {
	$pageid = $values['pageid'];
	$title = $values['title'];
	$content = $values['content'];
	$parent = $values['parent'];
	$sql = "INSERT INTO rj28morv_pages (pageid, title, content, parent) VALUES ('$pageid','$title','$content','$parent')";
	run_query($sql);
}



function return_aside_form($values) {
	return '
		<form action="?action=insert" method="post">'.
			return_input_text('asideid','Aside ID',$values['asideid'],true).
			return_input_text('title','Aside Title',$values['title'],true).
			return_textarea('content','Aside Content',$values['content']). 	
			return_input_text('color','Color',$values['color']).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		
        <a href="control_panel.php" class="btn btn-secondary">Back</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_page_form
----------------------------------------------------------------------------- */
function echo_aside_form($values) {
	echo return_aside_form($values);
}

/* -----------------------------------------------------------------------------
Inserts a new row into the pages table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_aside($values) {
	$asideid = $values['asideid'];
	$title = $values['title'];
	$content = $values['content'];
	$color = $values['color'];
	$sql = "INSERT INTO rj28morv_asides (asideid, title, content, color) VALUES ('$asideid','$title','$content','$color')";
	run_query($sql);
}


function return_has_aside_form($values) {
	return '
		<form action="?action=insert" method="post">'.
			return_input_text('asideid','Aside ID',$values['asideid'],true).
			return_input_text('pageid','Page ID',$values['pageid'],true). 	
			return_input_text('ord','Order',$values['order']).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_has_asides_form
----------------------------------------------------------------------------- */
function echo_has_aside_form($values) {
	echo return_has_aside_form($values);
}

/* -----------------------------------------------------------------------------
Inserts a new row into the has asides table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_has_aside($values) {
	$asideid = $values['asideid'];
	$pageid = $values['pageid'];
	$ord = $values['ord'];
	$sql = "INSERT INTO rj28morv_has_aside (asideid, pageid, ord) VALUES ('$asideid','$pageid','$ord')";
	run_query($sql);
}





function return_textarea($name,$label,$value='',$required=false) {
    if ($required) $req = 'required';
    else $req = '';
    return '
    <div class ="form-group">
        <label for="'.$name.'">'.$label.'</label>
        <textarea class="form-control" name="'.$name.'" id="'.$name.'" rows="10" '.$req.'>'.$value.'</textarea>
        </div>';    
}

function echo_textarea($name, $label, $Value, $required){
    echo return_textarea($name, $label, $value, $required);
}


		
function return_option_select($name, $list, $label='', $v='') {
	$ouput = '
	<div class="form-group">';
	
	if ($label != '')
	$ouput .= '
		<label for="'.$name.'">'.$label.'</label>';
		
	$ouput .= '		
		<select class="form-control" id="'.$name.'" name="'.$name.'">';

	foreach ($list as $id => $title) {
		$selected = '';
		if ($id == $v) $selected = 'selected';
		$ouput .= '
			<option value="'.$id.'" '.$selected.'>'.$title.'</option>';
	}
	$ouput .=  '
		</select>
	</div>';
	return $ouput;
}


function echo_option_select($name, $list, $label, $v) {
	echo return_option_select($name, $list, $label, $v);
}

/* -----------------------------------------------------------------------------
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
----------------------------------------------------------------------------- */

function return_user_form($values) {
	return '
		<form action="?action=insert" method="post">'.
			return_input_text('userid','User ID',$values['userid'],true).
			return_input_text('password','Password',$values['password'],true).	
			return_input_text('type','Type',$values['type']).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_user_form
----------------------------------------------------------------------------- */
function echo_user_form($values) {
	echo return_user_form($values);
}

/* -----------------------------------------------------------------------------
Inserts a new row into the user table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_user($values) {
	$userid = $values['userid'];
	$password = $values['password'];
    $hashed_passwd = password_hash($password, PASSWORD_DEFAULT);
	$type = $values['type'];
	$sql = "INSERT INTO rj28morv_users (userid, passwd, type) VALUES ('$userid','$hashed_passwd','$type')";
	run_query($sql);
}

		
?>