<?php
// alert box

if(isset($_SESSION['alert_box'])){
	?>
<div style="background: wheat; color: black; padding: 10px; text-align:center; margin: 10px;">
	<h4><b>
	<?php 
		echo $_SESSION['alert_box'];
		unset($_SESSION['alert_box']);
	?></b>
	</h4>
</div>

<?php
}
// alert end

// security Pin

function encryptPin($simple_string){
	$encryption_key = "InTouchSolutions";
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$encryption_iv = '1234567891011121';
	$options = 0;
	return  openssl_encrypt($simple_string, $ciphering,
				$encryption_key, $options, $encryption_iv);
}
function decryptPin($encryted_string){
	$decryption_key = "InTouchSolutions";
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$decryption_iv = '1234567891011121';
	$options = 0;
	return openssl_decrypt ($encryted_string, $ciphering,
			$decryption_key, $options, $decryption_iv);
}
function validatePin($pin){
	$validate_user = JFactory::getUser();
	$validate_user = getMultipleRows("SELECT * FROM `z04cf_users` where id= $validate_user->id");
    if($validate_user[0]['pin'] == encryptPin($pin)){
		$_SESSION['alert_box']="Your Security PIN is Incorrect";
		return true;
	}
	$_SESSION['alert_box']="Your Security PIN is Correct";
	return false;
}
// security pin end


global $conn;
$conn = @mysqli_connect('127.0.0.1','hghs_accounts','hghs_accounts', 'hghs_accounts');
if (!$conn) {
	die('Could not connect: ' . mysqli_error());
}

function ins_upd_del($query)
{
	global $conn;
    mysqli_query($conn, $query);
	$result = mysqli_insert_id($conn);
	return $result;
}

function ins_upd_del2($query)
{
	global $conn;
    $result = mysqli_query($conn, $query);
	return $result;
}

function getSingleRow($query)
{
	global $conn;
	$re = mysqli_query($conn, $query);
	$re = mysqli_fetch_assoc($re);
	return $re;
}

function getMultipleRows($query)
{
	global $conn;
	$re = mysqli_query($conn, $query);
	$result = array();
	while($row = mysqli_fetch_assoc($re))
	{
		array_push($result, $row);
	}
	
	return $result;
}

function getAsObject($query)
{
	global $conn;
	$re = mysqli_query($conn, $query);
	$result = array();
	while($row = mysqli_fetch_object($re)){
		array_push($result, $row);
	}
	
	return $result;
}


function no_of_rows($query)
{
	global $conn;
	$re = mysqli_query($conn, $query);
	$rows = mysqli_num_rows($re);
	return $rows;
}

function active_fy_id()
{
	$fy = getSingleRow("SELECT * FROM `mfp_fyear` WHERE active = 1");
	return $fy['id'];
}




// Notification


function createNotification($user_id, $title, $link, $type){
	$query="INSERT INTO `mfp_notifications` (`id`, `user_id`, `text`, `link`, `status`,`type`)
			 VALUES (NULL, '$user_id', '$title', '$link', 'unread','$type')";
	echo $query;
	ins_upd_del($query);
	// exit();
}

function approvalRequestNotification($entry_id){
	$link="add-attachment?entry_id=".$entry_id;
	$user_id=Null;
	$title="Approval Request";
	$type="Approval";
	createNotification($user_id, $title, $link, $type);
}	
function verificationRequestNotification($entry_id){
	$link="add-attachment?entry_id=".$entry_id;
	$user_id=Null;
	$title="Verification Request";
	$type="Verification";
	createNotification($user_id, $title, $link, $type);
}
function reviewApprovalRequestNotification($entry_id,$user_id,$verified_by){
	$link="add-attachment?entry_id=".$entry_id;
	$user_id=Null;
	$title="Review Approval Request";
	$type="Entry";
	createNotification($user_id, $title, $link, $type);
	createNotification($verified_by, $title, $link, $type);
}
function reviewVerificationRequestNotification($entry_id,$user_id){
	$link="add-attachment?entry_id=".$entry_id;
	$title="Review Verification Request";
	$type="Entry";
	createNotification($user_id, $title, $link, $type);
}
function VerifiedNotification($entry_id,$user_id){
	$link="add-attachment?entry_id=".$entry_id;
	$title="Verification Request";
	$type="Entry";
	createNotification($user_id, $title, $link, $type);
}
function ApprovedNotification($entry_id,$user_id,$verified_by){
	$link="add-attachment?entry_id=".$entry_id;
	$title="Approved Notification";
	$type="Entry";
	createNotification($user_id, $title, $link, $type);
	createNotification($verified_by, $title, $link, $type);
}

