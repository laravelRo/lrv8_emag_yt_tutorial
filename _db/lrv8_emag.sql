-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 06:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrv8_emag`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'category.jpg',
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `promo` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `section_id`, `slug`, `name`, `title`, `description`, `photo`, `icon`, `position`, `active`, `promo`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'neutral-running-shoes_FBle', 'Neutral Running Shoes', 'Shoes for every day running on the road', '<h2>Upgrade Your Collection With Neutral Running Shoes</h2>\r\n\r\n<p>No matter what the time or place it, now you can run without any trouble with the right set of running shoes by your side. There are different types of runners all over the world. Some would like to run on the track with a predefined path in order to develop a pattern, while the other lot would like to run in the wild, in an uneven or fortified path in order to really experience their jogging session to its best. It doesn&rsquo;t matter what kind of runner you are, but with these neutral running shoes, you are bound to fulfil every requirement of yours.</p>\r\n\r\n<p>There is a reason why these shoes are so much in demand. They let a runner jog in every kind of condition, without any trouble. Neutral shoes are also extremely lightweight in nature and let a runner attain just the right balance they want. They are preferred by thousands of fitness enthusiasts out there, as they are fit not only to be taken on the track or in the wild, but you can also hit the gym while wearing these amazing shoes.</p>', 'NeutralRunningShoes_1637584328.jpg', NULL, 20, 1, 0, 'Neutral running shoes', 'Neutral running shoes', 'Neutral running shoes', '2021-10-27 11:35:56', '2021-11-22 10:32:28'),
(2, 1, 'fitness-shoes_NbQC', 'Fitness shoes', 'Shoes for gym and fitness exercises', '<h2>Buy Your Next Pair Of Fitness Shoes From Us</h2>\r\n\r\n<p>Every runner is particular about the way they jog. There are plenty of fitness enthusiasts out there who prefers nothing else than a good and comfortable pair of fitness shoes to accompany them during their running sessions. These shoes are not only durable in nature, but are also composed of lightweight materials that enable the runner to have a flawless leg movement. If you are buying a new pair of shoes for the purpose of walking or jogging, then we must recommend one of these shoes. They will certainly let you warm up to your fitness regime and you can easily hit the gym in style while wearing these.</p>\r\n\r\n<p>It is the overall composition and design of these training shoes that sets them apart from their counterparts. They have an uneven sole which is designed in such a way that it would optimize the effort and energy of a runner. Since it has an uneven sole, it will make sure that heel region is dropped at a lower stage that the rest of the foot. This will help you maintain a better synchronization while running and you would attain a flawless composition without any trouble. The composition guarantees to put you at ease while letting you stay comfortable during those long strolls.</p>', 'Fitnessshoes_1637589800.jpg', NULL, 40, 1, 0, 'Fitness shoes', 'Fitness shoes for gym exercises and fitness', 'fitness shoes, gym exercises, street training', '2021-10-27 11:35:56', '2021-11-22 12:03:20'),
(4, 1, 'competition-shoes_bwwa', 'Competition shoes', 'Shoes for running competions or very fast runnings', '<h2>Running shoes for experienced runners</h2>\r\n\r\n<h3>Fast light running shoes</h3>\r\n\r\n<p>Every fitness enthusiast and runner knows that in order to get better, they need to beat their own record. When it comes to running, your biggest competitor is yourself and in order to bring an edge to the way you jog, you need the support of some of the best running shoes out there. In order to let our customers experience a great time shopping with us, we have handpicked some of the best competition shoes from a range of various brands like Asics, Li-Ning, Puma, Nike, Adidas, and a lot more. One can see how we have collected such a diverse range of brands, letting our customers have no excuse to buy their favourite products.</p>\r\n\r\n<p>This is one of the main reasons why Jogging-Point is such a reputed name in the industry. We are one of the most recommended online stores to buy running products as we have a diverse range that is presented in an easy to navigate manner. We have provided various filters so that our customers can pick the product they like the most of the basis of their gender, colour choice, size, the ongoing promotion, the preferred brand, and a lot more.</p>', 'Competitionshoes_1637582432.jpg', NULL, 10, 1, 0, 'Competition shoes', 'Competitions shoes are very light and fast for experienced runners', 'competion shoes, fast, light, rezistent experienced runners', '2021-10-27 11:35:56', '2021-11-22 10:00:32'),
(6, 1, 'trail-shoes_BiY5', 'Trail shoes', 'Trail shoes for running on field, trails, mountain', '<h2>Get A Perfect Pair Of Trail Running Shoes</h2>\r\n\r\n<p>If you would like to run on the grass, terrains, or outdoors, then you certainly can&rsquo;t ask for a better pair. Trail running shoes are specially engineered for those who would like to run outdoors and on softer surfaces. You might be wondering what makes these shoes so different form their counterparts. One of the major characteristics which set these shoes apart is their design. These shoes are comparatively less cushioned than other kinds of shoes, letting you run without any trouble on softer surfaces.</p>\r\n\r\n<p>Trail shoes are composed in such a way that they produce a great amount of friction. As while running on the grass, one of the major difficulties comes regarding friction. Theses shoes will make sure that you won&rsquo;t slip or face any other kind of fatal injury while running. Also, they have a lower ground and a smaller heel, which makes it easier for runners to jog on terrains without facing any difficulty.</p>', 'Trailshoes_1637588662.jpg', NULL, 30, 1, 0, 'Trail shoes', 'Trail shoes to run on trail and soft surfaces', 'shoes for trails, mountain, wood and soft surfaces', '2021-10-27 11:35:56', '2021-11-22 11:44:22'),
(8, 2, 'running-shorts_s9J2', 'Running shorts', 'Running short for cool and warm weather', '<h2>Running shorts for race and fast trainning sessions</h2>\r\n\r\n<p>With the assistance of these remarkable running clothing products, you are sure to outshine everyone on the running tracks. It doesn&rsquo;t matter if you are preparing for a competition or if you like to jog to stay fit, with the help of these branded items, you will certainly feel a difference. You would stay more focussed and at ease for hours, so that you can level up the efficiency of your fitness regime.</p>\r\n\r\n<p>If you are inspired by professional runners like Henry Rono, David Moorcroft, Deena Kastor, Irina Mikitenko, Lemi Hayle, and more, then you should definitely do something unique and inspiring as well. With these durable running clothes, you can surely make your dreams come true. They will come handy to you on different occasions and will keep being your companion during those long running sessions for the days to come. Just include the ones you like the most to your cart and complete your purchase.</p>', 'Runningshorts_1637916520.jpg', NULL, 30, 1, 0, 'running shorts', 'running shorts for competion and fast training session', 'running shorts, fast trainings, competition, race running', '2021-10-27 11:35:56', '2021-11-26 06:48:40'),
(9, 2, 'running-pants-qyv3_S3Jq', 'Running pants', 'Shorts and pants for running on every wheater', '<h2>Running pants for cold and warm wheather</h2>\r\n\r\n<p>Each runner has individual needs; therefore we want to provide you with a couple of hints to help you find your perfect running outfit.</p>\r\n\r\n<p><em>It is really important to measure correctly. </em></p>\r\n\r\n<p>Here a couple of rules on how to measure your sizes:</p>\r\n\r\n<p>Hold the measuring tape close but not too tight around the to-be measured part of the body. If you measure yourself alone, try to measure each part a couple of times and take the average of the measurements. Otherwise ask someone for help. Keep in mind that children keep growing so you might have to measure more frequently.</p>', 'Runningpants_1637610527.jpg', NULL, 10, 1, 0, 'Running pants', 'Running pants', 'Running pants', '2021-10-27 11:35:56', '2021-11-22 17:48:47'),
(12, 2, 'running-socks_qsa1', 'Running socks', 'Running socks for confort racing and trainning', '<h2>Running socks for training and competitions</h2>\r\n\r\n<p>Runners obsess over every detail of a <a href=\"https://www.runnersworld.com/gear/a19663621/best-running-shoes/\">running shoe</a> to make sure they have comfort dialed for every step. But many of us will still jam an old cotton sock between that pricey shoe and our foot. The humble sock, however, plays an important role in keeping you dry and warm (or cool).</p>\r\n\r\n<h3>Materials Matter</h3>\r\n\r\n<p>First off, avoid cotton at all costs. Sure, you could safely make it through a 3-mile recovery run in a pair that came from a 12-pack, but on hot or wet days you&rsquo;ll find cotton absorbs an incredible amount of water and easily <a href=\"https://www.runnersworld.com/health-injuries/a19574724/blister-treatment-and-prevention/\">causes blisters</a>. Merino wool, on the other hand, is a fiber you can wear year-round thanks to its ability to regulate temperature, move moisture, and <a href=\"https://www.runnersworld.com/gear/a20859367/how-to-get-rid-of-smelly-shoes/\">resist odors</a>. You&rsquo;ll find it used in many pairs of <a href=\"https://www.runnersworld.com/gear/a20863096/best-compression-socks/\">performance socks</a>. Most, however, use a mix of synthetic fabrics&mdash;nylon, polyester, and spandex&mdash;which offers good value and durability, plus prevents irritation.</p>', 'Runningsocks_1637917209.jpg', NULL, 40, 1, 0, 'running socks', 'running socks for confortable running', 'running socks, competion socks, warm socks', '2021-10-27 11:35:56', '2021-11-26 07:00:09'),
(15, 3, 'dolorem-consequatur-ut-sit-laborum-asperiores_SYHN', 'Dolorem consequatur ut sit laborum asperiores.', 'Non quis minus perferendis exercitationem fugiat maiores enim unde.', 'Et id sequi rerum aut sequi. Vitae ea dolorum fugiat et numquam maiores doloribus. Repellat et itaque pariatur rem voluptatem maiores doloribus impedit. Rerum dolores officiis eius. Molestiae omnis eligendi tempore aut itaque expedita aliquam laudantium.\n\nVel molestiae earum dolorum voluptatem sed quod. Veniam molestiae aperiam labore aperiam fugiat deleniti enim. Odio magnam culpa excepturi non ratione. Quia voluptas veniam ut placeat.\n\nSit et eveniet quod qui est quidem. Assumenda vitae voluptatum aut necessitatibus atque adipisci voluptates. Provident non maxime quisquam in vitae tempore.\n\nPorro voluptatem voluptatem laudantium vel maxime non veniam. Ab consequuntur asperiores dolorum et velit beatae.\n\nUllam delectus quaerat ut. Sunt quia impedit quia et deserunt ut. Deserunt exercitationem ut consequatur quas enim illo voluptatem.', 'category.jpg', NULL, 62, 1, 0, 'Cum quisquam eaque ea sequi explicabo rerum. Fugit dolore ab facilis distinctio. Accusamus molestias nihil animi dolore delectus voluptas consequatur. Sed quo repellat aspernatur et nam harum.', 'Fugiat accusantium sapiente aspernatur iusto delectus quasi atque consequuntur. Perferendis illo officiis sit. Eius officia quia nemo et molestias quo.', 'Laborum sit excepturi eum. Consequatur rerum cum eaque facere molestiae voluptatem tenetur. Est consequatur quis facere vitae vel consequuntur est.', '2021-10-27 11:35:56', '2021-10-27 11:35:56'),
(16, 3, 'sunt-porro-aliquid-voluptatem-eligendi-dignissimos_Zh8i', 'Sunt porro aliquid voluptatem eligendi dignissimos.', 'Perferendis vel inventore possimus hic voluptas consequuntur nesciunt qui.', 'Expedita illum atque mollitia veritatis. Vel cumque praesentium inventore. Dolores est est voluptatem consectetur repellat numquam eaque. Quo omnis illum itaque odit beatae dolores.\n\nIllum placeat pariatur vel molestias sit voluptatem debitis nihil. Laboriosam voluptas voluptas eligendi et et. Nulla dignissimos optio porro natus voluptatem perferendis sunt. Aut vel omnis labore officia quo nulla velit est.\n\nPraesentium vero labore enim. Similique suscipit similique illum quis possimus aliquam. Tempore et rerum sequi deserunt voluptates.', 'category.jpg', NULL, 48, 1, 0, 'Fugiat itaque error quia magni et aut. Vitae consequatur quisquam nihil. Placeat aliquid at quam sit culpa. Et velit accusamus non eos atque.', 'Molestiae accusantium ratione ratione quaerat quia. Necessitatibus doloribus ut eum molestiae ut temporibus.', 'Quia deserunt distinctio cupiditate fugit omnis error aut temporibus. Vero voluptatem voluptatibus dolorum. Repudiandae praesentium earum est a sed. Corporis culpa quia aspernatur.', '2021-10-27 11:35:56', '2021-10-27 11:35:56'),
(17, 3, 'numquam-consequatur-dolores-aut_kdF2', 'Numquam consequatur dolores aut.', 'Non voluptatem qui est rerum alias nam.', 'Et hic suscipit sit magnam. Possimus temporibus libero harum non quod et.\n\nEnim ea similique sed totam reiciendis delectus et consectetur. Omnis dolores corporis distinctio quia eveniet nemo assumenda qui. Ex doloremque necessitatibus maxime non aliquid minus.\n\nDolor et sunt quia consequatur quae fugiat molestiae atque. Itaque dolores odio vel. Ut omnis ullam excepturi culpa.\n\nDolor commodi commodi aliquid quibusdam ut inventore hic enim. Repellendus dicta enim itaque dolorem voluptatem. Beatae odio iste rem necessitatibus.', 'category.jpg', NULL, 91, 1, 0, 'Maxime voluptatem veniam eaque dolor laudantium quis reiciendis iusto. Quia laboriosam et aut voluptatem. Saepe in enim ullam et fugit. Corporis voluptate et sint aut laudantium fugit dolorem magnam.', 'Assumenda cum nihil et quia quisquam et. Tempore culpa veniam est. Odit atque consequuntur ea non architecto necessitatibus. Quidem natus sunt possimus corrupti minima nihil.', 'Enim quia minima aspernatur eius. Exercitationem nihil sit atque. Nostrum voluptatibus eveniet qui eos iste.', '2021-10-27 11:35:56', '2021-10-27 11:35:56'),
(18, 3, 'quidem-nisi-laborum-non-quia_LPxz', 'Quidem nisi laborum non quia.', 'Architecto sed unde provident recusandae quo numquam explicabo.', 'Non in perferendis expedita. Assumenda accusantium officiis vitae a quis provident optio. Harum hic natus sint quod consequuntur aut id. Esse quis id beatae sunt est autem voluptas ex. Temporibus consequuntur est ut a et aut dolorum.\n\nDolorem enim aperiam magni odit atque in. Iste sit rerum beatae et sunt eum magni ut. Rem nihil iusto quaerat et. Tenetur commodi consectetur et. Animi rerum velit labore.\n\nIn tenetur praesentium ex sit officiis quasi qui. Sit eum omnis consectetur blanditiis fugit aut excepturi vero. In minima delectus velit dolorem enim itaque. Est temporibus maiores quis dolores. Doloremque a nulla iste veritatis.\n\nQui tempore a ipsam magnam. Odit in non iusto qui itaque doloribus. Labore ut illum non dolorum possimus atque. Commodi eligendi omnis impedit sit corporis.', 'category.jpg', NULL, 17, 1, 0, 'Odio vel quae quisquam. Omnis et est enim reprehenderit optio tenetur. Tenetur deserunt distinctio quasi esse expedita totam.', 'Quia aspernatur qui earum quam quisquam vitae deleniti. Est nihil qui ut quia. Laborum explicabo velit odit incidunt veritatis molestias excepturi.', 'In in aut rerum iste delectus. Labore animi sit aut modi debitis.', '2021-10-27 11:35:56', '2021-10-27 11:35:56'),
(19, 4, 'perspiciatis-sunt-rem-doloremque_DbDq', 'Perspiciatis sunt rem doloremque.', 'Autem dicta fuga modi quo ab autem sequi cupiditate dolorem.', 'Provident et quo odio. Aut dolorem incidunt dolores ratione voluptatem autem voluptatem. Quidem quas nisi corrupti voluptatem tempore saepe. Ut qui optio repellat adipisci autem et rem magnam.\n\nAccusamus dolores dignissimos quo recusandae dicta quia. Vitae qui aut sed quis veritatis dolorem.\n\nAd saepe quos ex voluptatum eligendi quo sunt et. Omnis sint rerum et excepturi autem unde omnis. Nulla earum inventore consequatur qui maxime nostrum accusantium.\n\nDignissimos quisquam nam quis dolores sint velit. Aut tempore sint doloremque totam sed libero natus. Repellendus voluptatem ipsa quasi. Sint facere eligendi eaque et.', 'category.jpg', NULL, 2, 1, 0, 'Sunt vel magnam qui voluptas maiores consectetur ullam. Nostrum velit placeat magni voluptatem eveniet quos. Nisi totam tenetur tenetur ut. Aut non nihil facere voluptatum aut repellendus vel.', 'Nesciunt qui et officiis et atque vitae ex. Labore provident fuga doloribus et optio dolor. Cupiditate est in quos voluptates. Quo asperiores sit voluptatum ut assumenda veritatis aut a.', 'Consequatur omnis adipisci est dolores qui. Adipisci ipsam eum quia. Aut id quo odit sequi vel expedita veritatis est. Quos maxime nihil molestias.', '2021-10-27 11:35:56', '2021-10-27 11:35:56'),
(20, 4, 'ducimus-accusamus-at-voluptates_RU34', 'Ducimus accusamus at voluptates.', 'Ducimus aut id velit ut sit vitae libero labore ut.', 'Nisi sint occaecati velit asperiores quia sed. Perferendis ut non numquam et. Consequatur eaque amet in facere animi est. Voluptatem nisi et sunt illum ut impedit.\n\nSunt ut nostrum qui eveniet quam et. Provident fugit laudantium veritatis et tempora dolor. At in et dolores iusto quas et omnis.\n\nIste sint mollitia sed quo molestiae aperiam. Voluptates fuga est ut vel est magni. Deleniti eligendi ut voluptatem minus optio accusamus soluta qui. Ut maiores delectus deserunt hic quisquam.\n\nAspernatur ducimus suscipit nobis ab. Nobis sed eum ipsam sit. Recusandae eum quia est magnam ut atque.\n\nEx non laborum veritatis veritatis. Ea nam eum sequi repudiandae debitis totam aut. Eos laborum saepe magni odio iure. Sint aperiam quis architecto officia enim vero aspernatur occaecati.\n\nPorro enim vitae sed repudiandae vero suscipit animi ea. Et et sapiente cupiditate voluptatem qui veniam. Reiciendis quisquam ex quod laboriosam ducimus iste minima.', 'category.jpg', NULL, 77, 1, 0, 'Officiis qui dolores quis rerum dolorem sint odit. Atque voluptates aut explicabo provident est. Voluptas in eius qui ipsum amet reprehenderit.', 'Rem nisi harum ipsam voluptatem. Labore excepturi sunt earum sit autem at rerum nihil. Fugit dolorum tempore ullam rerum doloribus ut.', 'Animi quaerat aut autem. Aut totam dolor voluptatem quisquam ex labore adipisci. Eligendi voluptatem eos eius. Deleniti rerum temporibus fuga culpa iusto iusto numquam.', '2021-10-27 11:35:56', '2021-10-27 11:35:56'),
(21, 4, 'unde-velit-qui-quod-dignissimos_f4VU', 'Unde velit qui quod dignissimos.', 'Maxime blanditiis rerum et sint ut et quia nobis quis.', 'Non quo asperiores et eveniet ut et. Tempore dolore et quia id repellendus. Excepturi sit deleniti nisi aut. Inventore ipsum et harum cum. Doloribus ipsa sit reprehenderit sit accusantium et at.\n\nAliquid cum eius et similique officiis laborum. Qui facere dignissimos repellendus eius dolor. Porro quas nihil saepe impedit. Sapiente et minus optio qui animi itaque optio.\n\nMinus doloribus atque tempore. Odit ipsum quia quia sunt pariatur. Quidem ut omnis aut et error aut aliquid illo. Est explicabo aperiam atque saepe possimus.', 'category.jpg', NULL, 24, 1, 0, 'Dicta nemo fugit dolorem molestiae ipsam. Quo sint libero dolorem quam autem veniam rerum aliquid. Qui sapiente eius autem veniam suscipit est.', 'Voluptatem quia laudantium tempora vero voluptas ut eius saepe. Unde quis quo enim illo exercitationem doloremque. At voluptas autem similique nobis similique. At rem tempora illum accusamus.', 'Distinctio eveniet animi exercitationem eos. Quis quia odit amet assumenda. Consectetur minima est eos est autem est est quos.', '2021-10-27 11:35:56', '2021-10-27 11:35:56'),
(22, 4, 'eum-non-error-incidunt_H5B9', 'Eum non error incidunt.', 'Aliquam neque nostrum voluptas nesciunt aut.', 'Fugiat tenetur quia rerum dolor soluta. Cupiditate dolorum ex maxime fugit alias eaque laboriosam numquam. Possimus laborum asperiores hic ab quo occaecati sit. Vitae cupiditate perspiciatis molestiae ipsum ut. Tempore esse quo cumque optio velit.\n\nEius accusamus aut est dignissimos modi. Et voluptas officia tenetur maxime. Voluptatibus mollitia magnam voluptatum optio unde reiciendis consequatur.\n\nAsperiores debitis cupiditate ad eius. Aliquam quisquam accusamus qui assumenda voluptatem. Expedita molestiae qui ut laudantium qui inventore exercitationem.\n\nNon nisi autem consequuntur impedit et molestias corporis illo. Facilis dolor et et sapiente alias est nostrum. Rerum ipsam placeat maiores.\n\nAlias ut dolorem facilis architecto. Aliquam a id ut aut sequi facere. Consectetur saepe eum aut molestiae molestias suscipit asperiores. Illo molestias reiciendis non inventore vel veniam.', 'category.jpg', NULL, 53, 1, 0, 'Ullam beatae autem dolores blanditiis. Ut possimus perferendis laborum voluptatem. Libero ut consequatur possimus excepturi. Perferendis omnis est qui itaque expedita.', 'Minus doloremque minus quia magni. Optio aut corporis a facere. Ut ipsum aut ut nesciunt provident odio quod. Placeat accusantium cumque velit dolor vel.', 'Ipsa ullam enim sequi perferendis voluptatem culpa. Eaque est unde aperiam tenetur laboriosam explicabo voluptatem similique. Aperiam magni ut ex corrupti.', '2021-10-27 11:35:56', '2021-10-27 11:35:56'),
(23, 4, 'tenetur-nihil-dicta-recusandae_PFbr', 'Tenetur nihil dicta recusandae.', 'Dolor quaerat ducimus sunt perspiciatis exercitationem voluptatem.', 'Cum velit accusantium autem rerum blanditiis. Rerum est nam ut ipsa est. Odio quasi voluptatem officiis magnam. Qui temporibus eum ut deleniti magnam aspernatur consequatur in. Nesciunt rerum et ipsam rerum eos nihil.\n\nAliquid omnis quibusdam sunt aperiam est. Accusantium molestiae magni tempore asperiores. Cumque excepturi eveniet nihil et perferendis. Ea sequi modi eum aliquam enim excepturi fuga.\n\nLibero omnis sint delectus rem voluptas. Saepe architecto consequuntur optio iusto repellat et rem. Doloremque quia non porro illo vel dolorem.\n\nQuaerat at illo sunt exercitationem velit omnis magni nostrum. Deleniti repudiandae enim consequatur possimus architecto id. Eos voluptatem et eaque et odit nam nesciunt.', 'category.jpg', NULL, 74, 1, 0, 'Deserunt quam et mollitia. Ipsam et aut reiciendis fuga. Aperiam perspiciatis dolores quidem esse tempora. Perferendis ab voluptatum animi et itaque ipsa sed unde.', 'Suscipit nam soluta quo cumque unde. Sint dolor sit aut non molestiae. Aut omnis dolores eaque quia est. Delectus iure consectetur eos accusantium sit commodi.', 'Dolore eveniet omnis eaque voluptatibus quod. Et alias quaerat corrupti perferendis officiis aut. Sit recusandae at eligendi voluptas est voluptatem.', '2021-10-27 11:35:56', '2021-10-27 11:35:56'),
(24, 4, 'odit-quas-quidem-culpa_lrE4', 'Odit quas quidem culpa.', 'Eaque maiores magni et omnis repellat.', 'Laboriosam suscipit velit accusantium sequi necessitatibus et sed. Impedit voluptatibus hic qui corporis voluptatem. Ut doloribus dolores natus aut deleniti.\n\nQuaerat qui minima quod consequatur veritatis quis accusamus. Et quis cumque qui est. Reiciendis enim sed qui fugit. Et asperiores officiis dolorem ut sed.\n\nNihil repellat quasi qui mollitia. Distinctio impedit laborum necessitatibus natus ratione. Aut quaerat eveniet et ut voluptate. Optio unde illo voluptas pariatur corporis.\n\nRecusandae aut dignissimos a ipsa optio. Cum eos assumenda quia ut itaque odit est. Omnis reiciendis optio dicta nobis ipsum magni. Harum nulla rerum officia cupiditate esse.', 'category.jpg', NULL, 97, 1, 0, 'Et in est fugit veniam similique eum laboriosam. Placeat aut dolor cumque est fugiat a ut. Est vitae tempore non soluta. Vero at suscipit sit est. Omnis ut in in beatae ex in.', 'Sapiente aut debitis temporibus perferendis incidunt veritatis quis. Debitis sunt rerum ut voluptatem accusantium quibusdam. Non commodi iusto nemo deleniti asperiores sunt.', 'Modi numquam et et quos cum occaecati. Nihil voluptas fugit voluptas porro expedita harum possimus officia. Possimus unde vel dolorem odio maiores.', '2021-10-27 11:35:56', '2021-10-27 11:35:56'),
(25, 2, 'running-vests_wq2j', 'Running vests', 'category title', '<h2>Bring an edge to your fitness regime</h2>\r\n\r\n<p>With the assistance of these remarkable running clothing products, you are sure to outshine everyone on the running tracks. It doesn&rsquo;t matter if you are preparing for a competition or if you like to jog to stay fit, with the help of these branded items, you will certainly feel a difference. You would stay more focussed and at ease for hours, so that you can level up the efficiency of your fitness regime.</p>\r\n\r\n<p>If you are inspired by professional runners like Henry Rono, David Moorcroft, Deena Kastor, Irina Mikitenko, Lemi Hayle, and more, then you should definitely do something unique and inspiring as well. With these durable running clothes, you can surely make your dreams come true. They will come handy to you on different occasions and will keep being your companion during those long running sessions for the days to come. Just include the ones you like the most to your cart and complete your purchase.</p>', 'runningvests_1637915373.jpg', NULL, 20, 1, 0, 'running vests', 'running vests', 'running vests', '2021-11-01 14:17:44', '2021-11-26 12:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_17_154934_create_staff_table', 2),
(5, '2021_09_18_134450_add_soft_delete_to_users_table', 3),
(6, '2021_09_29_155648_create_sections_table', 4),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(8, '2021_10_27_133702_create_categories_table', 5),
(9, '2021_11_06_160747_create_photos_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `promo` tinyint(1) NOT NULL DEFAULT 0,
  `photoable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photoable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `name`, `title`, `description`, `position`, `active`, `promo`, `photoable_type`, `photoable_id`, `created_at`, `updated_at`) VALUES
