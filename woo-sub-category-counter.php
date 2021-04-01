# Loop through the parent category and count the sub categories. 
# Reset loop back to 0 in case you use this multiple times on the same page.

<?php 
  $parentCategory = 3 
?>

<?php

$terms = get_terms( array(
'taxonomy' => 'category',
'hide_empty' => false,
'child_of' => $parentCategory,
) );

$sum = 0;
foreach ($terms as $term) {
$subcat_count = $term->count;
$sum+=$term->count;
}

echo $sum;

$sum = 0;

?>
