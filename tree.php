<?php
/**
 * @name 得到子级数组
 * @return array 层级数组
 */
function get_child($myid, $data) {
	$a = $newarr = array ();
	if (is_array ( $data )) {
		foreach ( $data as $id => $a ) {
			//父id就是这个
			if ($a ['pid'] == $myid)
				$newarr [$id] = $a;
		}
	}
	return $newarr ? $newarr : false;
}

/**
 * @name 得到层级数组
 * @param int $myid 父级id
 * @param array $data 整理的数据
 * @return array 层级数组
 */
function get_tree_array($myid, $data) {
	$retarray = array ();
	// 一级栏目数组
	$child = $this->get_child ( $myid, $data );
	if (is_array ( $child )) {
		// 数组长度
		$total = count ( $child );
		foreach ( $child as $id => $value ) {
			@extract ( $value );
			$retarray [$id] = $value;
			$child = $this->get_tree_array ( $id, $data );
			if (! empty ( $child )) {
				//子级名称就是这个
				$retarray [$id] ["child"] = $child;
			}
		}
	}
	return array_values ( $retarray );
}