(61, 'cIlR_foto_01.jpg', 'Choose the best', 'description of shoes', 25, 0, 0, 'App\\Models\\content\\Category', 13, '2021-11-18 14:27:57', '2021-11-18 14:31:07'),
(62, 'w1FF_slider-6.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 13, '2021-11-18 14:27:57', '2021-11-18 14:27:57'),
(63, '8wYb_slider-7.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 13, '2021-11-18 14:27:57', '2021-11-18 14:27:57'),
(64, '1uLk_slider-8.jpg', NULL, NULL, 40, 1, 0, 'App\\Models\\content\\Category', 13, '2021-11-18 14:27:57', '2021-11-18 14:27:57'),
(65, 'KQ2P_cutu.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 18, '2021-11-19 13:24:18', '2021-11-19 13:24:18'),
(66, 'OBiW_desert.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 18, '2021-11-19 13:24:18', '2021-11-19 13:24:18'),
(67, '6yvd_dirty.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 18, '2021-11-19 13:24:18', '2021-11-19 13:24:18'),
(68, 'N5tg_dog.jpg', NULL, NULL, 40, 1, 0, 'App\\Models\\content\\Category', 18, '2021-11-19 13:24:18', '2021-11-19 13:24:18'),
(69, 'H0fF_coffee-shop-logo-vector.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 22, '2021-11-19 13:26:37', '2021-11-19 13:30:44'),
(70, 'zuYh_book02.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 22, '2021-11-19 13:26:37', '2021-11-19 13:31:02'),
(71, 'NttF_sigla_01.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 22, '2021-11-19 13:26:37', '2021-11-19 13:26:37'),
(72, 'yK9n_webdesign-logo.jpg', NULL, NULL, 40, 1, 0, 'App\\Models\\content\\Category', 22, '2021-11-19 13:26:37', '2021-11-19 13:26:37'),
(92, 'HiiH_slider-5.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:54:36', '2021-11-19 13:54:36'),
(93, 'NBKv_slider-6.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:54:36', '2021-11-19 13:54:36'),
(94, 'av1w_slider-7.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:54:36', '2021-11-19 13:54:36'),
(95, '6gEw_slider-8.jpg', NULL, NULL, 40, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:54:36', '2021-11-19 13:54:36'),
(96, '7eSR_woman_01.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:54:57', '2021-11-19 13:54:57'),
(97, 'tL8R_woman_03.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:54:57', '2021-11-19 13:54:57'),
(98, '7HBG_woman02.png', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:54:57', '2021-11-19 13:54:57'),
(99, '1TtY_man_01.png', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:56:46', '2021-11-19 13:56:46'),
(100, 'yOyN_man_03.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:56:46', '2021-11-19 13:56:46'),
(101, 'dgyW_woman_01.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:56:46', '2021-11-19 13:56:46'),
(102, '0WvS_woman_03.jpg', NULL, NULL, 40, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:56:46', '2021-11-19 13:56:46'),
(103, 'SLBd_book04.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:58:08', '2021-11-19 13:58:08'),
(104, 'TdyK_book05.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:58:08', '2021-11-19 13:58:08'),
(105, 'PtLJ_book06.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 13:58:08', '2021-11-19 13:58:08'),
(106, 'Uvdr_lib_01.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 14:02:15', '2021-11-19 14:02:15'),
(107, 'iZuC_lib_02.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 14:02:15', '2021-11-19 14:02:15'),
(108, '8vFl_lib_04.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 23, '2021-11-19 14:02:15', '2021-11-19 14:02:15'),
(109, 'KtdX_lib_04.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 22, '2021-11-19 14:03:10', '2021-11-19 14:03:10'),
(110, 'zCCC_lib_06.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 22, '2021-11-19 14:03:10', '2021-11-19 14:03:10'),
(111, 'N8nJ_lib_07.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 22, '2021-11-19 14:03:10', '2021-11-19 14:03:10'),
(112, 'YgOu_java_cofee_brand.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 22, '2021-11-19 14:04:06', '2021-11-19 14:04:06'),
(113, 'DYZ3_nike.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 22, '2021-11-19 14:04:06', '2021-11-19 14:04:06'),
(114, '8qtk_oferte_02.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 22, '2021-11-19 14:06:03', '2021-11-19 14:06:03'),
(115, 'GI5m_oferte_03.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 22, '2021-11-19 14:06:03', '2021-11-19 14:06:03'),
(138, 'SRmw_woman_12.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 15, '2021-11-19 14:45:59', '2021-11-19 14:45:59'),
(139, 'bcKF_woman_13.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 15, '2021-11-19 14:45:59', '2021-11-19 14:50:43'),
(140, 'LklZ_work.jpg', NULL, NULL, 4, 1, 0, 'App\\Models\\content\\Category', 15, '2021-11-19 14:45:59', '2021-11-19 14:47:49'),
(141, 'Kkuu_work_01.jpg', NULL, NULL, 5, 1, 0, 'App\\Models\\content\\Category', 15, '2021-11-19 14:45:59', '2021-11-19 14:46:07'),
(151, 'ENHr_dirty.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:10:54', '2021-11-19 15:10:54'),
(152, 'RPhw_dog.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:10:54', '2021-11-19 15:10:54'),
(153, 'nY7z_drum.jpg', NULL, NULL, 12, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:10:54', '2021-11-19 18:53:14'),
(154, 'kEuA_abstract_03.jpg', NULL, NULL, 6, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:11:58', '2021-11-19 15:12:23'),
(155, 'WegU_woman_13.jpg', NULL, NULL, 50, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:11:58', '2021-11-19 15:11:58'),
(156, '2qDw_creier.jpg', NULL, NULL, 60, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:13:00', '2021-11-19 15:13:00'),
(157, 'EPuM_cuie.jpg', NULL, NULL, 70, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:13:00', '2021-11-19 18:53:55'),
(158, 'WcIz_excursie.jpg', NULL, NULL, 80, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:13:00', '2021-11-19 15:26:03'),
(159, 'PauM_bird.jpg', NULL, NULL, 90, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:14:07', '2021-11-19 15:14:07'),
(160, 'Xw9N_carlig.jpg', NULL, NULL, 100, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:15:57', '2021-11-19 15:15:57'),
(161, 'KsAY_car.jpg', NULL, NULL, 110, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:16:18', '2021-11-19 15:16:18'),
(162, '4rj8_cleste.jpg', NULL, NULL, 120, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:16:18', '2021-11-19 15:16:18'),
(163, '8ET0_justice.jpg', NULL, NULL, 130, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:22:50', '2021-11-19 15:22:50'),
(164, 'fwre_woman_09.jpg', NULL, NULL, 140, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:22:50', '2021-11-19 15:22:50'),
(165, 'OgWw_child.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 24, '2021-11-19 15:22:50', '2021-11-19 16:19:01'),
(166, 'aIrh_happy.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 10, '2021-11-20 14:34:11', '2021-11-20 14:34:11'),
(175, 'tRlC_girl.jpg', NULL, NULL, 90, 1, 0, 'App\\Models\\content\\Category', 10, '2021-11-20 14:35:34', '2021-11-20 14:35:34'),
(177, 'W0D3_mobila.jpg', NULL, NULL, 100, 1, 0, 'App\\Models\\content\\Category', 10, '2021-11-20 14:41:33', '2021-11-20 14:41:33'),
(178, 'EUEw_motor.jpg', NULL, NULL, 110, 1, 0, 'App\\Models\\content\\Category', 10, '2021-11-20 14:41:33', '2021-11-20 14:41:33'),
(180, 'i5r0_office.jpg', NULL, NULL, 130, 1, 0, 'App\\Models\\content\\Category', 10, '2021-11-20 14:41:33', '2021-11-20 14:41:33'),
(181, 'KTKf_pamant.jpg', NULL, NULL, 140, 1, 0, 'App\\Models\\content\\Category', 10, '2021-11-20 14:41:33', '2021-11-20 14:41:33'),
(366, 'rtj3_gallery_01.jpg', 'Adidas competition shoes', NULL, 10, 1, 0, 'App\\Models\\content\\Category', 4, '2021-11-22 10:22:53', '2021-11-22 10:23:23'),
(367, '0UWT_gallery_02.jpg', 'Topo competition shoes', NULL, 20, 1, 0, 'App\\Models\\content\\Category', 4, '2021-11-22 10:22:53', '2021-11-22 10:23:54'),
(368, 'PTzd_gallery_03.jpg', 'Asics competion shoes', NULL, 30, 1, 0, 'App\\Models\\content\\Category', 4, '2021-11-22 10:22:53', '2021-11-22 10:24:04'),
(369, 'Qomk_gallery_04.jpg', 'Nike competions shoes', NULL, 40, 1, 0, 'App\\Models\\content\\Category', 4, '2021-11-22 10:22:53', '2021-11-22 10:24:15'),
(370, 'UusQ_gallery_01.jpg', 'Nike Neutral Shoes', 'The best running shoes for road', 10, 1, 0, 'App\\Models\\content\\Category', 1, '2021-11-22 11:38:00', '2021-11-27 12:56:52'),
(371, 'tfrz_gallery_02.jpg', 'Asics Neutral Shoes', NULL, 20, 1, 0, 'App\\Models\\content\\Category', 1, '2021-11-22 11:38:00', '2021-11-22 11:38:33'),
(372, '5vHx_gallery_03.jpg', 'Adidas Neutral Shoes', NULL, 30, 1, 0, 'App\\Models\\content\\Category', 1, '2021-11-22 11:38:00', '2021-11-22 11:38:49'),
(373, 'MjVj_gallery_04.jpg', 'Topo Neutral shoes', NULL, 40, 1, 0, 'App\\Models\\content\\Category', 1, '2021-11-22 11:38:00', '2021-11-22 11:39:00'),
(374, 'ERIr_trail_gallery_01.jpg', 'Saucony Trail Shoes', NULL, 10, 1, 0, 'App\\Models\\content\\Category', 6, '2021-11-22 11:51:30', '2021-11-22 11:51:49'),
(375, 'bxJh_trail_gallery_02.jpg', 'Adidas Trail Shoes', NULL, 20, 1, 0, 'App\\Models\\content\\Category', 6, '2021-11-22 11:51:30', '2021-11-22 11:51:58'),
(376, '7L2x_trail_gallery_03.jpg', 'Topo Trail Shoes', NULL, 30, 1, 0, 'App\\Models\\content\\Category', 6, '2021-11-22 11:51:30', '2021-11-22 11:52:08'),
(377, 'Vj1q_trail_gallery_04.jpg', 'Saucony Trail Shoes', NULL, 40, 1, 0, 'App\\Models\\content\\Category', 6, '2021-11-22 11:51:30', '2021-11-22 11:52:31'),
(378, 'SMJZ_fitness_gallery_01.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 2, '2021-11-22 12:03:34', '2021-11-22 12:03:34'),
(379, 'ikLf_fitness_gallery_02.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 2, '2021-11-22 12:03:34', '2021-11-22 12:03:34'),
(380, 'HJJu_fitness_gallery_03.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 2, '2021-11-22 12:03:34', '2021-11-22 12:03:34'),
(381, 'Fr4h_fitness_gallery_04.jpg', NULL, NULL, 40, 1, 0, 'App\\Models\\content\\Category', 2, '2021-11-22 12:03:34', '2021-11-22 12:03:34'),
(396, 'X0sq_pants_gallery_01.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 9, '2021-11-22 17:55:29', '2021-11-26 06:23:24'),
(397, 'BWe7_pants_gallery_02.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 9, '2021-11-22 17:55:29', '2021-11-22 17:55:54'),
(398, 'Yp7A_pants_gallery_03.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 9, '2021-11-22 17:55:29', '2021-11-22 17:55:29'),
(399, '8Nuh_vests_gallery01.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 25, '2021-11-26 06:37:42', '2021-11-26 06:37:42'),
(400, 'CkbO_vests_gallery02.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 25, '2021-11-26 06:37:42', '2021-11-26 06:37:42'),
(401, 'VV6N_vests_gallery03.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 25, '2021-11-26 06:37:42', '2021-11-26 06:37:42'),
(402, 'kHA4_shorts.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 8, '2021-11-26 06:49:09', '2021-11-26 06:49:09'),
(403, 'uTpa_shorts_gallery01.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 8, '2021-11-26 06:49:09', '2021-11-26 14:08:02'),
(404, '0nsS_shorts_gallery02.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 8, '2021-11-26 06:49:09', '2021-11-26 14:08:03'),
(405, 'rZAZ_shorts_gallery03.jpg', NULL, NULL, 40, 1, 0, 'App\\Models\\content\\Category', 8, '2021-11-26 06:49:09', '2021-11-26 06:49:09'),
(406, 'IJkw_socks.jpg', NULL, NULL, 10, 1, 0, 'App\\Models\\content\\Category', 12, '2021-11-26 07:00:28', '2021-11-26 07:00:28'),
(407, 'sQ9l_socks_gallery01.jpg', NULL, NULL, 20, 1, 0, 'App\\Models\\content\\Category', 12, '2021-11-26 07:00:28', '2021-11-26 07:00:28'),
(408, 'fvTP_socks_gallery02.jpg', NULL, NULL, 30, 1, 0, 'App\\Models\\content\\Category', 12, '2021-11-26 07:00:28', '2021-11-26 07:00:28'),
(409, 'cmJz_socks_gallery03.jpg', NULL, NULL, 40, 1, 0, 'App\\Models\\content\\Category', 12, '2021-11-26 07:00:28', '2021-11-26 07:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'section.jpg',
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `promo` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `slug`, `name`, `description`, `photo`, `icon`, `position`, `active`, `promo`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'r-shoes', 'R-Shoes', 'The right shoes for your needs. Our running shop offers a wide range of neutral shoes, stability shoes, trail shoes, competition shoes, fitness shoes and sneakers.', 'R-Shoes_1634395904.jpg', 'fas fa-shoe-prints', 10, 1, 1, 'Running shoes', 'Running shoes at low prices and high quality', 'running shoes, neutral shoes, stability shoes, trail shoes, competition shoes', '2021-10-14 11:37:36', '2021-11-26 13:19:45'),
(2, 'r-clothes', 'R Clothes', 'New styles for running clothes! For performance and every day runner compression equipement, warm jackets for cold weather and dry vests for summer', 'RClothes_1634371003.jpg', 'fas fa-tshirt', 20, 1, 1, 'Running clothes', 'Running clothes for cold and warm weather, compresion socks in kackets, socks, underweare and more', 'runnig clothes, underwear, hoodies, jackets, shorts, compression', '2021-10-16 04:11:03', '2021-11-26 13:19:44'),
(3, 'r-accesories', 'R-Accesories', 'Accesories for making great your training and competions! Fitness accesories, running watches, towels, Bandages and tapes', 'R-Accesories_1634371024.jpg', 'fas fa-stopwatch', 30, 1, 1, 'Running accesories', 'Running accesories for performance and every day runner: watches, medical, fitness, lighting systems', 'running accesories, running watches, medical, fitness, lighting', '2021-10-16 04:18:39', '2021-11-26 13:19:57'),
(4, 'r-books', 'R-Books', 'Books and documentation for runners! Trainning, anatomy, mental, yoga and more for running', 'R-Books_1634371039.jpg', 'fas fa-book-reader', 40, 1, 0, 'Running books', 'Books and documentation for entuziast runners: science of trainning, anatomy, mental preparation, yoga and more', 'running books, anatomy, yoga, scrience of trainning', '2021-10-16 04:42:24', '2021-10-21 11:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'staff.jpg',
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manager',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `password`, `phone`, `photo`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'manager', 'manager@emag.com', '$2y$10$/QCjjqEANP0qKhOsDWz4IOVNC9y5T/vgSnCHxIUg2GL7ReaYQ9bbu', NULL, 'staff.jpg', 'manager', NULL, '2021-08-19 11:40:00', '2021-08-19 11:40:00'),
(10, 'Dragulescu Maria', 'staff4@gmail.com', '$2y$10$RZdVs.4iue.CcX3xBHxXXuzarl2ovbzKZNYbvXtBc7QxlDp3E/J6S', '0733 544 263', 'DragulescuMaria_1630852885.jpg', 'editor', NULL, '2021-09-02 12:58:59', '2021-09-15 10:59:13'),
(13, 'Brdean Claudiu', 'staff_brad@gmail.com', '$2y$10$bSpJTCqjgslwR0qQraQvlePArUm2j/GQcM1FcOHx2ufTd29eImXN6', '0888 635 321', 'BrdeanClaudiu_1630851167.jpg', 'asistent', NULL, '2021-09-03 12:27:49', '2021-10-06 13:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'standard',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `type`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mr. Karley Moen V', 'kara36@example.org', NULL, 'gold', '$2y$10$ZYaZMtpRJVKaHOJx08p3IeYH3k3lkpdqmecNrv78r241vHOvsUjHC', '4yvrhShhz7', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(2, 'Missouri Waters', 'hblanda@example.org', NULL, 'gold', '$2y$10$FJE01JDg3wqM8eTPVpx1YO1Y30tIVS85pKYqaKjT/cCGClao8syqG', 'gZlBnBq9Re', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(3, 'Demetris Koelpin', 'glennie26@example.org', NULL, 'premium', '$2y$10$wJwSvdmq7lV1aB67wquroOdmYioggZ69AjwGUFqyvRgiY50b4X50m', 'Z4ddTd44Q1', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(4, 'Sidney Kiehn', 'qstracke@example.net', NULL, 'standard', '$2y$10$9OuwpFVoDJm2n2bCJQda..XHOHECrvE8Wr7kOYFgcP9l0hzCeNrXO', 'Q25nKHpoLo', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(5, 'Reilly Schimmel', 'cynthia86@example.org', NULL, 'premium', '$2y$10$W8K7PY/3heA/dzi2Yr2GrOnoWNP/L9ANQdU1YkpWttevl.1oYplWu', 'xCFjAGax7a', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(6, 'Casandra Wilderman III', 'stanton.summer@example.net', NULL, 'premium', '$2y$10$o93oi0Iu5GxqihyoricX4eSBSMg45A12adalStROrEVfUNt11jDPu', 'UZlT5V1RsI', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(7, 'Mrs. Hilma Abbott I', 'orn.axel@example.com', '2020-10-10 03:48:59', 'gold', '$2y$10$XRiBhVjbLlM/4rubiFwzL.R8Ltx8tPusaI1Qkvm2ZKYdPc1PCoraC', '8fbRj9W5TE', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(8, 'Elisha Lakin', 'gvonrueden@example.net', NULL, 'gold', '$2y$10$js4uCdBPQ4Nkx6RdCtbPv.7CO1thApLHVH8MJwQeKCNg0YIgcMP4O', 'zt87J2payq', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(9, 'Orval Mohr', 'sigrid.ankunding@example.org', '2020-12-23 19:03:25', 'standard', '$2y$10$HMG/afgEklNbiNXgEVQ5V.LOCNiLSNdInwuIyOjTMJyC/M9SKtVou', 'TmkVYwjP0o', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(10, 'Mr. Herminio Moore', 'schmidt.elisha@example.com', NULL, 'gold', '$2y$10$yLurgKTguky6rIlgHoqj9ecZy8GegqSXNw4Bmaff573t9E7zV/FaW', 'QUinXrfEFJ', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(11, 'Carlie Cummings', 'mueller.beth@example.org', NULL, 'gold', '$2y$10$RTbLiLHa6yVgjT6Ugm9zM.nEToP4RqySv3F8ZDT3skvjYAakkVNsC', 'KA0vVgdKma', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(12, 'Prof. Pansy Maggio III', 'raegan70@example.org', '2020-09-06 21:29:57', 'premium', '$2y$10$fibQjwmbBFmxKU90yVikfe22RAiBy0hpA5DbcwDt1omq1Q/YEjVES', 'p8jxE8vq4Z', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(13, 'Scottie Kunze I', 'marquardt.damien@example.com', '2021-01-10 01:05:17', 'gold', '$2y$10$gQZ2ndcHYH4n4mEble91eOa/n.Jhy5OevCeEE9Pmbz1qBwEo5tv5a', 'ThFbK2z6Nx', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(14, 'Korbin Rath V', 'omari41@example.net', '2020-12-03 01:06:54', 'gold', '$2y$10$I7Hcj0ZHFCKg9c5ebrOjBu5ZktrUf71PV9Gt80quEeahnMXVVtpTS', 'X9dDRxKcwd', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(15, 'Mr. Orland McClure PhD', 'reba.shields@example.net', '2020-11-13 20:09:35', 'gold', '$2y$10$mAnpzD4UMCthJlYIwvB9NuJbA7FbddVJR9a2y8dOgkK0T95etmNMe', 'XUeMdZROh0', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(16, 'Ford Cole', 'jan.maggio@example.com', '2021-06-11 11:48:41', 'premium', '$2y$10$9zqPBO64ueVNcJiGk1cz2OQV8QHakcocycgcCUY6MhcRq4FYPxmJO', 'AtPdDbMdfo', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(17, 'Rowland Kreiger', 'bosco.ciara@example.org', NULL, 'standard', '$2y$10$QOWxm3s4Wj1n95W3sT9oBetX1NQR7EL9csIuUn6SXs29ngkPxcR4O', 'kmFE0KVDIV', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(18, 'Mr. Carleton Stanton MD', 'fred.crooks@example.com', NULL, 'gold', '$2y$10$9r8XhdRVFCAoVaKeFTyY4O/YnKMC807ErEGWDx5zpFDvd4knUuVeC', 'KQ5UshU3HY', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(19, 'Brooklyn Larkin', 'bo97@example.com', '2021-03-16 11:57:56', 'premium', '$2y$10$PZrJh48yD0HgSdWyRzzjsODJYTgcHdf3natXAirreCEsmR5LchU9O', '5itvtEdWTL', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(20, 'Elisabeth Sipes', 'camren.spencer@example.com', '2020-07-10 20:44:04', 'gold', '$2y$10$Wmvb5uqJSeZLprgUeNZXE.PBzkkd657xYKlYEhZ4gZUFwLqOJStwS', 'ftsOl2szzL', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(21, 'Billy Hane', 'karl.kilback@example.com', NULL, 'premium', '$2y$10$ZncWD0xr/x8Ni/7Kq15xOuXdjbf73gl/I6tKE4Uql9Z2P/eUHnoxu', 'hdch93Yn3F', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(22, 'Roderick Jakubowski', 'eldora.murphy@example.com', NULL, 'standard', '$2y$10$L8PvSo/zAtdy6oqN3EGpL.ITBhU/LbBddTQ514ZhownEYtnbb80hy', 'iB1NKmYBcY', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(23, 'Haley Breitenberg', 'vlehner@example.org', NULL, 'premium', '$2y$10$jCUhoW5oiijqlGSv6IUaTu9iEbXBhRx6gLMyLV4.7deK2Kw2QZiZa', 'ZmifuX8YQI', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(24, 'Lorena Goodwin', 'marquardt.bradley@example.com', '2020-04-12 08:41:29', 'standard', '$2y$10$L3poxTzN5REIv5aOn00EhOyNRO4uLp5i9J8wBALbR8.hZ.DLz3r5e', 'YJibt21zeK', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(25, 'Zula Hoeger', 'mackenzie.lemke@example.net', NULL, 'standard', '$2y$10$ICe9x9NBteFn6.yp2qqhnePoQNcsYaCRMY4VXHDguCSrqOONfvSfu', '9shTK3YyDs', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(26, 'Heber Watsica', 'schuppe.jenifer@example.net', NULL, 'gold', '$2y$10$0naXctfaojYpCX2SyBufmuVS9j6TsimXIzl48GQP6ef36VhCWpsP2', 'eT0IPzvC6r', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(27, 'Mrs. Carlie Crona', 'dorcas.ritchie@example.net', NULL, 'standard', '$2y$10$R7mJ470RijLH1T3OCWH6juy9Do/UTNxnZlcurJmgv24AObTbEVDQi', 'n5n9Wb9xLc', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(28, 'Brionna Harber', 'tfriesen@example.net', '2020-04-01 18:55:49', 'premium', '$2y$10$IYsL5jTB0RRPYzqoMps1xO7tRFIUyt2X.zV/SFjwIRjz/rdPc2xE6', 'Y1CdSgAgoN', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(29, 'Cory Koss DDS', 'xharber@example.net', '2021-04-17 18:31:32', 'gold', '$2y$10$82XEd8q8sSJolbL7acUtMefrKZv1KfzXunpRxau8/sQWwUxwqyxFO', 'qbc2TmMthN', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(30, 'Dr. Ludwig Hodkiewicz DDS', 'tamara.gutmann@example.com', NULL, 'premium', '$2y$10$kVoAscHcpf23yvgcblku5e.EJiLCw.BTzbP8lgU0hKAH4jDssia3i', 'kt4uykeDog', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(31, 'Zackary Abernathy', 'schumm.bridget@example.org', NULL, 'standard', '$2y$10$vxvBYEXJ01bxDRqXEKhcZ.AXzlG7rXI7yKxujs5VxeI9Ar2WRrpnW', '6MckNjjYf4', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(32, 'Patsy Willms', 'jeanne.shields@example.com', NULL, 'premium', '$2y$10$A/eL5F0mD4HKIuD2ZpyIFeYB6iBwQue0anxoraZfiY2ov7bFpHIIW', 'wVkhSdKvW5', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(33, 'Shaylee Padberg', 'madie.rath@example.org', '2021-03-30 08:48:19', 'standard', '$2y$10$DrzLF5VHRVSz/YhYMlIaqeues6JJBCNz2yJ6LV68jG/3GM4Nuoit2', '3K4AUqVEyZ', '2021-10-27 11:20:32', '2021-10-27 11:20:32', NULL),
(34, 'Claud Wolff', 'sschultz@example.org', NULL, 'premium', '$2y$10$Y2noCM3M8vNsPvz90ugWIOuUETyRjbfD.BwmKlddRPNST0YeT4UFS', 'NHRu2Bsl63', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(35, 'Libbie McDermott', 'viviane.nader@example.org', '2021-09-04 19:30:03', 'premium', '$2y$10$WZSqSJueJGn.udbo1DPX3enH6DbAX4HNAaR0wSss8BjYbFBnvM5iS', 'pAwxKsRxD8', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(36, 'Brendan McKenzie', 'odell.purdy@example.com', '2021-10-18 14:42:58', 'premium', '$2y$10$4it7uq.dgETs4yKAWbRJEuC.ogCYZpobqNY3oL3Lf7TVIkegY7TFq', 'PFhwyJXrWm', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(37, 'Eino Dibbert DDS', 'ward.susanna@example.net', '2019-11-19 02:21:19', 'premium', '$2y$10$uGKo0rvGE5/H2aml80KUk.cjA8aCJO5VO1HcRQE0i/E4G/w0E7eEO', 'ekIZ0DuvSk', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(38, 'Nedra Breitenberg', 'metz.thalia@example.com', NULL, 'gold', '$2y$10$QguDKRvxM/jT.JM0qXWYtuUOc.joUkt8v9.Cc9LqEwcBPfBYNbek.', 'iD7Str3AHG', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(39, 'Mr. Jayson Hayes DVM', 'rigoberto.monahan@example.net', NULL, 'gold', '$2y$10$D2rK/gA3iAZQAwGYzqmDWei3YT9cBePn6suvn1RGUkA37xmcqmr5q', '8fhYCE0STe', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(40, 'Mortimer Hammes', 'cesar.renner@example.org', NULL, 'gold', '$2y$10$ph8vT7kMLlsaWqKzsXr8uOzBhyZLWkQbu0763oSmK6AxsWsikEkWu', 'fmqHJRQuW4', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(41, 'Deshawn DuBuque II', 'jadon23@example.net', '2020-09-27 12:47:18', 'standard', '$2y$10$rhBThlETGLwVy9lCtkE/6elwRtj2OhUGhya5AZGD9VNzgf3xjr72y', 'Tbv6jlHq3C', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(42, 'Dr. Roderick Gulgowski II', 'wiegand.helmer@example.net', '2021-01-04 23:15:58', 'standard', '$2y$10$K7gB0cIqRFdD0A0flBX2G.whHp8QkaCDbUp3JkcrtAG1oC3KGQeEa', 'xnAXQva6rz', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(43, 'Julien Weber', 'rippin.dora@example.net', '2019-12-27 10:25:46', 'premium', '$2y$10$Vm/v.XF8MHWieUDdiE5qlO9EoUA1vIwQhhVz8MNceDdRuQPLoQ3oC', 'b1gOEq5btV', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(44, 'Mr. Don Daniel Sr.', 'zwitting@example.org', NULL, 'standard', '$2y$10$eNNGDJB54CerH5V25dw47OuPKqT2OAoGVfP8T2cRQc8El7I2sbzoa', '0jgIEkvQFq', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(45, 'Ms. Neoma Quitzon I', 'alexandrea.hill@example.org', '2020-10-23 20:17:21', 'standard', '$2y$10$cdi6lfUnFDepb52JRh6J/eDCKn1.uZRtKcsQW5gZc8ZzifNm9odOy', 'CCCqw5LYAS', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(46, 'Prof. Dixie Farrell IV', 'ehills@example.com', NULL, 'premium', '$2y$10$SoIdCnFwrUEwK3/4Y9V9BuJiT7QSpK57T5n7Zfa4bryYO.dogw2Dy', 'PUM5W68sT3', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(47, 'Madaline Zboncak I', 'idamore@example.net', NULL, 'gold', '$2y$10$q.u8B/G1BV/PBuYyyzJCjepsKSt7ULP7nF/jAK8.iQOzY8oXpe/ZS', 'Cmyf8Q4xCt', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(48, 'Dayana Heidenreich', 'trenton.rice@example.net', NULL, 'standard', '$2y$10$A7Fxbnw6Z4Ca5w0IsE.w9uD5tfnOd7joKMBVnP06DP7X2VHNE/do.', 'X6fYdWqHYm', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(49, 'Prof. Matt Beatty DVM', 'alexandra.kuphal@example.net', '2020-05-11 09:02:17', 'standard', '$2y$10$SlHuw5LAXuIlq57HhvvKSeZMp9MJZIGe4GoW9rH/Sjqkg7jkcuOXu', 'VFMe0yuvMi', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(50, 'Loyce Haag', 'emie.schowalter@example.org', NULL, 'standard', '$2y$10$ZAsJCv4N.2FFodSCHa0XSu2zbzuMP3kAYeSSamc2fYdx16LDLZyFC', 'VScbujKVjm', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(51, 'Tyrell Schiller MD', 'sgibson@example.com', '2020-09-13 13:02:14', 'gold', '$2y$10$IHitNK/TVw3VELJV3A62su4irApNcMKQ.6y.3BPJZ7sX6l6rcx9FK', 'PwbT8d2NoX', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(52, 'Vita Abshire', 'cathrine95@example.com', '2021-02-16 11:33:34', 'premium', '$2y$10$aEkknKZ4F3PL5WSAP2eFk..FaDMr6sy8rFf.w/yI4klAqVEaqFz72', '9BYcXjUEKf', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(53, 'Mrs. Savannah Luettgen', 'lelia.hayes@example.net', '2021-04-14 00:29:09', 'premium', '$2y$10$vhlalTFBRgubu3D19U.VMele5/fDtZqBmVsnrOr.Qjrx7W61mtCBW', '78mQ1bSoV1', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(54, 'Karlie VonRueden V', 'douglas.darius@example.net', '2020-09-05 14:50:58', 'gold', '$2y$10$ITD3sGL04LiBB/.CuLXm1u7UBtJfPLSohf0N9B7yYrUMWNBgg7xE.', 'sxAONoq8sc', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(55, 'Mr. Jordan Little', 'lincoln04@example.net', NULL, 'premium', '$2y$10$uFo9EjRcZRqgXy4wFye0AOp5g6gdDxPESs1DJe27AfYjV8Hcf4DmW', 'z4TxQzEHCy', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(56, 'Prof. Jennings Carroll', 'stanton.zaria@example.org', NULL, 'gold', '$2y$10$zXIDoms1nn.0wx117BakMeDV/kQMyZ2Qrj//A5DI5D2RzDUDtVhdi', '1X0NET6bfo', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(57, 'Eldred Ortiz', 'abdullah.shields@example.org', '2020-07-09 04:30:28', 'gold', '$2y$10$bOh.U9ELSpyMGybZQ5Hta.XFTVJZCSWzlYnBdbR8LjXkYBAE8cKca', 'obN3MjwieI', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(58, 'Destini Hudson IV', 'pkub@example.net', '2021-05-13 21:48:36', 'standard', '$2y$10$BXGK7JcJZIAxQxQ62F8TKO9/74Zaty.H0hR.GiM.F6iDFgVodsgJm', 'c4bMvgH8bT', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(59, 'Bennie Rowe MD', 'houston54@example.net', '2021-05-13 18:29:22', 'gold', '$2y$10$vE6WgR0ZAFcov6Y/xmsCkeBz.V1nJpqXBK/sCLByVhtm0S26k6ZYG', 'JkiZXxEY8e', '2021-10-27 11:20:33', '2021-11-18 16:02:01', '2021-11-18 16:02:01'),
(60, 'Dr. Torrance Windler', 'oberbrunner.berry@example.org', '2021-09-24 22:52:32', 'standard', '$2y$10$KOfBSUthI.DBPpnm6FWt3.eSvHLmKTRkGexLx3A2tsYuxFjIJ3/9K', 'bQoCPDTMIp', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(61, 'Erica Sporer', 'octavia16@example.org', '2020-10-08 22:33:19', 'gold', '$2y$10$vxmh99xy0Qx0jOzHeTSyHu1HIO2hyaBAATOrzG.5qIgG2LN7keJOO', 'oaJlyj2ypA', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(62, 'Stan Durgan', 'bayer.jaycee@example.org', NULL, 'standard', '$2y$10$KM2cpVgc.VKEaRg39oXS1eN8PPfsdb/z/Udp9MjbKTO04hP8eNsvW', '1t1ZbuW9tt', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(63, 'Juvenal Towne', 'newton63@example.net', NULL, 'premium', '$2y$10$qOZ1ED2hh1pQmIKOr58F2.bxMhUOxGBp0r3qFtA1tqLNp3cJVPqGe', 'zbIPUDURPc', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(64, 'Mr. Ramiro Kessler', 'ara36@example.com', '2021-03-11 03:31:33', 'standard', '$2y$10$GIBIRbKj.wE/aJdSnqEkoOfb.Oi6DgPu/.zeuJqTn6WfuW8o/3xVq', 'Bw5UQefDC6', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(65, 'Amiya Senger', 'gardner51@example.org', '2021-03-14 05:51:10', 'gold', '$2y$10$lYXD2wEMTHH08l4D.DfzAe00XYVLeaI8TSrMqn5YTB2s1loS7tPY.', 'sVPsAJPS3A', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(66, 'Aletha Terry', 'rrohan@example.com', '2021-10-04 03:14:26', 'standard', '$2y$10$vezd/RvllPfhiA8KCoLgnugxutgbIBiMFw7Swb58eQCYf5d.ZjCyG', 'hZ4G37FXB6', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(67, 'Bria Roob', 'harvey.damien@example.net', '2021-08-07 09:36:44', 'standard', '$2y$10$ISykoOyYb7A6BDp1Wo2Z0.p2lYcaRFmrm7AMNj9yXxnyoEeWsLDuu', 'HvLAWalFrO', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(68, 'Fatima Dach Jr.', 'jedediah91@example.com', '2021-06-05 18:17:46', 'gold', '$2y$10$qVSO8twqYitfd/uTEJY6weFO2XqS2oIteqRcNEgFYa4k3a0AyKKEi', 'pRfEUwGbf5', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(69, 'Jared Pagac', 'kattie.hauck@example.net', '2021-05-14 07:51:43', 'gold', '$2y$10$bpHNaxEE6s2STNPbYhS3Iuy//Nh7t82ykg5.PgBJVIsDekQFvdXse', 'wV2xyIdyU8', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(70, 'Mr. Gavin Leffler DVM', 'randy47@example.com', NULL, 'standard', '$2y$10$oIx4H3zbrzUmLeERILmK0O434V2twj0a5mIayD/Vwd7Sag/22Znoa', '0a805ZDQED', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(71, 'Mathias Walker', 'stroman.thelma@example.org', NULL, 'standard', '$2y$10$tJaX8WnigSNCFLAfZy7AtunTTBmRYMV1JITqQYKryrin5iG28vnmi', 'zFQRTHwWTF', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(72, 'Gaylord Toy', 'roderick81@example.com', '2020-05-13 12:51:58', 'gold', '$2y$10$ki1WDjh5YVdJxeTX/VKOYuQ.ZTL01QE14o9nYVeQ3Gyv.3DrTE77G', 'WRzG0p5gj2', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(73, 'Abdiel Berge', 'ywilliamson@example.org', '2020-03-14 20:55:58', 'premium', '$2y$10$iu1CJFqKMxA/mUiq0rMI1eMIQITAiB/uQ04XHgGwRN7uKln6OpK56', 'xjXstIRYaU', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(74, 'Jazmyne Ondricka', 'jtreutel@example.org', '2021-05-23 13:18:30', 'standard', '$2y$10$/W8mRskfAS9StPpN91D5VOYsV8kzIKn1ebS2/vqwbMTfClYwuvagS', 'YJy72Ia9E3', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(75, 'Ewald Kshlerin', 'chad.witting@example.org', '2020-03-02 18:32:38', 'standard', '$2y$10$8/5uwG6lSyfLSi3oUdbho.nQXpsRJv0OqdYiNMl2Qfl1h65NoAjLq', '5AtCfpZg9e', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(76, 'Lavonne Collins', 'grayson59@example.com', '2020-04-16 01:32:50', 'gold', '$2y$10$2RS3iGl/LM5aX9SRIeAev.qlr6CIqtuZXhKU/4ATSRQK7i9cyLyc6', 'esBoSxf49u', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(77, 'Valentine Jakubowski', 'beatrice.volkman@example.com', '2021-07-13 10:00:24', 'gold', '$2y$10$l5amc539TcA5unQJt6i3t..HQCGGn/8HP9aPsC0334ev.KaD8gfXq', 'oXztfpJ0Ea', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(78, 'Eleazar Stanton', 'christine75@example.org', '2021-02-24 12:31:46', 'gold', '$2y$10$GazXQ7yP0D71ecKlBiv3MuMqO9talDrOCf/5/uSTSCpP8nhegMUbm', 'Tr5dDRqVWz', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(79, 'Rachael Cummings', 'toy.lavinia@example.org', '2021-07-05 13:36:28', 'premium', '$2y$10$NTCINyuZrin8pjXTpNRahuWtOFYmFQrlSG1qiWGsHd/ZWS7CXZjfi', 'Qvn8tmXEFt', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(80, 'Dario Stanton', 'amalia87@example.org', NULL, 'standard', '$2y$10$tnp9jVlcG4wV5wzJXuD9fOfwSJ7NbN0CZiFYWPRj6MFANeIAMGcnm', 'DV35tyRAU3', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(81, 'Hilbert Ratke Jr.', 'yjacobson@example.com', '2020-08-04 18:17:41', 'gold', '$2y$10$l4KBgnkxS0Pv/e.cvBOQCeZ1E4PKiR/6ZVH.PH52aqSByPhNeq3Hy', 'oV1DgZimPV', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(82, 'Eliane Torphy', 'asporer@example.com', '2020-12-22 12:30:04', 'standard', '$2y$10$oMeltd4wDD6SLUp1bVlQMOrm40BJbM4T0oIoxiHd5GLC9z3RTQlv6', 'JW39T9J49U', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(83, 'Prof. Wilfrid Robel PhD', 'gudrun.gibson@example.org', '2021-03-31 22:43:16', 'gold', '$2y$10$BBSncKk22a1iBkFQnJUBBuAtGsn3sXNC7gvHWBnTSpJA4aTP2FDqO', 'WxlValLadO', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(84, 'Juliana Metz', 'susanna55@example.com', NULL, 'gold', '$2y$10$Lp9197h7Dr.wmqVB7zEVD.lmwYk2/X/3Qp6NuffRCYaWPCaSxmZbK', '6KQJ3bYw1g', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(85, 'Ms. Nella Schowalter', 'feeney.laurence@example.org', '2020-11-04 09:24:59', 'standard', '$2y$10$e1mEol6axWl0XdGq.BRvBONSBtCFps8CivEJMKsURCgokJoqImtfm', 'QAZQIYLXrb', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(86, 'Prof. Rocio Schamberger II', 'lakin.cordia@example.net', NULL, 'premium', '$2y$10$qlWAu8Y3Dpvxu3kHv3h.fOE69jwgCAEzPbKJpB5c5cD./n3s11Kfm', 'tMVMk3g3LU', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(87, 'Ramiro Prohaska', 'allison11@example.com', '2021-05-25 23:46:22', 'gold', '$2y$10$bs4eP8ftTl1hc.Y0hWAUGeW7OWeVtbIMV5CBiqIBBthgESrJZ80va', 'ADPaP2Vc9z', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(88, 'Ernest Roob', 'gfeeney@example.org', NULL, 'premium', '$2y$10$b.5tJ8xGnDeqbZtGy5fm8uuiCA9pVSJVCIpAUnJg1923bNAA7JN1u', 'r2qyPZjqdJ', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(89, 'Valentine Marvin', 'pdickinson@example.net', NULL, 'gold', '$2y$10$g57Y5nsYRBkFNJUgHxkD6egNdqmhx7FKVkKqEP96uXQLXCFxaq0N.', 'QqVgJtJt8Y', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(90, 'Willis Corkery', 'zkling@example.net', NULL, 'gold', '$2y$10$QqXEMje6s7fEJE29MtiQK.oeKfJpAcDE.Pht5Et7NiGD/OT3KjiJa', 'MQHHnEvDPo', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(91, 'Neal Erdman Jr.', 'lmaggio@example.org', NULL, 'premium', '$2y$10$2EqS2/0S3eqDkObMiLtwYeVizZrW8kKoIBrpqAGg5cAKDDQWbP8IS', 'CLK8jur3eb', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(92, 'Gladys Littel', 'wjohns@example.net', '2021-09-27 00:09:50', 'standard', '$2y$10$0ZMDMfHAgs7uvVd9./EiaeU.vQiAssrWP/UViYwVuDODZIO3.MfhO', 'JxZTn0BWrs', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(93, 'Donald Kemmer', 'meredith64@example.org', '2020-10-09 04:39:33', 'premium', '$2y$10$6R27pvLRiYpYlkwcXZWGJOVbRfZ07aJGKp3zoE6Dh2o6sNPp2I1VG', 'hhS8NSDdGG', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(94, 'Coralie Wisozk', 'deanna70@example.com', NULL, 'standard', '$2y$10$VIxr9mCX0umBkLh1lHHS5eEsOf5FybGCqhG1jsHfTMRvF..rc/7QK', '5mxRg9aHPY', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(95, 'Gaston Reinger', 'keanu52@example.com', NULL, 'gold', '$2y$10$LvI.ygspHuVr8ma/8BqgQu7OzyK5yxsa6.CjYBSmG/eJcMmta0Zve', 'OFjPmb2eJl', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(96, 'Anastasia Turcotte', 'michele71@example.net', NULL, 'premium', '$2y$10$TZuTeBtprAKXK5WrQyRXFOB5biUObdrgfdczVgjTBj2ePaQUOlAsS', '7vwf3NGRFi', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(97, 'Geovanni Mann', 'pkeebler@example.org', '2020-06-27 00:13:38', 'premium', '$2y$10$mIPP.xEUE3YYoFGsZJsgzuCddQ89RZyg2v.G5lR9iRpL6zwS77d0m', 'SyIW2usjo3', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(98, 'Donato Muller III', 'gislason.jenifer@example.org', NULL, 'gold', '$2y$10$PWSGrC2da3ln6fBK1RdghOl/ET.4x0N0dpkL1E2FF9C68tczRbtDO', 'xfRHKICCMV', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(99, 'Noe Nitzsche', 'deanna.quitzon@example.com', NULL, 'standard', '$2y$10$iH8.nwJ1VmqRacvvuOjfz.VvTLV5d5jdDaS/nz2vPD/jBVOBzD40i', 'bdwTbOfszT', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL),
(100, 'Jerad Cronin', 'arlie.beier@example.net', '2020-11-09 17:01:21', 'standard', '$2y$10$HE7I/u2ompcHyj1brL51TOO9NXf5E679dW6JqATsPsD2lpZx2N77y', 'xgY4ZAcoMN', '2021-10-27 11:20:33', '2021-10-27 11:20:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_section_id_foreign` (`section_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_photoable_type_photoable_id_index` (`photoable_type`,`photoable_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_slug_unique` (`slug`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
