ALTER TABLE `#__joomlathings_details` ADD COLUMN  `published` tinyint(1) NOT NULL DEFAULT 0 AFTER `alias`;

ALTER TABLE `#__joomlathings_details` ADD COLUMN  `publish_up` datetime AFTER `alias`;

ALTER TABLE `#__joomlathings_details` ADD COLUMN  `publish_down` datetime AFTER `alias`;

ALTER TABLE `#__joomlathings_details` ADD KEY `idx_state` (`published`);
