<?php

global $wpdb;
$charset_collate = $wpdb->get_charset_collate();

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

$table_name = $wpdb->prefix . 'form_data';
$sql = "CREATE TABLE IF NOT EXISTS $table_name(
id INTEGER NOT NULL AUTO_INCREMENT,
name VARCHAR(100) DEFAULT '',
lastname VARCHAR(100) DEFAULT '',
email VARCHAR(100) DEFAULT '',
data_inserimento DATETIME DEFAULT CURRENT_TIMESTAMP,

PRIMARY KEY (id)


) $charset_collate;";

dbDelta($sql);
