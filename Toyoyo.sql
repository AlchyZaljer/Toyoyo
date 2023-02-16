-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 05 2022 г., 13:10
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Toyoyo`
--
CREATE DATABASE IF NOT EXISTS `Toyoyo` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci;
USE `Toyoyo`;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `price` int UNSIGNED DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `image`) VALUES
(1, 'Booc', 63, 'Booc.jpg'),
(2, 'Coco', 70, 'Coco.jpg'),
(3, 'Fifi', 68, 'Fifi.jpg'),
(4, 'Lulu', 62, 'Lulu.jpg'),
(5, 'Missy', 55, 'Missy.jpg'),
(6, 'Noah', 65, 'Noah.jpg'),
(7, 'Pak', 66, 'Pak.jpg'),
(8, 'Pinky', 58, 'Pinky.jpg'),
(9, 'Sven', 63, 'Sven.jpg'),
(10, 'TiknTak', 53, 'TiknTak.jpg'),
(11, 'Baton', 61, 'Baton.jpg'),
(12, 'Maslo', 61, 'Maslo.jpg'),
(13, 'Cuke', 71, 'Cuke.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `goods_id` int UNSIGNED NOT NULL,
  `rating` int UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_login` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `date` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `images` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `goods_id`, `rating`, `description`, `user_login`, `date`, `images`) VALUES
