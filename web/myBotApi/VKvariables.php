<?
// Обрабатываем пришедшие данные
$data = $vk->init('php://input');

$type = $data['type'];

/*
message_new
*/
if ($type == 'message_new') {
$object = $data['object'];
	$message = $object['message'];	
		$date = $message['date'];
		$from_id = $message['from_id'];
		$id = $message['id'];
		$out = $message['out'];
		$peer_id = $message['peer_id'];
		$text = $message['text'];
		$conversation_message_id = $message['conversation_message_id'];
		$fwd_messages = $message['fwd_messages']; // массив
			$fwd_date = $fwd_messages['date'];
			$fwd_from_id = $fwd_messages['from_id'];
			$fwd_text = $fwd_messages['text'];
			$fwd_attachments = $fwd_messages['attachments']; // массив
			$fwd_conversation_message_id = $fwd_messages['conversation_message_id'];
			$fwd_peer_id = $fwd_messages['peer_id'];
			$fwd_id = $fwd_messages['id'];
		$important = $message['important'];
		$random_id = $message['random_id'];
		$attachments = $message['attachments']; // массив
		if ($attachments) {
			foreach($attachments as $attach) {
				$attach_type = $attach['type'];
				if ($attach_type == 'photo') {
					$photo = $attach['photo'];
						$photo_album_id = $photo['album_id'];
						$photo_date = $photo['date'];
						$photo_id = $photo['id'];
						$photo_owner_id = $photo['owner_id'];
						$photo_has_tags = $photo['has_tags'];
						$photo_access_key = $photo['access_key'];
						$photo_sizes = $photo['sizes']; // тоже через цикл надо прогнать
						$photo_text = $photo['text'];
				}elseif ($attach_type == 'audio') {
					$audio = $attach['audio'];
						$audio_artist = $audio['artist'];
						$audio_id = $audio['id'];
						$audio_owner_id = $audio['owner_id'];
						$audio_title = $audio['title'];
						$audio_duration = $audio['duration'];
						$audio_track_code = $audio['track_code'];
						$audio_url = $audio['url'];
						$audio_date = $audio['date'];
						$audio_genre_id = $audio['genre_id'];
				}
			}
		}
		$payload = $message['payload']; // массив
		$is_hidden = $message['is_hidden'];		
	$client_info = $object['client_info'];		
		$button_actions = $client_info['button_actions'];		
		$keyboard = $client_info['keyboard'];
		$inline_keyboard = $client_info['inline_keyboard'];
		$lang_id = $client_info['lang_id'];		
$group_id = $data['group_id'];
$event_id = $data['event_id'];
$secret =  $data['secret'];
}


/*
wall_post_new
*/
if ($type == 'wall_post_new') {
$object = $data['object'];
	$id = $object['id'];
	$from_id = $object['from_id'];
	$owner_id = $object['owner_id'];
	$date = $object['date'];
	$marked_as_ads = $object['marked_as_ads'];
	$post_type = $object['post_type'];
	$text = $object['text'];
	$can_edit = $object['can_edit'];
	$created_by = $object['created_by'];
	$can_delete = $object['can_delete'];
	$attachments = $object['attachments']; // массив
	if ($attachments) {
		foreach($attachments as $attach) {
			$attach_type = $attach['type'];
			if ($attach_type == 'photo') {
				$photo = $attach['photo'];
					$photo_album_id = $photo['album_id'];
					$photo_date = $photo['date'];
					$photo_id = $photo['id'];
					$photo_owner_id = $photo['owner_id'];
					$photo_has_tags = $photo['has_tags'];
					$photo_access_key = $photo['access_key'];
					$photo_sizes = $photo['sizes']; // тоже через цикл надо прогнать
					$photo_text = $photo['text'];
					$photo_user_id = $photo['user_id'];
			}elseif ($attach_type == 'audio') {
				$audio = $attach['audio'];
					$audio_artist = $audio['artist'];
					$audio_id = $audio['id'];
					$audio_owner_id = $audio['owner_id'];
					$audio_title = $audio['title'];
					$audio_duration = $audio['duration'];
					$audio_track_code = $audio['track_code'];
					$audio_url = $audio['url'];
					$audio_date = $audio['date'];
					$audio_genre_id = $audio['genre_id'];
			}
		}
	}
	$comments = $object['comments']; // массив
	$is_favorite = $object['is_favorite'];
$group_id = $data['group_id'];
$event_id = $data['event_id'];
$secret =  $data['secret'];
}

