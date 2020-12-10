-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3307
-- 生成日期： 2020-12-10 14:46:12
-- 服务器版本： 8.0.12
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `open`
--

-- --------------------------------------------------------

--
-- 表的结构 `4343_activity`
--

CREATE TABLE `4343_activity` (
  `act_id` int(11) NOT NULL COMMENT '活动ID',
  `act_title` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '活动名称',
  `act_content` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '活动描述内容',
  `act_start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '活动开始时间',
  `act_end_date` datetime NOT NULL COMMENT '活动结束时间',
  `act_integral` decimal(10,2) NOT NULL COMMENT '积分',
  `su_id` int(11) NOT NULL COMMENT '创建该活动的管理员ID',
  `act_tag` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标签',
  `act_img` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `4343_activity`
--

INSERT INTO `4343_activity` (`act_id`, `act_title`, `act_content`, `act_start_date`, `act_end_date`, `act_integral`, `su_id`, `act_tag`, `act_img`) VALUES
(17, '舞蹈大赛', '你好呀', '2020-12-05 09:46:32', '2020-12-07 09:46:35', '0.40', 1, '体育', '5fcae65ec805f.jpg'),
(18, '足球赛', '周六中午', '2020-12-05 17:02:15', '2020-12-07 18:02:00', '0.30', 1, '体育', '5fcb4c786fbbd.jpg'),
(19, '器乐大赛', '233', '2020-12-05 20:29:45', '2020-12-06 17:29:51', '0.50', 1, '文娱', '5fcb530227d38.jpg'),
(20, '篮球赛', '高地篮球场\n周六有比赛', '2020-12-05 17:00:32', '2020-12-05 18:00:40', '0.30', 1, '体育', '5fcb5a39b0f77.jpg'),
(21, '舞蹈半决赛', '当观众', '2020-12-05 18:54:00', '2020-12-07 18:54:05', '0.20', 1, '文娱', '5fcb66c11dbc0.jpg'),
(22, '足球赛', '周六中午12.00有足球赛', '2020-12-08 21:20:51', '2020-12-09 21:20:54', '0.50', 1, '体育', '5fcf7dac0c78f.jpeg'),
(23, '篮球赛', '周六有篮球赛', '2020-12-08 21:21:45', '2020-12-22 21:21:48', '0.50', 1, '文娱', '5fcf7de12d14f.jpeg'),
(24, '舞蹈比赛', '周天有舞蹈比赛', '2020-12-09 21:22:42', '2020-12-15 21:22:50', '0.60', 1, '学习', '5fcf7e158ae8c.jpeg'),
(25, '羽毛球比赛', '周三下午体育馆有羽毛球比赛', '2020-12-08 22:04:57', '2020-12-11 22:05:15', '0.10', 1, '志愿者', '5fcf8806e689f.jpeg');

-- --------------------------------------------------------

--
-- 表的结构 `4343_activity_user`
--

CREATE TABLE `4343_activity_user` (
  `au_id` int(11) NOT NULL COMMENT '活动申请ID',
  `act_id` int(11) NOT NULL COMMENT '活动ID',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `au_status` int(11) NOT NULL DEFAULT '2' COMMENT '审核状态,1->通过,2->待审核,3->拒绝',
  `au_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '申请时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `4343_activity_user`
--

INSERT INTO `4343_activity_user` (`au_id`, `act_id`, `user_id`, `au_status`, `au_date`) VALUES
(16, 18, 1, 3, '2020-12-05 17:27:32'),
(17, 17, 1, 1, '2020-12-05 17:27:38'),
(18, 19, 1, 3, '2020-12-05 17:52:54'),
(19, 19, 15, 1, '2020-12-05 17:56:10'),
(20, 18, 15, 3, '2020-12-05 17:56:17'),
(21, 19, 16, 1, '2020-12-05 17:59:28'),
(22, 19, 17, 1, '2020-12-05 18:17:28'),
(23, 18, 17, 1, '2020-12-05 18:17:36'),
(24, 19, 19, 1, '2020-12-05 18:55:22'),
(25, 21, 19, 3, '2020-12-05 18:55:26'),
(26, 18, 19, 1, '2020-12-05 18:55:38'),
(27, 19, 20, 3, '2020-12-06 16:37:54'),
(28, 21, 20, 1, '2020-12-06 16:37:59'),
(29, 24, 22, 1, '2020-12-08 21:46:31'),
(30, 25, 22, 3, '2020-12-08 22:06:03'),
(31, 23, 22, 1, '2020-12-08 22:06:09');

--
-- 触发器 `4343_activity_user`
--
DELIMITER $$
CREATE TRIGGER `4343_activity_user_update` AFTER UPDATE ON `4343_activity_user` FOR EACH ROW BEGIN
IF new.au_status = 1 THEN
INSERT INTO `4343_user_mark`(user_id,act_id) VALUES(new.user_id,new.act_id);
end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `4343_sys_user`
--

CREATE TABLE `4343_sys_user` (
  `su_id` int(11) NOT NULL COMMENT '管理员ID',
  `su_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理员用户民',
  `su_password` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理员密码',
  `su_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '管理员添加时间',
  `su_status` int(11) NOT NULL DEFAULT '1' COMMENT '管理员状态,1->正常,2->禁用'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `4343_sys_user`
--

INSERT INTO `4343_sys_user` (`su_id`, `su_name`, `su_password`, `su_add_date`, `su_status`) VALUES
(1, 'yiarce', 'NJN2gU64LAFaMrNp2OF/DfKCRXFZVx63Bk91SQO92OHmRXrwLJ9d6uHt9d4iKdjY5hyiAA/jmr/ejRJ7lm07v0NasjkC8fO2CqayBaM7YjWQGv9H2aT11C+c7FXLJNToGpDvh3P8J1mWEWZbpjFS2VZi+qKIhj0Ezutz8HFdMf5oLPfI9qKel80K3i5wqqxpGG6WPYL3Z+atET8u9lh2AE8zW+3bJrau5MEBa317NHN9AIjkjbRnbspp/3LX8EdhMzTtAzMGgGP/u0O91XvrEsLtv8GIEFnOb4KWuN4FK30RVBGJ1YyTFKn/rA6Azi6AtcFLHQnCwXBudKPndy+qhg==', '2020-11-16 15:14:43', 1);

-- --------------------------------------------------------

--
-- 表的结构 `4343_user`
--

CREATE TABLE `4343_user` (
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `user_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `user_password` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户密码',
  `user_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '用户注册时间',
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '用户状态,1->正常,2->禁用',
  `user_email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮箱',
  `user_avatar` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_sex` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '小姐姐'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `4343_user`
--

INSERT INTO `4343_user` (`user_id`, `user_name`, `user_password`, `user_add_date`, `user_status`, `user_email`, `user_avatar`, `user_sex`) VALUES
(1, 'yiarce', 'NJN2gU64LAFaMrNp2OF/DfKCRXFZVx63Bk91SQO92OHmRXrwLJ9d6uHt9d4iKdjY5hyiAA/jmr/ejRJ7lm07v0NasjkC8fO2CqayBaM7YjWQGv9H2aT11C+c7FXLJNToGpDvh3P8J1mWEWZbpjFS2VZi+qKIhj0Ezutz8HFdMf5oLPfI9qKel80K3i5wqqxpGG6WPYL3Z+atET8u9lh2AE8zW+3bJrau5MEBa317NHN9AIjkjbRnbspp/3LX8EdhMzTtAzMGgGP/u0O91XvrEsLtv8GIEFnOb4KWuN4FK30RVBGJ1YyTFKn/rA6Azi6AtcFLHQnCwXBudKPndy+qhg==', '2020-11-16 14:43:10', 1, '1036320143@qq.com', 'http://192.168.43.237/uploads/5fcb667bb8caf.jpg', '1'),
(14, 'elfe', 'txss8dxzSx6BRItU8LnHwG6wyaydV9bufLkxG9+exVHUu7iAhOgGb6bADX9Uc/iyKtEvuTetyNeNPukfTnYFEI7wv9e4+v/HB8TQRb85k7KM9mzdcU2onPvv42Osrjj+mx13RqFL68CIjVuG4K90PnZX2Df1a+km5b9XlHxjmCHXF3PLAkMaQXdICDmJw0rZwj1u3FtBaPmaGGZmNx+HX/aXg/Ux2MruMmGbkxbk8twJK8Rx+r0jPuPh+0c+uo+D9G60TmGEGKHqKcPTIyW0EbDGXLwjT8l5p451lS5jeAAwdPM6k86RNUqyZwAJvhvCHYp+Eirs1dXH/FN6yzKl6A==', '2020-12-05 16:11:26', 1, '2676624343@qq.com', 'http://192.168.43.237/uploads/5fcb4b8eddd89.jpg', '小姐姐'),
(15, 'Ann', 'eOABQwVhkys0Oz9w3QDb4RWAusWteekABZGYNovvrA0Nm0e11EaYyK8MhzchuSnOj1yXM9rs6mkCgt1Bwve6Ni7q3wwCMzHDJsBUYHCzSAHjXZCZ2FTHzuhdtcLm9RhEPFb6r8Cy6D+NfVPJa73aee63ec7wSVAEdZvc1/nXqcpNjSKZ6HlrQ5hnlW7948wA77WcUZYaoZyXQTjBZWWtUYRdvl7PNM2CnWT+GVtTsHL9OT6QzPPFe4uQkaAq06tTKXN6f2KbUiah9rzssvEq6IrVDvTJxc8jhvMSMUy/MMM/BALxWA+y2dyOImmS2YsAMr0cdF3bdVGtc6QsE2KG8Q==', '2020-12-05 17:55:03', 1, '2676624343@qq.com', 'http://192.168.43.237/uploads/5fcb592283548.jpg', '小姐姐'),
(16, 'Alice', 'iyvDeihcvdg0AGNoQJt/6FLQAA1t9sfzs9wdkuqzRrO0Bl98A4m61+WhnbqUT19MJaVK/A5cPP0EbEyTNzPUT+K07mAFqw2CSKDRQbrYMyV5fZvIphRMCGsbMowLw8GmVy1hle48GA4jOyBgXcFeSbMvMnoXG+0sRIA/83SIwtywiFT1sKp92e9EKDXSNXFYPBae6PguCwFg3lgXCqzG7nbUuH8IygdCpQbPh+S/hZsjulK5D8byK77ZofoscB/KEeY/VA/f1Dc9yx+7Op28F5BkwIsKTZvr2AIKIgWRuRVMRljzey7TQsRlyAOqpCSKJJRCUv1cDxmuJO6z3dHPeA==', '2020-12-05 17:59:02', 1, '123456@qq.com', NULL, '小姐姐'),
(17, 'hanhan', 'iyvDeihcvdg0AGNoQJt/6FLQAA1t9sfzs9wdkuqzRrO0Bl98A4m61+WhnbqUT19MJaVK/A5cPP0EbEyTNzPUT+K07mAFqw2CSKDRQbrYMyV5fZvIphRMCGsbMowLw8GmVy1hle48GA4jOyBgXcFeSbMvMnoXG+0sRIA/83SIwtywiFT1sKp92e9EKDXSNXFYPBae6PguCwFg3lgXCqzG7nbUuH8IygdCpQbPh+S/hZsjulK5D8byK77ZofoscB/KEeY/VA/f1Dc9yx+7Op28F5BkwIsKTZvr2AIKIgWRuRVMRljzey7TQsRlyAOqpCSKJJRCUv1cDxmuJO6z3dHPeA==', '2020-12-05 18:17:09', 1, '1772179568@qq.com', 'http://192.168.43.237/uploads/5fcb610bc4483.jpg', '小姐姐'),
(18, '袁淇萱', 'iyvDeihcvdg0AGNoQJt/6FLQAA1t9sfzs9wdkuqzRrO0Bl98A4m61+WhnbqUT19MJaVK/A5cPP0EbEyTNzPUT+K07mAFqw2CSKDRQbrYMyV5fZvIphRMCGsbMowLw8GmVy1hle48GA4jOyBgXcFeSbMvMnoXG+0sRIA/83SIwtywiFT1sKp92e9EKDXSNXFYPBae6PguCwFg3lgXCqzG7nbUuH8IygdCpQbPh+S/hZsjulK5D8byK77ZofoscB/KEeY/VA/f1Dc9yx+7Op28F5BkwIsKTZvr2AIKIgWRuRVMRljzey7TQsRlyAOqpCSKJJRCUv1cDxmuJO6z3dHPeA==', '2020-12-05 18:41:07', 1, '去去去', 'http://192.168.43.237/uploads/5fcb63f6dff96.jpg', '小姐姐'),
(19, '马璇', 'vLOFPi/3Ee1DKz3AfYti/1ajld/ucrr3MeluIkFIZjWHfw8P5xiww5hhBCw7lpd6Hpldv/71bNAcHkKOd3JsJs9q6gHj2WTUSIJVdQULHFi5LF66fV68SQLIz1at7t1VGHSyx41WdRjdpxoIEGp6RtyXr24d2qoEAy5s2IOIJr3+ukiDnjfyuwEJAZXSPYAC7H9jQsDEj4nOd9/q8zGRCPQphvR2ixGnPq8X1NV/yR8DCU2BkgOrHLoWeRF3N/RAwGkxCRJL/Hg1LpGsd9kdKJ4J5woujkGqKIqJT+++Bk9OZins4vPigWeMnnaQfKig246VgIOFF1W/QRYccysLUg==', '2020-12-05 18:55:04', 1, '12345@qq.com', 'http://192.168.43.237/uploads/5fcb6737865c0.jpg', '小姐姐'),
(20, '777', 'G3uXYWFR8Fh18Wyl4QUr3eVJ/JGjISFDeOxgz2YMR8kTy73dIohWB2NvqfpZRdyBtPUQkwz7tI2JTyqvpzsvdsyWFuc0DvLy3THm/AlpN1jxfJVcXihSvJflqSFywPsXe9WLp+pE4OO1Of2arGbdVPYQQMuXEHXqeBkeacCIk/GTII7yGJeHkrRr/H4BqNtdzvor4KnbLfl437r71uZ5ut9c93ghZVanFTnnMcocf6V1q3TMf26nKce9wfMqJdw0lTUaflzG781p+EPV/wIJ1dDJeOTdmZnTpvOVucf1l1WhalYT37zUEqNV5buSpaJjXx4UgwJnUgmpDiri+brVvg==', '2020-12-06 16:37:42', 1, '777', NULL, '小哥哥'),
(21, 'elfe', 'iyvDeihcvdg0AGNoQJt/6FLQAA1t9sfzs9wdkuqzRrO0Bl98A4m61+WhnbqUT19MJaVK/A5cPP0EbEyTNzPUT+K07mAFqw2CSKDRQbrYMyV5fZvIphRMCGsbMowLw8GmVy1hle48GA4jOyBgXcFeSbMvMnoXG+0sRIA/83SIwtywiFT1sKp92e9EKDXSNXFYPBae6PguCwFg3lgXCqzG7nbUuH8IygdCpQbPh+S/hZsjulK5D8byK77ZofoscB/KEeY/VA/f1Dc9yx+7Op28F5BkwIsKTZvr2AIKIgWRuRVMRljzey7TQsRlyAOqpCSKJJRCUv1cDxmuJO6z3dHPeA==', '2020-12-08 21:44:55', 1, '1234', NULL, '小哥哥'),
(22, '明月', 'iyvDeihcvdg0AGNoQJt/6FLQAA1t9sfzs9wdkuqzRrO0Bl98A4m61+WhnbqUT19MJaVK/A5cPP0EbEyTNzPUT+K07mAFqw2CSKDRQbrYMyV5fZvIphRMCGsbMowLw8GmVy1hle48GA4jOyBgXcFeSbMvMnoXG+0sRIA/83SIwtywiFT1sKp92e9EKDXSNXFYPBae6PguCwFg3lgXCqzG7nbUuH8IygdCpQbPh+S/hZsjulK5D8byK77ZofoscB/KEeY/VA/f1Dc9yx+7Op28F5BkwIsKTZvr2AIKIgWRuRVMRljzey7TQsRlyAOqpCSKJJRCUv1cDxmuJO6z3dHPeA==', '2020-12-08 21:46:11', 1, '1234', 'http://192.168.43.237/uploads/5fcf885f1485b.jpeg', '小哥哥'),
(23, '清风', 'iyvDeihcvdg0AGNoQJt/6FLQAA1t9sfzs9wdkuqzRrO0Bl98A4m61+WhnbqUT19MJaVK/A5cPP0EbEyTNzPUT+K07mAFqw2CSKDRQbrYMyV5fZvIphRMCGsbMowLw8GmVy1hle48GA4jOyBgXcFeSbMvMnoXG+0sRIA/83SIwtywiFT1sKp92e9EKDXSNXFYPBae6PguCwFg3lgXCqzG7nbUuH8IygdCpQbPh+S/hZsjulK5D8byK77ZofoscB/KEeY/VA/f1Dc9yx+7Op28F5BkwIsKTZvr2AIKIgWRuRVMRljzey7TQsRlyAOqpCSKJJRCUv1cDxmuJO6z3dHPeA==', '2020-12-08 22:08:08', 1, '2676624343@qq.com', NULL, '小姐姐');

-- --------------------------------------------------------

--
-- 表的结构 `4343_user_mark`
--

CREATE TABLE `4343_user_mark` (
  `um_id` int(11) NOT NULL COMMENT '积分id',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `act_id` int(11) NOT NULL COMMENT '活动ID',
  `um_status` int(11) NOT NULL DEFAULT '1' COMMENT '积分状态,1->正常,2->被撤销'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `4343_user_mark`
--

INSERT INTO `4343_user_mark` (`um_id`, `user_id`, `act_id`, `um_status`) VALUES
(13, 16, 19, 1),
(14, 15, 19, 1),
(15, 17, 18, 1),
(16, 17, 19, 1),
(17, 19, 18, 1),
(18, 19, 19, 1),
(19, 20, 21, 1),
(20, 22, 24, 1),
(21, 22, 23, 1);

--
-- 转储表的索引
--

--
-- 表的索引 `4343_activity`
--
ALTER TABLE `4343_activity`
  ADD PRIMARY KEY (`act_id`);

--
-- 表的索引 `4343_activity_user`
--
ALTER TABLE `4343_activity_user`
  ADD PRIMARY KEY (`au_id`);

--
-- 表的索引 `4343_sys_user`
--
ALTER TABLE `4343_sys_user`
  ADD PRIMARY KEY (`su_id`);

--
-- 表的索引 `4343_user`
--
ALTER TABLE `4343_user`
  ADD PRIMARY KEY (`user_id`);

--
-- 表的索引 `4343_user_mark`
--
ALTER TABLE `4343_user_mark`
  ADD PRIMARY KEY (`um_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `4343_activity`
--
ALTER TABLE `4343_activity`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动ID', AUTO_INCREMENT=26;

--
-- 使用表AUTO_INCREMENT `4343_activity_user`
--
ALTER TABLE `4343_activity_user`
  MODIFY `au_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动申请ID', AUTO_INCREMENT=32;

--
-- 使用表AUTO_INCREMENT `4343_sys_user`
--
ALTER TABLE `4343_sys_user`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `4343_user`
--
ALTER TABLE `4343_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID', AUTO_INCREMENT=24;

--
-- 使用表AUTO_INCREMENT `4343_user_mark`
--
ALTER TABLE `4343_user_mark`
  MODIFY `um_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '积分id', AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
