ALTER TABLE `#__joomlathings_details` ADD COLUMN  `catid` int(11) NOT NULL DEFAULT 0 AFTER `alias`;

ALTER TABLE `#__joomlathings_details` ADD COLUMN  `state` tinyint(3) NOT NULL DEFAULT 0 AFTER `alias`;

ALTER TABLE `#__joomlathings_details` ADD KEY `idx_catid` (`catid`);
