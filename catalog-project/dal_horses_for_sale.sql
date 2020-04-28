-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2018 at 12:44 PM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dalgot1_dmit2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `dal_horses_for_sale`
--

CREATE TABLE `dal_horses_for_sale` (
  `dal_name` varchar(255) NOT NULL,
  `dal_city` varchar(255) NOT NULL,
  `dal_province` varchar(255) NOT NULL,
  `dal_breed` varchar(255) NOT NULL,
  `dal_discipline` varchar(255) NOT NULL,
  `dal_gender` varchar(20) NOT NULL,
  `dal_height` varchar(20) NOT NULL,
  `dal_age` tinyint(4) NOT NULL,
  `dal_ageoption` tinyint(4) NOT NULL,
  `dal_color` varchar(255) NOT NULL,
  `dal_cost` int(11) NOT NULL,
  `dal_description` text NOT NULL,
  `dal_phone` varchar(150) NOT NULL,
  `dal_image` varchar(255) NOT NULL,
  `horseid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dal_horses_for_sale`
--

INSERT INTO `dal_horses_for_sale` (`dal_name`, `dal_city`, `dal_province`, `dal_breed`, `dal_discipline`, `dal_gender`, `dal_height`, `dal_age`, `dal_ageoption`, `dal_color`, `dal_cost`, `dal_description`, `dal_phone`, `dal_image`, `horseid`) VALUES
('Wi Dance Again', 'Aldergrove', 'British Columbia', 'Warmblood', 'Dressage', 'Mare', '16.1', 8, 1, 'Tobiano', 32000, 'Premium foal in C.S.H. Western Futurity, 2nd in the Lt Governors Cup. Schooled over fences at home to 3&#39; shown 2&#39;6, but shines in Dressage. Attending Gold level shows competing in Second level test 2 and 3, Scoring in the high 60% reaching 67% in front of a World class judge. Schooling third level at home. She will make a wonderful partner for an intermediate rider who wishes to compete at the higher levels. She has passed a vetting performance exam in the Spring of 2017, She is a talented horse and presents herself well. Beautiful, talented and eye catching. Good to handle, clips, loads, ties and stands for the Farrier. Also enjoys the trails with friends. Registered with Canadian Sport Horse - F1, ISR (foal papers) and Pt.H.A.\r\n\r\n', '778-551-1890', '5c0c39e88cbe4.jpg', 20),
('CW Peppy Valentine', 'Bridge Lake', 'British Columbia', 'Quarter Horse', 'None', 'Filly', '13', 6, 2, 'Black', 2000, 'AQHA papers pending. Stunning jet black filly, she is quiet and friendly and handles great already. Look at her chest! Our horses are born and grow up in a big herd out on range, they know how to cross water and deadfall, how to run through the bush and how to turn in tight spots. This filly will be over 15h high. Ready to go to her new home, she&#39;s halter broke, leads and loads like a pro, and is UTD on deworming and vaccinations. visit our website Located in Bridge Lake, BC and can be seen anytime!', '', '5c0c3b9be0797.jpg', 21),
('Mav', 'Ridgeville', 'Ontario', 'Thoroughbred', 'Dressage', 'Gelding', '16.2', 7, 1, 'Bay', 15000, 'Saintly safe 2011 16.2 Thoroughbred (English Channel x Russian Sweetiepie) gelding. Mav is a big bodied, great moving guy with a fantastic attitude and extremely kind disposition. He has three great gaits and is fun to ride and be around. Mav has competitive scores and fantastic comments at first level and is schooling second, as well as green changes. Easy transitions, good lateral work, hacks, bathes, clips, ties, trailers, snuggles, good for vet and farrier, turned out in a group of geldings, etc. Has taught new riders to canter for the first time. Ridden by timid juniors in weekly lesson. Perfect horse for someone wanting to begin dressage career with a safe, sane horse. Easy to handle, same horse at shows, easy keeping, recent-ish clean vetting, sound, clean and ready to make someone happy.', '', '5c0c3c6644899.jpg', 22),
('RVVR Saugeen Sunrise', 'Chelsey', 'Ontario', 'Quarter Horse', 'Barrel Racing', 'Mare', '15.1', 7, 1, 'Buckskin', 5500, 'Here is a stout 15.1 h mare who is a very smooth mover with exceptional speed and athleticism what is explained through the excellent speed background of her pedigree! She had plenty of ground work, is easy to handle with excellent ground manners and is very friendly to be around. She was broke late as I intended to use her as broodmare (she has one foal and is breeding sound) but as I have to reduce my herd size, she is being offered for sale and we only offer broke horses for sale. She is solid in all three gaits and responds nicely to cues. She is not a beginner horse at this point but has a very sweet disposition.', '519-270-5273', '5c0c3d2e64fd8.jpg', 23),
('Ruby Slippers', 'Saanichton', 'British Columbia', 'Quarter Horse', 'Jumping', 'Mare', '14.2', 8, 1, 'Chestnut', 13000, 'Beautiful Ruby Slippers is your go to Mare. She loves to jump and has won short stirrups over at Thunderbird. She&#39;s 14.2 hh and 8 years old, the way she moves takes her to a whole new level. No buck, bolt or rear. Hop on and start your training! No health problems and stands/loads great.', '587-663-2173', '5c0c3df160072.jpg', 24),
('Tempi', 'Ridgeville', 'Ontario', 'Pony', 'Jumping', 'Mare', '14', 7, 1, 'Cremello', 5500, 'Tempi is a super brave, honest pony jumper with talent and scope. She currently jumps around a 2&#39;6&#34; course at the show with plenty of room to go. She has competed in both schooling level jumper shows and events; has seen banks, ditches, skinnies and galloping fences without batting an eye. She trail rides happily alone or with others. No stop/bolt/buck/rear, but Tempi is definitely a forward ride. She would be best suited for a capable junior looking for a serious jumper/eventing/Pony Club partner, or even a petite adult. Less experienced riders have been on her, and she does take it well. She currently lives outside; is barefoot, easy keeping, turned out with other ponies. Trailers, ties, baths, good for vet and farrier, etc. Easy to be around and so much fun to ride!', '', '5c0c3e89907c5.jpg', 25),
('Flyin High With Chex', 'Neepawa', 'Manitoba', 'Paint', 'Barrel Racing', 'Filly', '14.3', 12, 2, 'Sorrel', 1000, 'This pretty lady is out of a solid APHA High Brow Cat granddaughter. Gorgeous dark sorrel color. She is very sweet and a quick learner. She could go any direction. She&#39;s bred to hunt a cow but she would also excel at hunting a barrel. Asking $1000 CAD (+GST)', '', '5c0c3f1d5c366.jpg', 26),
('Henry', 'Oakville', 'Ontario', 'Oldenburg', 'Jumping', 'Colt', '13', 5, 2, 'Bay', 9500, '2018 colt out of the stunning stallion Harvard ( Hohenstein X Hauptstutbuch ) and Dam Mohreagen ( Mattgold X Wentessa ) Henry is a very handsome colt and was born ready for the hunter ring! His three floating gates and superb conformation will definitely make him a top contender in the show ring! His gentle, willing and laidback personality make him a pleasure to work with. Henry is now 5 months old and already successfully leads alone, picks up his feet for the farrier and will load on and off of a trailer.', '321-486-9932', '5c0c3fb3dd616.jpg', 27),
('Macho Men Streke', 'Falkland', 'British Columbia', 'Paint', 'Halter', 'Colt', '14', 8, 2, 'Bay', 1300, '&#34;Macho Men Streke&#34; is a gorgeous 2018 APHA colt for sale. QT Poco Streke on sire&#39;s side and Barlink Macho Man on dam&#39;s side. Both parents are lovely, good-minded pleasure horses. Born April 4, 2018. $1300 Firm.', '', '5c0c4034f3747.jpg', 28),
('Sensational Crush', 'Bluffton', 'Alberta', 'Paint', 'Halter', 'Gelding', '16', 8, 2, 'Bay Overo', 3500, '2018 Beautiful alpha bay minimal overo colt. Western pleasure deluxe! If you&#39;re looking for a top show prospect he&#39;s your guy! Such a nice mover, flat kneed and slow legged, by a lazy loper stud out of a Zippos sensation daughter. quiet, friendly, easy to handle. Should mature around 15.3hh. Paid into Breeders trust. NSBA eligible. more pictures and video available. Sire is a double registered sabino overo by lazy loper -My Kind of Lazy Dam is by the great Zippos sensation - Zippos Plain and fancy.', '403-704-6936', '5c0c40c89d61b.jpg', 29),
('Rio', 'Kitchener', 'Ontario', 'Hanoverian', 'Dressage', 'Mare', '16', 10, 1, 'Sabino', 30000, 'â€˜Rioâ€™ is a bay sabino 10 year old Hano. mare who stands at 16h. Rio is an absolute pleasure to work with and around and with many years of show experience, she is very safe for a novice or AA rider, but also demonstrates great potential to move up the levels. Rio spent many years on the eventing circuit shown up to the novice/pretraining (3â€™) level and won the provincial championships at her level in 2015. She would prefer a pure jumper or dressage home and spent this summer showing at second level dressage with an Adult Amateur rider with scores around 72%. She is currently schooling 3rd level dressage. She has no vices or previous injuries/illness and great for trailer/vet/farrier. She is located near Toronto, Ontario, Canada.', '441-886-3250', '5c0c42e289e30.jpg', 33),
('Amazingly Unik', 'Montreal', 'Quebec', 'Oldenburg', 'Jumping', 'Mare', '16.2', 5, 1, 'Bay', 23000, 'Very showy horse with beautiful movement.This versatile mare would be nicely suited to the disciplines of show jumping, eventing or dressage. She possesses great ground manners, a pleasant temperament and lots of competitive potential in almost any discipline. She is currently in full training and performed with confidence at the shows as a 5 year old. She has also competed at several jumper shows in the . 90m this past season can dot ALOT more. Contact me for more pictures and videos. Price mid-low 5 figures CAD', '', '5c0c443856342.jpg', 34),
('Lilly', 'Camrose', 'Alberta', 'Minature', 'None', 'Mare', '8', 6, 1, 'Black Leoparf', 850, 'Registered minature app mare, 12 years old, possibly in foal to a few spot stallion for June 2019, shy and standoffs so not a kid or cart pony, great broodmare, good mother, easy to catch, hauls fine, good for farrier, wears a blanket.', '', '5c0c4572bae9e.jpg', 35),
('Crazy Heart', 'Foothills', 'Alberta', 'Warmblood', 'Jumping', 'Gelding', '16.3', 8, 1, 'Black', 50000, 'â€˜Crazyâ€™ is an amazing 2010, 16.3hh Canadian Warmblood by Carthago Sun I. He has competed at numerous venues in Alberta including Spruce Meadows, RMSJ, Ponoka, Edmonton show park and has also competed in Thermal, CA. Crazy has recently started doing the 1.15m/1.20m division. His scope is endless and he regularly schools higher at home. He would make a great project horse for someone wanting to move up divisions and compete in the top venues around North America. Crazy is very brave at the jumps and has done numerous liver pools, ditches, banks and natural obstacles. He clips, baths, loads and loves to be pampered.', '403-999-6949', '5c0dc86938d19.jpg', 38),
('Gamble', 'Winsole', 'Prince Edward Island', 'Warmblood', 'Dressage', 'Gelding', '17', 7, 1, 'Bay', 52000, 'Beautiful imported 7 year old KWPN Gelding. 17hh. Very successful young horse and second level show record, scores always mid 70&#39;s. Currently schooling and ready to compete third level. Well trained and balanced horse with 3 super quality paces. Pleasure to ride and be around. Easy going temperament and personality. Same at home as at shows. Hacks out alone and in groups.\r\nThis horse shows wonderful talent for collection, doing some half steps and canter pirouettes, a horse that will be very well suited for the FEI ring. Reasonably priced in mid five figures, negotiable to right home where this horse will be brought to his full potential!', '902-969-1179', '5c0dc9119097f.jpg', 39),
('Holoma', 'Peterborough', 'Ontario', 'Warmblood', 'Jumping', 'Mare', '17.1', 6, 1, 'Black', 45000, 'Prospect for top derby horse, hunters and high level jumper !\r\nWith 3 foals on the ground her breeding is not one to miss. Her sire Spartacus is a direct Stakkato and her dam has produced multiple 1.30+ horses.\r\nThis mare can do it all! \r\nBeautiful dark bay KWPN mare, with endless scope, a great brain and no vices.\r\nWill jump anything infront of her, easy enough for an amateur or children. Scopey with enough potential for a professional to develop for the age classes or start her hunter career. (still eligible for baby/pre greens)\r\nA star of the future and top quality young horse !!!', '', '5c0dc9ad9c66e.jpg', 40),
('C Ponderosa Sai-Lore', 'Parkhill', 'Ontario', 'Welsh Pony', 'Driving', 'Gelding', '12', 13, 1, 'Grey', 1000, 'For lease or sale to exceptional home. This cutie drives and rides. Not a babysitter, but sure to get the judge&#39;s attention in the breed shows.', '', '5c0dcfaa6f044.jpg', 41),
('Pacific Pepel', 'Winnipeg', 'Manitoba', 'Warmblood', 'Dressage', 'Gelding', '17.2', 14, 1, 'Bay', 8000, 'Previously shown in the ring as Kingston, King has an impressive show record. He has scored mid 60s to low 70s in majority of his training levels tests, his highest score in the ring being a 75.00%. He has successfully shown through First level. An intermediate rider would be best suited for him.', '', '5c0dd0672543e.jpg', 42),
('Soul Seeker', 'Stratford', 'Manitoba', 'Thoroughbred', 'Jumping', 'Gelding', '16.3', 16, 1, 'Bay', 30000, '16 year old OTTB Bay gelding. Exceptional 3&#39; Hunter. &#34;Sully&#34; is currently enjoying a successful career in the 3&#34;6 Junior Hunters. Pins well over fences and under saddle. Qualified for RAWF in 2017 and 2018 and was just short of qualifying in the 3&#39; Children&#39;s Hunter Division in 2015. Sully would excel in the 3&#39; Children&#39;s or Adult divisions with an experienced, solid rider. His lovely step and quality jump make him a fit in the hunter ring, however, he has done dressage and would find a competitive life in that ring as well. Together with the Junior division, Sully competes regularly in the 3&#39; Thoroughbred Classics. He steps out of the ring in the top ribbons every time.', '519-274-0441', '5c0dd10d99328.jpg', 43),
('Frosted Pines Russians Remember Me', 'Fort Macleod', 'Alberta', 'Minature', 'None', 'Stallion', '8', 5, 1, 'Buckskin', 2500, 'This gorgeous buckskin stallion stands about 32 inches tall and has thrown some very nice foals for us. He is sired by the one and only Little Kings White Russian and out of a BTU daughter which leads to a pretty outstanding set of horses right on his papers.', '', '5c0dd2a2eb0a5.jpg', 44),
('Stargates Sweet Revenge', 'Salt Spring Island', 'British Columbia', 'Minature', 'None', 'Stallion', '7.2', 17, 2, 'Sorrel', 1000, 'Stargates Sweet Revenge is expected to finish at 32â€. He is AMHA and AMHR registered. He comes from excellent driving stock, with his sire being Imprint Bold As Brass and his dam is First Knight Americaâ€™s Sweetheart. He is learning new requests willingly and enjoys success in all tasks. Overall he is a very sweet little fellow with no vices, who is easy to handle.', '250-644-3841', '5c0dd39bb1e67.jpg', 45),
('Samuelle Ducrocq', 'Sainte-Marguerite Du Lac Massson', 'Quebec', 'Gypsy Vanner', 'None', 'Stallion', '15.2', 3, 1, 'Tobiano', 9900, 'Django des Laurentides is an adorable, nice and easy Gypsy vanner stallion, born at our farm and trained with an ethological approach. Very closed to humans and friendly. Respects mares and broken under saddle, basic level, ok for trails alone or with horses too. Walk, trot, canter; do spanisk walk, very easy to handle and a lot of affection and attention. 15 hands 1. 1 blue eye, very nice mane and tail, growing more every day. Used to : muscial horse show, light and sound projections (we make musical horse show like cavalia and Django has no fear of all and he is well desensibilised to every thing like plastic; ball, stage, umbrella, laying down in front of public and so on).', '', '5c0dd509d0ad0.png', 46),
('Lexus', 'Montreal', 'Quebec', 'Warmblood', 'Jumping', 'Gelding', '16', 15, 1, 'Bay', 30000, 'Hi my name is Lexus, and I need a new parent. My current mom is now way too busy with her new tiny baby humans. Thatâ€™s honestly the biggest reason Iâ€™m here.\r\nIâ€™ve only ever had 1 mom, sheâ€™s ridden at top levels (with my brothers) so she taught me everything I know, how to be the best boy ever. I spent my life getting ribbons for classes between 1.35m and 1.20m, and I dont want to brag but I did really well in the international ring in palm beach for the 1. 30m. Iâ€™m a Canadian warmblood, and I measure 16 hands. The words that best describe me are Sweet, safe, talented, easy and fun to ride.', '', '5c0dd5872a785.jpg', 47),
('Jazzeera', 'Plumas', 'Manitoba', 'Arabian', 'None', 'Filly', '14.2', 3, 1, 'Grey', 5000, '3 year old purebred Arabian filly, grate blood lines, sired by AK Frazeer a Strait Egyptian. Jazzeera is for sale , 60 days training, she&#39;s always looking for you at the gate, smart, learns fast, classy, ready for more all the time. I have a video of her being ridden and worked with, registration papers, and blood line history , ready to email. Check Jazzeera out on you tube.', '204-386-2622', '5c0dd7194cb6b.jpg', 48),
('Flower', 'Virden', 'Manitoba', 'Quarter Horse', 'None', 'Filly', '14.3', 8, 2, 'Palomino', 3000, 'This is always an exceptional cross!\r\nAnd this filly us the proof. She is put together right and is gorgeous! She is a great mover and is very good minded. She is quiet, friendly and curious.', '204-851-5840', '5c0dd7df92735.jpg', 49),
('Surenuff Blended', 'Winnipeg', 'Manitoba', 'Paint', 'None', 'Gelding', '15', 21, 1, 'Palomino', 23000, 'Surenuff Blended has a nice pedigree and is an excellent color producer but my favorite thing about him is his wonderful disposition! We have about half a dozen colorful Buckskin, Palomino and Dunn babies by him with splashy white marks, all out of solid colored mares. \r\nMore pictures and a copy of his papers easily available, just contact us!', '970-261-5055', '5c0dd9baf2d8b.jpg', 50),
('Lucky Da Vinci', 'Drayton Valley', 'Alberta', 'Paint', 'None', 'Gelding', '15.2', 2, 1, 'Bay Roan', 5000, 'Da Vinci is a sweet, eager to please horse. He is easy to trailer, works well with farriers, and does whatever is asked by trainers. He has been worked in halter and under saddle with super results. He shows amazing aptitude for cutting, reining or other performance events. Both Color Me Smart and Doc O&#39;Lena bloodlines. Sired by This Smoke Stings. Dam is Lucky Paula Chick. With a calm, happy temperament- he is the real deal.', '', '5c0e82e949667.jpg', 51),
('Hallie', 'Calgary', 'Alberta', 'Hanoverian', 'Dressage', 'Mare', '16.3', 14, 1, 'Bay', 5500, 'Hallie is a beautiful branded Hanoverian mare by top dressage stallion Harvard, out of Rivendale (Ragazzo) \r\nShe was in full dressage training with a grand prix dressage rider as a youngster and was showing promising talent for the upper levels until an unfortunate accident slipping on the ice caused her a stifle injury making her broodmare sound only. She gets along well with others in a herd, and loves to come in for grooming and attention whenever possible. Reason for selling is we don&#39;t have time to put into breeding at the moment, so would love her to go to a serious warmblood breeder to use her to her full potential. Serious inquires only, our first priority is a good home for this sweet mare. Flexible on price to the right home for her! \r\nOpportunity for a broodmare like this doesn&#39;t come along often!', '', '5c0e83d3a3fc8.jpg', 52),
('Grand', 'Cochrane', 'Alberta', 'Warmblood', 'Dressage', 'Gelding', '16.1', 6, 1, 'Chestnut', 31000, 'Meet Grand! A 2012 Canadian Warmblood Gelding byDonner Bube. Expressive, fluid and refined elegance with three beautiful gaits and an uphill modern build make him the perfect dressage mount. Grand has the potential for upper level dressage Easily. His freedom in his shoulders and active hind legs makes this horse get noticed in the show ring. He was shown in the FEI Divison with scores of 79%. He loads,is UTD on all vaccines, well mannered and is great for the farrier. If your looking for a young horse with the potential for Grand Prix, he is a must see.', '', '5c0e84ca997e8.jpg', 53),
('Captain', 'Calgary', 'Alberta', 'Thoroughbred', 'Jumping', 'Gelding', '17', 13, 1, 'Bay', 7500, 'Captain very much loves to jump, and has competed at venues including RMSJ, Spruce Meadows, Paramount, and many local shows at various Alberta based barns. He has also been to a few jumping clinics off property, and is the exact same horse as he is at home. He has schooled cross-country and shows a special affinity to the sport, with no hesitation at ditches, banks, logs, or coffins. He does need some encouragement through water, though has no problem with liver pools. Captain has all lateral movements mastered, and a balanced WTC. With his dressage training, Captain would excel in low-level eventing. \\r\\n', '', '5c0e8596c639b.jpg', 54),
('Charmed', 'Red Deer', 'Alberta', 'Hanoverian', 'Jumping', 'Gelding', '17', 3, 1, 'Grey', 9500, 'Hanoverian prospect, Jumper prospect. Charmed is bred for jumping. His Sire is Toronto KWPN\r\nHis mare is Spruce Meadow bred her Sire was Simply Spruce Meadows. Charm has a wonderful and playful personality. I have added a photo of the mare and Sire.', '780-212-1492', '5c0e860879afc.jpg', 55),
('Goulding Acres Lily&#39;s Miami Vice', 'Ripley', 'Ontario', 'Minature', 'None', 'Gelding', '7', 3, 1, 'Sorrel', 2600, 'Foaled May 30, 2015 this gorgeous stalky little fellow will make a great driving gelding with training. UTD on shots, deworming, farrier & just recently gelded. Was used in petting zoos, walked in parades and shown at fair shows when he was younger. Let&#39;s get this adorable little fellow under your Christmas tree this year. Dam: Sky&#39;s Dazzling Star Sire: Kai Lees Whispering Spirit\r\n\r\n', '', '5c0e86ba2d20d.jpg', 56),
('Quarter Moon II', 'Qu&#39;appelle', 'Saskatchewan', 'Warmblood', 'Dressage', 'Mare', '15.1', 4, 1, 'Bay', 12500, 'Sula might be young but she is very mature in her ability to handle all sorts of situations and riders. At her first show with a Jr rider she won her 2&#39;3 round! She has auto changes and is very simple and willing.\r\n', '306-527-0674', '5c0e87bbafe1d.jpg', 57),
('Josh', 'Qu&#39;appelle', 'Saskatchewan', 'Thoroughbred', 'Jumping', 'Gelding', '16.1', 13, 1, 'Bay', 8000, 'Josh has been there and done it all! He has competed in Dressage, Hunters, Hunter Derbies and Jumpers. He is sane and sound and ready for someone with the time to let him shine.', '306-527-0674', '5c0e885111c8c.jpg', 58);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dal_horses_for_sale`
--
ALTER TABLE `dal_horses_for_sale`
  ADD PRIMARY KEY (`horseid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dal_horses_for_sale`
--
ALTER TABLE `dal_horses_for_sale`
  MODIFY `horseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
