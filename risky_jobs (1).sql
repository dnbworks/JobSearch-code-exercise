-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 09:31 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `risky_jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `company` varchar(255) NOT NULL,
  `date_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `city`, `state`, `zip`, `company`, `date_post`) VALUES
(1, 'Matador', 'Bustling dairy farm products from cows.\nCandidate must have experience in milking cows. He/she must also know how to operate the milking machine. We should emphasize that point since it’s something that can, if forgotten, cause you\ngrief. Through no fault of the AWS designers, it’s surprisingly easy to accidentally launch a\nnew resource into the wrong region. Doing this can make it impossible for mutually dependent application components to find each other and, as a result, can cause your application to fail. Such accidental launches can also make it hard to keep track of your running\nresources, leading to the avoidable expense caused by unused and unnecessary instances not\nbeing shut down', 'Rutland', 'VT', '05701', 'Mad About Milk Dairies', '2021-08-14 06:59:28'),
(2, 'Paparazzo', 'From doing research and reaching out to top celebrity hang up. Candidate must be good in conducting interviews.', 'Bverly Hills', 'CA', '90210', 'Diva Pursuit, LLC', '2021-08-14 06:59:28'),
(3, 'Shark Trainer', 'Training sharks to do amazing jumps. Candidate must be a passion about aquatic creatures and must be good at taming sharks.', 'Orlando', 'FL', '32801', 'SharkBait, Inc.', '2021-08-14 06:59:28'),
(4, 'E-commerce web developer', 'We currently lookig for an ecommerce web developer responsible for maintaining our e-commerce website and other digital assets through effective collaboration with internal and external teams.', 'Canada', 'Toronto', '15230', 'Norma Kamali', '2021-08-14 09:15:36'),
(5, 'Prize Fighter', 'Up and coming super fly gnat weight boxer needs an opponent to help build his winning record. Slow feet. Sloppy hands, and a glass jaw are preferred. No experience required. This is not a full time salaried position. we\'ll met you in the alley behind the rink to share the purser. Let On King make you a championship fighter, or at least help you lose to one', 'Georgia', 'ATL', '30832', 'MMA', '2021-08-14 09:21:12'),
(6, 'Toreador', 'Lovily hoviness waiting for your superior non violet cape waving skills. Must pass basic bull fighting aptitude test.', 'Texas', 'ID', '23254', 'Lovily hoviness Inc', '2021-08-14 09:28:30'),
(7, 'Electric Bull Repairer', 'Hank\'s Honky Tonk needs an experience electric bull repairer. Free rides (after you fix it) and half off bot wings are some of the benefits', 'South Dakota', 'NJ', '09459', 'Hank\'s Honky Tonk', '2021-08-14 09:28:30'),
(8, 'Master Cat Juggler', 'Are you a practioner of the lost art of cat juggling? Banned in forty countries, only the Jim Ruiz Circus has refined can juggling for the sophisticated tastes of the modern audience. Ply your trade with premiere cat jugglers at our circus, the only place on earth to master synchronized cat juggling. It\'s true, juggling them is even harder than herding them. We are an equal opportunity employer, and look forward to adding you to our team. Please be prepared to undergo a thorough battery of tests to prove your daft handling of fellness, only the cream of the crop will be accepted into our master cat juggler program.', 'AZ', 'AZ', '09238', 'Jim Ruiz Circus', '2021-08-14 09:39:01'),
(9, 'Custard Walker', 'We need people willing to test the theory that you can walk on custard. we\'re going to fill a swing people who work from home complain that\r\nthey usually feel isolated from the rest of the world. Well, it doesn’t have to be that way\r\nanymore. There are now many opportunities to meet and network other virtual assistants both\r\nonline and offline', 'Alabama', 'NM', '09858', 'Custard Corporation', '2021-08-14 09:55:57'),
(10, 'Volatge Checker', 'You\'ll be out in the field checking ac and dc voltages in the rangeof 3 to 250 or more volts. you Admittedly, there would be flaws with any kind of employment. However, when it comes to\r\nworking from home, the pros outweigh the cons any day, and you can certainly overcome the\r\ncons by following the suggestions mentioned above', 'New York', 'NY', '092523', 'Meralco', '2021-08-14 09:55:57'),
(11, 'Tightrope tester', 'If the thought of dangling for hours on end from great heights is your idea of a good time, then this job just may be for you. Every one of our tightropes goes through rigomous a 43 point test, culminating in a real live human hanging for a prolonged period of time. That could be you! We do provide safety nets but you\'ll need to bring your own helmet and gloves. Here at manufacturing and testing facility in Big Top. Montana, we offer as incredible employment package with benefits ranging from being your pet to work week formal fridays. We will need three time and number of past folls. Were the circus behind the circus', 'Montana', 'MT', '85890', 'Big Top', '2021-08-14 13:37:31'),
(12, 'Tightrope Walker', 'Fledgling big top looking for three-ring professional with 1-3 years of experience to perform tightrope acrobatics with pudy elephant. Willingness to sweep excrement a big plus. Excellent benefits including medical and dental plans, prescription envenge, merchandise discount, short and long term disability insurance, life and business travel insurance, vision discount plan, auto and home insurance discounts, medical care and dependent care reimburment, educational assistance. Flexible starting salaries bases on skills and abilities, experience and geographic market. Promotion opportunity based on performance. The only thing stopping you from the highest win in the big rent is your design and work ethic and your balance! other duties include planning $ organizing wires, handling minor elephant administration, processing comment cards from children. leading by example (don\'t fall)  showing initiative and sense of urgency and being results driven help acrobatics  professional become successful. if you want to be challenged and your talent needs mentoring and opportunity. BingLing brothers can offer you a fast track to success.', 'Texas', 'TX', '558090', 'BingLing brothers', '2021-08-14 14:08:36'),
(13, 'FireFighter', 'The city of Dataville is hiring firefighters. On experience required. you will be trained. Non smoking', 'Chicago', 'CH', '54635', 'DataVille', '2021-08-18 03:16:15'),
(14, 'Antenna Installer', 'You\'ll be installing antennas and other metallic broadcast receiving equipment on the roof of Miami residences', 'Miami', 'FL', '456345', 'AMC broadcasting Inc', '2021-08-18 03:22:03'),
(15, 'AirPlane Engine Cleaner', 'Jet airplanes needing engines cleaned. In need of cleaned individual willing to handle rust ', 'Texas', 'TX', '95834', 'Jet Airplanes', '2021-08-18 03:22:03'),
(16, 'Elephant Proctologist', 'Needed: experienced Proctologist willing to work with large animals. Elephants at our zoo (in san Francisco)', 'san Francisco', 'CA', '083480', 'National Game Park', '2021-08-18 03:26:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