?>
<?php

function getUserGroupsname ($user)
{
$db = JFactory::getDBO();    

    $db->setQuery($db->getQuery(true)
        ->select('*')
        ->from("#__usergroups")
    );
    $groups=$db->loadRowList();

            $userGroups = $user->groups;
            $return=array();

          foreach ($groups as $key=>$g){
            if (array_key_exists($g[0],$userGroups)) array_push($return,$g[4]);
          }

          return $return;
}
function checkPermission($user,$perm_request)
{

  $groupsname=getUserGroupsname($user);
	if (in_array($perm_request, $groupsname))
	{
		return 1;
    }
	else
		return 0;
}

function float_ops($param1 = 0, $param2 = 0, $op = '')
{
	$result = 0;
	$param1 = $param1 * 100;
	$param2 = $param2 * 100;
	
	//$param1 = (int)round($param1, 0);
	//$param2 = (int)round($param2, 0);
	
	$param1 = (double)round($param1, 0);
	$param2 = (double)round($param2, 0);

	switch ($op)
	{
	case '+':
		$result = $param1 + $param2;
		break;
	case '-':
		$result = $param1 - $param2;
		break;
	case '==':
		if ($param1 == $param2)
			return TRUE;
		else
			return FALSE;
		break;
	case '!=':
		if ($param1 != $param2)
			return TRUE;
		else
			return FALSE;
		break;
	case '<':
		if ($param1 < $param2)
			return TRUE;
		else
			return FALSE;
		break;
	case '>':
		if ($param1 > $param2)
			return TRUE;
		else
			return FALSE;
		break;

	}
	$result = $result/100;
	return $result;
}

function convert_opening($amount, $dc)
{
	if ($amount == 0)
		return "0";
	else if ($dc == 'D')
		return "Dr " . number_format($amount, 2);
	else
		return "Cr " . number_format($amount, 2);
}

function convert_amount_dc($amount)
{
	if ($amount == "D")
		return "0";
	else if ($amount < 0)
	{
		$amount = $amount * -1;
		//return "Cr " . convert_cur(-$amount);
		return "(" . number_format($amount) . ')';
	}
	else
	{
		//return "Dr " . convert_cur($amount);
		return number_format($amount);
	}
}

function character_limiter($str, $n = 500, $end_char = '&#8230;')
{
	if (strlen($str) < $n)
	{
		return $str;
	}
	
	$str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

	if (strlen($str) <= $n)
	{
		return $str;
	}

	$out = "";
	foreach (explode(' ', trim($str)) as $val)
	{
		$out .= $val.' ';
		
		if (strlen($out) >= $n)
		{
			$out = trim($out);
			return (strlen($out) == strlen($str)) ? $out : $out.$end_char;
		}		
	}
}


function entryTypesDropDown($type, $entry_type_id)
{
	if($type == 'payment')
	{
		$entry_types = getMultipleRows("SELECT * FROM `mfp_entry_types` WHERE id in (1,3)");
	}
	else if($type == 'receipt')
	{
		$entry_types = getMultipleRows("SELECT * FROM `mfp_entry_types` WHERE id in (2,4)");
	}
	else if($type == 'journal')
	{
		$entry_types = getMultipleRows("SELECT * FROM `mfp_entry_types` WHERE id = 5");
	}
	else if($type == 'contra')
	{
		$entry_types = getMultipleRows("SELECT * FROM `mfp_entry_types` WHERE id = 6");
	}
	else
	{
		$entry_types = getMultipleRows("SELECT * FROM `mfp_entry_types`");
	}
	
	echo "<form action='' method='POST'>
			<select name='entry_type_id' onchange='this.form.submit()'>";
			if($type == 'all')
				echo "<option value='0' selected> All </option>";
		foreach($entry_types as $et)
		{
			$sel = '';
			if($entry_type_id == $et['id'])
			{
				$sel = " selected ";
			}
			
			echo "<option value='".$et['id']."' ".$sel." >".$et['name']."</option> ";
		}
	echo "</select>
		</form>";
	return $entry_type_id;
}

