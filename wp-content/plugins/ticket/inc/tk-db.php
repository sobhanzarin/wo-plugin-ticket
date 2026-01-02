<?php
defined('ABSPATH') || exit('No Access !!!');

class TK_Db
{
    public function create_table()
    {
        global $wpdb;
        $departments = $wpdb->prefix . 'tk_departments';
        $users = $wpdb->prefix . 'tk_users';
        $tickets = $wpdb->prefix . 'tk_tickets';
        $replies = $wpdb->prefix . 'tk_replies';

        $charset = $wpdb->get_charset_collate();

        $sql_users = "CREATE TABLE IF NOT EXISTS `" . $users . "` (
        `ID` bigint(20) NOT NULL AUTO_INCREMENT,
        `department_id` bigint(20) NOT NULL,
        `user_id` bigint(20) NOT NULL,
        PRIMARY KEY (`ID`),
        KEY `department_id` (`department_id`),
        KEY `user_id` (`user_id`))
        ENGINE=InnoDB " . $charset . ";";

}
