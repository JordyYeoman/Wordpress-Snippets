
#Loop over the current page category & find if there are children

<?php

$parentCategory = get_the_id();

$term = get_queried_object();
$children = get_terms( $parentCategory->taxonomy, array(
	'parent'    => $parentCategory,
	'hide_empty' => false
	) );

var_dump($children);

if($children){
	echo "We have children categories!";
} else {
	echo "No children categories mate.";
}
?>
