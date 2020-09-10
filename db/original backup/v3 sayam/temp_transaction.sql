-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 11:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `temp_transaction`
--

CREATE TABLE `temp_transaction` (
  `id` int(100) NOT NULL,
  `vendor_id` int(100) NOT NULL,
  `item_id` int(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_unit_price` int(100) NOT NULL,
  `available_qty` int(50) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_transaction`
--

INSERT INTO `temp_transaction` (`id`, `vendor_id`, `item_id`, `item_name`, `item_unit_price`, `available_qty`, `token`) VALUES
(18, 1, 5, 'Pasta', 230, 1000, '0621a26c90a42515c371d29da60c42'),
(19, 1, 3, 'pizza', 50, 50, '75bf857f8ad4cf0862722a3dc9eeec'),
(20, 1, 3, 'pizza', 50, 50, 'c2721d9d56d298ff5d861f4c14190b'),
(21, 1, 3, 'pizza', 50, 50, '3e23f038c93a8e365207e116245ec8'),
(22, 1, 3, 'pizza', 50, 50, '28f79435dd3567ad99a23994024ad4'),
(23, 1, 3, 'pizza', 50, 50, '4e31188195215079a989f80f58978b'),
(24, 1, 5, 'Pasta', 230, 1000, '4e31188195215079a989f80f58978b'),
(25, 1, 6, 'Chowmein', 170, 50, '4e31188195215079a989f80f58978b'),
(26, 1, 3, 'pizza', 50, 50, 'ab97a7b782977c2f0749653fb5fe92'),
(27, 1, 5, 'Pasta', 230, 1000, 'ab97a7b782977c2f0749653fb5fe92'),
(28, 1, 6, 'Chowmein', 170, 50, 'ab97a7b782977c2f0749653fb5fe92'),
(29, 1, 7, 'Apple Juice', 70, 60, 'ab97a7b782977c2f0749653fb5fe92'),
(30, 1, 12, 'Chicken Fry', 50, 50, 'ab97a7b782977c2f0749653fb5fe92'),
(31, 1, 13, 'Crispy Chicken', 50, 100, 'ab97a7b782977c2f0749653fb5fe92'),
(32, 1, 18, 'Singara', 5, 100, 'ab97a7b782977c2f0749653fb5fe92'),
(33, 1, 17, 'Dal', 15, 50, 'ab97a7b782977c2f0749653fb5fe92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temp_transaction`
--
ALTER TABLE `temp_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temp_transaction`
--
ALTER TABLE `temp_transaction`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `temp_transaction`
--
ALTER TABLE `temp_transaction`
  ADD CONSTRAINT `temp_transaction_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `temp_transaction_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_list` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
