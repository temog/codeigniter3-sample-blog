<?php

$config = [
	'blogInsert' => [
		[
			'field' => 'title',
			'label' => 'たいとる',
			'rules' => 'required|max_length[100]',
		],
		[
			'field' => 'description',
			'label' => 'しょうさい',
			'rules' => 'max_length[100]',
		],
	],
];

