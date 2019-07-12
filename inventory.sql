
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `min_quantity` int(11) NOT NULL,
  `reorder_quantity` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `min_quantity`, `reorder_quantity`, `quantity`) VALUES
(1, 'TFT Monitor', 5, 12, 12),
(2, 'Laptops', 3, 5, 1),
(3, 'Flash Disks', 10, 20, 24);

-- --------------------------------------------------------

--
-- Table structure for table `reorders`
--

CREATE TABLE `reorders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_filled` timestamp NULL DEFAULT NULL,
  `reorder_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reorders`
--

INSERT INTO `reorders` (`id`, `product_id`, `date_ordered`, `date_filled`, `reorder_status`) VALUES
(4, 1, '2019-07-12 14:38:57', '2019-07-12 15:43:04', 1),
(5, 3, '2019-07-12 15:24:30', '2019-07-12 15:40:05', 1),
(6, 2, '2019-07-12 15:32:12', NULL, 0),
(7, 1, '2019-07-12 15:40:38', '2019-07-12 15:40:50', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reorders`
--
ALTER TABLE `reorders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reorders`
--
ALTER TABLE `reorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
