<?php
	$content_type = "-";
	if (isset($component_data['content_type'])) $content_type = $component_data['content_type'];
?>
/* create variable and load to created variable content list from server via ContentService */
$scope.content_list_<?php echo $component_data['page_component_id']?> = [];
$scope.contentService.loadList(1).then(reponse=>{
 $scope.content_list_<?php echo $component_data['page_component_id']?> =  reponse.data;
 console.log($scope.content_list_<?php echo $component_data['page_component_id']?>);
});