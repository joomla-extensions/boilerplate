ALTER TABLE `#__joomlathings_details` ADD COLUMN  `language` char(7) NOT NULL DEFAULT '*' AFTER `alias`;

ALTER TABLE `#__joomlathings_details` ADD KEY `idx_language` (`language`);