(1, 10, 5, 'Soft, sewn with high quality, pleased everyone) I took it as a gift to a friend, I’m waiting for her, etc. I don’t know what))))) I want to give and see how she will be delighted)', 'wromvi', '01-04-2022', 'r1_1.jpg|r1_2.jpg|r1_3.jpg'),
(2, 12, 5, 'Very nice plush, clean, soft, right size, very soft and soft, the material is strong so it won\'t break, and arrived in 10 days in the UK! The seller was also very helpful when I needed more tracking information!', '', '17-04-2022', 'r2_1.jpg|r2_2.jpg'),
(3, 13, 3, 'The plush arrived fairly quickly and in good condition. The only problem was that it was not the right size. I ordered 130 cm and received 110 cm. I was able to get a refund.', 'marina_petr16', '22-04-2022', 'r3_1.jpg'),
(4, 12, 2, 'Everything was fine, if not one but..... The toy came damaged, it was heavily smeared with glue and torn along the seam. And you can’t say that he didn’t notice, because this marriage is very visible. Most likely this was done intentionally. It was my first order(( ', '', '06-05-2022', 'r4_1.jpg|r4_2.jpg'),
(5, 1, 5, 'The toys are great! I bought everything and am very happy! they are so soft and big. they are so awesome. I live with them everywhere, I give them to friends and relatives. Super, charming, inimitable!!!!', 'alchy_zaljer', '14-05-2022', 'r5_2.jpg|r5_1.jpg'),
(6, 8, 5, 'It\'s so amazing. I am so happy with this purchase. It\'s so soft, I can literally fall asleep just by laying it down. It\'s so convenient. It even arrived earlier than expected. You should definitely buy it!', '', '22-05-2022', 'r6_2.jpg|r6_1.jpg'),
(7, 7, 3, 'It is because of the soft and pleasant .. But very thin. I think it\'s unreliable. And I want to put a high score, but I\'d rather hope that they fix it!!', '', '28-05-2022', 'r7_1.jpg'),
(8, 13, 5, 'Dimensions: 24*12 cm. Filling is not dense. If you need the elasticity of the toy, it is better to take smaller toys, as they are more densely packed. The quality of the fabric is excellent. There is no lightning.', 'user134982', '18-06-2022', 'r8_2.jpg|r8_1.jpg'),
(9, 12, 5, 'My dog is delighted! I hope the reliability of the material will not fail. It looks very cute)))', 'dinoli', '21-06-2022', 'r9_2.jpg|r9_1.jpg'),
(10, 7, 5, 'As shown in the picture, it is very cute and very soft', 'ivashka101', '30-06-2022', 'r10_2.jpg|r10_1.jpg'),
(11, 3, 3, 'very small, the quality is average, I read good reviews and ordered, but disappointed, the price is too high, the seams are bad, it\'s a pity', 'Hel7oBToPuMblu', '06-07-2022', 'r11_1.jpg'),
(12, 6, 5, 'Great quality for a 30cm plush. Very well soft, well packaged and fast shipping. Corresponds to the description, I recommend this seller!', '', '19-07-2022', 'r12_1.jpg'),
(13, 7, 4, 'First off, I\'m terrible at reviews, so I\'ve included photos so you can see for yourself (definitely), but I\'m not being too picky. I like it, I\'m not thrilled, but it\'s still very cute even with small defects. I love the zipper on the back, I personally feel it would be helpful if it needed more padding. I got this as a free gift (not very eye catching) so I\'ll be looking forward to it. It also arrived earlier than I expected.', 'kitty-switty15', '24-07-2022', 'r13_1.jpg'),
(14, 2, 5, 'Very normal delivery time comes without details. The filling and shape are excellent, they are very good, so I hope this is a good gift for my friend', 'slavaluli2801', '17-08-2022', 'r14_1.jpg'),
(15, 10, 3, 'Medium quality toy, I think it will break quickly. That\'s why I rate it 3 stars', '', '22-08-2022', ''),
(16, 13, 4, 'There is little filler in the middle (you can see it in the 2nd photo), but it’s excellent, I recommend it))', 'wromvi', '29-08-2022', 'r16_1.jpg|r16_2.jpg'),
(17, 2, 5, 'This elephant stole my heart! I am happy that I chose him. It\'s soft and fluffy, just like a bun. I told all my friends about it) Buy it!', '', '04-09-2022', 'r17_1.jpg|r17_2.jpg|r17_3.jpg'),
(18, 8, 4, 'God, he is so cute, the child will love the soft, pleasant to the touch size 50 cm goes from the muzzle to the hind legs, the width is 11 cm. I recommend!!! But a 70 cm pig would be much better and a little fatter', '', '13-09-2022', 'r18_1.jpg'),
(19, 4, 1, 'not satisfied with the purchase, this toy is of poor quality', '', '29-09-2022', 'r25_1.jpg'),
(20, 3, 4, 'It\'s cute, but it seems to be too small. Better than 50 I think', '', '03-10-2022', 'r20_1.jpg|r20_2.jpg'),
(21, 9, 2, 'I am dissatisfied with the quality. I didn’t notice at first glance, and then I saw that the fabric was too thin and could tear (', '', '12-10-2022', ''),
(22, 11, 5, 'Looks great, bought as a gift Packed well, but be careful when cutting the package. The size is what you need. can recommend it', '', '27-10-2022', 'r21_1.jpg'),
(23, 1, 5, 'I bought them many times and this time I want to tell you about the bear. (in the photo he is in the middle) I like his color, he is so gentle and looks like the sky. The threads do not stick out, there is no unpleasant smell, so we can say that the toy is perfect', 'alchy_zaljer', '10-11-2022', 'r22_1.jpg'),
(24, 11, 5, 'These pillows are wonderful. And super soft fabric. I arrive very fast, very good continental package and the courier in my area is incredible. Always attentive and formal. I recommend 100 seller as the description is true', '', '25-11-2022', 'r23_1.jpg|r23_2.jpg|r23_3.jpg'),
(25, 6, 4, 'I recommend to buy!!! Delivered very quickly, the price is excellent and the quality is super. Beautiful and very cute soft toy.))))', 'dinoli', '01-12-2022', 'r24_1.jpg|r24_2.jpg'),
(26, 6, 5, 'Just look at him! Everything is obvious, the toy is excellent, take it', 'marina_petr16', '04-12-2022', 'r19_1.jpg|r19_2.jpg'),
(27, 5, 5, 'I love this item very cute how long it said it is thinner which i expected but idc i will keep it forever and we are famous best friends i also got one for my brother it comes in a week or two I showed this one to him and he loves it and I\'m very glad I got it', '', '05-12-2022', 'r15_1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `firstName` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `login` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `birthDate` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(17) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `site` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `login`, `email`, `password`, `birthDate`, `phone`, `site`, `ip`, `admin`) VALUES
(1, 'Наталья', 'Амбарцумова', 'alchy_zaljer', 'alchy_zaljer@mail.ru', '66674aeb835788a0e6f5e5607e62647a', '26-05-2001', '+7(915)3489393', 'https://github.com', '192.168.1.1', 1),
(2, 'Иван', 'Петров', 'ivashka101', 'ivan_p@mail.com', '22e69c2139990a70b3916bc8422f4565', '13-05-1997', '+7(977)5638910', 'https://ivan.com', '240.166.1.5', 0),
(3, 'Мария', 'Кузнецова', 'kitty-switty15', 'kotenok@rambler.ru', 'e0382644ac48c27968c599646de05449', '15-09-2008', '+7(916)2182931', 'https://kittenssite.com', '42.118.220.3', 0),
(4, 'Володя', 'Агапов', 'Hel7oBToPuMblu', 'vo1@volodya.ru', '4555d189988294ceb2ac5e6f92f2aefc', '10-04-2003', '+7(925)3016432', 'https://volovka.com', '66.150.140.8', 0),
(5, 'Алексей', 'Зимов', 'dinoli', 'dinoLi@gmail.com', '55c23ede918c9b4ab04316d476df73f6', '09-12-1999', '+7(916)9631323', 'https://ozon.com', '250.18.92.15', 0),
(6, 'Юлия', 'Мельникова', 'slavaluli2801', 'slavaluli@yaho.com', '346f050bb6cbf1233586c65691cc5f8d', '28-01-1978', '+7(968)4210800', 'https://slava.ua', '148.255.18.26', 0),
(7, 'Марина', 'Петримова', 'marina_petr16', 'mar_petrimova@yandex.ru', 'ef4bbbfb584a183376a9addfea66039a', '16-08-1989', '+7(925)2864623', 'https://site.page.com', '75.200.36.45', 0),
(8, 'Александра', 'Сумская', 'user134982', 'asum2311@rambler.ru', 'd83934de4ab6d3b3d745089d10f875c2', '23-11-1994', '+7(913)1568358', 'https://userpage.asum.ru', '165.25.133.60', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
