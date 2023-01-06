<?php

// Category Helper
function GetCategory($array, $parent, $shift, $active)
{
	foreach($array as $row)
	{
		if($row->parent == $parent)
		{
			if($row->id == $active)
			{
				echo "<option selected value='$row->id'>".$shift.$row->name.'</option>';
			}
			else
			{
				echo "<option value='$row->id'>".$shift.$row->name.'</option>';
			}
			GetCategory($array, $row->id, $shift.'---|', $active);
		}
	}
}

function ShowCategory($array, $parent, $shift)
{
	foreach($array as $row)
	{
		if($row->parent == $parent)
		{
			
			echo "<div class='item-menu'>
					  <span>".$shift.$row->name."</span>
				  	  <div class='category-fix'>
				  		  <a class='btn-category btn-primary' href='admin/category/edit/".$row->id."'><i class='fa fa-edit'></i></a>
				  		  <a onclick='return AlertCategory()' class='btn-category btn-danger' href='admin/category/delete/".$row->id."'><i class='fas fa-times'></i></a>
				  	  </div>
				  </div>";
			ShowCategory($array, $row->id, $shift.'---|');
		}
	}
}

//input $product->model
function attribute_value($product)
{
	$result = array();

	if(isset($product)) {
		foreach($product->values as $value)
		{
			$key = $value->attribute->name;
			$result[$key][] = $value->value;
		}
	}

	return $result;
}

//input: array('size'=>array(1,2),'color'=>array(4))   output: array(array(1,4),array(2,4));
function get_combinations($arrays) {
	$result = array(array());

	if(isset($arrays)) {
		foreach ($arrays as $property => $property_values) {
			$tmp = array();
	
			foreach ($result as $result_item) {
				foreach ($property_values as $property_value) {
					$tmp[] = array_merge($result_item, array($property => $property_value));
				}
			}
	
			$result = $tmp;
		}
	}

	return $result;
}

//kiểm tra check input edit product 
function check_value($product, $value_check)
{
	foreach ($product->values as $value) {
		if($value->id == $value_check)
		{
			return true;
		}
	}

	return false;
}
