<?php
function db()
{
	$li = mysqli_connect("localhost","root","");
	mysqli_select_db($li,"inventory");
	return $li;
	
}

function sale($id)
{
	$l = db();
	$sql = "select * from products where id='$id'";
	$re = mysqli_query($l,$sql);
	$re2 = mysqli_fetch_array($re);
	 $min_qtty = $re2['min_quantity']; 
	 $reorder_qtty = $re2['reorder_quantity']; 
	 $qtty = $re2['quantity']; 
	 $new_qtty = $qtty - 1;
	if($new_qtty < 0) //dont sell non existent items
	{
		return "Item out of stock";
		
	}
	$resp = "";
	if($new_qtty <= $min_qtty)//make order
	{
		$sql = "select * from reorders where product_id='$id' and reorder_status != 1";
	    $re = mysqli_query($l,$sql);
	    if(mysqli_num_rows($re) > 0) //existing reorder request not filled
		{
			$resp .= "Reorder request pending. ";
		}
		else
		{
			$sql = "insert into reorders set product_id='$id'";
		    mysqli_query($l,$sql);
		    $resp .= "Reorder request sent. ";
		}
		
	}
	$sql = "update products set quantity = quantity - 1 where id ='$id'";
	mysqli_query($l,$sql);
	$resp .= "Sale successfull";
	return $resp;
	
}


function get_reorder_qtty($id)
{
	$l = db();
	$sql = "select * from products where id='$id'";
	$re = mysqli_query($l,$sql);
	$re2 = mysqli_fetch_array($re);
	$reorder_qtty = $re2['reorder_quantity']; 
	return $reorder_qtty;
		
}

function get_name($id)
{
	$l = db();
	$sql = "select * from products where id='$id'";
	$re = mysqli_query($l,$sql);
	$re2 = mysqli_fetch_array($re);
	$name = $re2['name']; 
	return $name;
		
}

function get_prod_id($id)
{
	$l = db();
	$sql = "select * from reorders where id='$id'";
	$re = mysqli_query($l,$sql);
	$re2 = mysqli_fetch_array($re);
	$id = $re2['product_id']; 
	return $id;
		
}
function reorder($id)
{
	
	$l = db();
	$sql = "select * from reorders where id='$id' and reorder_status = 1";
	$re = mysqli_query($l,$sql);
	if(mysqli_num_rows($re) > 0) //reorder request filled
	{
		$resp = "Reorder request already filled. ";
		return $resp;
	}
	$pid = get_prod_id($id);
	$qtty = get_reorder_qtty($pid);
	$sql = "update products set quantity = quantity + $qtty where id = '$pid'";
	$re = mysqli_query($l,$sql);
	$resp = "Error filling the reorder";
	if($re)
	{
		$sql = "update reorders set date_filled=now(), reorder_status=1 where id = '$id'";
		$re2 = mysqli_query($l,$sql);
	}
	if(@$re2)
	{
		$resp = "Reorder succefully filled";
	}
	//check here and do commit/rollback
    return $resp;	
	
	
}


?>