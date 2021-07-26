-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 10:01 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u383316595_1`
--

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`firstname`, `lastname`, `email`, `phone`, `university`, `educationl`, `visatype`, `workexp`, `joytype`) VALUES
('Matthew', 'Epstein', 'matthewepst@gmail.com', 2102859256, '', 'Doctoral_Degree', 'Residence_Visa', 'less_6_months', 'software developer'),
('Matthew', 'Epstein', 'matthewepst1@gmail.com', 2102859256, '', 'Master_Degree', 'Residence_Visa', 'one_year', 'software developer'),
('Matthew', 'Epstein', 'matthewepst11@gmail.com', 2102859256, '', 'Master_Degree', 'Residence_Visa', 'one_year', 'software developer'),
('Matthew', 'Epstein', 'matthewepst111@gmail.com', 2102859256, '', 'Master_Degree', 'Residence_Visa', 'one_year', 'software developer'),
('russell T', 'T', 'russ@russ.com', 2102859256, '', 'Bachelor_Degree', 'Residence_Visa', 'one year and half', 'software developer'),
('Russell ', 'Schooner', 'rizz@razz.com', 69, '', 'Postgraduate_Diploma', 'Residence_Visa', 'one year and half', 'software developer'),
('', '', '', 0, '', 'Master_Degree', 'Residence_Visa', 'one_year', 'software developer');

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`company`, `id`, `job_name`, `job_type`, `category`, `address`, `min`, `max`, `tag`, `descrption`, `creator_email`, `post_date`) VALUES
('kiwi', 18, 'fas', 'Part Time', 'Investigative', 'auckland ', 12, 1000, 'respon', 'das', 'test1@test.com', ' 22 Jun 2020 ');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'Matt', 'matthewepst@gmail.com', 'user', '202cb962ac59075b964b07152d234b70'),
(2, 'user', 'user@user.com', 'user', '202cb962ac59075b964b07152d234b70'),
(3, 'admin', 'admin@admin.com', 'admin', '202cb962ac59075b964b07152d234b70'),
(4, 'test', '111@111', 'admin', '202cb962ac59075b964b07152d234b70'),
(21, 'as', 'as@aa.com', 'Employee', 'f970e2767d0cfe75876ea857f92e319b'),
(22, 'kl', 'leonchiuchikwan@gmail.com', 'Employee', '732ed790ebb474a95f2b5161e37625b0'),
(23, 'test', 'test@test.com', 'Employee', 'f970e2767d0cfe75876ea857f92e319b'),
(24, 'asd', 'leonzhaozijun@hotmail.com', 'Employee', '7815696ecbf1c96e6894b779456d330e'),
(25, 'nnnn', '328298722@qq.com', 'Employer', 'f7c0e071db137f5ae65382041c7cef4b'),
(26, 'admin', 'Russellzhao123@gmail.com', 'Employee', '202cb962ac59075b964b07152d234b70'),
(27, 'Rohan', 'rohanmittal601@gmail.com', 'Employee', '00227262cbf1478f39f9ed9dfb9cf914'),
(28, 'Russellzhao1', 'russellzhao1@yeah.net', 'Employee', 'e10adc3949ba59abbe56e057f20f883e'),
(29, 'russell', '240880699@qq.com', 'Employer', 'e10adc3949ba59abbe56e057f20f883e'),
(30, '123', 'matthewepst1@gmail.com', 'Employer', '202cb962ac59075b964b07152d234b70'),
(31, '111', 'matthewepst2@gmail.com', 'Employee', '698d51a19d8a121ce581499d7b701668'),
(32, 'as', 'test1@test.com', 'Employer', 'f970e2767d0cfe75876ea857f92e319b'),
(33, '1233', '123@123.com', 'Employer', '202cb962ac59075b964b07152d234b70'),
(34, '321', 'matthewepst11@gmail.com', 'Employer', '202cb962ac59075b964b07152d234b70'),
(35, 'RBlack', 'ryanblack45@yahoo.co.nz', 'Employee', '098f6bcd4621d373cade4e832627b4f6'),
(36, '123', 'matthewepst22@gmail.com', 'Employee', '202cb962ac59075b964b07152d234b70'),
(37, '123', 'mattheweps2222t@gmail.com', 'Employee', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