function costCenterDropDown($cost_center_id)
{
	
	$cost_center = getMultipleRows("SELECT * FROM `mfp_cost_centers` where active = 1");
	
	echo "<form action='' method='POST'>
			<select name='cost_center_id' onchange='this.form.submit()'>";
			echo "<option value='-1'> Select Sector </option>";
		foreach($cost_center as $cc)
		{
			$sel = '';
			if($cost_center_id == $cc['id'])
			{
				$sel = " selected ";
			}
			
			echo "<option value='".$cc['id']."' ".$sel." >".$cc['name']."</option> ";
		}
	echo "</select>
		</form>";
	return $cost_center_id;
}

?>


<!-- =========================================== -->
<?php

class LedgerClass{

	function get_all_ledgers() //// in process
	{
		$fy_id = active_fy_id();
		$options = array();
		$options[0] = "(Please Select)";
		
		$ledger_q = getMultipleRows("select * from mfp_ledgers where fy_id = '$fy_id' order by acc_code asc");
		//$this->db->from('ledgers')->order_by('acc_code', 'asc');  /// name asc
		//$ledger_q = $this->db->get();
		foreach ($ledger_q as $row)
		{
			$options[$row['id']] = '( ' . $row['acc_code'] . ' ) ' . $row['name'];
		}
		return $options;
	}

	function get_all_ledgers_bankcash() //Not use
	{
		$options = array();
		$options[0] = "(Please Select)";
		$this->db->from('ledgers')->where('type', 1)->order_by('name', 'asc');
		$ledger_q = $this->db->get();
		foreach ($ledger_q->result() as $row)
		{
			$options[$row->id] = $row->name;
		}
		return $options;
	}

	function get_all_ledgers_nobankcash() //Not use
	{
		$options = array();
		$options[0] = "(Please Select)";
		$this->db->from('ledgers')->where('type !=', 1)->order_by('name', 'asc');
		$ledger_q = $this->db->get();
		foreach ($ledger_q->result() as $row)
		{
			$options[$row->id] = $row->name;
		}
		return $options;
	}

	function get_all_ledgers_reconciliation() //Not use
	{
		$options = array();
		$options[0] = "(Please Select)";
		$this->db->from('ledgers')->where('reconciliation', 1)->order_by('name', 'asc');
		$ledger_q = $this->db->get();
		foreach ($ledger_q->result() as $row)
		{
			$options[$row->id] = $row->name;
		}
		return $options;
	}

	function get_name($ledger_id) //Not use
	{
		$this->db->from('ledgers')->where('id', $ledger_id)->limit(1);
		$ledger_q = $this->db->get();
		if ($ledger = $ledger_q->row())
			return $ledger->name;
		else
			return "(Error)";
	}
	
	function get_acc_code($ledger_id) //Not use
	{
		$this->db->from('ledgers')->where('id', $ledger_id)->limit(1);
		$ledger_q = $this->db->get();
		if ($ledger = $ledger_q->row())
			return $ledger->acc_code;
		else
			return "(Error)";
	}

