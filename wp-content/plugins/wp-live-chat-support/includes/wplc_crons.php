<?php
if ( ! defined( 'ABSPATH' ) ) {
	die();
}
add_action( 'admin_init', 'wplc_schedule_update_chats' );
add_action( 'wplc_cron_update_chats_hook', 'wplc_cron_update_chats' );
add_filter( 'cron_schedules', 'wplc_five_minutes_schedule' );
function wplc_five_minutes_schedule( $schedules ) {
	$schedules['five_minutes'] = array(
		'interval' => 300,
		'display'  => esc_html__( 'Every Five Minutes' ), );
	return $schedules;
}

function wplc_schedule_update_chats() {
	if ( ! wp_next_scheduled( 'wplc_cron_update_chats_hook' ) ) {
		wp_schedule_event( time() + 60, 'five_minutes', 'wplc_cron_update_chats_hook' );
	}
}

function wplc_cron_update_chats(){
	global $wpdb;
	$chats = TCXChatData::get_incomplete_chats( $wpdb, - 1 ,array(ChatStatus::MISSED ,ChatStatus::OLD_ENDED ,ChatStatus::PENDING_AGENT ,ChatStatus::ACTIVE,ChatStatus::NOT_STARTED ,ChatStatus::ENDED_BY_AGENT ,ChatStatus::ENDED_BY_CLIENT,ChatStatus::ENDED_DUE_AGENT_INACTIVITY,ChatStatus::ENDED_DUE_CLIENT_INACTIVITY) );
	TCXChatHelper::update_chat_statuses( $chats,false );
}