/*
photo_new
*/
if ($type == 'photo_new') {
$object = $data['object'];
	$album_id = $object['album_id'];
	$date = $object['date'];
	$id = $object['id'];
	$owner_id = $object['owner_id'];
	$has_tags = $object['has_tags'];
	$access_key = $object['access_key'];
	$sizes = $object['sizes']; // тоже через цикл надо прогнать
	if ($sizes) {
		$номер = -1;
		foreach($sizes as $size) {
			$номер++;
			$height[$номер] = $size['height'];
			$url[$номер] = $size['url'];
			$type[$номер] = $size['type'];
			$width[$номер] = $size['width'];
		}
	}
	$text = $object['text'];
	$user_id = $object['user_id'];
$group_id = $data['group_id'];
$event_id = $data['event_id'];
$secret =  $data['secret'];
}


/*
group_change_settings
*/
if ($type == 'group_change_settings') {
$object = $data['object'];
	$user_id = $object['user_id'];
	$changes = $object['changes']; // массив
	if ($changes['website']) {
		$website = $changes['website'];
			$old_value = $website['old_value'];
			$new_value = $website['new_value'];
	}
$group_id = $data['group_id'];
$event_id = $data['event_id'];
$secret =  $data['secret'];
}


/*{
    "type": "wall_reply_edit",
    "object": {
        "id": 56,
        "from_id": 119909267,
        "post_id": 55,
        "owner_id": -190150616,
        "parents_stack": [],
        "date": 1591686599,
        "text": "Вот такой теперь тут коммент.",
        "thread": {
            "count": 0
        },
        "post_owner_id": -190150616
    },
    "group_id": 190150616,
    "event_id": "08d423b0fd75e8846b146a3a34ecb74cf9c34041",
    "secret": "aaQdvgg43sdGgvFs2"
}*/

/*{
    "type": "wall_reply_delete",
    "object": {
        "owner_id": -190150616,
        "id": 52,
        "deleter_id": 119909267,
        "post_id": 51
    },
    "group_id": 190150616,
    "event_id": "e23f733085c088e39565824fbc29f9fbd3c55ab3",
    "secret": "aaQdvgg43sdGgvFs2"
}*/

/*{
    "type": "like_add",
    "object": {
        "liker_id": 119909267,
        "object_type": "photo_comment",
        "object_owner_id": -190150616,
        "object_id": 5,
        "thread_reply_id": 0,
        "post_id": 0
    },
    "group_id": 190150616,
    "event_id": "bbc629b8915cc33a4f3c2c40c88e766829843168",
    "secret": "aaQdvgg43sdGgvFs2"
}*/

/*{
    "type": "photo_comment_new",
    "object": {
        "id": 5,
        "from_id": 119909267,
        "parents_stack": [],
        "date": 1591891406,
        "text": "Тестовый комментарий для метода photos.deleteComment",
        "thread": {
            "count": 0
        },
        "photo_owner_id": -190150616,
        "photo_id": 457239046
    },
    "group_id": 190150616,
    "event_id": "7d56bf46da6e2b1d114548eb2a27da5eb717dc60",
    "secret": "aaQdvgg43sdGgvFs2"
}*/

/*{
    "type": "photo_comment_delete",
    "object": {
        "owner_id": -190150616,
        "id": 5,
        "deleter_id": 119909267,
        "photo_id": 457239046,
        "user_id": 119909267
    },
    "group_id": 190150616,
    "event_id": "55b01f6f6eebf1fbf033ab1b4d3c90bb926574d5",
    "secret": "aaQdvgg43sdGgvFs2"
}*/






$action1 = [
	'type' => 'text',
	'label' => 'primary',
	'payload' => [ 'button' => '1' ]
];

$action2 = [
	'type' => 'text',
	'label' => 'secondary',
	'payload' => [ 'button' => '2' ]
];

$action3 = [
	'type' => 'text',
	'label' => 'negative',
	'payload' => [ 'button' => '3' ]
];

$action4 = [
	'type' => 'text',
	'label' => 'positive',
	'payload' => [ 'button' => '4' ]
];

$кнопки = [
	[
		[
			'action' => $action1,
			'color' => 'primary'
		],
		[
			'action' => $action2,
			'color' => 'secondary'
		]
	],
	[
		[
			'action' => $action3,
			'color' => 'negative'
		],
		[
			'action' => $action4,
			'color' => 'positive'
		]
	]
];

$клавиатура_в_сообщении = [
	'one_time' => false,
	'buttons' => $кнопки,
	'inline' => true
];

?>