	function get_entry_name($entry_id, $entry_type_id, $nothtml=0) 
	{
		/* Selecting whether to show debit side Ledger or credit side Ledger */
		//$current_entry_type = entry_type_info($entry_type_id);
		
		$ledger_type = 'C';
		
		if ($entry_type_id == 1 or $entry_type_id == 3)
			$ledger_type = 'D';

		$ledger = getSingleRow("select l.name from mfp_entry_items ei join mfp_ledgers l on ei.ledger_id = l.id where ei.entry_id = '$entry_id' and ei.dc = '$ledger_type'");
		if (!$ledger['name'])
		{
			return "(Invalid)";
		} 
		else if($nothtml == 1)
		{
			return $ledger['name'];
		}
		else {
			$ledger_multiple = no_of_rows("select l.name from mfp_entry_items ei join mfp_ledgers l on ei.ledger_id = l.id where ei.entry_id = '$entry_id' and ei.dc = '$ledger_type'");
			$html = '';
			if ($ledger_multiple > 1) //if more than one ledger in entry then show ledger name in ()
				$html .= "<a href='".JURI::root('true')."/myfiles/entries/voucher.php?entry_id=" . $entry_id . "' target='_blank'> (" . $ledger['name'] . ")</a>";
			else
				$html .= "<a href='".JURI::root('true')."/myfiles/entries/voucher.php?entry_id=" . $entry_id . "' target='_blank'> ".  $ledger['name'] . "</a>";
			return $html;
		}
		return;
	}

	function get_opp_ledger_name($entry_id, $entry_type_label, $ledger_type, $output_type)
	{
		$output = '';
		if ($ledger_type == 'D')
			$opp_ledger_type = 'C';
		else
			$opp_ledger_type = 'D';
		
		$opp_entry_name_d = getSingleRow("select * from mfp_entry_items where entry_id='$entry_id' and dc='$opp_ledger_type'");
		
		if ($opp_entry_name_d['id'])
		{
			$opp_led = getSingleRow("select * from mfp_ledgers where id='".$opp_entry_name_d['ledger_id']."'");
			$opp_ledger_name = $opp_led['name'];
			
			if (no_of_rows("select * from mfp_entry_items where entry_id='$entry_id' and dc='$opp_ledger_type'") > 1)
			{
				if ($output_type == 'html')
					$output = "<a href='".JURI::root('true')."/myfiles/entries/voucher.php?entry_id=" . $entry_id . "' target='_blank'> (".  $opp_ledger_name . ") </a>";
				else
					$output = "(" . $opp_ledger_name . ")";
			} else {
				if ($output_type == 'html')
					$output = "<a href='".JURI::root('true')."/myfiles/entries/voucher.php?entry_id=" . $entry_id . "' target='_blank'> ".  $opp_ledger_name . " </a>";
				else
					$output = $opp_ledger_name;
			}
		}
		return $output;
	}
	
	function get_opp_ledger_id($entry_id, $entry_type_label, $ledger_type) //Not use
	{
		$output = '';
		if ($ledger_type == 'D')
			$opp_ledger_type = 'C';
		else
			$opp_ledger_type = 'D';
		$this->db->from('entry_items')->where('entry_id', $entry_id)->where('dc', $opp_ledger_type);
		$opp_entry = $this->db->get();
		$opp_entry_re = $opp_entry->row();
		return $opp_entry_re->ledger_id;
	}

	function get_ledger_balance($ledger_id)
	{
		list ($op_bal, $op_bal_type) = $this->get_op_balance($ledger_id);

		$dr_total = $this->get_dr_total($ledger_id);
		$cr_total = $this->get_cr_total($ledger_id);

		$total = float_ops($dr_total, $cr_total, '-');
		if ($op_bal_type == "D")
			$total = float_ops($total, $op_bal, '+');
		else
			$total = float_ops($total, $op_bal, '-');

		return $total;
	}
	
	function get_ledger_balance_by_date($ledger_id, $e_date)
	{
		list ($op_bal, $op_bal_type) = $this->get_op_balance($ledger_id);

		$c_amount = getSingleRow("select sum(amount) as c_amount from mfp_entry_items ei 
									 join mfp_entries e on e.id = ei.entry_id 
									 where ledger_id = '$ledger_id' and date <= '$e_date' and dc='C'");
									 
		$cr_total = $c_amount['c_amount'];
		
		$d_amount = getSingleRow("select sum(amount) as d_amount from mfp_entry_items ei 
								 join mfp_entries e on e.id = ei.entry_id 
								 where ledger_id = '$ledger_id' and date <= '$e_date' and dc='D'");
									 
		$dr_total = $d_amount['d_amount'];
			
		$total = float_ops($dr_total, $cr_total, '-');
		
		if ($op_bal_type == "D")
			$total = float_ops($total, $op_bal, '+');
		else
			$total = float_ops($total, $op_bal, '-');
		
		return $total;
	}

	function get_op_balance($ledger_id)
	{
		$op_bal = getSingleRow("select * from mfp_ledgers where id = '$ledger_id'");
		if ($op_bal['id'])
			return array($op_bal['op_balance'], $op_bal['op_balance_dc']);
		else
			return array(0, "D");
	}
	
	function get_op_balance_by_date($ledger_id, $s_date)
	{
		$op_bal = getSingleRow("select * from mfp_ledgers where id='$ledger_id'");
		if ($op_bal['id'])
		{
			$c_amount = getSingleRow("select sum(amount) as c_amount from mfp_entry_items ei 
									 join mfp_entries e on e.id = ei.entry_id 
									 where ledger_id = '$ledger_id' and date < '$s_date' and dc='C'");
			
			$d_amount = getSingleRow("select sum(amount) as d_amount from mfp_entry_items ei 
									 join mfp_entries e on e.id = ei.entry_id 
									 where ledger_id = '$ledger_id' and date < '$s_date' and dc='D'");
									 			
			
			$actual_op_bal = $op_bal['op_balance'];
			if($op_bal['op_balance_dc'] == "C")
			{
				$actual_op_bal = $op_bal['op_balance'] * -1;
			}
			
			$op_balance = $actual_op_bal + $d_amount['d_amount'];
			$op_balance = $op_balance - $c_amount['c_amount'];
			
			$dc = "D";
			if($op_balance < 0)
			{
				$op_balance = $op_balance * -1;
				$dc = "C";
			}
			return array($op_balance, $dc);
		}
		else
			return array(0, "D");
	}

	function get_diff_op_balance()
	{
		/* Calculating difference in Opening Balance */
		$fy_id = active_fy_id();
		$total_op = 0;
		$ledgers_q = getMultipleRows("select * from mfp_ledgers where fy_id = '$fy_id' order by id asc");
		foreach ($ledgers_q as $row)
		{
			list ($opbalance, $optype) = $this->get_op_balance($row['id']);
			if ($optype == "D")
			{
				$total_op = float_ops($total_op, $opbalance, '+');
			} else {
				$total_op = float_ops($total_op, $opbalance, '-');
			}
		}
		return $total_op;
	}
	
	function get_diff_op_balance_by_date($s_date, $e_date)
	{
		/* Calculating difference in Opening Balance */
		$fy_id = active_fy_id();
		$total_op = 0;
		$ledgers_q = getMultipleRows("select * from mfp_ledgers where fy_id = '$fy_id' order by id asc");
		foreach ($ledgers_q as $row)
		{
			list ($opbalance, $optype) = $this->get_op_balance_by_date($row['id'], $s_date);
			if ($optype == "D")
			{
				$total_op = float_ops($total_op, $opbalance, '+');
			} else {
				$total_op = float_ops($total_op, $opbalance, '-');
			}
		}
		return $total_op;
	}

	/* Return debit total as positive value */
	function get_dr_total($ledger_id)
	{
		$dr_total = getSingleRow("select sum(amount) as drtotal from mfp_entry_items ei join mfp_entries e on e.id = ei.entry_id where ei.ledger_id = '$ledger_id' and ei.dc = 'D'");
		if ($dr_total['drtotal'])
			return $dr_total['drtotal'];
		else
			return 0;
	}
	
	function get_dr_total_by_date($ledger_id, $s_date, $e_date, $cost_center_id=0)
	{
		if($cost_center_id == 0)
		{
			$dr_total = getSingleRow("select sum(amount) as drtotal 
										from mfp_entry_items ei 
										join mfp_entries e on e.id = ei.entry_id 
										where ei.ledger_id = '$ledger_id' and ei.dc = 'D' 
										and e.date >= '$s_date' and e.date <= '$e_date'");
		}
		else
		{
			$dr_total = getSingleRow("select sum(amount) as drtotal 
										from mfp_entry_items ei 
										join mfp_entries e on e.id = ei.entry_id 
										where ei.ledger_id = '$ledger_id' and ei.dc = 'D' 
										and e.date >= '$s_date' and e.date <= '$e_date' and e.cost_center_id='$cost_center_id'");			
		}
		if ($dr_total['drtotal'])
			return $dr_total['drtotal'];
		else
			return 0;
	}

	/* Return credit total as positive value */
	function get_cr_total($ledger_id)
	{
		$cr_total = getSingleRow("select sum(amount) as crtotal from mfp_entry_items ei join mfp_entries e on e.id = ei.entry_id where ei.ledger_id = '$ledger_id' and ei.dc = 'C'");
		if ($cr_total['crtotal'])
			return $cr_total['crtotal'];
		else
			return 0;
	}
	
	function get_cr_total_by_date($ledger_id, $s_date, $e_date, $cost_center_id=0)
	{
		if($cost_center_id == 0)
		{
			$cr_total = getSingleRow("select sum(amount) as crtotal 
										from mfp_entry_items ei 
										join mfp_entries e on e.id = ei.entry_id 
										where ei.ledger_id = '$ledger_id' and ei.dc = 'C' 
										and e.date >= '$s_date' and e.date <= '$e_date'");
		}
		else
		{
			$cr_total = getSingleRow("select sum(amount) as crtotal 
										from mfp_entry_items ei 
										join mfp_entries e on e.id = ei.entry_id 
										where ei.ledger_id = '$ledger_id' and ei.dc = 'C' 
										and e.date >= '$s_date' and e.date <= '$e_date' and e.cost_center_id='$cost_center_id'");
		}
		
		if ($cr_total['crtotal'])
			return $cr_total['crtotal'];
		else
			return 0;
	}

	/* Delete reconciliation entries for a Ledger account */
	function delete_reconciliation($ledger_id) //Not use
	{
		$update_data = array(
			'reconciliation_date' => NULL,
		);
		$this->db->where('ledger_id', $ledger_id)->update('entry_items', $update_data);
		return;
	}
}





















<?php
// include "myfiles/dbclass.php";
// include "myfiles/common.php";
include "myfiles/LedgerClass.php";


$fy_id = active_fy_id();
$fyear = getSingleRow("select * from mfp_fyear where id='$fy_id'");

$s_date = $fyear['start_date'];
$e_date = $fyear['end_date'];

if(isset($_GET['led_id']))
	$ledger_ids[0] = $_GET['led_id'];
else
	$ledger_ids = array();
	
$cost_center_id = 0;
if(isset($_POST['generate']))
{
	$s_date = $_POST['start_date'];
	$e_date = $_POST['end_date'];
	if(isset($_POST['ledger_id']))
		$ledger_ids = $_POST['ledger_id'];
	
	$cost_center_id = $_POST['cost_center_id'];
}


?>

<form action="" method="POST">
<table>
<tr>
	<th>Start Date: </th>
	<td> <input type="date" name="start_date" value="<?php echo $s_date ?>"> </td>
	<th>End Date: </th>
	<td> <input type="date" name="end_date" value="<?php echo $e_date ?>"> </td>
</tr>
<tr>
	<td colspan="4"> 
	<input type="text" id="filtertextbox" placeholder="filter box" style="width:530px"/>
	<select name="ledger_id[]" class="easyui-combobox" id="filterselect" multiple multiline="true" style="height:100px; width:530px">
	<?php
		$ledgers = getMultipleRows("select * from mfp_ledgers where fy_id = '$fy_id' order by acc_code asc");
		foreach($ledgers as $led)
		{
			$sel = "";
			if(in_array($led['id'], $ledger_ids))
				$sel = " selected ";
				
			echo "<option value='".$led['id']."' '$sel'>( ".$led['acc_code']. ' ) ' . $led['name'] . "</option>";
		}
	?>
	</select>
	</td>
</tr>
<tr>
	<td colspan="4"> 
	<select name="cost_center_id" style="width:530px">
	<option value="0">All</option>
	<?php
		$cost_center = getMultipleRows("select * from mfp_cost_centers order by name asc");
		foreach($cost_center as $coce)
		{
			$sel = "";
			if($coce['id'] == $cost_center_id)
				$sel = " selected ";
				
			echo "<option value='".$coce['id']."' '$sel'>" . $coce['name'] . "</option>";
		}
	?>
	</select>
	</td>
</tr>
<tr>
	<td> <input type="submit" name="generate" value="Generate"> </td>
</tr>	
</table>
</form>

<div style="float:right; margin-right:20%">
<?php
///// download start //////
if(isset($ledger_ids[0]))
{
	echo '<form action="'.JURI::root('true').'/myfiles/reports/ledger/msExcelExport.php" method="POST" target="_blank">';	
	foreach($ledger_ids as $ledger_id)
	{
		echo '<input type="hidden" name="ledger_ids[]" value="'.$ledger_id.'">';
	}
	echo '<input type="hidden" name="s_date" value="'.$s_date.'">';
	echo '<input type="hidden" name="e_date" value="'.$e_date.'">';
	echo '<input type="hidden" name="cost_center_id" value="'.$cost_center_id.'">';
	echo '<input type="submit" name="download" value="   Download" style="background: url(myfiles/images/download.png); background-repeat: no-repeat;
			background-position: left; padding: 7px 9px 6px 11px; background-color: #4caf50;">
	</form>';
}
///// download ends ////////
?>
</div>


<?php

$g_dr_total = 0;
$g_cr_total = 0;	
foreach($ledger_ids as $ledger_id)
{
if ($ledger_id != 0)
{
	$LedgerClass = new LedgerClass();
	
	list ($opbalance, $optype) = $LedgerClass->get_op_balance_by_date($ledger_id, $s_date); // Opening Balance 
	$clbalance = $LedgerClass->get_ledger_balance_by_date($ledger_id, $e_date); // Final Closing Balance 

	// Ledger Summary 
	
	echo "<br><hr>";
	
	$ledger = getSingleRow("select * from mfp_ledgers where id = '$ledger_id'");
	echo "<div align='center'> <u> <b> ". $ledger['name'] . " </b> </u> </div>";
	
	echo "<table class=\"ledger-summary\" style='width:30%'>";
	echo "<tr>";
	echo "<td><b>Opening Balance</b></td><td>" . convert_opening($opbalance, $optype) . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><b>Closing Balance</b></td><td>" . convert_amount_dc($clbalance) . "</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td><b>Budget</b></td><td>" . $ledger['budget'] . "</td>";
	echo "</tr>";
	
	
	echo "</table>";
	echo "<br />";
	
	
	if($cost_center_id == 0)
	{
		$ledgerst_q = getMultipleRows("select e.id as entries_id, e.number as entries_number, e.date as entries_date, e.narration as entries_narration, 
									e.entry_type as entries_entry_type, ei.amount as entry_items_amount, ei.dc as entry_items_dc, e.cheque_no, 
									p.name as proj_name, c.name as cost_center from mfp_entries e 
									join mfp_entry_items ei on e.id = ei.entry_id 
									join mfp_cost_centers c on e.cost_center_id = c.id 
									left join mfp_projects p on e.project_id = p.id 
									where ei.ledger_id = '$ledger_id' and e.date >= '$s_date' and e.date <= '$e_date' 
									order by e.date asc");
	}
	else
	{
		$ledgerst_q = getMultipleRows("select e.id as entries_id, e.number as entries_number, e.date as entries_date, e.narration as entries_narration, 
									e.entry_type as entries_entry_type, ei.amount as entry_items_amount, ei.dc as entry_items_dc, e.cheque_no, 
									p.name as proj_name, c.name as cost_center from mfp_entries e 
									join mfp_entry_items ei on e.id = ei.entry_id 
									join mfp_cost_centers c on e.cost_center_id = c.id 
									left join mfp_projects p on e.project_id = p.id 
									where ei.ledger_id = '$ledger_id' and e.date >= '$s_date' and e.date <= '$e_date' 
									and e.cost_center_id = '$cost_center_id' 
									order by e.date asc");
	}
	
	echo "<table border=1px cellpadding=5 class=\"simple-table ledgerst-table\" style='width:90%;'>";

	echo "<thead style='background: brown;color: white;'>
			<tr><th>Date</th><th>No.</th><th>Ledger Name</th><th>Cheque #</th><th>Debit</th><th>Credit</th><th>Balance</th><th>Sector</th></tr>
		  </thead>";
	$odd_even = "odd";

	$cur_balance = 0;

	// Opening balance 
	if ($optype == "D")
	{
		echo "<tr class=\"tr-balance\"><th colspan=6>Opening Balance</th><td colspan=2>" . convert_opening($opbalance, $optype) . "</td> <td> </td></tr>";
		$cur_balance = float_ops($cur_balance, $opbalance, '+');
	} 
	else 
	{
		echo "<tr class=\"tr-balance\"><th colspan=6>Opening Balance</th><td colspan=2>" . convert_opening($opbalance, $optype) . "</td> <td> </td></tr>";
		$cur_balance = float_ops($cur_balance, $opbalance, '-');	
	} 

	$total_dr = 0;
	$total_cr = 0;
	foreach ($ledgerst_q as $row)
	{
		$current_entry_type = getSingleRow("select * from mfp_entry_types where id ='".$row['entries_entry_type'] . "'");

		echo "<tr class=\"tr-" . $odd_even . "\">";
		echo "<td>" . $row['entries_date'] .  "</td>";
		echo "<td> <a href='".JURI::root('true')."/myfiles/entries/voucher.php?entry_id=" . $row['entries_id'] . "' target='_blank'>" . $current_entry_type['prefix'] .  $row['entries_number']  . " </a></td>";
		
		// Getting opposite Ledger name 
		echo "<td>";
		echo $LedgerClass->get_opp_ledger_name($row['entries_id'], $current_entry_type['id'], $row['entry_items_dc'], 'html');
		if ($row['entries_narration'])
			echo "<div class=\"small-font\">" . character_limiter($row['entries_narration'], 50) . "</div>";
		echo "</td>";

		echo "<td>";
		echo $row['cheque_no'];
		echo "</td>";
		if ($row['entry_items_dc'] == "D")
		{
			//print $row->entry_items_amount;
			//exit;
			
			$cur_balance = float_ops($cur_balance, $row['entry_items_amount'], '+');
			
			
			echo "<td>";
			//echo convert_dc($row->entry_items_dc);
			echo " ";
			echo $row['entry_items_amount'];
			echo "</td>";
			echo "<td></td>";
			
			$total_dr += $row['entry_items_amount'];
		} else {
			$cur_balance = float_ops($cur_balance, $row['entry_items_amount'], '-');
			echo "<td></td>";
			echo "<td>";
			//echo convert_dc($row->entry_items_dc);
			echo " ";
			echo $row['entry_items_amount'];
			echo "</td>";
			
			$total_cr += $row['entry_items_amount'];
		}
		echo "<td>";
		echo convert_amount_dc($cur_balance);
		echo "</td>";
		
		echo "<td>";
		echo $row['cost_center'];
		echo "</td>";
		
		/*
		echo "<td>";
		echo $row['proj_name'];
		echo "</td>";
		  */
		  
		echo "</tr>";
		$odd_even = ($odd_even == "odd") ? "even" : "odd";
	}

	// Current Page Closing Balance 
	echo "<tr class=\"tr-balance\"><th colspan=4>Closing</th> <th> $total_dr </th> <th> $total_cr </th> <th>" .  convert_amount_dc($cur_balance) . "</th> <td> </td><td> </td> </tr>";
	echo "</table>";
	
	$g_dr_total += $total_dr;
	$g_cr_total += $total_cr;
}
}		
?>

<hr>
<table width="80%">
<tr>
	<th> Total Dr. </th> 
	<th> Total Cr. </th>
	<th> Balance. </th>
</tr>
<tr>
	<td><?php echo $g_dr_total  ?></td>
	<td><?php echo $g_cr_total  ?></td>
	<td><?php echo convert_amount_dc($g_dr_total - $g_cr_total)  ?></td>
</tr>
</table>